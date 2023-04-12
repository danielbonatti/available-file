<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class DownloadController extends Controller
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
    public function download(Request $request)
    {
        // Validação do(s) dado(s) preenchidos
        $this->validate($request,[
            'email' => 'required'
        ],[
            'email.required' => 'E-mail obrigatório'
        ]);
        // Regula a hora para comparação
        date_default_timezone_set('America/Sao_Paulo');
        // Valida o acesso
        $data = DB::table('gsc_acetes')->where('ace_email',$request->email)->select('ace_datval')->first();
        if(!is_null($data)){   
            if($data->ace_datval>=date("Y-m-d")){
                // Registra o download do arquivo
                DB::table('gsc_ace_numace')->insert([
                    'ace_email' => $request->email,
                    'ace_datace' => date("Y-m-d"),
                    'ace_horace' => date('H:i')
                ]);
                // Retorna o download do arquivo
                return response()->download(storage_path().'/app/files/teste.txt');
            } else {
                return redirect()->back()->with('danger','Arquivo indisponível');
            }
        } else {
            return redirect()->back()->with('danger','E-mail inválido');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
