<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Empresa;
use App\Models\Cinta;
use App\Models\Rotulo;
use App\Models\IngresoCintaSnRotulo;







class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $empresa = Empresa::all()->count();
        $cintas = Cinta::all()->count();
        $rotulos = Rotulo::all()->count();
        $IngresoCintaSnRotulo = IngresoCintaSnRotulo::all()->count();



        return view('home',compact('empresa','cintas','rotulos','IngresoCintaSnRotulo'));

    }
}