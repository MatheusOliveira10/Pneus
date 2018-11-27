<?php

namespace App\Http\Controllers;

use App\Tyre;
use App\MedTyre;
use Image;
use DB;
use Illuminate\Http\Request;
use App\ZebraPrinter;

class TyreControllerApi extends Controller
{
    public function store(Request $request)
    {
        $medpneus = MedTyre::all();
        $tyre = new Tyre();
        $tyre->medtyre_id = $request->medpneus;
        $medpneu = MedTyre::find($request->medpneus);
        $tyre->cod = $medpneu->abbr . '_' . $this->countPneus() . $this->timestamps(date('d.m.Y'));
        $fotoCripto = $request->foto;
        if(is_dir("pneus")){
        Image::make($fotoCripto)->save( public_path('pneus/' . $tyre->cod . '.jpg') );
        }else{
            mkdir("pneus", 0700);
            Image::make($fotoCripto)->save( public_path('pneus/' . $tyre->cod . '.jpg') );
        }
        $tyre->foto = $tyre->cod . '.jpg';
        $tyre->save();

        $hostPrinter = "\\localhost\Elginl42";
        $speedPrinter = 4;
        $darknessPrint = 3;
        $labelSize = array(300,10);
        $referencePoint = array(200,15);

        $z = new ZebraPrinter($hostPrinter, $speedPrinter, $darknessPrint, $labelSize, $referencePoint);
        $z->setBarcode(2, 580,70, $tyre->cod);
        $z->writeLabel($tyre->cod,580,20,4);
        $z->setBarcode(2, 200,70, $tyre->cod);
        $z->writeLabel($tyre->cod,200,20,4);
        $z->setLabelCopies(1);
        $z->print2zebra();

        return 200;
    }

    public function countPneus(){
        $qtd = 0;
        $qtd_tyres = Tyre::all();
        foreach($qtd_tyres as $qtd_tyre){
            $qtd++;
        }
        return $qtd++;
    }

   public function timestamps($timestamp){
        $array_splited = str_split($timestamp);
       // dd($array_splited);
        $array_dump = $array_splited[0].$array_splited[1].$array_splited[3].$array_splited[4].$array_splited[8].$array_splited[9];
        return $array_dump;
    }

    public function print(Request $request){
        $hostPrinter = "\\localhost\Elgin";
        $speedPrinter = 4;
        $darknessPrint = 2;
        $labelSize = array(300,10);
        $referencePoint = array(450,150);

        $z = new ZebraPrinter($hostPrinter, $speedPrinter, $darknessPrint, $labelSize, $referencePoint);

        $z->setBarcode(1, 344, 80, $request->cod);
        $z->writeLabel($request->cod,344,30,4);
        $z->setLabelCopies(1);
        $z->print2zebra();

        return 200;
    }
}
