<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if ((auth()->user()->role == 'admin')) {
            $data = [
                'users'=>User::count(),
                'category'=>Category::count(),
                'article'=>Post::count(),
                'comments'=>Comment::count(),
                'todos'  => Todo::All(),
            ];
        } else {
            $data = [
                'users'=>User::count(),
                'category'=>Category::count(),
                'article'=>Post::count(),
                'comments'=>Comment::count(),
                'todos'  => Todo::where('assigned_to', auth()->user()->id)->get(),
            ];
        }
        return view('admin.dashboard', $data);
    }

    public function showChangePasswordGet()
    {
        $data=[
            'title' => 'Change Password',
        ];
        return view('admin.user.change-password', $data);
    }

    public function changePasswordPost(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with('error', 'Your current password does not matches with the password.');
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            return redirect()->back()->with('error', 'New Password cannot be same as your current password.');
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with('success', 'Password successfully changed!');
    }
}
