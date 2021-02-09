<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use DB;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $Product = Category::orderBy('category', 'ASC')->get();
        return view('product.category')->with('ProductCategory', $Product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('product.add_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // validate form field
        $this->validate($request, 

            [
                'product_category' => 'required',
            ],
            
            [
                'product_category.required' => ' შეიყვანე კატეგორიის სახელი !',
            ]);

    

        $CheckCategory = Category::where('category', $request->input('product_category'))->exists();


        if($CheckCategory)
        {
            return redirect()->back()->with('error', 'პროდუქციის ეს კატეგორია უკვე არსებობს');
        
        } else {

            $Category = new Category;
            $Category->category = $request->input('product_category');
            $Category->save();

            return redirect()->back()->with('success', 'პროდუქციის კატეგორია დამატებულია');
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
    public function edit($id)
    {
        $EditProductCategory = Category::find($id);

        if(auth()->user()->id) 
        {
            if($EditProductCategory == TRUE) 
            {
                return view('product.edit')->with('EditProductCategory', $EditProductCategory);

            } else {

                return redirect('category')->with('error', 'პროდუქციის კატეგორია არ მოიძებნა, რედაქტირება შეუძლებელია');
            }

        } else {
            return redirect('category')->with('error', 'არა ავტორიზებული წვდომა');
        }
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
         // validate form field
        $this->validate($request, 

            [
                'product_category' => 'required',
            ],
            
            [
                'product_category.required' => ' შეიყვანე კატეგორიის სახელი !',
            ]);


        $UpdateData = Category::find($id);

        $UpdateData->category    = $request->input('product_category');
        
        // update and save data
        $UpdateData->save();

        return redirect('product/category')->with('success', 'კატეგორია განახლებულია');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $DeleteRecords = Category::find($id);
        
        if ($DeleteRecords == TRUE) 
        {
            if(auth()->user()->id)
            {
                $DeleteRecords->delete();
                return redirect('product/category')->with('success', 'პროდუქციის კატეგორია წაშლილია');
            
            } else {

                return redirect('product/category')->with('error', 'არა ავტორიზებული მოთხოვნა');
            }
            
        } else {

                return redirect('product/category')->with('error', 'პროდუქცია არ მოიძებნა, წაშლა შეუძლებელია');
        }
    }
}
