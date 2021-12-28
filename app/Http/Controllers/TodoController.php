<?php
namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\TodoStatus;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ((auth()->user()->role == 'admin') && (auth()->user()->email == 'admin@test.com')) {
            $data = [
                'title' => 'List Todo',
                'todo'  => Todo::All(),
                'route' => route('todo.create'),
            ];
        } else {
            $data = [
                'title' => 'List Todo',
                'todo'  => Todo::where('assigned_to', auth()->user()->id)->get(),
                'route' => route('todo.create'),
            ];
        }
        return view('admin.todo.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'New Todo',
            'method' => 'POST',
            'route' => route('todo.store'),
            'users' => User::All(),
            'tdstatuses' => TodoStatus::All(),
        ];
        //Alert::success('Congrats', 'You\'ve Successfully Registered');
        return view('admin.todo.editor', $data);
        ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $td = new Todo;
        $user_id = auth()->user()->id;
        $td->user_id = $user_id;
        $td->todo = $request->todo;
        $td->description = $request->description;
        $td->assigned_to = $request->assigned_to;
        $td->start_date = $request->start;
        $td->end_date = $request->end;
        $td->status = $request->status;
        $td->save();
        return redirect(route('todo.index'))->with('success', 'Task Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todos = Todo::find($id);

        return response()->json([
            'data' => $todos,
        ]);
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
            'title' => 'Edit Todo',
            'method' => 'PUT',
            'route' => route('todo.update', $id),
            'td' => Todo::where('id', $id)->first(),
            'users' => User::All(),
            'todo' => Todo::get(),
            'tdstatuses' => TodoStatus::All(),
        ];
        return view('admin.todo.editor', $data);
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
        $td = Todo::find($id);
        $user_id = auth()->user()->id;
        $td->user_id = $user_id;
        $td->todo = $request->todo;
        $td->description = $request->description;
        $td->assigned_to = $request->assigned_to;
        $td->start_date = $request->start;
        $td->end_date = $request->end;
        $td->status = $request->status;
        $td->update();
        return redirect()->route('todo.index')->withSuccess('Task Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Todo::where('id', $id);
        $destroy->delete();
        return redirect(route('todo.index'))->withSuccess('Task Deleted Successfully');
    }

    public function status($id)
    {
        $td = Todo::find($id);
        $td->status = ($td->status == 1) ? 2 : 3;
        $td->save();
        return redirect()->route('todo.index')->withSuccess('Task Status Update Successfully');
    }
}
