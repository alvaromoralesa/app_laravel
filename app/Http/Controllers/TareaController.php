<?php

namespace App\Http\Controllers;

use App\Tarea;
use Illuminate\Http\Request;


class TareaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return Tarea::where('user_id', auth()->id())->get();
    }

    public function store(Request $request)
    {
        $tarea = new Tarea();
        $tarea->description = $request-> description;
        $tarea->user_id = auth()->id();
        $tarea->save();
 
        return $tarea;
    }
 
    public function update(Request $request, $id)
    {
        $tarea = Tarea::find($id);
        $tarea->description = $request->description;
        $tarea->save();

        return $tarea;
    }


    public function destroy($id)
    {
        $tarea = Tarea::find($id);
        $tarea->delete();
    }
}
