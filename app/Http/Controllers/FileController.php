<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        $files = File::orderBy('created_at', 'DESC')->paginate(30);

        return view('file.index', compact('files'));
    }

    public function form()
    {
        return view('file.form');
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'title' => 'nullable|max:100',
            'file'  => 'required|file|max:2000|mimes:docx,doc,pdf', // max 2MB
        ]);

        $uploadedFile = $request->file('file');

        // simpan berkas yang diunggah ke sub-direktori 'public/files'
        // direktori 'files' otomatis akan dibuat jika belum ada
        $path = $uploadedFile->storeAs('public/files', $uploadedFile->getClientOriginalName());

        $file = File::create([
            'title'    => $request->title ?? $uploadedFile->getClientOriginalName(),
            'filename' => $path
        ]);

        return redirect()
        ->back()
        ->withSuccess(sprintf('File %s has been uploaded.', $file->title));
    }
}
