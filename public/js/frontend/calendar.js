$(document).ready(function() {
    getDataOverAJAX( 'eventList', null).then(
        function ( data ) {
            startCalendar( data );
        }, function ( error ) {

        }
    );


});

function startCalendar( events ) {
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next',
            center: 'title',
            right: ''
        },

        height: 500,
        // customize the button names,
        // otherwise they'd all just say "list"
        views: {
            listMonth: { buttonText: 'Mes' }
        },
        eventClick: function(calEvent, jsEvent, view) {
            insertEventInGoogleCalendar(calEvent)
        },
        defaultView: 'listMonth',
        defaultDate: moment().format('YYYY-MM-DD'),
        navLinks: false, // can click day/week names to navigate views
        editable: false,
        eventLimit: true, // allow "more" link when too many events

        events: events/*[
            {
                title: 'All Day Event',
                start: '2017-02-01'
            },
            {
                title: 'Long Event',
                start: '2017-02-07',
                end: '2017-02-10'
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: '2017-02-09T16:00:00'
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: '2017-02-16T16:00:00'
            },
            {
                title: 'Conference',
                start: '2017-02-11',
                end: '2017-02-13'
            },
            {
                title: 'Meeting',
                start: '2017-02-12T10:30:00',
                end: '2017-02-12T12:30:00'
            },
            {
                title: 'Lunch',
                start: '2017-02-12T12:00:00'
            },
            {
                title: 'Meeting',
                start: '2017-02-12T14:30:00'
            },
            {
                title: 'Happy Hour',
                start: '2017-02-12T17:30:00'
            },
            {
                title: 'Dinner',
                start: '2017-02-12T20:00:00'
            },
            {
                title: 'Birthday Party',
                start: '2017-02-13T07:00:00',
                url: 'http://google.com/',
            },
            {
                title: 'Click for Google',
                start: '2017-02-28'
            }
        ]*/
    });
}

function getDataOverAJAX( route, data) {
    return $.ajax({
        type: 'GET',
        url: urlPrincipal + 'ajax/' + route,
        data: {data: data}
    });
}