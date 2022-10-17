<?php

namespace App\Http\Controllers;

use App\Repositories\ProfesseurRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfesseurController extends Controller
{
    protected $professeurRepository;

    public function __construct(ProfesseurRepository $professeurRepository){
        $this->professeurRepository = $professeurRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professeurs = $this->professeurRepository->getAll();
        return view('professeur.index',compact('professeurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('professeur.add');

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
        ]);
        if ($validator->fails()) {
            return redirect('professeur/create')
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
                return redirect('professeur/create')
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
        // $professeur = DB::table('professeurs')->latest();
        $request->merge(['code'=> 0000]);
        $professeur = $this->professeurRepository->store($request->all());
        return redirect('professeur');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $professeur = $this->professeurRepository->getById($id);
        return view('professeur.show',compact('professeur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $professeur = $this->professeurRepository->getById($id);
        return view('professeur.edit',compact('professeur'));
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

        ]);
        if ($validator->fails()) {
            $professeur  = $this->professeurRepository->getById($id);
            return redirect('professeur/create',compact('professeur'))
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
                $professeur  = $this->professeurRepository->getById($id);
                return redirect('professeur/edit',compact('professeur'))
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
        // $professeur = DB::table('professeurs')->latest();
        $this->professeurRepository->update($id,$request->all());
        return redirect('professeur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->professeurRepository->destroy($id);
        return redirect('professeur');
    }
}
