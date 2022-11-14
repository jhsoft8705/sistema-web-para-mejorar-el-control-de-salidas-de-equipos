<?php

namespace App\Http\Controllers;

use App\Models\Salida;
use Illuminate\Http\Request;

/**
 * Class SalidaController
 * @package App\Http\Controllers
 */
class SalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salidas = Salida::paginate();

        return view('salida.index', compact('salidas'))
            ->with('i', (request()->input('page', 1) - 1) * $salidas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salida = new Salida();
        return view('salida.create', compact('salida'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Salida::$rules);

        $salida = Salida::create($request->all());

        return redirect()->route('salidas.index')
            ->with('success', 'Salida created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $salida = Salida::find($id);

        return view('salida.show', compact('salida'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salida = Salida::find($id);

        return view('salida.edit', compact('salida'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Salida $salida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salida $salida)
    {
        request()->validate(Salida::$rules);

        $salida->update($request->all());

        return redirect()->route('salidas.index')
            ->with('success', 'Salida updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $salida = Salida::find($id)->delete();

        return redirect()->route('salidas.index')
            ->with('success', 'Salida deleted successfully');
    }
}
