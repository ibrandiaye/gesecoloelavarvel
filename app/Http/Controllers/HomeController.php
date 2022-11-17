<?php

namespace App\Http\Controllers;

use App\Repositories\ClasseRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected $classeRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ClasseRepository $classeRepository)
    {
        $this->middleware('auth');
        $this->classeRepository = $classeRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
      // $value = $request->cookie('an');
      //dd(session('an'));
      $classes = $this->classeRepository->getClasseByAnneeScolaire(session('an'));
      return view('welcome',compact('classes'));
    }
}
