<?php

namespace App\Http\Controllers;

use App\Repositories\EleveRepository;
use App\Repositories\TutteurRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EleveController extends Controller
{
    protected $eleveRepository;
    protected $tutteurRepository;

    public function __construct(EleveRepository $eleveRepository, TutteurRepository $tutteurRepository){
        $this->eleveRepository = $eleveRepository;
        $this->tutteurRepository = $tutteurRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eleves = $this->eleveRepository->getAll();
        return view('eleve.index',compact('eleves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tutteurs = $this->tutteurRepository->getAll();
        return view('eleve.add',compact('tutteurs'));
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
                'adresse' => 'required',
                'lieu_naiss' => 'required',
                'date_naiss' => 'required',
                'tutteur_id' => 'required'
            ]);
            if ($validator->fails()) {
                return redirect('eleve/create')
                    ->withErrors($validator)
                    ->withInput();
            }
       // }

      //  else {
            if ($files = $request->file('img')) {
                $validator = Validator::make($request->all(), [
                    //'title' => 'required|unique:posts|max:255',
                    'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                ]);
                if ($validator->fails()) {
                    return redirect('eleve/create')
                        ->withErrors($validator)
                        ->withInput();
                }
                $destinationPath = 'image/'; // upload path
                $profileImage =  time(). "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $profileImage);
                $request->merge(['photo'=>$profileImage]);
                //$hotel->logo= "$profileImage";
            }

       // }
       // $eleve = DB::table('eleves')->latest();
        $eleve = $this->eleveRepository->store($request->all());
        return redirect('eleve');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eleve  = $this->eleveRepository->getById($id);
        return view('eleve.show',compact('eleve'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eleve  = $this->eleveRepository->getById($id);
        $tutteurs = $this->tutteurRepository->getAll();
        return view('eleve.edit',compact('eleve','tutteurs'));
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
            'prenom' => 'required',
            'adresse' => 'required',
            'lieu_naiss' => 'required',
            'date_naiss' => 'required',
            'tutteur_id' => 'required'
        ]);
        if ($validator->fails()) {
            $eleve  = $this->eleveRepository->getById($id);
            $tutteurs = $this->tutteurRepository->getAll();
            return redirect('eleve/create',compact('eleve','tutteurs'))
                ->withErrors($validator)
                ->withInput();
        }
        // }

        //  else {
        if ($files = $request->file('img')) {
            $validator = Validator::make($request->all(), [
                //'title' => 'required|unique:posts|max:255',
                'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            if ($validator->fails()) {
                $eleve  = $this->eleveRepository->getById($id);
                $tutteurs = $this->tutteurRepository->getAll();
                return redirect('eleve/edit',compact('eleve','tutteurs'))
                    ->withErrors($validator)
                    ->withInput();
            }
            $destinationPath = 'image/'; // upload path
            $profileImage =  time(). "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $request->merge(['photo'=>$profileImage]);
            //$hotel->logo= "$profileImage";
        }

        // }
        // $eleve = DB::table('eleves')->latest();
        $this->eleveRepository->update($id,$request->all());
        return redirect('eleve');
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
