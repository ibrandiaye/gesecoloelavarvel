<?php

namespace App\Http\Controllers;

use App\Programme;
use App\Repositories\AnneeScolaireRepository;
use App\Repositories\ClasseRepository;
use App\Repositories\NiveauRepository;
use App\Repositories\ProgrammeRepository;
use App\Repositories\SerieRepository;
use App\Repositories\TarifRepository;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    protected $classeRepository;
    protected $tarifRepository;
    protected $niveauRepository;
    protected $anneeScolaireRepository;
    protected $serieRepository;
    protected $programmeRepository;
    public function __construct(ClasseRepository $classeRepository, TarifRepository $tarifRepository,
                        NiveauRepository $niveauRepository,AnneeScolaireRepository $anneeScolaireRepository,
                        SerieRepository $serieRepository, ProgrammeRepository $programmeRepository){
        $this->classeRepository = $classeRepository;
        $this->tarifRepository = $tarifRepository;
        $this->niveauRepository = $niveauRepository;
        $this->anneeScolaireRepository = $anneeScolaireRepository;
        $this->serieRepository = $serieRepository;
        $this->programmeRepository = $programmeRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = $this->classeRepository->getAllclasses();
        return view('classe.index',compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tarifs = $this->tarifRepository->getAll();
        $anneeScolaires = $this->anneeScolaireRepository->getanneeScolaireDesc();
        $niveaus = $this->niveauRepository->getAll();
        $series = $this->serieRepository->getAll();
        $programmes = $this->programmeRepository->getAll();
        return view('classe.add',compact('tarifs','anneeScolaires','niveaus','series','programmes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  dd($request['programme_id']);
        $classe = $this->classeRepository->store($request->all());
        $programme = Programme::find($request['programme_id']);
        $classe->programmes()->attach($programme);
        return redirect('classe');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classe = $this->classeRepository->getById($id);
        return view('classe.show',compact('classe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarifs = $this->tarifRepository->getAll();
        $anneeScolaires = $this->anneeScolaireRepository->getanneeScolaireDesc();
        $niveaus = $this->niveauRepository->getAll();
        $series = $this->serieRepository->getAll();
        $classe = $this->classeRepository->getById($id);
        return view('classe.edit',compact('tarifs','anneeScolaires','niveaus','series','classe'));
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
        $this->classeRepository->update($id, $request->all());
        return redirect('classe');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->classeRepository->destroy($id);
        return redirect('classe');
    }
}
