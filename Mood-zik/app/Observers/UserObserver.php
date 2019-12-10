<?php

namespace App\Observers;

use App\User;
use App\Playlist;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {

        $playlist_name = 'Playlist of ' . $user->name;
        //$user_id = $user->id;
        $playlist = Playlist::create(['name' => $playlist_name]);

        //peut-être un peu moche mais le seul moyen trouvé pour que l'user_id soit stocké dans la table
        $playlist->user_id = $user->id; 
        $playlist->save();

        //$user->playlists()->save($playlist);
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
