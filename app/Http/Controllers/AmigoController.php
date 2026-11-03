<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amigo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AmigoController extends Controller
{
    public function index()
    {
        $amigos = Amigo::where('per_est', true)->get();

        /*if (request()->has('empty')) {
            $amigos = [];
        } else {
            $amigos = ['Jose Manuel', 'Erick', 'Shirley'];
        };*/
        $title = 'Lista Amigos';
        // return "$title <br><pre>" . print_r($amigos, true) . "</pre>";
        return view('index-amigos', compact('title', 'amigos'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'per_cod' => ['required', 'unique:persona'],
            'per_nom' => 'required',
            'per_appm' => 'required',
            'per_prof' => 'required',
            'per_telf' => 'required',
            'per_cel' => ['required', 'unique:persona'],
            'per_email' => ['required', 'unique:persona'],
            'per_dir' => '',
            'per_fnac' => 'required',
            'per_lnac' => 'required',
            'per_foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ], [
            'per_cod.required' => 'El campo CI es obligatorio',
            'per_nom.required' => 'El campo Nombre es obligatorio',
            'per_appm.required' => 'El campo Apellidos es obligatorio',
            'per_telf.required' => 'El campo Telefono es obligatorio',
            'per_fnac.required' => 'El campo Fecha de Nacimiento es obligatorio',
        ]);
        //$data = request()->all();
        //dd($data);
        //dd($amigo);
        $foto = $request->hasFile('per_foto')
            ? $request->file('per_foto')->store('amigos', 'public')
            : null;

        $data['per_dir'] = $data['per_dir'] ?? '';

        Amigo::create([
            'per_cod'   => $data['per_cod'],
            'per_nom'   => $data['per_nom'],
            'per_appm'  => $data['per_appm'],
            'per_prof'  => $data['per_prof'],
            'per_telf'  => $data['per_telf'],
            'per_cel'   => $data['per_cel'],
            'per_email' => $data['per_email'],
            'per_dir'   => $data['per_dir'],
            'per_fnac'  => $data['per_fnac'],
            'per_lnac'  => $data['per_lnac'],
            'per_foto'  => $foto,
            'per_est'  => 'true',
            'per_create'  => date('Y-m-d'),
            'per_update'  => date('Y-m-d')
        ]);
        return redirect('amigos');
    }

    public function create()
    {
        // return 'Nuevo Amigo';
        return view('new-amigos');
    }

    public function show($id)
    {
        $amigo = Amigo::find($id);
        if ($amigo == null)
            return "Registro no Encontrado...";
        else
            return view('show-amigos', compact('amigo'));
    }

    public function delete($id)
    {
        $amigo = Amigo::where('per_cod', $id)->firstOrFail();
        $amigo->update([
            'per_est' => false,
            'per_update' => date('Y-m-d'),
        ]);

        return redirect()->route('amigos.index')->with('success', 'Amigo eliminado correctamente.');
    }

    public function edit(Amigo $amigo)
    {
        return view('edit-amigos', ['amigo' => $amigo]);
    }
    public function update(Request $request)
    {
        $data = $request->validate([
            //'per_cod' => ['required', 'unique:persona'],
            'per_nom' => 'required',
            'per_appm' => 'required',
            'per_prof' => 'required',
            'per_telf' => 'required',
            //'per_cel' => ['required', 'unique:persona'],
            //'per_email' => ['required', 'unique:persona'],
            'per_dir' => '',
            'per_fnac' => 'required',
            'per_lnac' => 'required',
            'per_foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ], [
            'per_ci.required' => 'El campo CI es obligatorio',
            'per_nom.required' => 'El campo Nombre es obligatorio',
            'per_appm.required' => 'El campo Apellidos es obligatorio',
            'per_cel.required' => 'El campo Telefono es obligatorio',
            'per_fnac.required' => 'El campo Fecha de Nacimiento es obligatorio',
        ]);

        //$data = request()->all();
        //dd($data);
        //dd($amigo);
        //$amigo->update(request()->all());
        $amigo = Amigo::find($request->per_cod);
        $data['per_dir'] = $data['per_dir'] ?? '';

        if ($request->hasFile('per_foto')) {
            if ($amigo->per_foto) {
                Storage::disk('public')->delete($amigo->per_foto);
            }

            $data['per_foto'] = $request->file('per_foto')->store('amigos', 'public');
        }
        $amigo->update($data);
        return redirect()->route('amigos.show', [$amigo]);
    }
}
