<?php

namespace App\Http\Controllers;

use App\Repositories\CahierTexteRepository;
use App\Repositories\ClasseRepository;
use App\Repositories\PlanningRepository;
use Illuminate\Http\Request;

class CahierTexteController extends Controller
{
    protected $cahierTexteRepository;
    protected $planningRepository;
    protected $classeRepository;

    public function __construct(CahierTexteRepository $cahierTexteRepository, PlanningRepository $planningRepository,
            ClasseRepository $classeRepository){
        $this->cahierTexteRepository = $cahierTexteRepository;
        $this->planningRepository = $planningRepository;
        $this->classeRepository = $classeRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cahierTextes= $this->cahierTexteRepository->getAll();
        return view('cahierTexte.index',compact('cahierTextes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plannings = $this->planningRepository->getAll();
        $classes = $this->classeRepository->getAll();
        return view('cahierTexte.add',compact('plannings','classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cahierTexte = $this->cahierTexteRepository->store($request->all());
        return redirect('cahier-texte');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cahierTexte = $this->cahierTexteRepository->getById($id);
        $plannings = $this->planningRepository->getAll();
        $classes = $this->classeRepository->getAll();
        return view('cahierTexte.edit',compact('plannings','classes','cahierTexte'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->cahierTexteRepository->update($id,$request->all());
        return redirect('cahier-texte');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
