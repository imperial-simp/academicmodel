<?php

namespace Imperial\AcademicModel\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes();

        /*
         * Authenticate the user's personal channel...
         */
        Broadcast::channel('Imperial.AcademicModel.User.*', function ($user, $userId) {
            return (int) $user->id === (int) $userId;
        });
    }
}
