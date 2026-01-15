<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuitarController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data untuk grafik & tabel
        $table_data = DB::table('brand_growth')->where('model_name', '!=', 'Acoustic')->get();
        $labels_db = $table_data->pluck('model_name');
        $values_db = $table_data->pluck('units_sold');

        $products = [
            'Les Paul' => ['img' => 'gold.webp', 'price' => 25000000, 'desc' => '1961 Les Paul SG Standard Reissue', 'color' => 'Double Gold'],
            'SG' => ['img' => 'blue.webp', 'price' => 18000000, 'desc' => "SG Standard '61 Stop Bar", 'color' => 'Pelham Blue'],
            'Explorer' => ['img' => 'explorer.webp', 'price' => 21000000, 'desc' => 'Explorer 80s Silverburst', 'color' => 'Silverburst'],
            'Flying V' => ['img' => 'v.webp', 'price' => 22000000, 'desc' => 'Flying V 80s Exclusive', 'color' => 'Silverburst']
        ];

        // Logika detail beli (pengganti $_GET['buy'])
        $buy_item = null;
        if ($request->has('buy')) {
            $key = $request->query('buy');
            if (isset($products[$key])) {
                $buy_item = $products[$key];
                $buy_item['key'] = $key;
            }
        }

        return view('welcome', compact('table_data', 'labels_db', 'values_db', 'products', 'buy_item'));
    }

    public function contact(Request $request)
    {
        DB::table('contact_messages')->insert([
            'email' => $request->email_user,
            'message' => $request->saran_teks,
            'created_at' => now()
        ]);
        return back()->with('success', 'Your feedback has been saved!');
    }

    public function buy(Request $request)
    {
        $total_price = $request->price * $request->quantity;
        DB::table('orders')->insert([
            'product_name' => $request->product_name,
            'buyer_name' => $request->buyer_name,
            'buyer_email' => $request->buyer_email,
            'quantity' => $request->quantity,
            'total_price' => $total_price,
            'created_at' => now()
        ]);

        DB::table('brand_growth')->where('model_name', $request->product_name)->increment('units_sold', $request->quantity);
        return redirect()->route('home')->with('success', 'Purchase Successful!');
    }
}