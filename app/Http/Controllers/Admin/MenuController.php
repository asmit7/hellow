<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStoreRequest;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{

    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index', compact('menus'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('admin.menus.create', compact('categories'));
    }


    public function store(MenuStoreRequest $request)
    {

        $image = $request->file('image')->store('public/menus');

        $menus =  Menu::create([
            'name' => $request->title,
            'image' => $image,
            'description' => $request->description,
            'price' => $request->price,
        ]);
        if ($request->has('categories')) {
            $menus->categories()->attach($request->categories);
        }
        return redirect()->route('admin.menues.index')->with('success' ,'Menu created Successfully');
    }




    public function edit(Menu $menues, $id)
    {

        $menus = Menu::find($id);
        $categories = Category::all();

        return view('admin.menus.edit', compact('menus', 'categories'));
    }


    public function update(Request $request, $id)
    {
       // dd($request);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
        $menus = Menu::find($id);
        $image = $menus->image;
        if ($request->hasFile('image')) {
            Storage::delete($menus->image);
            $image = $request->file('image')->store('public/menus');
        }
        $menus->update([
            'name' => $request->title,
            'image' => $image,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        if ($request->has('categories')) {
            $menus->categories()->attach($request->categories);
        }

        return redirect()->route('admin.menues.index')->with('success' ,'Menu updated Successfully');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menues,$id)
    {

        $menus = Menu::find($id);
        $menus->categories()->detach();
        Storage::delete($menus->image);
        $menus->delete();
        return redirect()->route('admin.menues.index')->with('danger' ,'Menu deleted Successfully');

    }
}
