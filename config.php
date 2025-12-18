<?php

use Illuminate\Support\Str;

function getContactMailToLink(string $email, string $subject = '', string $body = '')
{
    $mailTo = "mailto:{$email}";

    $params = [];
    if ($subject) {
        $params['subject'] = $subject;
    }

    if ($body) {
        $params['body'] = $body;
    }

    foreach ($params as $key => $value) {
        $mailTo .= (strpos($mailTo, '?') === false ? '?' : '&') . "{$key}={$value}";
    }

    return $mailTo;
}

return [
    'baseUrl' => 'http://localhost:8000',
    'production' => false,
    'siteName' => 'danielhaven.dev',
    'siteDescription' => 'Daniel Haven\'s Developer Site',
    'siteAuthor' => 'Daniel Haven',

    // collections
    'collections' => [
        'posts' => [
            'author' => 'Daniel Haven', // Default author, if not provided in a post
            'sort' => ['-date', 'order'],
            'path' => 'blog/{filename}',
        ],
        'categories' => [
            'path' => '/blog/categories/{filename}',
            'posts' => function ($page, $allPosts) {
                return $allPosts->filter(function ($post) use ($page) {
                    return $post->categories ? in_array($page->getFilename(), $post->categories, true) : false;
                });
            },
        ],
        'projects' => [
            'sort' => ['-order'],
            'path' => 'projects/{filename}',
        ],
    ],

    // helpers
    'getDate' => function ($page) {
        return $page->date ? Datetime::createFromFormat('U', $page->date) : null;
    },
    'getStartDate' => function ($page) {
        return $page->start_date ? Datetime::createFromFormat('U', $page->start_date) : null;
    },
    'getEndDate' => function ($page) {
        return $page->end_date ? Datetime::createFromFormat('U', $page->end_date) : null;
    },
    'getWebsiteLink' => function ($page) {
        return $page->website_link ?? null;
    },
    'getExcerpt' => function ($page, $length = 255) {
        if ($page->excerpt) {
            return $page->excerpt;
        }

        $content = preg_split('/<!-- more -->/m', $page->getContent(), 2);
        $cleaned = trim(
            strip_tags(
                preg_replace(['/<pre>[\w\W]*?<\/pre>/', '/<h\d>[\w\W]*?<\/h\d>/'], '', $content[0]),
                '<code>'
            )
        );

        if (count($content) > 1) {
            return $cleaned;
        }

        $truncated = substr($cleaned, 0, $length);

        if (substr_count($truncated, '<code>') > substr_count($truncated, '</code>')) {
            $truncated .= '</code>';
        }

        return strlen($cleaned) > $length
            ? preg_replace('/\s+?(\S+)?$/', '', $truncated) . '...'
            : $cleaned;
    },
    'isActive' => function ($page, $path) {
        return Str::endsWith(trimPath($page->getPath()), trimPath($path));
    },
    'getMenuItems' => function () {
        return [
            [
                'name' => 'Home',
                'path' => '/',
            ],
            [
                'name' => 'Projects',
                'path' => '/projects',
            ],
            [
                'name' => 'Blog',
                'path' => '/blog',
            ],
            [
                'name' => 'Contact',
                'path' => getContactMailToLink(
                    'hello@danielhavendev.aleeas.com',
                    'Contacting You From danielhaven.dev',
                    'Hi Daniel,%0D%0A%0D%0AI would like to get in touch with you regarding...'
                ),
            ],
        ];
    },
    'getProjectCoverImage' => function ($page) {
        return $page->image ? "/assets/img/projects/$page->image" : null;
    },
    'getProjectRepositoryLink' => function ($page) {
        return $page->repository_link ?? null;
    },
];
