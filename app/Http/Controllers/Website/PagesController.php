<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Beneficiary;
use App\Models\Gallery;
use App\Models\PageContent;
use App\Models\Settings;
use App\Models\Staff;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about()
    {
        return view('website.about', [
            'about' => PageContent::whereSection('about')->first()
        ]);
    }

    public function staffs()
    {
        return view('website.staffs', [
            'staffs' => Staff::orderBy('created_at', 'DESC')->paginate(10),
        ]);
    }

    public function gallery()
    {
        $perPage = request()->perPage ?? 12;
        return view('website.gallery', [
            'galleryPhotos' => Gallery::query()
                                ->orderBy('created_at', 'DESC')
                                ->paginate($perPage),
        ]);
    }

    public function contact()
    {
        return view('website.contact', [
            'address' => Settings::where('key', 'contact-address')->first()->value,
            'telephone' => Settings::where('key', 'contact-telephone')->first()->value,
            'phone' => Settings::where('key', 'contact-phone')->first()->value,
            'email' => Settings::where('key', 'contact-email')->first()->value,
        ]);
    }
}
