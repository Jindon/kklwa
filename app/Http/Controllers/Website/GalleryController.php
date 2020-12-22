<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function __invoke()
    {
        $perPage = request()->perPage ?? 12;
        return view('website.gallery', [
            'galleryPhotos' => Gallery::query()
                                ->orderBy('created_at', 'DESC')
                                ->paginate($perPage),
        ]);
    }
}
