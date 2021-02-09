<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 
use DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $all_product = Product::orderBy('created_at', 'DESC')->paginate(10)->fragment('პროდუქცია');

        $NumberOfProduct = count($all_product);

        return view('product.all_product')->with(['AllProduct' => $all_product, 'NumberOfProduct' => $NumberOfProduct ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ProductCategory = Category::orderBy('category', 'ASC')->get();
        return view('product.add_product')->with('ProductCategory', $ProductCategory);
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
            'product_name'                  => 'required|max:100',
            'product_barcode'               => 'required|max:30',
            'product_category'              => 'required|max:50',
            'number_of_product'             => 'required|max:10000',
            'product_price'                 => 'required|max:10000',
            'release_date'                  => 'required',
            'expiration_date'               => 'required',
            'description'                   => 'required|max:1000',
            'product_img'                   => 'required|mimes:jpeg,jpg,png,gif|max:1000',
        ],
        
        [
            'product_name.required'         => 'შეიყვანე პროდუქციის სახელი !',
            'product_barcode.required'      => 'შეიყვანე შტრიხ კოდი!',
            'product_category.required'     => 'შეიყვანე კატეგორიის სახელი !',
            'number_of_product.required'    => 'მიუთითე პროდუქციის რაოდენობა!',
            'product_price.required'        => 'შეიყვანე პროდუქციის (ერთეულის) ფასი !',
            'release_date.required'         => 'მიუთითე გამოშვების თარიღი !',
            'expiration_date.required'      => 'მიუთითე ვადის გასვლის თარიღი !',
            'description.required'          => 'აღწერე პროდუქციის შემადგენლობა !',
            'product_img.required'          => 'დაამატე პროდუქციის სურათი!',
        ]);

        $Number = '123457808754321';
        $RandomProductID    =   mb_substr(str_shuffle($Number), 0, 12);
        $Discount = 0;


        $Product = new Product;

        $Product->productionid          = $RandomProductID;
        $Product->production_name       = $request->input('product_name');
        $Product->barcode               = $request->input('product_barcode');
        $Product->category              = $request->input('product_category');
        $Product->number_of_product     = $request->input('number_of_product');
        $Product->description           = $request->input('description');
        $Product->production_price      = $request->input('product_price');
        $Product->discount              = $Discount;
        $Product->production_image      = $request->file('product_img')->store('public/product_image');
        $Product->release_date          = $request->input('release_date');
        $Product->expiration_date       = $request->input('expiration_date');
        $Product->user_id               = auth()->user()->id;


        $Product->save();
        return redirect('product/all_product')->with('success', 'პროდუქცია დამატებულია');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ShowProduct = Product::find($id);

        if($ShowProduct == TRUE)
        {
            return view('product.show')->with('ShowProduct', $ShowProduct);
        
        } else {

            return redirect('product/all_product');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $EditProduct = Product::find($id);

        if($EditProduct == TRUE)
        {   
            if(auth()->user()->id == $EditProduct->user_id)
            {
                return view('product/edit_product')->with('EditProduct', $EditProduct);
            
            } else {
               
                return redirect('product/all_product')->with('error', 'არა ავტორიზებული მოთხოვნა');
            }
        
        } else {

            return redirect('product/all_product')->with('error', 'პროდუქცია არ მოიძებნა');
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
            'product_name'                  => 'required|max:100',
            'product_barcode'               => 'required|numeric',
            'product_category'              => 'required|max:50',
            'number_of_product'             => 'required|max:10000',
            'product_price'                 => 'required|max:10000',
            'release_date'                  => 'required',
            'expiration_date'               => 'required',
            'description'                   => 'required|max:1000',
            'product_img'                   => 'required|mimes:jpeg,jpg,png,gif|max:1000',
        ],
        
        [
            'product_name.required'         => 'შეიყვანე პროდუქციის სახელი !',
            'product_barcode.required'      => 'შეიყვანე შტრიხ კოდი!',
            'product_category.required'     => 'შეიყვანე კატეგორიის სახელი !',
            'number_of_product.required'    => 'მიუთითე პროდუქციის რაოდენობა!',
            'product_price.required'        => 'შეიყვანე პროდუქციის (ერთეულის) ფასი !',
            'release_date.required'         => 'მიუთითე გამოშვების თარიღი !',
            'expiration_date.required'      => 'მიუთითე ვადის გასვლის თარიღი !',
            'description.required'          => 'აღწერე პროდუქციის შემადგენლობა !',
            'product_img.required'          => 'დაამატე პროდუქციის სურათი!',
        ]);



        if($request->hasFile('product_img')) 
        {

            $ProductPrice   = $request->input('product_price');
            $TaxPercent     = $request->input('discount');

            if(!is_numeric($TaxPercent)) 
            {
                $NewPrice   = 0;
            
            } else {

                $TaxPrice   = $TaxPercent / 100 * $ProductPrice;
                $Price      = $ProductPrice - $TaxPrice;
                $NewPrice   = number_format($Price, 2, '.', '.');
            }


            $UpdateProduct = Product::find($id);

            $file_path = storage_path().'/app/'.$UpdateProduct['production_image'];
            unlink($file_path);

            $UpdateProduct->production_name       = $request->input('product_name');
            $UpdateProduct->barcode               = $request->input('product_barcode');
            $UpdateProduct->category              = $request->input('product_category');
            $UpdateProduct->number_of_product     = $request->input('number_of_product');
            $UpdateProduct->description           = $request->input('description');
            $UpdateProduct->production_price      = $request->input('product_price');
            $UpdateProduct->discount              = $NewPrice;
            $UpdateProduct->production_image      = $request->file('product_img')->store('public/product_image');
            $UpdateProduct->release_date          = $request->input('release_date');
            $UpdateProduct->expiration_date       = $request->input('expiration_date');
            $UpdateProduct->user_id               = auth()->user()->id;


            $UpdateProduct->save();
            
            return redirect('product/all_product')->with('success', 'პროდუქცია განახლებულია');

        } else {
            return redirect()->back()->with('error', 'პროდუქციის სურათი ცარიელია, ატვირთვა შეუძლებელია!');
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
        $DeleteRecords = Product::find($id);
        
        if(auth()->user()->id)
        {

            $imgWillDelete = public_path() . '/storage' . str_replace('public', "", $DeleteRecords->production_image);
            unlink($imgWillDelete);

            $DeleteRecords->delete();
            
            return redirect('product/all_product')->with('success', 'პროდუქცია წაშლილია');

        }

        return redirect('product/all_product')->with('error', 'არა ავტორიზებული წვდომა');
    }



    public function search(Request $request)
    {   
        
        $search_keyword = $request->input('search_product');
        $results = Product::where('production_name', 'LIKE', '%'. $search_keyword . '%')
                            ->orWhere('barcode', 'LIKE', '%'. $search_keyword . '%')
                            ->orderBy('production_name', 'ASC')
                            ->get();

        if($results == true) {
            return view('/welcome')->with('SearchResult', $results);
        }

    }
}
