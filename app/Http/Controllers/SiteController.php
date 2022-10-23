<?php

namespace App\Http\Controllers;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Session; //aqui importamos mensajes
use Illuminate\support\Facades\DB; //aqui importamos mensajeszz

/**
 * Class SiteController
 * @package App\Http\Controllers
 */
class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = Site::paginate();

        return view('site.index', compact('sites',$sites));
           // ->with('i', (request()->input('page', 1) - 1) * $sites->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $site = new Site();
        return view('site.create', compact('site'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Site::$rules);

        $site = Site::create($request->all());

        Session::flash('success','Registro Creado correctamente');
        return redirect()->route('sites.index');
        //  ->with('success', 'Site created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Site $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(Site::$rules);
        $site=Site::find($id);
        $site->nombre=$request->nombre;
        $site->codigo=$request->codigo;
        $site->region=$request->region;
        $site->direccion=$request->direccion;
        $site->oym=$request->oym;
        $site->estado=$request->estado;
        $site->update();
        return redirect()->route('sites.index')
            ->with('success', 'Sitio actualizado correctamnete');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request, $id)
    {
        $site = Site::find($id);
        $site->destroy($id);
        return redirect()->route('sites.index')
        ->with('success', 'Site eliminado correctamente');
    }
}
