<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category1;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function allPosts(Request $request)
    {
        $query = $request->input('query');
        if(empty($query)){
            $allposts = Post::where('status','Published')->get(); 
        }
        else{
            $allposts = Post::where('status','Published')
                ->where(function($queryBuilder) use ($query){
                    $queryBuilder->where('title','like','%'.$query.'%');
                })->get(); 
        }
        return view('admin.post.allPost',compact('allposts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createPost()
    {
        $data = Category1::all();
        return view('admin.post.createPost')->with([
            'data' => $data,
            'alertMsg' => session('alert'),
            'alertExist' => session()->has('alert') ? 'true' : 'false',
        ]);
    }
    
    public function createNewPost(Request $req)
    {
        $data = $req->validate([
            "title" => "nullable",
            "date" => "nullable",
            "video_type" => "nullable",
            "category1_id" => "nullable|exists:category1s,id",
            "description" => "nullable", 
            "thumbnail" => "nullable|image|mimes:jpeg,png,gif,svg|max:90000",
            "meta_title" => "nullable", 
            "meta_description" => "nullable",
            "meta_keywords" => "nullable",
        ]);
    
        //thumbnails
    
        if ($req->hasFile('thumbnail')) {
            if ($req->file('thumbnail')->isValid()) {
                $imageName = time() . '.' . $req->thumbnail->getClientOriginalExtension();
                $uploadPath = public_path('/thumbnails');
                $req->thumbnail->move($uploadPath, $imageName);
                $data['thumbnail'] = $imageName;
            } else {
                // Handle file upload error
                $error = $req->file('thumbnail')->getError();
                // Log or handle the error accordingly
                return back()->withErrors(['thumbnail' => 'File upload failed: ' . $error]);
            }
        } else {
        
    
        // Handle image uploads in the description field
        $description = $data['description'];
        $dom = new \DomDocument();
        libxml_use_internal_errors(true); // Suppress any potential HTML parsing errors 

        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

    
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $index => $img) {
            $image_64 = $img->getAttribute('src');
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';'))) [1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace('', '+', $image);
            $imageName = Str::random(10) . '.' . $extension;
            $image_name = "/upload/" . $imageName;
            $path = public_path() . $image_name;
    
            file_put_contents($path, base64_decode($image));
    
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }
    
        $description = $dom->saveHTML();
        $data['description'] = $description;
    }
    
        Post::create($data);
        
        return redirect()->route('post.all')->with("success", "Post created successfully");
    }
    

/**
 * Show the form for editing the specified resource.
 */

/*public function editPost(Post $post,$id)
{
    $data = Post::where('id',$id)->all;
    return view('admin.post.editPost',compact('data'));
}*/

public function editPost($id)
{
    $data = Post::findOrFail($id);
    $categories = Category1::all(); // Assuming you have a Category model
    return view('admin.post.editPost', compact('data', 'categories'));
}



    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

/**
 * Update the specified resource in storage.
 */
public function updatePost(Request $request, $id)
{
    $post = Post::findOrFail($id);

    $validatedData = $request->validate([
        "title" => "nullable",
        "date" => "nullable",
        "video_type" => "nullable",
        "category1_id" => "nullable|exists:category1s,id",
        "description" => "nullable",
        "thumbnail" => "nullable|image|mimes:jpeg,png,gif,svg|max:50000",
        "meta_title" => "nullable",
        "meta_description" => "nullable",
        "meta_keywords" => "nullable",
    ]);

    // Update fields
    $post->update($validatedData);

    // Handle thumbnail update if provided
    if ($request->hasFile('thumbnail')) {
        if ($request->file('thumbnail')->isValid()) {
            $imageName = time() . '.' . $request->thumbnail->getClientOriginalExtension();
            $uploadPath = public_path('/thumbnails');
            $request->thumbnail->move($uploadPath, $imageName);
            $post->thumbnail = $imageName;
            $post->save();
        } else {
            // Handle file upload error
            $error = $request->file('thumbnail')->getError();
            // Log or handle the error accordingly
            return back()->withErrors(['thumbnail' => 'File upload failed: ' . $error]);
        }
    }

    return redirect()->route('post.all')->with("success", "Post updated successfully");
}



    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $req,$id)
    {
        Post::where('id',$id)->delete();
        return redirect()->route('post.all')->with('alert','Your Post has been deleted successfully');
    }
}
