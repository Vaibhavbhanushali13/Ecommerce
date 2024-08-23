<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Client as GoogleClient;
use Google\Service\Calendar as GoogleCalendarService;

class GoogleController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->client = new GoogleClient();
        $this->client->setClientId(config('google.client_id'));
        $this->client->setClientSecret(config('google.client_secret'));
        $this->client->setRedirectUri(config('google.redirect'));

        // Use the correct scope for Google Calendar API
        $this->client->addScope(GoogleCalendarService::CALENDAR);
    }

    public function redirect()
    {
        $authUrl = $this->client->createAuthUrl();
        return redirect()->to($authUrl);
    }

    public function callback(Request $request)
    {
        $this->client->fetchAccessTokenWithAuthCode($request->input('code'));
        $token = $this->client->getAccessToken();
        session(['google_token' => $token]);
        return redirect('create-event');
    }

    public function createEvent()
    {
        $token = session('google_token');
        $this->client->setAccessToken($token);

        $service = new GoogleCalendarService($this->client);

        $event = new \Google_Service_Calendar_Event([
            'summary' => 'Google Calendar API Event',
            'location' => '800 Howard St., San Francisco, CA 94103',
            'description' => 'A test event created using Google Calendar API.',
            'start' => [
                'dateTime' => '2024-08-24T09:00:00-07:00',
                'timeZone' => 'America/Los_Angeles',
            ],
            'end' => [
                'dateTime' => '2024-08-24T17:00:00-07:00',
                'timeZone' => 'America/Los_Angeles',
            ],
            'reminders' => [
                'useDefault' => FALSE,
                'overrides' => [
                    ['method' => 'email', 'minutes' => 24 * 60],
                    ['method' => 'popup', 'minutes' => 10],
                ],
            ],
        ]);

        $calendarId = 'primary';
        $event = $service->events->insert($calendarId, $event);

        return response()->json($event);
    }
}
