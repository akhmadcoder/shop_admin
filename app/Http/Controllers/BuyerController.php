<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
use App\Models\Buyer;

class BuyerController extends Controller
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
        return view('buyer');
    }

    public function create(){
        return view('customer.create');
    }

    public function edit($id){
        if(is_numeric($id)){

            $customer = Buyer::findOrFail($id);
            return view('customer.edit', ['customer' => $customer]);

        } else {
            return redirect()->route('home');
        }
    }

    public function update(Request $request){

        $request->validate([
            'fullname' => 'required|min:2|max:256',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
        ]);

        $customer = Buyer::findOrFail($request->id);

        $customer->update($request->all());

        return redirect()->route('view', ['id' => $customer->id])->with('message','Customer data updated successfully');
    }

    public function destroy($id){
        if(is_numeric($id)){

            $customer = Buyer::findOrFail($id);
            
            try {
                $customer->delete();
                return redirect()->route('buyers')->with('message','Customer deleted successfully');

            } catch (\Throwable $th) {

                return redirect()->back()->with('error','Customer not deleted.');
            }

        } else {
            return redirect()->route('home');
        }
    }

    public function purchases(){

        $id=5;

        $purchases = DB::table('purchases')
        ->select('items.*', 'purchases.*', 'measures.name as measure', DB::raw('(items.price*purchases.quantity) as total_price'))
        ->join('items', 'items.id', '=', 'purchases.item_id')
        ->leftJoin('measures', 'measures.id', '=', 'items.measure_id')
        ->where('purchases.buyer_id', $id)
        ->orderBy('purchases.created_at')
        ->get();

        return Datatables::of($purchases)
                ->addColumn('image', function ($purchase) { 
                    $url= $purchase->image;
                    return '<img src="'.$url.'" border="0" width="70" class="img-rounded" align="center" />';
                })->rawColumns(['image'])->make(true);

    }

    public function view($id){

        if(is_numeric($id)){

            $customer = Buyer::findOrFail($id);
            return view('customer.view', ['customer' => $customer]);

        } else {
            return redirect()->route('home');
        }
    }

    public function create_customer(Request $request){

        $request->validate([
            'image' => 'required|image|mimes:png,jpg|max:5000|dimensions:min_width=300,min_height=300',
            'fullname' => 'required|min:2|max:256',
            'email' => 'required|email|unique:buyers,email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',

            
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = substr(number_format(time() * rand(),0,'',''),0,10).$image->getClientOriginalName();

            $image->move(public_path('/images'),$image_name);
        
            $image_path = "/images/" . $image_name;

            $customer = new Buyer([
                "fullname" => $request->get('fullname'),
                "phone" => $request->get('phone'),
                "email" => $request->get('email'),
                "image" => $image_path
            ]);

            $customer->save();
        }

        return redirect()->route('view', ['id' => $customer->id]);

    }

    public function customers(){

        $buyers_1 = DB::table('buyers')
            ->select('buyers.*')
            ->leftJoin('purchases', 'purchases.buyer_id', '=', 'buyers.id')
            ->where('purchases.buyer_id', null)
            ->orderBy('buyers.id')
            ->get();

        $buyers_2 = DB::table('buyers')
            ->select('buyers.*', DB::raw('COUNT(purchases.id) as total_purchases'), DB::raw('SUM(items.price*purchases.quantity) as total_price'))
            ->join('purchases', 'purchases.buyer_id', '=', 'buyers.id')
            ->join('items', 'items.id', '=', 'purchases.item_id')
            ->groupBy('purchases.buyer_id')
            ->orderBy('buyers.id')
            ->get();

        $buyers = array();

        foreach ($buyers_2 as $buyer) {
            
            $new_buyer = array();

            $new_buyer['id'] = $buyer->id;
            $new_buyer['fullname'] = $buyer->fullname;
            $new_buyer['phone'] = $buyer->phone;
            $new_buyer['email'] = $buyer->email;
            $new_buyer['image'] = $buyer->image;
            $new_buyer['created_at'] = $buyer->created_at;
            $new_buyer['updated_at'] = $buyer->updated_at;
            $new_buyer['admin_created_at'] = $buyer->admin_created_at;
            $new_buyer['admin_updated_at'] = $buyer->admin_updated_at;
            $new_buyer['total_purchases'] = $buyer->total_purchases;
            $new_buyer['total_price'] = $buyer->total_price;
            
            array_push($buyers, $new_buyer);

        }

        foreach ($buyers_1 as $buyer) {
            
            $new_buyer = array();

            $new_buyer['id'] = $buyer->id;
            $new_buyer['fullname'] = $buyer->fullname;
            $new_buyer['phone'] = $buyer->phone;
            $new_buyer['email'] = $buyer->email;
            $new_buyer['image'] = $buyer->image;
            $new_buyer['created_at'] = $buyer->created_at;
            $new_buyer['updated_at'] = $buyer->updated_at;
            $new_buyer['admin_created_at'] = $buyer->admin_created_at;
            $new_buyer['admin_updated_at'] = $buyer->admin_updated_at;
            $new_buyer['total_purchases'] = 0;
            $new_buyer['total_price'] = 0;
            
            array_push($buyers, $new_buyer);
        }

        // convert array to object 
        $buyers = json_decode(json_encode($buyers));

        return Datatables::of($buyers)
                ->addColumn('image', function ($buyer) { 
                    // $url= asset('storage/'.$buyer->image);
                    $url= $buyer->image;
                    return '<img src="'.$url.'" border="0" width="70" class="img-rounded" align="center" />';
                })->addColumn('action', function ($buyer) {
                    return '<a href="/view/'.$buyer->id.'" class="btn btn-xs btn-primary"><i class="fas fa-eye"></i></a> <a href="/edit_customer/'.$buyer->id.'" class="btn btn-xs btn-primary"><i class="fas fa-edit"></i></a>
                       <a href="/delete/'.$buyer->id.'" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></a>   ';
            })->rawColumns(['image', 'action'])->make(true);
    }

}
