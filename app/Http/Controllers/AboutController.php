<?php
namespace App\Http\Controllers;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCredit()
    {
        return view('admin.about.credit');
    }

    public function showSupport()
    {
        return view('admin.about.support');
    }
}
