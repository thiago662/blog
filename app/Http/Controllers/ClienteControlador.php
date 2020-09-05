<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteControlador extends Controller
{
    //php artisan make:controller ClienteControlador --resource
    //responsavel por criar um controlador com diversos metodos

    private $clientes = [
        ['id'=>1 ,'nome'=>'a'],
        ['id'=>2 ,'nome'=>'b'],
        ['id'=>3 ,'nome'=>'c']
    ];

    public function __construct(){
        $clientes = session('clientes');
        if(!isset($clientes)){
            session(['clientes' => $this->clientes]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ///Mostrar todos os clientes
        //$clientes = $this->clientes;
        $clientes = session('clientes');
        $titulo = "Todos os clientes";

        //passar valores para a view
        return view('clientes.index', compact(['clientes', 'titulo']));

        /*
        return view('clientes.index', ['clientes'=>$clientes,'titulo'=>$titulo]);

        
        return view('clientes.index')
            ->with('clientes', $clientes)
            ->with('titulo', $titulo);

        return view('clientes.index', compact(['clientes']));
        */

        //dd($clientes);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //criar novo cliente
        return view('clientes.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //salvar
        $clientes = session('clientes');
        $id = end($clientes)['id'] + 1;
        $nome = $request->nome;
        $dados = ['id'=> $id, 'nome'=>$nome];
        $clientes[] = $dados;
        session(['clientes' => $clientes]);

        return redirect()->route('clientes.index');

        //dd($this->clientes);
        //return redirect()->route('cliente.index');

        //$clientes = $this->clientes;
        //return view('clientes.index', compact(['clientes']));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //ver dados do cliente
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        $cliente = $clientes[$index];
        return view('clientes.info', compact(['cliente']));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //editar as informações de um cliente
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        $cliente = $clientes[$index];
        return view('clientes.edit', compact(['cliente']));

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
        //atulaizar
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        $clientes[ $index ]['nome'] = $request->nome;
        session(['clientes' => $clientes]);

        return redirect()->route('clientes.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //apagar um determinado cliente
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        array_splice($clientes, $index, 1);
        session(['clientes' => $clientes]);
        return redirect()->route('clientes.index');

    }

    private function getIndex($id, $clientes){

        $ids = array_column($clientes, 'id');
        $index = array_search($id, $ids);
        return $index;

    }
}
