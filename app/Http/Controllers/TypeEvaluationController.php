<?php

namespace App\Http\Controllers;

use App\Repositories\TypeEvaluationRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypeEvaluationController extends Controller
{
    protected  $typeEvaluationRepository;

    public function __construct(TypeEvaluationRepository $typeEvaluationRepository){
        $this->typeEvaluationRepository = $typeEvaluationRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeEvaluations = $this->typeEvaluationRepository->getAll();
        return view('typeEvaluation.index',compact('typeEvaluations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typeEvaluation.add');
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
            return redirect('typeEvaluation/create')
                ->withErrors($validator)
                ->withInput();
        }
        $typeEvaluation = $this->typeEvaluationRepository->store($request->all());
        return redirect('type-evaluation');
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
        $typeEvaluation = $this->typeEvaluationRepository->getById($id);
        return view('type-evaluation.edit',compact('typeEvaluation'));
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
            return redirect('type-evaluation/create')
                ->withErrors($validator)
                ->withInput();
        }
        $this->typeEvaluationRepository->update($id, $request->all());
        return redirect('type-evaluation');
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
