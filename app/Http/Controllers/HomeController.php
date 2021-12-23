<?php
namespace App\Http\Controllers;

use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $data=[
            'users'=>User::count()
            // 'categories'=>Category::count(),
            // 'articles'=>Post::count(),
            // 'photo'=>Auth::user()->photo,
        ];
        return view('admin.dashboard', $data);
    }

}
