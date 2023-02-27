<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Formation;
use App\Models\Referentiel;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formations = Formation::all();
        return view('formation.index',compact('formations',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function create(Request $request)
    {
        // $referentiel_id = Referentiel::where('id', $request->referentiel_id)->value('id');
        // dd($referentiel_id);
        // return view('formation.ajout',compact('referentiel_id', 'request'));
    }
    public function ajout()
    {
        $referentiels = Referentiel::all();
        return view('formation.ajout',compact('referentiels'));
    }

    public function nbre()
    {
        $types = Type::with('referentiels')->get();

        return view('formation.referentiel', compact('types'));
    }//formation/type

    public function nbres()
    {
        $referentiels = Referentiel::withCount('formations')->get();
        return view('referentiel.type',compact('referentiels'));
    }//formation/ref


   public function rules()
   {
       return [
           'nom' => 'required',
           'duree' => 'required',
           'descrition' => 'required',
           'dateD' => 'required',
           'referentiel' => 'required'
       ];
   }
   public function messages()
   {
       return [
           'nom.required' => 'Desolé! Le champ Nom Formation est obligatoire Veuillez le renseignez SVP',
           'duree.required' => 'Desolé! Le champ Duree est obligatoire Veuillez le renseignez SVP',
           'descrition.required' => 'Desolé! Le champ Description est obligatoire Veuillez le renseignez SVP',
           'dateD.required' => 'Desolé! Le champ Date de Début est obligatoire Veuillez le renseignez SVP',
           'referentiel.required' => 'Desolé! Vue qu\'il n\'y a pas de Référentiel cette formation ne pourra pas etre enregistrer'
       ];
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

        $formation = new Formation();
        $formation->nom = $request->nom;
        $formation->duree = $request->input('duree');
        $formation->descrition = $request->input('descrition');
        $formation->isStarted = $request->isStarted;
        $formation->date_debut = $request->dateD;
        $formation->referentiel_id = $request->referentiel;

        $formation->save();

        return redirect()->route('formations.index')->with('success','formation Enregistrer avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function show(Formation $formation)
    {
        //
    }
    public function modif($id)
    {
        $referentiels = Referentiel::all();
        $formation = Formation::find($id);
        return view('formation.update', compact('formation', 'referentiels'));
    }
    public function showFormationStatus()
    {
        $formations = Formation::all();

        $inProgress = $formations->where('isStarted', 'Oui')->count();
        $pending = $formations->where('isStarted', 'Non')->count();

        return view('formation.diagrammeForm', compact('inProgress', 'pending'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function edit(Formation $formation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate($this->rules(), $this->messages());
        $formation = Formation::find($id);

        $formation->nom = $request->nom;
        $formation->duree = $request->input('duree');
        $formation->descrition = $request->input('descrition');
        $formation->isStarted = $request->isStarted;
        $formation->date_debut = $request->dateD;
        $formation->referentiel_id = $request->referentiel;
        $formation->save();
        return redirect()->route('formations.index')->with('success', 'formation Modifier avec succèss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formation = Formation::find($id);
        if ($formation) {
            Candidat::whereHas('formations', function ($query) use ($formation) {
                $query->where('id', $formation->id);
            })->delete();
            $formation->delete();
            return redirect()->route('formations.index')->with('success', 'Formation et les candidats associés ont été supprimés avec succès');
        }
        return redirect()->route('formations.index')->with('error', 'Formation introuvable');
    }
    
}
