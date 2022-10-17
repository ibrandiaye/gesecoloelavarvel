<?php

namespace App\Http\Controllers;

use App\Repositories\TutteurRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class TutteurController extends Controller
{

    protected $tutteurRepository;

    public function __construct(TutteurRepository $tutteurRepository){
        $this->tutteurRepository = $tutteurRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tutteurs = $this->tutteurRepository->getAll();
        return view('tutteur.index',compact('tutteurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tutteur.add');
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
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required',
            'adresse' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('anneeScolaire/create')
                ->withErrors($validator)
                ->withInput();
        }
        $tutteur = $this->tutteurRepository->store($request->all());
        return redirect('tutteur');
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
        $tutteur = $this->tutteurRepository->getById($id);
        return view('tutteur.edit',compact('tutteur'));
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
        $this->tutteurRepository->update($id,$request->all());
        return redirect('tutteur');
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
