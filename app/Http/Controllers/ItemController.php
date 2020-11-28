<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\ItemTranslation;

class ItemController extends Controller
{
    //
    public function index()
    {
        $items=Item::all();
        return view('item.show',compact('items'));
    }

    public function change($id)
    {
        $item=Item::findorfail($id);
        return view('item.change',compact('item'));
    }

    public function update(Request $request)
    {
        $lang=$request->session()->get('language');
        $item=Item::findorFail($request->id);

        $validatedData=$request->validate([
            'name'=>'required',
            'pic'=>'required | image',
            'description'=>'required',
            'price'=>'required'
        ]);

        if($request->hasFile('pic')){
            $pic=$request->file('pic');
            $name=$pic->getClientOriginalName();
            $pic->move('images\products',$name);
            $item->update(['path'=>$name]);
        }

        $item->update(['price'=>$request->price]);
        $item->itemTranslation()->whereLocale($lang)->update([
            'name'=>$request->name,
            'description'=>$request->description
        ]);

        return redirect('/items');
        
    }

    public function new()
    {
        $item=new Item;
        $item->save();
        return view('item.new',compact('item'));
    }

    public function create(Request $request)
    {
        $item=Item::findorFail($request->id);

        $validatedData=$request->validate([
            'enname'=>'required',
            'endescription'=>'required',
            'hrname'=>'required',
            'hrdescription'=>'required',
            'pic'=>'required | image',
            'price'=>'required'
        ]);

        if($request->hasFile('pic')){
            $pic=$request->file('pic');
            $name=$pic->getClientOriginalName();
            $pic->move('images\products',$name);
            $item->update(['path'=>$name]);
        }

        $item->update(['price'=>$request->price]);
        $item->itemTranslation()->create([
            'locale'=>'en',
            'name'=>$request->enname,
            'description'=>$request->endescription,
            ]);
        
        $item->itemTranslation()->create([
            'locale'=>'hr',
            'name'=>$request->hrname,
            'description'=>$request->hrdescription,
        ]);
        return redirect('/items');
    }

    public function delete($id)
    {
        $item=Item::findorFail($id);
        $item->itemTranslation()->delete();
        $item->delete();
        return redirect('/items');
    }

    public function test(Request $request)
    {
        $s=$request->session()->all();
        return view('test',compact('s'));
    }
}
