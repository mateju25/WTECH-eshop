<?php

namespace App\Http\Controllers;

use App\Models\BusinessType;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = DB::table('products');

        $conditionsCategory = array();
        foreach (Category::all() as $category)
            if ($request['category_'.$category->id])
                array_push($conditionsCategory, $category->id);

        $conditionsBusinessType = array();
        foreach (BusinessType::all() as $businessType)
            if ($request['businessType_'.$businessType->id])
                array_push($conditionsBusinessType, $businessType->id);

        if (count($conditionsCategory) != 0)
            $products = $products->whereIn('category_id', $conditionsCategory);

        if (count($conditionsBusinessType) != 0)
            $products = $products->whereIn('business_type_id', $conditionsBusinessType);

        if ($request['search'])
            $products = $products->where('name', 'ILIKE', '%' . $request['search'] . '%');

        if ($request['prizeRangeTo'])
            $products = $products->where('prize', '<=', $request['prizeRangeTo']);

        if ($request['prizeRangeFrom'])
            $products = $products->where('prize', '>=', $request['prizeRangeFrom']);

        if  ($request['top'])
            $products = $products->orderBy('top', $request['top']);

        if  ($request['prize'])
            $products = $products->orderBy('prize', $request['prize']);

        if  ($request['soldedCount'])
            $products = $products->orderBy('soldedCount', $request['soldedCount']);

        if  ($request['rating'])
            $products = $products->orderBy('rating', $request['rating']);

        return view('products')
            ->with('productsList', $products->paginate(12))
            ->with('businessTypeList',  BusinessType::all())
            ->with('categoryList', Category::all())
            ->with('request', $request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $similar = Product::where([['category_id', $product->category->id],['id', '!=', $product->id]])->get();
        return view('productDetail')->with('product', $product)->with('similarProducts',$similar);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
