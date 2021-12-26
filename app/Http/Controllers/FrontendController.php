<?php
namespace App\Http\Controllers;

use App\Models\album;
use App\Models\Gallery;
use App\Models\Post;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }

    public function showgallery()
    {
        $data = [
            'galleries' => Gallery::orderBy('created_at', 'desc')->paginate(9),
            'albums' => album::get(),
        ];
        return view('frontend.gallery', $data);
    }

    public function showslider()
    {
        $data = [
            'title' => 'Post Detail',
            'posts' => Post::all(),
        ];
        return view('frontend.home', $data);
    }

    public function showAbout()
    {
        return view('frontend.about');
    }
}
