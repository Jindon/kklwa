<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\PageContent;
use App\Models\Staff;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('website.home', [
            'sliders' => PageContent::whereSection('slider')->get(),
            'about' => PageContent::whereSection('about')->first(),
            'staffs' => Staff::orderBy('created_at', 'desc')->paginate(10),
            'galleryPhotos' => Gallery::orderBy('created_at', 'desc')->paginate(3),
        ]);
    }
}
