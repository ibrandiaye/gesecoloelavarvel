<?php

namespace App\Http\Controllers;

use App\Repositories\ClasseRepository;
use App\Repositories\MatiereRepository;
use App\Repositories\PlanningRepository;
use App\Repositories\ProgrammeRepository;
use Illuminate\Http\Request;

class PlanningController extends Controller
{

    protected $planningRepository;
    protected $matiereRepository;
    protected $classeRepository;
    protected $programmeRepository;
    public function __construct(PlanningRepository $planningRepository, MatiereRepository $matiereRepository,
            ClasseRepository $classeRepository, ProgrammeRepository $programmeRepository){
        $this->planningRepository = $planningRepository;
        $this->matiereRepository = $matiereRepository;
        $this->classeRepository = $classeRepository;
        $this->programmeRepository = $programmeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plannings= $this->planningRepository->getAll();
        return view('planning.index',compact('plannings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programmes = $this->programmeRepository->getAll();
        $matieres = $this->matiereRepository->getAll();
        $classes = $this->classeRepository->getAll();
        return view('planning.add',compact('programmes','matieres','classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $planning = $this->planningRepository->store($request->all());
        return redirect('planning');
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
        $planning = $this->planningRepository->getById($id);
        $programmes = $this->programmeRepository->getAll();
        $matieres = $this->matiereRepository->getAll();
        $classes = $this->classeRepository->getAll();
        return view('planning.edit',compact('programmes','matieres','classes','planning'));
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
        $this->planningRepository->update($id,$request->all());
        return redirect('planning');
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
