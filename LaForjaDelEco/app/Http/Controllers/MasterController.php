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
        $User = User::findOrFail($idUse);
        $master = master::findOrFail($id);
        return view("anadir", compact("User", "master"));
    }
    
}
