<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Model\Soal;
class AcakKataController extends Controller
{
    public function index(){
    
        $kata = $this->selectKata(0);

        if($kata['id'] == 'data tidak ada'){
            $this->updateKata();
        }

	   return view ('AcakKata/index', $kata);
    }

	public function getJawaban(Request $request) {
      $input = $request->input();

      $result = DB::table('soal')
                ->select('kata_acak')
                ->where('id', $input['id'])
                ->get();

      $result = json_decode(json_encode($result),true);


      if($result[0]['kata_acak'] == $input['jawaban']){
        $jawabannyaadalah['jawaban'] = 'benar';

        DB::table('soal')
        ->where('id', $input['id'])
        ->update(['status' => 1]);

        $kata = $this->selectKata(0);

        if($kata['id'] == 'data tidak ada'){
            $this->updateKata();
        }

        $jawabannyaadalah['result'] = $kata;
    }
      else{
        $jawabannyaadalah['jawaban'] = 'salah';
    }

      return $jawabannyaadalah;
    }

    public function selectKata($status){
        $kata = DB::table('soal')
                    ->select('*')
                    ->where('status', $status)
                    ->inRandomOrder()
                    ->first();

        $kata = json_decode(json_encode($kata),true);

        if(!empty($kata)){
            $kata['kata_acak'] = str_shuffle($kata['kata_acak']);
        } else {
            $kata['id'] = 'data tidak ada';
            $kata['kata_acak'] = 'data tidak ada';
            $kata['klue'] = 'data tidak ada';
        }

      return $kata;
    }

    private function updateKata(){
        DB::table('soal')
        ->update(['status' => 0]);
    }
}
