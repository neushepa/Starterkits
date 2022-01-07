<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people=[
            'title'=>'List All User',
            'peoples'=> User::all(),
            'route' => route('user.create'),
        ];
        return view('admin.user.index', $people);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pro=[
            'title'=>'Add New User',
            'method'=>'POST',
            'route' => route('user.store'),
        ];
        return view('admin.user.editor', $pro);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 'guest';
        $user->save();

        return redirect()->route('user.index')->with('success', 'User has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'title' => 'Show Profile',
            'method' => 'PUT',
            'route' => route('profile.update', $id),
            'pro' => User::where('id', $id)->first(),
        ];
        return view('admin.user.show', $data);
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
            'title' => 'Edit Profile',
            'method' => 'PUT',
            'route' => route('profile.update', $id),
            'pro' => User::where('id', $id)->first(),
        ];
        return view('admin.user.profile', $data);
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
        $pro = User::find($id);
        $pro->id_number = $request->id_number;
        $pro->name = $request->name;
        if ($request->email) {
            $pro->email = $request->email;
        }
        $pro->phone = $request->phone;
        $pro->gender = $request->gender;
        $pro->religion = $request->religion;
        $pro->dob = $request->dob;
        $pro->blod_type = $request->blod_type;
        $pro->address = $request->address;
        $pro->instagram = $request->instagram;
        $pro->facebook = $request->facebook;
        $pro->twitter = $request->twitter;

        if ($request->password) {
            $pro->password = bcrypt($request->password);
        }

        $pro->bio = $request->bio;

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = $pro->name . '-' . $pro->id . '.' . $image->getClientOriginalExtension();
            $location = $request->file('photo')->move('images/users/', $filename);
            $pro->photo = $location;
        }

        //dd($request);
        $pro->save();
        return redirect()->route('user.edit', $id)->with('success', 'Profile Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy =User::where('id', $id);
        $destroy->delete();
        return redirect(route('user.index'));
    }

    public function resetpass($id)
    {
        $people = User::find($id);
        $people->password = bcrypt('123456');
        $people->save();
        return redirect()->route('user.index')->withSuccess('Password Successfully');
    }

    public function changerole($id)
    {
        $data = [
            'title' => 'Edit Role',
            'method' => 'PUT',
            'route' => route('user.updaterole', $id),
            'pro' => User::where('id', $id)->first(),
        ];
        return view('admin.user.changerole', $data);
    }

    public function updaterole(Request $request, $id)
    {
        $pro = User::find($id);
        $pro->role = $request->role;
        //dd($request);
        $pro->save();
        return redirect()->route('user.index', $id)->with('success', 'Role Updated');
    }
}
