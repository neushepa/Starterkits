<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post=[
            'title'=>'List Post',
            'posts'=> Post::all(),
            'route' => route('post.create'),
        ];
        return view('admin.post.index', $post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'New Post',
            'method' => 'POST',
            'categories' => category::All(),
            'route' => route('post.store'),
        ];
        return view('admin.post.editor', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $user_id = auth()->user()->id;
        $last = '1';

        $file = $request->file('banner');
        $banner = 'banner-'.uniqid().'.'.$file->getClientOriginalExtension();
        $file->move('images/banners/', $banner);

        $post->user_id = $user_id;
        $post->banner = $banner;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category;
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;
        $post->updated_by = $user_id;
        $post->save();
        return redirect()->route('post.index');
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
            'title' => 'Post Detail',
            'post' => Post::where('slug', $slug)->first()
        ];
        //dd($data);
        return view('frontend.post', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Post',
            'method' => 'PUT',
            'route' => route('post.update', $id),
            'post' => Post::where('id', $id)->first(),
            'categories' => Category::get(),
        ];
        return view('admin.post.editor', $data);
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
        $post = Post::find($id);
        $user_id = auth()->user()->id;

        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            if (file_exists(public_path('images/banners/'.$post->banner))) {
                unlink(public_path('images/banners/'.$post->banner));
            }
            $banner = 'banner'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->move('images/banners/', $banner);
            $post->banner = $banner;
        }
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category;
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;
        $post->updated_by = auth()->user()->id;
        $post->update();
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Post::where('id', $id);
        $destroy->delete();
        // return redirect(route("post.index"));
        return back()->with('success', 'Post deleted successfully');
    }
}
