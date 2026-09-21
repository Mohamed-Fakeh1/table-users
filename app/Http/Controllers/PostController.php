<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Table::all();
        return view( "index" , compact("users") );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required',
           'phone' => 'required', 
           'email' => 'required', 
           'post' => 'required', 
           'age' => 'required', 
        ]);

        Table::create([
            'name' => $request-> name,
            'phone' => $request-> phone,
            'email' => $request-> email,
            'post' => $request-> post,
            'age' => $request-> age ,
        ]);
        return to_route("post.index")->with("success" , "Post Added Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Table::findOrFail($id);
        return view("show" , compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Table::findOrFail($id);
        return view("edit" , compact("post"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Table::findOrFail($id);

        $request->validate([
           'name' => 'required',
           'phone' => 'required', 
           'email' => 'required', 
           'post' => 'required', 
           'age' => 'required', 
        ]);

        $post ->update([
            'name' => $request-> name,
            'phone' => $request-> phone,
            'email' => $request-> email,
            'post' => $request-> post,
            'age' => $request-> age ,
        ]);
        return to_route("post.index")->with("update" , "Post Update Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Table::destroy($id);

        return to_route('post.index')->with('delete', 'User deleted successfully.');
    }
}
