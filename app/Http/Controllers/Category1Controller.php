<?php

namespace App\Http\Controllers;

use App\Models\Category1;
use Illuminate\Http\Request;



class Category1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function createCat()
    {
        return view('admin.category.createCat');
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */

     public function allCats(Request $request){
        
        $query = $request->input('query');
        if(empty($query)){
            $data = Category1::where('cat_status',1)->get(); 
        }
        else{
            $data = Category1::where('cat_status',1)
                ->where(function($queryBuilder) use ($query){
                    $queryBuilder->where('cat_name','like','%'.$query.'%');
                })->get(); 
        }
        return view('admin.category.allCat', compact('data'));
    }
    
     public function store(Request $request)
    {
        $data = $request->validate([
            "cat_name" => "required",
        ]);
    
        Category1::create($data);
    
        return redirect()->back()->with('alert', 'Category created successfully');
    } 



    /**
     * Display the specified resource.
     */

    public function editCat(Category1 $category,$id)
    {
        $data = Category1::where('id',$id)->first();
        return view('admin.category.editCat',compact('data'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function updateCat(Request $request)
    {
        $data=$request ->validate([
            "cat_name" => "required"
        ]);
        $id =$request->id;
        Category1::where('id', $id)->update($data);

        return redirect()->route('cat.all')->with('alert','Your Category has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $req,$id)
    {
        Category1::where('id',$id)->delete();
        return redirect()->route('cat.all')->with('alert','Your Category has been deleted successfully');
    }
}
