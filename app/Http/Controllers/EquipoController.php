<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

use App\Models\Site;
/**
 * Class EquipoController
 * @package App\Http\Controllers
 */
class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos = Equipo::paginate(5);
        $lista_sites=Site::pluck('nombre');
        $sites=Site::all();//agregue recien



        return view('equipo.index', compact('equipos','lista_sites','sites'));
           // ->with('i', (request()->input('page', 1) - 1) * $equipos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sites=Site::all();//agregue recien
       // $lista_sites=Site::pluck('nombre');
        $equipo = new Equipo();
        return view('equipo.create')->with(compact('equipo','sites'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Equipo::$rules);

        $equipo = Equipo::create($request->all());

        return redirect()->route('equipos.index')
            ->with('success', 'Equipo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipo = Equipo::find($id);

        return view('equipo.show', compact('equipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipo = Equipo::find($id);

        return view('equipo.edit', compact('equipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Equipo $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipo $equipo)
    {
        request()->validate(Equipo::$rules);

        $equipo->update($request->all());

        if($equipo->estado==1)
        return redirect()->route('equipos.index')
            ->with('success', 'Equipo updated successfully');
            else
            return redirect()->route('bajas.index')
            ->with('success', 'Equipo updated successfully'); 


    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $equipo = Equipo::find($id)->delete();

        return redirect()->route('equipos.index')
            ->with('success', 'Equipo deleted successfully');
    }
}
