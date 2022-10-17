<?php

namespace App\Http\Controllers;

use App\Repositories\CoefficientRepository;
use App\Repositories\MatiereRepository;
use App\Repositories\ProfesseurRepository;
use App\Repositories\ProgrammeRepository;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    protected $matiereRepository;
    protected $professeurRepository;
    protected $coefficientRepository;
    protected $programmeRepository;
    public function __construct(MatiereRepository $matiereRepository, ProfesseurRepository $professeurRepository,
            CoefficientRepository $coefficientRepository, ProgrammeRepository $programmeRepository){
        $this->matiereRepository = $matiereRepository;
        $this->professeurRepository = $professeurRepository;
        $this->coefficientRepository = $coefficientRepository;
        $this->programmeRepository = $programmeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matieres= $this->matiereRepository->getAllMatieres();
        return view('matiere.index',compact('matieres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programmes = $this->programmeRepository->getAll();
        $professeurs = $this->professeurRepository->getAll();
        $coefficients = $this->coefficientRepository->getAll();
        return view('matiere.add',compact('programmes','professeurs','coefficients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $matiere = $this->matiereRepository->store($request->all());
        return redirect('matiere');
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
        $matiere = $this->matiereRepository->getById($id);
        $programmes = $this->programmeRepository->getAll();
        $professeurs = $this->professeurRepository->getAll();
        $coefficients = $this->coefficientRepository->getAll();
        return view('matiere.edit',compact('programmes','professeurs','coefficients','matiere'));
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
        $this->matiereRepository->update($id,$request->all());
        return redirect('matiere');
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
