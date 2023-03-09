<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::get();
        return view('admin.index', [
            "title" => "Beranda",
            "url" => url("/asset_admin"),
            "data" => $data
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            "title" => "required"
        ]);
        Category::create($validate);
        return redirect('/dashboard/masterCategories')->with('success', "Data berhasil ditambahkan");
    }

    public function edit(Request $request)
    {
        $find = Category::find($request->id);
        return $find;
    }

    public function update(Request $request)
    {
        $find = Category::where('id', $request->id);
        $validate = $request->validate([
            "title" => "required"
        ]);

        $find->update($validate);
        return redirect('/dashboard/masterCategories')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $find = Category::find($id);
        $find->delete();

        return back()->with('success', 'Ddata berhasil dihapus');
    }
}
