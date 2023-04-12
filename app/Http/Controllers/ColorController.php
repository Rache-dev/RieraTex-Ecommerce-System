<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index (){
        $colors = Color::all();
        return view('admin.pages.color.index',['colors' => $colors]);        
    }

    public function store(Request $request){
        //storing colors into the database

        //always validate

        $request-> validate([
            'name' => 'required|unique:categories|max:255'
        ]);

        //store data
        $color = new Color();
        $color->name = $request->name;
        $color->save();

        //return response to the frontend
        return back()->with('success','Color Saved');
    }

    public function destroy($id){
        Color::findOrFail($id)->delete();
        return back()->with('success', 'Color deleted');
    }
}
