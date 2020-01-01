<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\Category;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $products = product::orderBy('created_at', 'DSC')->get();

        return view('admin.products.product')->with('products' , $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('created_at' , 'DSC')->get();
       return view('admin.products.add')->with('categories' , $categories );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                //validating fields
        $this->validate( $request,[
            'productName' => 'required',
            'category' => 'required|not_in:0',
            'price' => 'required',
            'description' => 'required',
            'productImage' => 'image|max:1999'

       

         ]);

         //getting file name of uploaded photo
        
             $filenameWithExt = $request->file('productImage')->getClientOriginalName();
         //getting file extension to upload image
         $fileExtention = $request->file('productImage')->getClientOriginalExtension();
         //filename without extention
         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //filename to store
          $fileNameToStore = $filename . '_' . time() . '.' . $fileExtention;

          //path to store
          $path = $request->file('productImage')->storeAs('/public/storage/', $fileNameToStore);

        
        
         //storing in database
         $product = new product;
         $product->product_name = $request->input('productName');
         $product->category_id = $request->input('category');
         $product->price = $request->input('price');
         $product->description = $request->input('description');
         $product->image_name = $fileNameToStore;
         $product->save();
         return redirect()->Route('admin.products.index')->with('success' , 'your product has been added successfully');

          
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $categories = Category::orderBy('created_at' , 'DSC')->get();
        $product = product::find($id);
      return view('admin.products.update', compact(['product' , 'categories']));
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
                 //validating fields
        $this->validate( $request,[
            'productName' => 'required',
            'category' => 'required|not_in:0',
            'price' => 'required',
            'description' => 'required',
            'productImage' => 'image|max:1999|required'

       

         ]);
        // //check if already exsist in the folder
        // if($request->hasFile('image')){
        //     //check if the old image exsist in the folder
        //     if(file_exists(public_path('storage/strage/'. $product->image_name))){
        //         unlink(public_path('storage/storage/'. $product->image_name));
        //     }
        // }

         //getting file name of uploaded photo
        
             $filenameWithExt = $request->file('productImage')->getClientOriginalName();
         //getting file extension to upload image
         $fileExtention = $request->file('productImage')->getClientOriginalExtension();
         //filename without extention
         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //filename to store
          $fileNameToStore = $filename . '_' . time() . '.' . $fileExtention;

          //path to store
          $path = $request->file('productImage')->storeAs('/public/storage/', $fileNameToStore);

        
        
         //storing in database
         $product =product::find($id);
         $product->product_name = $request->input('productName');
         $product->category_id = $request->input('category');
         $product->price = $request->input('price');
         $product->description = $request->input('description');
         $product->image_name = $fileNameToStore;
         $product->save();
         return redirect()->Route('admin.products.index')->with('success' , 'your product has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = product::find($id);
        $product->delete();
        return redirect()->Route('admin.products.index')->with('success' , 'your product is successfully deleted');
    }
}
