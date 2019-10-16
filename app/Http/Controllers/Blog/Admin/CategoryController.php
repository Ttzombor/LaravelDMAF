<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCategoryCreateRequest;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Models\BlogCategory;
use App\Repositories\BlogCategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $items = BlogCategory::paginate(5);

       return (view('blog.admin.category.index', compact('items')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new BlogCategory();
        $categoryList = BlogCategory::all();
       return view('blog.admin.category.create', compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryCreateRequest $request)
    {
        $data = $request->input();
        if(empty($data['slug'])){
            $data['slug'] = \Str::slug($data['title']);
        }

        $item = new BlogCategory($data);
        /*dd($data);*/
        $result = $item->save();

        if($result){
            return redirect()
                ->route('blog.admin.categories.edit', $item->id)
                ->with(['success' => "Successfully saved"]);
        }
        else {
            return back()
                ->withErrors(['msg' => "Saving Error"])
                ->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, BlogCategoryRepository $blogCategoryRepository)
    {
        /*$item = BlogCategory::findOrFail($id);

        $categoryList = BlogCategory::all();*/

        $item = $blogCategoryRepository->getEdit($id);
        if(empty($item)) return abort('404');

        $categoryList = $blogCategoryRepository->getComboBox();

        return view('blog.admin.category.edit',
            compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function update(BlogCategoryUpdateRequest $request, $id)
    {
        /*$rules = [
            'title' => 'required|min:5|max:200',
            'slug' => 'required|min:5|max:200',
            'description' => 'max:500',
            'parent_id' => 'required|integer|exists:blog_categories,id'
        ];

        $validateData = $this->validate($request, $rules);

        dd($validateData);*/


        $item = BlogCategory::find($id);

        if(empty($item))
            return back()
                ->withErrors('msg', "Id = [{$id}] has not found.")
                ->withInput();

        $data = $request->all();
        /*dd($data);*/
        $result = $item->fill($data)->save();

        if($result){
            return redirect()
                ->route('blog.admin.categories.edit', $item->id)
                ->with(['success' => "Successfully saved"]);
        }
        else {
            return back()
                ->withErrors(['msg' => "Saving Error"])
                ->withInput();
        }

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = BlogCategory::find($id);
        $item->delete();

        return redirect()->route('blog.admin.categories.index');
    }
}
