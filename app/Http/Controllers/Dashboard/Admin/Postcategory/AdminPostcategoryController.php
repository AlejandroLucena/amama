<?php

namespace Dashboard\Admin\Postcategory;

use DashboardContext\Postcategory\Infrastructure\Controller\FindAllPostcategoriesController;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostcategoryRequest;
use App\Models\Postcategory;
use App\Traits\Admin\ManagePostcategories;
use Exception;

class AdminPostcategoryController extends Controller
{
    use ManagePostcategories;

    public function __construct(
        private readonly FindAllPostcategoriesController $findAllPostcategoriesController,
    ) {
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        // Get all Postcategories, ordered by the newest first
        $title = __('Categorías');
        // $postcategories = Postcategory::orderby('title')->get();
        $postcategories = $this->findAllPostcategoriesController->__invoke();
        // Pass Postcategory Collection to view
        return view('admin.postcategories.index', compact('title', 'postcategories'));
    }

    public function create()
    {
        $postcategories = Postcategory::orderby('title')->get()->pluck('title', 'id')->toArray();
        $postcategory = new Postcategory();
        $title = __('Crear una categoría');
        $textButton = __('Crear Categoría');
        $options = ['route' => ['admin.postcategories.store'], 'files' => false];
        // return view('admin.postcategories.create', compact('title', 'postcategory', 'postcategories', 'options', 'textButton'));
    }

    public function edit(PostcategoryRequest $request, Postcategory $postcategory)
    {
        $postcategories = collect([]);
        $collection = Postcategory::whereDoesntHave('parent')->get();
        foreach ($collection as $parent) {
            if ($parent->id != $postcategory->id) {
                $postcategories->push($parent);
            }
        }

        $collection = Postcategory::whereHas('parent')->get();
        foreach ($collection as $child) {
            $aux = $postcategory;
            $check = true;
            if ($child->parent->id != $aux->id) {
                while ($aux->parent) {
                    $aux = $aux->parent;
                }
            } else {
                $check = false;
            }
            if ($check) {
                $postcategories->push($aux->parent);
            }
        }
        $postcategories = $postcategories->flatten()->pluck('title', 'id')->toArray();
        $title = __('Modificar una categoría');
        $textButton = __('Modificar la categoría');
        $options = ['route' => ['admin.postcategories.update', ['postcategory' => $postcategory]], 'files' => false];
        $update = true;

        return view('admin.postcategories.edit', compact('title', 'postcategory', 'postcategories', 'options', 'textButton', 'update'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostcategoryRequest $request)
    {
        try {
            $this->storePostcategory($request);

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
    public function update(PostcategoryRequest $request, Postcategory $postcategory)
    {
        try {
            $this->updatePostcategory($request, $postcategory);

            return redirect()->back();
        } catch (Exception $e) {
            session()->flash('message', ['danger', $e->getMessage()]);

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postcategory $postcategory)
    {
        try {
            $this->removePostcategory($postcategory);

            return redirect()->back();
        } catch (Exception $e) {
            session()->flash('message', ['danger', $e->getMessage()]);

            return redirect()->back();
        }
    }
}
