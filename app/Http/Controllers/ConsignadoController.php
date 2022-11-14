<?php

namespace App\Http\Controllers;

use App\Models\Consignado;
use Illuminate\Http\Request;

/**
 * Class ConsignadoController
 * @package App\Http\Controllers
 */
class ConsignadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consignados = Consignado::paginate();

        return view('consignado.index', compact('consignados'))
            ->with('i', (request()->input('page', 1) - 1) * $consignados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $consignado = new Consignado();
        return view('consignado.create', compact('consignado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Consignado::$rules);

        $consignado = Consignado::create($request->all());

        return redirect()->route('consignados.index')
            ->with('success', 'Consignado created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consignado = Consignado::find($id);

        return view('consignado.show', compact('consignado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consignado = Consignado::find($id);

        return view('consignado.edit', compact('consignado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Consignado $consignado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consignado $consignado)
    {
        request()->validate(Consignado::$rules);

        $consignado->update($request->all());

        return redirect()->route('consignados.index')
            ->with('success', 'Consignado updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $consignado = Consignado::find($id)->delete();

        return redirect()->route('consignados.index')
            ->with('success', 'Consignado deleted successfully');
    }
}
