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
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
    }
}
