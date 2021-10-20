<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use DB;
use Yajra\Datatables\Datatables;


class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('products');
    }

    public function productlist(){
        $products = DB::table('items')
            ->select('items.*','measures.name as measure')
            ->leftJoin('measures', 'measures.id', '=', 'items.measure_id')
            ->get();

        return Datatables::of($products)
            ->addColumn('image', function ($product) { 
                $url= $product->image;
                return '<img src="'.$url.'" border="0" width="70" class="img-rounded" align="center" />';
            })->rawColumns(['image'])->make(true);

    }

    public function create(){
        return view('product.create');
    }

    public function store(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:png,jpg|max:5000|dimensions:min_width=300,min_height=300',
            'name' => 'required|min:2|max:256',
            'sku' => 'required',
            'price' => 'required',
            'measure_id' => 'required|numeric',
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = substr(number_format(time() * rand(),0,'',''),0,10).$image->getClientOriginalName();

            $image->move(public_path('/images/products'),$image_name);
        
            $image_path = "/images/products/" . $image_name;

            $product = new Item([
                "name" => $request->name,
                "SKU" => $request->sku,
                "price" => $request->price,
                "image" => $image_path,
                "measure_id" => $request->measure_id
            ]);

            $product->save();
        }

        return redirect()->route('products')->with('message','Product has been added successfully !!!');
    }
}
