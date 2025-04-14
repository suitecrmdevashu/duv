document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.querySelector('.calendar-container');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        // Customize your calendar options here
        initialView: 'dayGridMonth', // Initial view when the calendar loads
        events: [
            // Define your events here
            {
                title: 'Event 1',
                start: '2023-09-14T10:00:00',
                end: '2023-09-14T12:00:00'
            },
            {
                title: 'Event 2',
                start: '2023-09-15T14:00:00',
                end: '2023-09-15T16:00:00'
            },
            // Add more events as needed
        ]
    });

    calendar.render(); // Render the calendar
});
