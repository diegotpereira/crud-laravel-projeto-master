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

        return view('admin.contatos.index', compact(['data']));
    }
    // função criar
    public function create()
    {
        return view('admin.contatos.create');
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

        return redirect()->back()->with('sucesso', 'Contato criado com sucesso!.');
    }
    // visualizar contatos
    public function show($id)
    {
        $data = Contato::find($id);

        return view('admin,contatos.show', compact(['data']));
    }
    // metodo editar
    public function edit($id)
    {
        $data = Contato::find($id);

        return view('admin.contatos.edit', compact(['data']));
    }
    // metodo alterar
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'telefone' => 'required'
        ]);
        Contato::where('id', $id)->update($request->all());

        return redirect()->back()->with('sucesso', 'Contato alterado com sucesso!.');
    }
    public function destroy($id)
    {
        Contato::where('id', $id)->delete();

        return redirect()->back()->with('sucesso', 'Contato delete com sucesso!.');
    }
}
