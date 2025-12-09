<span
    x-data="{
        calculateExperience: function getYearsAndMonthsBetween(startDate, endDate) {
            const start = new Date(startDate)
            const end = new Date(endDate)

            let years = end.getFullYear() - start.getFullYear()
            let months = end.getMonth() - start.getMonth()

            if (months < 0) {
                years--
                months += 12
            }

            return `${years} years and ${months} months`
        },
    }"
    x-text="calculateExperience('{{ $utcStartDate }}', '{{ $utcEndDate }}')"
></span>
