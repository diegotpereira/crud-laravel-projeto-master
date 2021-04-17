<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    // página index
    public function index()
    {
        $data = Contato::orderBy('id', 'desc')->paginate(10)->setPath('contatos');

        return view('contatos.index', compact(['data']));
    }
    // função criar
    public function create()
    {
        return view('contatos.create');
    }
    // armazenar dados
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'telefone' => 'required'
        ]);

        Contato::create($request->all());

        return redirect('/contatos')->with('sucesso', 'Contato criado com sucesso!.');
    }
    // visualizar contatos
    public function show($id)
    {
        $data = Contato::find($id);

        return view('contatos.show', compact(['data']));
    }
    // metodo editar
    public function edit($id)
    {
        $data = Contato::find($id);

        return view('contatos.edit', compact(['data']));
    }
    // metodo alterar
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'telefone' => 'required'
        ]);
        Contato::where('id', $id)->update($data);

        return redirect('/contatos')->with('sucesso', 'Contato alterado com sucesso!.');
    }
    public function destroy($id)
    {
        Contato::where('id', $id)->delete();

        return redirect('/contatos')->with('sucesso', 'Contato delete com sucesso!.');
    }
}
