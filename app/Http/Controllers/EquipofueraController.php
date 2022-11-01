<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB; //aqui importamos mensajes
use App\Models\Site;
class EquipofueraController extends Controller
{

    public function index()
    {
        $equipos = Equipo::paginate(5);
        $lista_sites=Site::pluck('nombre');
        $sites=Site::all();//agregue recien



        return view('equipofuera.index', compact('equipos','lista_sites','sites'));
    }
    public function update(Request $request, $id)
    {

        $equipo=Equipo::find($id);
        $equipo->estado=$request->estado;
        if($equipo->save()) {
           if($equipo->estado==1){
            return redirect()->route('equipos.index')
            ->with('success', 'Equipo sigue en stock');
           }else{
            return redirect()->route('bajas.index')
            ->with('success', 'Operación exitosa');
           }
        }else{
            return redirect()->route('bajas.index')
            ->with('success', 'ERROR 101 ');
        }



        /*$equipo = Equipo::all();
        $equipo->estado=$request->estado;
        $equipo->update();

        if($equipo->estado==1)
        return redirect()->route('equipos.index')
            ->with('success', 'Equipo updated successfully');
            else
            return redirect()->route('bajas.index')
            ->with('success', 'Equipo updated successfully');*/

    }
}
