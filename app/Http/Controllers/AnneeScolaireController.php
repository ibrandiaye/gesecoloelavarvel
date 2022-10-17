<?php

namespace App\Http\Controllers;

use App\Repositories\AnneeScolaireRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnneeScolaireController extends Controller
{
    protected  $anneeScolaireRepository;

    public function __construct(AnneeScolaireRepository $anneeScolaireRepository){
        $this->anneeScolaireRepository = $anneeScolaireRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anneeScolaires = $this->anneeScolaireRepository->getAll();
        return view('anneeScolaire.index',compact('anneeScolaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anneeScolaire.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            //'title' => 'required|unique:posts|max:255',
            'annee' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('anneeScolaire/create')
                ->withErrors($validator)
                ->withInput();
        }
        $anneeScolaire = $this->anneeScolaireRepository->store($request->all());
        return redirect('anneescolaire');
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
        $anneeScolaire = $this->anneeScolaireRepository->getById($id);
        return view('anneeScolaire.edit',compact('anneeScolaire'));
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
        $validator = Validator::make($request->all(), [
            //'title' => 'required|unique:posts|max:255',
            'annee' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('anneeScolaire/create')
                ->withErrors($validator)
                ->withInput();
        }
        $this->anneeScolaireRepository->update($id, $request->all());
        return redirect('anneescolaire');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
