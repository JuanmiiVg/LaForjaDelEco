<?php

namespace App\Http\Controllers;

use App\Models\master;
use Illuminate\Http\Request;
use App\Models\User;

class MasterController extends Controller
{
    public function index($id)
    {
        $master = master::findOrFail($id);
        $users = User::where("master_id", $id)->get();
        return view("master", compact("master", "users"));
    }
    public function deleteUser($id, $idUse)
    {
        $User = User::findOrFail($idUse);
        $User->delete();
        return redirect()->route("master.index", $id);
    }
    public function addItem($id, $idUse)
    {
        $user = User::findOrFail($idUse);
        $master = master::findOrFail($id);
        return view("anadir", compact("user", "master"));
    }

    public function addArma(Request $request, $idUse)
    {
        $user = User::findOrFail($idUse);
        $user->armas()->create($request->all());
        return redirect()->route("user.index", $idUse);
    }

    public function addPocion(Request $request, $idUse)
    {
        $user = User::findOrFail($idUse);
        $user->pociones()->create($request->all());
        return redirect()->route("user.index", $idUse);
    }

    public function addMaterial(Request $request, $idUse)
    {
        $user = User::findOrFail($idUse);
        $user->materiales()->create($request->all());
        return redirect()->route("user.index", $idUse);
    }

    public function addIngrediente(Request $request, $idUse)
    {
        $user = User::findOrFail($idUse);
        $user->ingredientes()->create($request->all());
        return redirect()->route("user.index", $idUse);
    }
    
}
