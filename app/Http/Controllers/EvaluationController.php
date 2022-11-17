<?php

namespace App\Http\Controllers;

use App\Repositories\ClasseRepository;
use App\Repositories\EvaluationRepository;
use App\Repositories\MatiereRepository;
use App\Repositories\SemestreRepository;
use App\Repositories\TypeEvaluationRepository;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    protected $evaluationRepository;
    protected $matiereRepository;
    protected $classeRepository;
    protected $semestreRepository;
    protected $typeEvaluationRepository;
    public function __construct(EvaluationRepository $evaluationRepository, MatiereRepository $matiereRepository,
            ClasseRepository $classeRepository, SemestreRepository $semestreRepository, TypeEvaluationRepository $typeEvaluationRepository){
        $this->evaluationRepository = $evaluationRepository;
        $this->matiereRepository = $matiereRepository;
        $this->classeRepository = $classeRepository;
        $this->semestreRepository = $semestreRepository;
        $this->typeEvaluationRepository = $typeEvaluationRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evaluations= $this->evaluationRepository->getAll();
        return view('evaluation.index',compact('evaluations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semestres = $this->semestreRepository->getAll();
        $matieres = $this->matiereRepository->getAll();
        $classes = $this->classeRepository->getAll();
        $typeEvaluations = $this->typeEvaluationRepository->getAll();
        return view('evaluation.add',compact('semestres','matieres','classes','typeEvaluations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $evaluation = $this->evaluationRepository->store($request->all());
        return redirect('evaluation');
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
        $evaluation = $this->evaluationRepository->getById($id);
        $semestres = $this->semestreRepository->getAll();
        $matieres = $this->matiereRepository->getAll();
        $classes = $this->classeRepository->getAll();
        $typeEvaluations = $this->typeEvaluationRepository->getAll();
        return view('evaluation.edit',compact('semestres','matieres','classes','evaluation','typeEvaluations'));
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
        $this->evaluationRepository->update($id,$request->all());
        return redirect('evaluation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->evaluationRepository->destroy($id);
        return redirect('evaluation');
    }
}
