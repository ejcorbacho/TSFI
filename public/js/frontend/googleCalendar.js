//MIRAR SERVICE ACCOUNTS PER EVITAR LOGIN

// Client ID and API key from the Developer Console
var CLIENT_ID = '697979761569-bj9sl5hj6s5oadrb9mho4pslhndh8kpp.apps.googleusercontent.com';

// Array of API discovery doc URLs for APIs used by the quickstart
var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest"];

// Authorization scopes required by the API; multiple scopes can be
// included, separated by spaces.
var SCOPES = "https://www.googleapis.com/auth/calendar.readonly";



/**
 *  On load, called to load the auth2 library and API client library.
 */
function handleClientLoad() {
    gapi.load('client:auth2', initClient);
}

/**
 *  Initializes the API client library and sets up sign-in state
 *  listeners.
 */
function initClient() {
    gapi.client.init({
        discoveryDocs: DISCOVERY_DOCS,
        clientId: CLIENT_ID,
        scope: SCOPES
    }).then(function () {
        // Listen for sign-in state changes.
        //gapi.auth2.getAuthInstance().isSignedIn.listen(updateSigninStatus);
    });
}

/**
 *  Sign in the user upon button click.
 */
function handleAuthClick(event) {
    return gapi.auth2.getAuthInstance().signIn();
}

function insertEvent(googleEvent) {
    var request = gapi.client.calendar.events.insert({
        'calendarId': 'primary',
        'resource': googleEvent
    });

    request.execute(function (event) {
        //
    });
}

function insertEventInGoogleCalendar(calEvent) {
    var formattedEvent = {
        'summary': calEvent.title,
        'description': calEvent.description,
        'location': calEvent.location,
        'start': getFormattedDate(calEvent.start),
        'end': getFormattedDate(calEvent.end),
        'reminders': {
            'useDefault': true
        }
    };

    if (gapi.auth2.getAuthInstance().isSignedIn.get()) {
        insertEvent(formattedEvent);
    } else {
        handleAuthClick().then(
            function() {
                insertEvent(formattedEvent);
            }, function() {
                alert('No s\' ha pogut establir connexió amb el vostre compte.');
            }
        );
    }
}

function getFormattedDate(date) {
    var timeZone = 'Europe/Amsterdam';
    if (date != null) {
        if (date.hasTime()) {
            return {
                'dateTime': date.format(),
                'timeZone': timeZone
            }
        } else {
            return {
                'date': date.format(),
                'timeZone': timeZone
            }
        }
    }
}
