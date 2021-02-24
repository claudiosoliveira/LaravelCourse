<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Para criar este controlador: php artisan make:controller nomeControlador --resource

class ClienteControlador extends Controller
{

    private function getIndex($id, $clientes) {
        $ids = array_column($clientes, 'id');
        $index = array_search($id, $ids);
        return $index;
    }

    private $clientes = [
        ['id' => 1, 'nome' => 'ademir'],
        ['id' => 2, 'nome' => 'joao'],
        ['id' => 3, 'nome' => 'maria'],
        ['id' => 4, 'nome' => 'aline'],
    ];


    public function __construct()
    {
        $clientes = session('clientes');
        if (!isset($clientes))
            session(['clientes' => $this->clientes]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // Acessar uma rota e mostrar todos os seus clientes
    {
        /*echo "<ol>";
        foreach($this->clientes as $c){
            echo "<li>" . $c['nome'] . "</li>";
        }
        echo "</ol>";
        */
        $clientes = session('clientes'); //$this->clientes;
        $texto = "todos os clientes";
        return view('clientes.index', ['clientes'=> $clientes, 'titulo'=> $texto]);
        //return view('clientes.index', compact(['clientes']));
        /*return view('clientes.index')
                                       ->with('clientes', $clientes)
                                       ->with('titulo', $texto);*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // Para criar um novo cliente
    {
        return view("clientes.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)  // Salvar o novo cliente
    {
        $clientes = session('clientes');
        $id = end($clientes)['id'] + 1; //count($this->clientes) + 1;
        $nome = $request->nome;
        $dados = ['id' => $id, 'nome' => $nome];
        $clientes[] = $dados; //$this->clientes[] = $dados;
        session(['clientes' => $clientes]);
        return redirect()->route('clientes.index');
        //dd($this->clientes);
        //$clientes = $this->clientes;
        //return redirect()->route('clientes.index');
        //return view('clientes.index', compact(['clientes']));
        //dd($this->clientes);
        //$dados = $request->all();
        //dd($dados);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)  // Ver uma informação de um cliente
    {
        $clientes = session("clientes");
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
    public function edit($id) // Editar informações do cliente
    {
        $clientes = session("clientes");
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
    public function update(Request $request, $id) // salvar as edições
    {
        $clientes = session("clientes");
        $index = $this->getIndex($id, $clientes);
        $clientes[$index]['nome'] = $request->nome;
        session(['clientes' => $clientes]);
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    
    public function destroy($id) {// apagar cliente 
        $clientes = session("clientes");
        //$ids = array_column($clientes, 'id');
        $index = $this->getIndex($id, $clientes);
        array_splice($clientes, $index, 1);
        session(['clientes' => $clientes]);
        return redirect()->route('clientes.index');
    }
}
