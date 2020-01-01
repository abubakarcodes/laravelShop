<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    public function index(){
    	$categories = Category::orderBy('created_at' , 'DSC')->get();
    	return view('admin.categories.categories')->with('categories' , $categories);
    }


      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	
       return view('admin.categories.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request , [
      	'categoryName' => 'required'
      ]);
      $category = new Category;
      $category->category_name = $request->input('categoryName');
      $category->save();

      return redirect()->Route('admin.categories.index')->with('success' , 'Your category has been Added');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $category = Category::find($id);
      return view('admin.categories.update')->with('category' , $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$this->validate($request , [
      	'categoryName' => 'required'
      ]);

    	$category = Category::find($id);
        
      $category->category_name = $request->input('categoryName');
      $category->save();

      return redirect()->Route('admin.categories.index')->with('success' , 'Your category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->Route('admin.categories.index')->with('success' , 'Your category has been deleted');
    }
}
