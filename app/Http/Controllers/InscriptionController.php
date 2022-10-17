<?php

namespace App\Http\Controllers;

use App\Repositories\AnneeScolaireRepository;
use App\Repositories\ClasseRepository;
use App\Repositories\EleveRepository;
use App\Repositories\InscriptionRepository;
use App\Repositories\ProgrammeRepository;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    protected $inscriptionRepository;
    protected $anneeScolaireRepository;
    protected $eleveRepository;
    protected $programmeRepository;
    protected $classeRepository;
    public function __construct(InscriptionRepository $inscriptionRepository, AnneeScolaireRepository $anneeScolaireRepository,
            EleveRepository $eleveRepository, ProgrammeRepository $programmeRepository, ClasseRepository $classeRepository){
        $this->inscriptionRepository = $inscriptionRepository;
        $this->anneeScolaireRepository = $anneeScolaireRepository;
        $this->eleveRepository = $eleveRepository;
        $this->programmeRepository = $programmeRepository;
        $this->classeRepository = $classeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscriptions= $this->inscriptionRepository->getAllinscriptions();
        return view('inscription.index',compact('inscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programmes = $this->programmeRepository->getAll();
        $anneeScolaires = $this->anneeScolaireRepository->getAll();
        $eleves = $this->eleveRepository->getAll();
        $classes = $this->classeRepository->getAll();
        return view('inscription.add',compact('programmes','anneeScolaires','eleves','classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inscription = $this->inscriptionRepository->store($request->all());
        return redirect('inscription');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inscription = $this->inscriptionRepository->getById($id);
        $programmes = $this->programmeRepository->getAll();
        $anneeScolaires = $this->anneeScolaireRepository->getAll();
        $eleves = $this->eleveRepository->getAll();
        $classes = $this->classeRepository->getAll();
        return view('inscription.edit',compact('programmes','anneeScolaires','eleves','inscription','classes'));
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
        $this->inscriptionRepository->update($id,$request->all());
        return redirect('inscription');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->inscriptionRepository->destroy($id);
        return redirect('inscription');

    }
}
