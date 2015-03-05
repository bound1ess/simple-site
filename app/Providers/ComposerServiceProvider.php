<?php namespace Frostbite\Providers;

use View,
    Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {

    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        View::composer('layouts.master', 'Frostbite\\Http\\Composers\\CategoryListComposer');
        View::composer('layouts.master', 'Frostbite\\Http\\Composers\\ImportantPostComposer');
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
    }
}
