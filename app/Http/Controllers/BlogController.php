<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class BlogController extends Controller
{
    public function readCategories(){
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    public function create(){
        return view('articles.create');
    }

    public function store(ArticleRequest $request){
        
        $validatedData = $request->validated();



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


    public function index(){
        $articles = Article::all();
        return view('dashboard',compact('articles'));
    }

    public function dashboardArticleSingle($id){
        $articles = Article::findOrFail($id);
        $categories = Category::all();
        return view('articles.update', compact('articles', 'categories'));
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'title'=> 'required|string|max:255',
            'description'=> 'required|string',
            'category_id'=> 'required|string|max:255',
            'image'=> 'nullable|image|mimes:jpeg,jpg,png,svg|max:2048',
            'autor_id'=>'nullable'
        ]);

        $articles = Article::findOrFail($id);

        if($request->hasFile('image')){
            if($articles->image && file_exists(public_path($articles->image))){
                unlink(public_path($articles->image));
            }
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('image'), $imageName);
            $validatedData['image'] = 'image/'.$imageName;
        }else {
            $validatedData['image'] = $articles->image;
        }

        $articles->update($validatedData);
        return redirect()->route('dashboard',$id)->with("update","Article modifier avec 
        succes");
    }
    public function destroy($id){
        $articles = Article::findOrFail($id);
        $articles -> delete();
        return redirect()->route('dashboard')->with('delete', 'Article supprimé avec succes');
    }

    public function home(){
        $articles = Article::all();
        return view('articles.index',['articles'=>$articles]);
    }

    public function show($id) : View{
        $articles = Article::with('autor')->findOrFail($id);
        return view('articles.show', ['article'=>$articles]);
    }
}


