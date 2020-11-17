<?php

namespace App\Http\Controllers;

use App\Models\Estabelecimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialExpression;

class EstabelecimentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Estabelecimento::all();
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
        $return = [];

        $data = $request->all();
        $validator = Validator::make($data, [
            'nome' => 'required|string',
            'localizacao' => 'required|string',
            'positions' => 'required'
        ]);

        if ($validator->fails()) {
            $return = [
                'errors' => $validator->errors()
            ];
        } else {
            $estabelecimento = new Estabelecimento();
            $estabelecimento->nome = $request->get('nome');
            $estabelecimento->localizacao = $request->get('localizacao');
            $loc = $request->get('positions');
            $locPos = explode(',',$loc);
            $locPos[0] = $locPos[0] ?? 0;
            $locPos[1] = $locPos[1] ?? 0;
            $locPos[2] = $locPos[2] ?? 0;
            $point = new Point($locPos[0],$locPos[1],$locPos[2]);
            
            $estabelecimento->positions = $point;
            $estabelecimento->save();
            $return[]=$estabelecimento;
        }

        return $return;
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
        $data = $request->all();
        $return = [
            'errors' => [
                'id' => ['Não foi possível atualizar o estabelecimento!']
            ]
        ];
        $user = Estabelecimento::find($data['id']) ?? null;
        if ($user) {
            $validator = Validator::make($data, [
                'nome' => 'required|string',
                'localizacao' => 'required|string',
                'positions' => 'required'
            ]);

            if ($validator->fails()) {
                $return = [
                    'errors' => $validator->errors()
                ];
            } else {
                $estabelecimento = new Estabelecimento();
                $estabelecimento->nome = $request->get('nome');
                $estabelecimento->localizacao = $request->get('localizacao');
                $loc = $request->get('positions');
                $locPos = explode(',',$loc);
                $locPos[0] = $locPos[0] ?? 0;
                $locPos[1] = $locPos[1] ?? 0;
                $locPos[2] = $locPos[2] ?? 0;
                $point = new Point($locPos[0],$locPos[1],$locPos[2]);
                
                $estabelecimento->positions = $point;
                $estabelecimento->save();
                $return = $estabelecimento;
            }
        }
        return $return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $return = ['message'=>'Exclusão efetuada com sucesso!'];
        $estabelecimento = Estabelecimento::find($id);
        if ($estabelecimento) 
        {
            $estabelecimento->delete();
        }
        return $return;
    }
}
