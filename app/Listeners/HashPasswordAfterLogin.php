<?php

// namespace App\Listeners;

// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Queue\InteractsWithQueue;

// class HashPasswordAfterLogin
// {
//     /**
//      * Create the event listener.
//      */
//     public function __construct()
//     {
//         //
//     }

//     /**
//      * Handle the event.
//      */
//     public function handle(object $event): void
//     {
//         //
//     }
// }
namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Hash;

class HashPasswordAfterLogin
{
    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $user = $event->user;

        // Cek apakah password belum di-hash
        if (!Hash::needsRehash($user->password)) {
            // Hash password dan simpan
            $user->password = bcrypt($user->password);
            $user->save();
        }
    }
}
