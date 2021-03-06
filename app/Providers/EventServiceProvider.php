<?php namespace Frostbite\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {

	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		'event.name' => [
			'EventListener',
		],
	];

	/**
	 * Register any other events for your application.
	 *
	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
		parent::boot($events);

		\Frostbite\Post::saving(function($post) {
            $post->contents = str_replace('<p>', '<p class="lead">', $post->contents);

            return true;
        });

        \Frostbite\Category::saving(function($category) {
            $category->parent_id = $category->parent_id ?: null;

            return true;
        });
	}
}
