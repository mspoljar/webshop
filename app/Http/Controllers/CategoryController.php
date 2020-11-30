<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryTranslation;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories=Category::all();
        return view('category.show',compact('categories'));
    }

    public function new()
    {
        $category=new Category;
        $category->save();
        return view('category.new',compact('category'));
    }

    public function create(Request $request)
    {
        $category=Category::findorFail($request->id);

        $validateData=$request->validate([
            'enname'=>'required',
            'hrname'=>'required',
            'pic'=>'required|image',
        ]);

        if($request->hasFile('pic')){
            $pic=$request->file('pic');
            $name=$pic->getClientOriginalName();
            $pic->move('images\categories',$name);
            $category->update(['path'=>$name]);
        }

        $category->categoryTranslation()->create([
            'locale'=>'en',
            'name'=>$request->enname,
            ]);

        $category->categoryTranslation()->create([
            'locale'=>'hr',
            'name'=>$request->hrname,
            ]);

        return redirect('/category');  

    }

    public function change($id)
    {
        $category=Category::findorFail($id);
        return view('category.change',compact('category'));
    }

    public function update(Request $request)
    {
        $lang=$request->session()->get('language');
        $category=Category::findorFail($request->id);

        $validatedData=$request->validate([
            'name'=>'required',
            'pic'=>'required | image'
        ]);
        if($request->hasFile('pic')){
            $pic=$request->file('pic');
            $name=$pic->getClientOriginalName();
            $pic->move('images\categories',$name);
            $category->update(['path'=>$name]);
        }

        $category->categoryTranslation()->whereLocale($lang)->update([
            'name'=>$request->name,
        ]);

        return redirect('/category');
    }

    public function delete($id)
    {
        $category=Category::findorFail($id);
        $category->categoryTranslation()->delete();
        $category->delete();
        return redirect('/category');
    }
}
