<?php

namespace App\Http\Controllers;

use App\Repositories\EleveRepository;
use App\Repositories\EvaluationRepository;
use App\Repositories\NoteRepository;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    protected $noteRepository;
    protected $eleveRepository;
    protected $evaluationRepository;

    public function __construct(NoteRepository $noteRepository, EleveRepository $eleveRepository,
            EvaluationRepository $evaluationRepository){
        $this->noteRepository = $noteRepository;
        $this->eleveRepository = $eleveRepository;
        $this->evaluationRepository = $evaluationRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes= $this->noteRepository->getAll();
        return view('note.index',compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $eleves = $this->eleveRepository->getAll();
        $evaluations = $this->evaluationRepository->getAll();
        return view('note.add',compact('eleves','evaluations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $note = $this->noteRepository->store($request->all());
        return redirect('note');
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
        $note = $this->noteRepository->getById($id);
        $eleves = $this->eleveRepository->getAll();
        $evaluations = $this->evaluationRepository->getAll();
        return view('note.edit',compact('eleves','evaluations','note'));
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
        $this->noteRepository->update($id,$request->all());
        return redirect('note');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->noteRepository->destroy($id);
        return redirect('note');
    }
}
