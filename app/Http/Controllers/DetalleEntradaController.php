<?php

namespace App\Http\Controllers;

use App\Models\DetalleEntrada;
use Illuminate\Http\Request;

/**
 * Class DetalleEntradaController
 * @package App\Http\Controllers
 */
class DetalleEntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detalleEntradas = DetalleEntrada::paginate();

        return view('detalle-entrada.index', compact('detalleEntradas'))
            ->with('i', (request()->input('page', 1) - 1) * $detalleEntradas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detalleEntrada = new DetalleEntrada();
        return view('detalle-entrada.create', compact('detalleEntrada'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DetalleEntrada::$rules);

        $detalleEntrada = DetalleEntrada::create($request->all());

        return redirect()->route('detalle-entradas.index')
            ->with('success', 'DetalleEntrada created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalleEntrada = DetalleEntrada::find($id);

        return view('detalle-entrada.show', compact('detalleEntrada'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detalleEntrada = DetalleEntrada::find($id);

        return view('detalle-entrada.edit', compact('detalleEntrada'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DetalleEntrada $detalleEntrada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetalleEntrada $detalleEntrada)
    {
        request()->validate(DetalleEntrada::$rules);

        $detalleEntrada->update($request->all());

        return redirect()->route('detalle-entradas.index')
            ->with('success', 'DetalleEntrada updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $detalleEntrada = DetalleEntrada::find($id)->delete();

        return redirect()->route('detalle-entradas.index')
            ->with('success', 'DetalleEntrada deleted successfully');
    }
}
