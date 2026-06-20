<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $products = Product::all();
        } catch (\Exception $e) {
            // Vercel Fallback UI if Database is not connected
            $products = collect([
                (object)[
                    'id' => 1, 'slug' => 'retro-fallback-1', 'name' => 'NEON HIGHTOP', 
                    'price' => 850000, 'image_path' => 'https://via.placeholder.com/300x250/111111/ff0055?text=NEON+KICKS'
                ],
                (object)[
                    'id' => 2, 'slug' => 'retro-fallback-2', 'name' => 'CYBERPUNK LOWS', 
                    'price' => 950000, 'image_path' => 'https://via.placeholder.com/300x250/20b2aa/ffffff?text=CYBERPUNK'
                ],
                (object)[
                    'id' => 3, 'slug' => 'retro-fallback-3', 'name' => 'SYNTHWAVE RUNNER', 
                    'price' => 1100000, 'image_path' => 'https://via.placeholder.com/300x250/ff0055/111111?text=SYNTHWAVE'
                ],
            ]);
        }
        return view('home', compact('products'));
    }
}
