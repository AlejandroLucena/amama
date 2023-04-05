<?php

namespace Dashboard\Admin\Post;

use DashboardContext\Post\Infrastructure\Controller\FindAllPostController;
use DashboardContext\Post\Infrastructure\Controller\FindPostByIdController;
use DashboardContext\Postcategory\Infrastructure\Controller\FindAllOptionPostcategoriesController;
use DashboardContext\Postcategory\Infrastructure\Controller\FindAllPostcategoriesController;
use DashboardContext\Tag\Infrastructure\Controller\FindAllOptionTagsController;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Postcategory;
use App\Traits\Admin\ManagePosts;
use Exception;

class AdminPostController extends Controller
{
    use ManagePosts;

    public function __construct(
        private readonly FindAllPostController $findAllPostController,
        private readonly FindPostByIdController $findPostByIdController,
        private readonly FindAllPostcategoriesController $findAllPostcategoriesController,
        private readonly FindAllOptionPostcategoriesController $findAllOptionPostcategoriesController,
    ) {
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $title = __('Artículos');
        $posts = $this->findAllPostController->__invoke();

        return view('admin.posts.index', compact('title', 'posts'));
    }

    public function create()
    {
        $postcategories = Postcategory::orderby('title')->get()->pluck('title', 'id')->toArray();
        $post = new Post();
        $title = __('Crear una entrada');
        $textButton = __('Crear entrada');
        $options = ['route' => ['admin.posts.store'], 'files' => true];

        return view('admin.posts.create', compact('title', 'post', 'postcategories', 'options', 'textButton'));
    }

    public function edit(string $postId)
    {
        $post = $this->findPostByIdController->__invoke($postId);
        $postcategories = $this->findAllOptionPostcategoriesController->__invoke();
        // $postcategories = Postcategory::orderby('title')->get()->pluck('title', 'id')->toArray();

        // $tags = $post->tags ? $post->tags->pluck('title', 'id') : null;

        $title = __('Modificar una entrada');
        $textButton = __('Modificar la entrada');
        $options = ['route' => ['admin.posts.update', ['postId' => $postId]], 'files' => true];
        $update = true;

        return view('admin.posts.edit', compact('title', 'post', 'postcategories', 'options', 'textButton', 'update'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        try {
            $this->storePost($request);

            return redirect()->back();
        } catch (Exception $e) {
            session()->flash('message', ['danger', $e->getMessage()]);

            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        try {
            $this->updatePost($request, $post);

            return redirect()->back();
        } catch (Exception $e) {
            session()->flash('message', ['danger', $e->getMessage()]);

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        try {
            $this->removePost($post);

            return redirect()->back();
        } catch (Exception $e) {
            session()->flash('message', ['danger', $e->getMessage()]);

            return redirect()->back();
        }
    }
}
