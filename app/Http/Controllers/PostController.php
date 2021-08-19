<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $req)
    {
        if ($req->images || $req->medicaments) {
      
        if($req->images){
        $req->validate([
                    'images*' => 'mimes:jpeg,jpg,png|max:2048'
                ]);
        }   

        if ($req->medicaments) {
            foreach($req->medicaments as $medication)
            {
                $drug= $medication['name'].",".$medication['quantity'];
                $drugs[] = $drug;
            };
        }
        else
        {
            $drugs=["no drugs",""];
        }

        if ($req->images) {
            foreach($req->images as $file)
            {
                $name = md5($file.microtime()). '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/images', $name);
                $imgData[] = $name;  
            }
        }
        else
        {
            $imgData=["No images",""];
        }
        
        $validatedData = [
            'user_id' => Auth::user()->id,
            "medicaments"=>join(",",$drugs),
            "images" =>join(",",$imgData),
        ];

        Post::create($validatedData);
    
        return Redirect::route('dashboard');
        
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
