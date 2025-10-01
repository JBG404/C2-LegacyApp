<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class BrandController extends Controller
{
    public function show($brand_id, $brand_slug)
    {
        $brand = Brand::findOrFail($brand_id);
        $manuals = Manual::all()->where('brand_id', $brand_id);
        $topmanuals = Manual::where('brand_id', $brand_id)->orderByDesc('counter')->take(5)->get();

        return view('pages/manual_list', [
            "brand" => $brand,
            "manuals" => $manuals,
            "topmanuals" => $topmanuals,
        ]);

    }
}
