<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Site;
use App\Models\User; 
use App\Models\Equipo;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos = Equipo::get();
        $sites = Site::get();
        $users = User::get();

        //$lista_sites=Site::pluck('nombre');
        $estados=DB::select('select estado FROM equipos where estado=1');
        $estados_fuera=DB::select('select estado FROM equipos where estado=2');
        $sites=Site::all();//agregue recien
        return view('home.index', compact('equipos','estados','estados_fuera','sites','users'));
    }
}
