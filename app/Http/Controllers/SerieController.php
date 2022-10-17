<?php

namespace App\Http\Controllers;

use App\Repositories\SerieRepository;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    protected $serieRepositorie;

    public function __construct(SerieRepository $serieRepository){
        $this->serieRepositorie = $serieRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $series =$this->serieRepositorie->getAll();
        return view('serie.index',compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('serie.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $serie = $this->serieRepositorie->store($request->all());
        return redirect('serie');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serie = $this->serieRepositorie->getById($id);
        return view('serie.show',compact('serie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serie = $this->serieRepositorie->getById($id);
        return view('serie.edit',compact('serie'));
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
        $this->serieRepositorie->update($id, $request->all());
        return redirect('serie',compact('serie'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->serieRepositorie->destroy($id);
        return redirect('serie');
    }
}
