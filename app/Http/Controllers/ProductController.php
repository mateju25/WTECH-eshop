<?php

namespace App\Http\Controllers;

use App\Models\BusinessType;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

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

        if ($request['discount'])
            $products = $products->whereNotNull('discountedPrize');

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

        $products = $products->where('deleted', '=', false);

        return view('products')
            ->with('productsList', $products->paginate(6))
            ->with('businessTypeList',  BusinessType::all())
            ->with('categoryList', Category::all())
            ->with('request', $request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    private function duplicateAndSaveImage($request) {
        $fileName = str_replace(" ", '', $request['name']);
        $category = Category::where('id', $request['category'])->first();
        $request->image->move(public_path('images/' . $category->name), $fileName . '.jpg');

        $basePath = public_path('images/' . $category->name) . '/' . $fileName . '.jpg';
        copy($basePath, $basePath);
        $image_resize = Image::make($basePath);
        $image_resize->resize(600, 600);
        $image_resize->save(public_path('images/products') . '/' . $fileName . '.jpg');
        $image_resize = Image::make($basePath);
        $image_resize->resize(300, 300);
        $image_resize->save(public_path('images/products') . '/' . $fileName . '_300.jpg');
        $image_resize = Image::make($basePath);
        $image_resize->resize(200, 200);
        $image_resize->save(public_path('images/products') . '/' . $fileName . '_200.jpg');
        return $fileName;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user() or Auth::user()->admin == false)
            return redirect('/');

        $fileName = $this->duplicateAndSaveImage($request);

        $product = new Product();
        $product->name = $request['name'];
        $product->shortDescription = $request['shortDesc'];
        $product->longDescription = $request['longDesc'];
        $product->business_type_id = BusinessType::where('id', $request['businessType'] )->first()->id;
        $product->category_id = Category::where('id', $request['category'] )->first()->id;
        $product->prize = $request['prize'];
        $product->discountedPrize = $request['discount'];
        $product->rating = $request['rating'];
        $product->soldedCount = $request['solds'];
        $product->top = $request['top'] == "on" ? true : false;
        $product->bestOfWeek = $request['bestOfWeek'] == "on" ? true : false;
        $product->image = '/images/products/'.$fileName;
        $product->save();

        return redirect('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if ($product->deleted == true)
            return redirect('/');
        $similar = Product::where([['category_id', $product->category->id],['id', '!=', $product->id],['deleted', '=', false]])->get();
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
        if (!Auth::user() or Auth::user()->admin == false)
            return redirect('/');

        if($request->image) {
            $fileName = $this->duplicateAndSaveImage($request);
            $product->image = '/images/products/'.$fileName;
        }

        $product->name = $request['name'];
        $product->shortDescription = $request['shortDesc'];
        $product->longDescription = $request['longDesc'];
        $product->business_type_id = BusinessType::where('id', $request['businessType'] )->first()->id;
        $product->category_id = Category::where('id', $request['category'] )->first()->id;
        $product->prize = $request['prize'];
        $product->discountedPrize = $request['discount'];
        $product->rating = $request['rating'];
        $product->soldedCount = $request['solds'];
        $product->top = $request['top'] == "on" ? true : false;
        $product->bestOfWeek = $request['bestOfWeek'] == "on" ? true : false;
        $product->save();

        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if (!Auth::user() or Auth::user()->admin == false)
            return redirect('/');
        $product->deleted = true;
        $product->save();
        return redirect('admin');
    }
}
