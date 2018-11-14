<?php

namespace App\Http\Controllers;

use App\Revisions;
use Illuminate\Http\Request;

class RevisionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $revisi = new Revisions;
        $revisi->idAcara = $request->idAcara;

        if ($request->catatanRevisi == null) {
            $request->catatanRevisi = 'tidakada';
        }

        if ($request->judulRevisi == null) {
            $request->judulRevisi = 'tidakada';
        }
        // dd($request->catatanRevisi);
        $revisi->comment = $request->catatanRevisi;
        $revisi->commentId = $request->idAcara + rand(1, 100);
        $revisi->judulrevisi = $request->judulRevisi;
        $revisi->save();
        $request->session()->flash('add-revisi-sukses', 'Catatan revisi telah ditambahkan');

        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Revisions            $revisions
     * @return \Illuminate\Http\Response
     */
    public function show(Revisions $revisions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Revisions            $revisions
     * @return \Illuminate\Http\Response
     */
    public function edit(Revisions $revisions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Revisions            $revisions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Revisions $revisions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Revisions            $revisions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Revisions $revisions)
    {
        //
    }

    public function get($idacara)
    {
        return Revisions::where('idAcara', $idacara)->get()->toJSON();
    }
}
