<?php

namespace App\Http\Controllers;

use App\Repositories\ProgrammeRepository;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    protected $programmeRepository;

    public function __construct(ProgrammeRepository $programmeRepository){
        $this->programmeRepository = $programmeRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programmes = $this->programmeRepository->getAll();
        return view('programme.index',compact('programmes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('programme.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $programme = $this->programmeRepository->store($request->all());

        return redirect('programme');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $programme = $this->programmeRepository->getById($id);
        return view('programme.show',compact('programme'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $programme = $this->programmeRepository->getById($id);
        return view('programme.edit',compact('programme'));
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
        $this->programmeRepository->update($id,$request->all());
        return redirect('programme');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->programmeRepository->destroy($id);
        return redirect('programme');
    }
}
