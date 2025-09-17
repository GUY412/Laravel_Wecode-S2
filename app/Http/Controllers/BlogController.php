<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function readCategories(){
        $categories = Category::all();
        return view('blog.create', compact('categories'));
    }

    public function create(){
        return view('articles.create');
    }

    public function store(Request $request){
        
        $validatedData = $request->validate([
            'title'=> 'required|string|max:255',
            'description'=> 'required|string',
            'category'=> 'required|string|max:255',
            'image'=> 'nullable|image|mimes:jpeg,jpg,png,svg|max:2048',
            'autor_id'=>'nullable'
        ]);



        $category = Category::firstOrCreate(
            ['name'=>$validatedData['category']
            
        ]);
        $validatedData['category_id'] = $category ->id;

        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('image'), $imageName);
            $validatedData['image'] = 'image/'.$imageName;
        }else{
            $validatedData['image'] = null;
        }

        $validatedData['autor_id'] =Auth::id();

        Article::create($validatedData);

        return redirect()->route('dashboard')->with('success', "Article crée avec succes");
        
    }

    // public function index() {
    //     $articles = Article::where('autor_id', Auth::id())->get();
    //     return view('dashboard',['Article'=>$articles]);
    // }

    public function index(){
        $articles = Article::all();
        return view('dashboard',compact('articles'));
    }


}


// Article::create([
//             'title'=> $validatedData['title'],
//             'description'=> $validatedData['description'],
//             'category'=>$validatedData['category'],
//             'image'=>$validatedData['image'],
//             'autor_id'=> auth()->id(),