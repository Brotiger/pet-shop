<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Category\CategoryStoreRequest;
use App\Http\Requests\Admin\Category\CategoryUpdateRequest;
use App\Http\Requests\Admin\Category\CategoryDestroyRequest;
use App\Http\Requests\Admin\Category\CategoryIndexRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryIndexRequest $request)
    {
        $filter = [];
        $next_query = [
            'id' => '',
            'alias' => '',
            'title' => '',
        ];

        if($request->id != null){
            $filter[] = ["id", "=", $request->id];
            $next_query['id'] = $request->id;
        }
        if($request->title != null){
            $filter[] = ["title", "like", '%' . $request->title . '%'];
            $next_query['title'] = $request->title;
        }
        if($request->alias != null){
            $filter[] = ["alias", "like", '%' . $request->alias . '%'];
            $next_query['alias'] = $request->alias;
        }

        $categories = Category::where($filter)->orderBy('created_at', 'DESC')->paginate(15);

        if($request->ajax()){
            return response([
                'data' => [
                    'html' => [
                        'table' => view('admin.ajax.category.index', compact('categories', 'next_query'))->render(),
                    ]
                ]
            ], 200);
        }

        return view('admin.category.index', compact('categories', 'next_query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $new_category = new Category();
        $new_category->title = $request->title;
        $new_category->alias = $request->alias;
        $new_category->description = $request->description;

        if($request->file('img')){
            $img_path = $request->file('img')->store('uploads/categorys', 'public');
            $new_category->img = $img_path;
        }

        $new_category->save();

        return response([
            'data' => [
                'message' => 'Категория добавлена' 
            ],
            'action' => 'reset'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $category->title = $request->title;
        $category->alias = $request->alias;
        $category->description = $request->description;

        if($request->deleteImg == 'true'){
            Storage::disk('public')->delete($category->img);
            $category->img = null;
        }

        if($request->file('img')){
            Storage::disk('public')->delete($category->img);
            $img_path = $request->file('img')->store('uploads/categorys', 'public');
            $category->img = $img_path;
        }

        $category->save();

        return response([
            'data' => [
                'message' => 'Категория обновлена' 
            ]
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryDestroyRequest $request, Category $category)
    {
        if($request->delete_type == 'all'){
            foreach($category->products as $key => $product){
                foreach($product->images as $key => $image){
                    Storage::disk('public')->delete($image->img);
                }
            }

            $category->products()->delete();
        }

        Storage::disk('public')->delete($category->img);
        $category->delete();

        return response([
            'data' => [
                'message' => 'Категория удалена',
            ],
        ], 200);
    }
}
