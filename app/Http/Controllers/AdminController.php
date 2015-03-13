<?php namespace Frostbite\Http\Controllers;

use Request;
use Frostbite\Validators\MainPageValidator, Frostbite\Misc\ConfigFileUpdater;
use Frostbite\Repos\PostRepo, Frostbite\Repos\CategoryRepo;

class AdminController extends Controller {

    /**
     * @var PostRepo
     */
    protected $postRepo;

    /**
     * @var CategoryRepo
     */
    protected $categoryRepo;

    /**
     * @param PostRepo $postRepo
     * @param CategoryRepo $categoryRepo
     * @return AdminController
     */
    public function __construct(PostRepo $postRepo, CategoryRepo $categoryRepo)
    {
        $this->postRepo     = $postRepo;
        $this->categoryRepo = $categoryRepo;
    }

    /**
     * @return Response
     */
    public function main()
    {
        return view('admin.main');
    }

    /**
     * @return Response
     */
    public function saveMain()
    {
        $input = Request::only('name', 'desc');

        if ( ! with(new MainPageValidator)->validate($input)) {
            return redirect()->back()->withInput()->withMessage(trans('errors.main-page'));
        }

        with($updater = new ConfigFileUpdater)->update('main-page', 'name', $input['name']);

        $updater->update('main-page', 'slogan', $input['desc']);

        return redirect()->to('/');
    }

    /**
     * @return Response
     */
    public function posts()
    {
        return view('admin.posts')->withPosts($this->postRepo->all());
    }

    /**
     * @return Response
     */
    public function categories()
    {
        return view('admin.categories')->withCategories($this->categoryRepo->buildList());
    }
}
