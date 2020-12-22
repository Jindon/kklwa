<?php

namespace App\Providers;

use App\Models\Settings;
use Illuminate\Support\ServiceProvider;
use Livewire\Component;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Component::macro('notify', function ($message) {
            $this->dispatchBrowserEvent('notify', $message);
        });

        $logo = Settings::where('key', 'logo')->first();
        $sitename = Settings::where('key', 'sitename')->first();

        view()->share('logoUrl', $logo->getImageUrl());
        view()->share('sitename', $sitename->value);
    }
}
