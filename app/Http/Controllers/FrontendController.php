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
            'posts' => Post::where('post_type', '=', 'Blog')->where('category_id', '=', '1')->where('is_publish', '=', '1')->orderBy('created_at', 'desc')->limit(3)->get(),
            'services' => Post::where('post_type', '=', 'Page')->where('category_id', '=', '2')->where('is_publish', '=', '1')->get(),
        ];
        return view('frontend.home', $data);
    }

    public function showAbout()
    {
        return view('frontend.about');
    }

    // public function showservices()
    // {
    //     $data = [
    //         'title' => 'Services Content',
    //         'services' => Post::where('post_type', '=', 'Page')->get(),
    //     ];
    //     return view('frontend.service', $data);
    // }
}
