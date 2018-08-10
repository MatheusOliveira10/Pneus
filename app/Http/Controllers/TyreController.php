<?php

namespace App\Http\Controllers;

use App\Tyre;
use App\MedTyre;
use Illuminate\Http\Request;
use Image;
use DB;

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
        $medtyres = MedTyre::all();
        return view('spa2', compact('medtyres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $medpneus = MedTyre::all();
        $tyre = new Tyre();
        $tyre->medtyre_id = $request->medpneus;
        $medpneu = MedTyre::find($request->medpneus);
        $comps = MedTyre::all()->where('abbr', '=', $medpneu->abbr);
        $soma = 0;
        foreach($comps as $comp)
        {
            $qtd = DB::table('tyres')->where('medtyre_id', $comp->id)->count();
            $soma += $qtd;
        }
        $tyre->cod = $medpneu->abbr . '_' . ++$soma;
        $fotoCripto = $request->foto;
        Image::make($fotoCripto)->save( public_path('uploads/' . $tyre->cod . '.jpg') );
        $tyre->foto = $tyre->cod . '.jpg';
        $tyre->save();
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
