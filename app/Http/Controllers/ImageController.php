<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class ImageController extends Controller
{
    public static $quotes = array(
        "quote/quote1.jpg",
        "quote/quote2.jpg",
        "quote/quote3.jpg",
        "quote/quote4.jpg",
        "quote/quote5.jpg",
        "quote/quote6.jpg",
        "quote/quote7.jpg",
        "quote/quote8.jpg",
        "quote/quote9.jpg",
        "quote/quote10.jpg",
        "quote/quote11.jpg",
        "quote/quote12.jpg",
        "quote/quote13.jpg",
        "quote/quote14.jpg",
        "quote/quote15.jpg",
        


);

    public function create()
    {
        return view('images.create');
    }

    public function store(Request $request)
    {
        $path = $request->file('image')->store('images', 's3');

        return $path;
    }
    
    public function show()
    {
        $data = [];
        $totalQuotes = (count(ImageController::$quotes));
        $randomNumber = (rand(0,($totalQuotes-1)));
        $url = ImageController::$quotes[$randomNumber];
        $data['image'] = $url;
        $data['ip'] = gethostbyname(gethostname());
        return view('images.create')->with("data",$data);
    }
}
