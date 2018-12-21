<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;

class AdminPhotosController extends Controller
{
    public function index() {
        $photos = Photo::all();
        return view('admin.photos.index', compact('photos'));
    }

    public function store(Request $request) {
        $file = $request->file('file');
        $name = time() . $file->getClientOriginalName();
        $file->move('images', $name);
        Photo::create(['image_path'=>$name]);
    }

    public function create() {
        return view('admin.photos.create');
    }

    public function destroy($id) {
        $photo = Photo::findOrFail($id);
        // unlink(public_path() . $photo->file);
        $photo->delete();
        return redirect('/admin/photos/');
    }
}

