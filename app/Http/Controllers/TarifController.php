<?php

namespace App\Http\Controllers;

use App\Repositories\TarifRepository;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    protected $tarifRepository;

    public function __construct(TarifRepository $tarifRepository){
        $this->tarifRepository = $tarifRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarifs = $this->tarifRepository->getAll();
        return view('tarif.index',compact('tarifs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tarif.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarif =  $this->tarifRepository->store($request->all());
        return redirect('tarif');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarif =$this->tarifRepository->getById($id);
        return view('tarif.show',compact('tarif'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarif = $this->tarifRepository->getById($id);
        return view('tarif.edit',compact('tarif'));
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
        $this->tarifRepository->update($id, $request->all());
        return redirect('tarif');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->tarifRepository->destroy($id);
        return redirect('tarif');
    }
}
