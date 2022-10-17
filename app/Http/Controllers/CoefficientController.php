<?php

namespace App\Http\Controllers;

use App\Repositories\CoefficientRepository;
use Illuminate\Http\Request;

class CoefficientController extends Controller
{
    protected  $coefficientRepository;

    public function __construct(CoefficientRepository $coefficientRepository){
        $this->coefficientRepository = $coefficientRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coefficients  = $this->coefficientRepository->getAll();
        return view('coefficient.index',compact('coefficients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coefficient.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coefficient = $this->coefficientRepository->store($request->all());
        return redirect('coefficient');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coefficient = $this->coefficientRepository->getById($id);
        return view('coefficient.index',compact('coefficient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coefficient = $this->coefficientRepository->getById($id);
        return view('coefficient.edit',compact('coefficient'));
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
        $this->coefficientRepository->update($id,$request->all());
        return redirect('coefficient');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->coefficientRepository->destroy($id);
        return redirect('coefficient');
    }
}
