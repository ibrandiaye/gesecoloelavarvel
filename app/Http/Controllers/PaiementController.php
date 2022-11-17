<?php

namespace App\Http\Controllers;

use App\Repositories\InscriptionRepository;
use App\Repositories\MoisRepository;
use App\Repositories\PaiementRepository;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    protected $paiementRepository;
    protected $moisRepository;
    protected $inscriptionRepository;

    public function __construct(PaiementRepository $paiementRepository, MoisRepository $moisRepository,
            InscriptionRepository $inscriptionRepository){
        $this->paiementRepository = $paiementRepository;
        $this->moisRepository = $moisRepository;
        $this->inscriptionRepository = $inscriptionRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paiements= $this->paiementRepository->getAll();
        return view('paiement.index',compact('paiements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mois = $this->moisRepository->getAll();
        $inscriptions = $this->inscriptionRepository->getAll();
        return view('paiement.add',compact('mois','inscriptions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paiement = $this->paiementRepository->store($request->all());
        return redirect('paiement');
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
        $paiement = $this->paiementRepository->getById($id);
        $mois = $this->moisRepository->getAll();
        $inscriptions = $this->inscriptionRepository->getAll();
        return view('paiement.edit',compact('mois','inscriptions','paiement'));
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
        $this->paiementRepository->update($id,$request->all());
        return redirect('paiement');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->paiementRepository->destroy($id);
        return redirect('paiement');

}
}
