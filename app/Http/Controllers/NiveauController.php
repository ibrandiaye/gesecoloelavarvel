<?php

namespace App\Http\Controllers;

use App\Repositories\NiveauRepository;
use Illuminate\Http\Request;

class NiveauController extends Controller
{
    protected  $niveauRepository;

    public function __construct(NiveauRepository $niveauRepository){
        $this->niveauRepository = $niveauRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $niveaus  = $this->niveauRepository->getAll();
        return view('niveau.index',compact('niveaus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('niveau.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $niveau = $this->niveauRepository->store($request->all());
        return redirect('niveau');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $niveau = $this->niveauRepository->getById($id);
        return view('niveau.index',compact('niveau'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $niveau = $this->niveauRepository->getById($id);
        return view('niveau.edit',compact('niveau'));
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
        $this->niveauRepository->update($id,$request->all());
        return redirect('niveau');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->niveauRepository->destroy($id);
        return redirect('niveau');
    }
}
