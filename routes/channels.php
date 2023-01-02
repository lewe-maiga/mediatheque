<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated employees can listen to the channel.
|
*/

Broadcast::channel('App.Models.Librarian.{id}', function ($employees, $id) {
    return (int) $employees->id === (int) $id;
});
