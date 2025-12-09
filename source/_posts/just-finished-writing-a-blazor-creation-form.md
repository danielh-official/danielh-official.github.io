---
extends: _layouts.post
section: content
title: Just Finished Writing a Blazor Asp.Net Core Creation Form, and I'm Not Okay
date: 2025-10-29
order: 0
---

I felt like a beginner again. I haven't touched ASP.Net Core since forever. Was it always this complicated to set up a single form?

### `Create.razor` Imports

```csharp
@page "/widgets/create"
@using global::Widgets.Models
@using Microsoft.EntityFrameworkCore
@using Widgets.Data
@inject IDbContextFactory<WidgetDbContext> DbFactory
@inject NavigationManager NavigationManager
```

### `Create.razor` HTML

```html
<PageTitle>Create Widget | Widgets</PageTitle>

<div>
  <a href="/">Back to List</a>
</div>

<div>
  <EditForm
    method="post"
    OnValidSubmit="@HandleFormSubmission"
    FormName="create"
    Enhance
    EditContext="_editContext"
  >
    <DataAnnotationsValidator />
    <ValidationSummary class="text-danger" role="alert" />

    <div class="my-3">
      <label for="name" class="form-label">Name</label>
      <InputText
        class="form-control"
        id="name"
        @bind-Value="CreateWidgetModel.Name"
        required
      ></InputText>
      <ValidationMessage
        For="() => CreateWidgetModel.Name"
        class="text-danger"
      />
    </div>
    <div class="my-3">
      <label for="description" class="form-label">Description</label>
      <InputTextArea
        class="form-control"
        id="description"
        @bind-Value="CreateWidgetModel.Description"
      ></InputTextArea>
      <ValidationMessage
        For="() => CreateWidgetModel.Description"
        class="text-danger"
      />
    </div>
    <div class="my-3">
      <label for="url" class="form-label">Url</label>
      <InputText
        class="form-control"
        id="url"
        @bind-Value="CreateWidgetModel!.Url"
      ></InputText>
      <ValidationMessage
        For="() => CreateWidgetModel!.Url"
        class="text-danger"
      />
    </div>
    <div class="my-3">
      <label for="number" class="form-label">Number</label>
      <InputText
        class="form-control"
        id="number"
        @bind-Value="CreateWidgetModel.WidgetNumberString"
      />
      <ValidationMessage
        For="() => CreateWidgetModel!.WidgetNumberString"
        class="text-danger"
      />
    </div>
    <button type="submit" class="btn btn-primary">Create Widget</button>
  </EditForm>
</div>
```

### `Create.razor` @code

```csharp
@code {
    private EditContext? _editContext;
    private ValidationMessageStore? _messageStore;

    [SupplyParameterFromForm] private CreateWidgetModel CreateWidgetModel { get; init; } = new();

    private Widget Widget { get; init; } = new();

    protected override void OnInitialized()
    {        _editContext = new EditContext(CreateWidgetModel);
        _messageStore = new ValidationMessageStore(_editContext);
    }

    private async Task HandleFormSubmission()
    {        _messageStore?.Clear();

        Widget.Name = CreateWidgetModel.Name;
        Widget.Description = CreateWidgetModel.Description ?? null;
        Widget.Url = CreateWidgetModel.Url ?? null;

        var value = CreateWidgetModel.Url;
        var valueResolvesToUrl = Uri.TryCreate(value, UriKind.Absolute, out _);

        if (string.IsNullOrEmpty(value) || valueResolvesToUrl)
        {            Widget.Url = value == "" ? null : value;
        }        else
        {
            // Trigger validation error
            _messageStore?.Add(() => CreateWidgetModel.Url, "URL must be a valid HTTP address or empty.");
            _editContext?.NotifyValidationStateChanged();
            return;
        }
        value = CreateWidgetModel.WidgetNumberString;

        try
        {
            if (string.IsNullOrEmpty(value))
            {                Widget.WidgetNumber = null;
            }            else
            {
                Widget.WidgetNumber = int.Parse(value);
            }
        }        catch
        {
            // Trigger validation error
            _messageStore?.Add(() => CreateWidgetModel.WidgetNumberString, "Widget Number must be a valid numeric.");
            _editContext?.NotifyValidationStateChanged();
            return;
        }
        await using var context = DbFactory.CreateDbContext();
        context.Widget.Add(Widget);
        await context.SaveChangesAsync();
        NavigationManager.NavigateTo("/");
    }
}
```

### `Create.razor.cs`

```csharp
using System.ComponentModel.DataAnnotations;

namespace Widgets.Components.Pages.WidgetPages;

public class CreateWidgetModel
{
    [Required, MaxLength(100)] public string? Name { get; set; }

    [MaxLength(1000)] public string? Description { get; set; }
        [MaxLength(500)] public string? Url { get; set; }
        public string? WidgetNumberString { get; set; }
}
```

Note to self: Since I now have `Create.razor.cs`, maybe I should see if I can put the rest of the `@code` segment in there.

### What Went Wrong Exactly?

I ran into trouble specifically with these two fields:

- Widget.Url
- Widget.WidgetNumber

When they were empty, they were throwing validation errors even though they were nullable.

After hours of debugging, I decided to make `CreateWidgetModel` and put it in `Create.razor.cs` to handle the form input bindings and then transfer the data over to Widget once it was ready.

Then I needed to ensure that the validation errors were thrown in special cases, like where the Url field is not empty/null and it is not a valid url.

Similarly, I had to make sure that the WidgetNumber field would only throw an error when it was filled with actual junk (e.g., "oirehfjuewrw").

In Laravel, there are special form validations that handle a lot of this jank from the get-go.

```php
$request->validate([
  'url' => 'nullable|url',
  'widget_number' => 'nullable|integer'
]);
```

With the `nullable` added, I should expect it to make a special exception for `null` or `''` even though those values would violate the url and integer validations otherwise.
