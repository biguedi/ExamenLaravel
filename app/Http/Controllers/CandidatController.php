<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use App\Models\Candidat;
use App\Models\Formation;
use Illuminate\Http\Request;


class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidats=Candidat::all();
        $candidats->load('formations');
        return view('candidat.index',compact('candidats'));
    }
    public function showCandidat()
    {
        $candidat = Candidat::all();

        $homme = $candidat->where('sexe', 'Homme')->count();
        $femme = $candidat->where('sexe', 'Femme')->count();

        return view('candidat.diagrammeSexe', compact('homme', 'femme'));
    }
    public function showAgeDiagram()
    {
        $candidats = Candidat::all();

        $age_15_19 = $candidats->whereBetween('age', [15, 19])->count();
        $age_20_24 = $candidats->whereBetween('age', [20, 24])->count();
        $age_25_29 = $candidats->whereBetween('age', [25, 29])->count();
        $age_30_34 = $candidats->whereBetween('age', [30, 34])->count();
        $age_35 = $candidats->where('age', '==', 35)->count();

        return view('candidat.diagrammeAge', compact('age_15_19', 'age_20_24', 'age_25_29', 'age_30_34', 'age_35'));
    }
    
    public function nbre()
    {
        $candidats_par_formation = Formation::withCount('candidats')->get();
        return view('candidat.formation',compact('candidats_par_formation'));
    }

        public function rules()
    {
        return [
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'niveauEtude' => 'required',
            'formation' => 'required'

            
        ];
    }
    public function messages()
    {
        return [
            'nom.required' => 'Desolé! Le champ nom est obligatoire Veuillez le renseignez SVP',
            'prenom.required' => 'Desolé! Le champ prenom est obligatoire Veuillez le renseignez SVP',
            'email.required' => 'Desolé! Le champ email est obligatoire Veuillez le renseignez SVP',
            'email.email' => 'Desolé! Le format de l\'email est invalide  Veuillez le renseignez SVP',
            'niveauEtude.required' => 'Desolé! Le champ Niveau d\'etude est obligatoire  Veuillez le renseignez SVP',
            'formation.required' => 'Desolé! vue qu\'il n\'a pas Formation ce Candidat ne pourra pas etre enregistrer'
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function ajout()
    {
        $formations = Formation::all();
        return view('candidat.ajout',compact('formations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->rules(), $this->messages());

        $candidat = new Candidat();
        $candidat->nom = $request->nom;
        $candidat->prenom = $request->input('prenom');
        $candidat->email = $request->input('email');
        $candidat->age = $request->age;
        $candidat->niveauEtude = $request->niveauEtude;
        $candidat->sexe = $request->sexe;
        $candidat->formation = $request->formation;

        $candidat->save();
        $formation = Formation::find($request->formation);
        $candidat->formations()->attach($formation);

        return redirect()->route('candidats.index')->with('success','Candidat Enregistrer avec success');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidat  $candidat
     * @return \Illuminate\Http\Response
     */
    public function show(Candidat $candidat,$id)
    {
        $candidat = Candidat::find($id);
        return view('candidat.index',compact('candidat'));
    }
    public function modif($id)
    {
        $formations = Formation::all();
        $candidat=Candidat::find($id);
        return view('candidat.update',compact('candidat','formations'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidat  $candidat
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidat $candidat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidat  $candidat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate($this->rules(), $this->messages());
        $candidat = Candidat::find($id);

        $candidat->nom = $request->nom;
        $candidat->prenom = $request->prenom;
        $candidat->email = $request->email;
        $candidat->age = $request->age;
        $candidat->niveauEtude = $request->niveauEtude;
        $candidat->sexe = $request->sexe;
        $candidat->formation = $request->formation;
        $candidat->save();
        $formation = Formation::find($request->formation);
        $candidat->formations()->sync($formation);
        return redirect()->route('candidats.index')->with('success', 'Candidat Modifier avec succèss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidat  $candidat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidat = Candidat::find($id);
        $candidat->delete();
        return redirect()->route('candidats.index')->with('success', 'Candidat supprimé avec succès');
    }
    
}
