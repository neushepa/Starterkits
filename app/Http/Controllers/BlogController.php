<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [
            'title' => 'Blog List',
            // 'posts' => Post::orderBy('created_at', 'desc')->paginate(5),
            'posts' => Post::Where('post_type', '=', 'Blog')->Where('is_publish', '=', '1')->orderBy('created_at', 'desc')->paginate(5),
            'categories'=> Category::where('category_name', '!=', 'Features')->where('category_name', '!=', 'Service')->orderBy('created_at', 'desc')
            // where('category_name', '!=', 'Features')->where('category_name', '!=', 'Service')->get();
        ];
        if ($request->has('q')) {
            $data['posts'] = Post::where('title', 'like', '%'.$request->q.'%')->orderBy('created_at', 'desc')->paginate(5);
        }

        return view('frontend.blog', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $data = [
            'title' => 'Detail Post',
            'post' => Post::where('slug', $slug)->firstOrFail()
        ];
        //dd($data);
        return view('frontend.post', $data);
    }

    // public function showcat($id)
    // {
    //     $data = [
    //         'title' => 'Detail Post',
    //         'posts' => Post::select('*')->where('category_id', '=', $id)->get(),
    //     ];
    //     return view('frontend.blog', $data);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
