<?php

namespace App\Http\Controllers;

use App\Repositories\SemestreRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SemestreController extends Controller
{
    protected  $semestreRepository;

    public function __construct(SemestreRepository $semestreRepository){
        $this->semestreRepository = $semestreRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semestres = $this->semestreRepository->getAll();
        return view('semestre.index',compact('semestres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('semestre.add');
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
        ]);

        if ($validator->fails()) {
            return redirect('semestre/create')
                ->withErrors($validator)
                ->withInput();
        }
        $semestre = $this->semestreRepository->store($request->all());
        return redirect('semestre');
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
        $semestre = $this->semestreRepository->getById($id);
        return view('semestre.edit',compact('semestre'));
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
            'nom' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('semestre/create')
                ->withErrors($validator)
                ->withInput();
        }
        $this->semestreRepository->update($id, $request->all());
        return redirect('semestre');
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
