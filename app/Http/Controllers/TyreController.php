<?php

namespace App\Http\Controllers;

use App\Tyre;
use App\Medpneus;
use Illuminate\Http\Request;
use Image;

class TyreController extends Controller
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
        $medpneus = Medpneus::all();
        return view('spa2', compact('medpneus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tyre = new Tyre();
        $tyre->medpneu_id = $request->medpneus;
        $encodedData = $request->foto;
        $binaryData = base64_decode($encodedData);
        Image::make($encodedData)->save( public_path('uploads/' . $request->medpneus . '.jpg') );
        $tyre->foto = $request->medpneus . '.jpg';
        $tyre->save();
        $medpneus = Medpneus::all();
        return view('spa2', compact('medpneus'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tyre  $tyre
     * @return \Illuminate\Http\Response
     */
    public function show(Tyre $tyre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tyre  $tyre
     * @return \Illuminate\Http\Response
     */
    public function edit(Tyre $tyre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tyre  $tyre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tyre $tyre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tyre  $tyre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tyre $tyre)
    {
        //
    }
}
