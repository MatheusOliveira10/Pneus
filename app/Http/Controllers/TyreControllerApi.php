<?php

namespace App\Http\Controllers;

use App\Tyre;
use App\MedTyre;
use Image;
use DB;
use Illuminate\Http\Request;
use App\ZebraPrinter;
use Route;

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
        $teste = "pneus\\";
        if(is_dir($teste)){ 
        Image::make($fotoCripto)->save( public_path($teste . $tyre->cod . '.jpg') );
        }else{
            mkdir($teste, 0700, true);
            Image::make($fotoCripto)->save( public_path($teste . $tyre->cod . '.jpg') );
        }
        $tyre->foto = $tyre->cod . '.jpg';
        $tyre->save();

        $hostPrinter = "\\localhost\BTP-L42(U)";
        $speedPrinter = 1;
        $darknessPrint = 5;
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
        $hostPrinter = "\\localhost\BTP-L42(U)";
        $speedPrinter = 1;
        $darknessPrint = 5;
        $labelSize = array(300,10);
        $referencePoint = array(200,15);

        $z = new ZebraPrinter($hostPrinter, $speedPrinter, $darknessPrint, $labelSize, $referencePoint);
        $z->setBarcode(2, 580,70, $request->cod);
        $z->writeLabel($request->cod,580,20,4);
        $z->setBarcode(2, 200,70, $request->cod);
        $z->writeLabel($request->cod,200,20,4);
        $z->setLabelCopies(1);
        $z->print2zebra();

        return \Redirect::route('view');
    }
}
