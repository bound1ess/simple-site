<?php namespace Frostbite\Providers;

use View,
    Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {

    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        View::composer('category-list', 'Frostbite\\Http\\Composers\\CategoryListComposer');
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
    }
}
