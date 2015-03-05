<?php namespace Frostbite\Http\Composers;

use Illuminate\Contracts\View\View,
    Frostbite\Repos\PostRepo;

class ImportantPostComposer {

    /**
     * @var PostRepo
     */
    protected $postRepo;

    /**
     * @param PostRepo $repo
     * @return ImportantPostComposer
     */
    public function __construct(PostRepo $repo)
    {
        $this->postRepo = $repo;
    }

    /**
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('importantPosts', $this->postRepo->getImportantPosts());
    }
}
