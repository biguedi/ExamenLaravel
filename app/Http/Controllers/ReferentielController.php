<?php

namespace App\Http\Controllers;

use App\Models\Referentiel;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReferentielController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $referentiels = Referentiel::all();
        return view('referentiel.index',compact('referentiels'));
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

    public function rules()
   {
       return [
           'libelle' => 'required',
           'validated' => 'required',
           'horaire' => 'required',
           'type' => 'required'
       ];
   }
   public function messages()
   {
       return [
           'libelle.required' => 'Desolé! Le champ Libelle du Référentiel est obligatoire Veuillez le renseignez SVP',
           'validated.required' => 'Desolé! Le champ validated est obligatoire Veuillez le renseignez SVP',
           'horaire.required' => 'Desolé! Le champ horaire est obligatoire Veuillez le renseignez SVP',
           'type.required' => 'Desolé! Vue qu\'il n\'y a pas de Type cet référentiel ne pourra pas etre enregistrer'
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
        $request->validate([
            'horaire' => 'required|numeric',
        ], [
            'horaire.numeric' => 'ERREUR! Veuillez revoir ce que vous avez saisi sur l\'horaire svp',
        ]);

        $referentiel = new Referentiel();
        $referentiel->libelle = $request->libelle;
        $referentiel->validated = $request->input('validated');
        $referentiel->horaire = $request->input('horaire');
        $referentiel->type_id = $request->input('type');

        $referentiel->save();

        return redirect()->route('referentiels.index')->with('success','Referentiel Enregistrer avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Referentiel  $referentiel
     * @return \Illuminate\Http\Response
     */
    public function show(Referentiel $referentiel)
    {
        //
    }
    public function modif($id)
    {
        $types = Type::all();
        $referentiel=Referentiel::find($id);
        return view('referentiel.update',compact('referentiel','types'));
    }
    public function ajout()
    {
        $types = Type::all();
        return view('referentiel.ajout',compact('types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Referentiel  $referentiel
     * @return \Illuminate\Http\Response
     */
    public function edit(Referentiel $referentiel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Referentiel  $referentiel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->rules(), $this->messages());
        $request->validate([
            'horaire' => 'required|numeric',
        ], [
            'horaire.numeric' => 'ERREUR! Veuillez revoir ce que vous avez saisi sur l\'horaire svp',
        ]);

        $referentiel = Referentiel::find($id);
        $referentiel->libelle = $request->libelle;
        $referentiel->validated = $request->input('validated');
        $referentiel->horaire = $request->input('horaire');
        $referentiel->type_id = $request->input('type');

        $referentiel->save();
        return redirect()->route('referentiels.index')->with('success', 'Référentiel Modifier avec succèss');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Referentiel  $referentiel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    $referentiel = Referentiel::find($id);
    $formations = $referentiel->formations;
    foreach ($formations as $formation) {
        $candidats = $formation->candidats;
        foreach ($candidats as $candidat) {
            $candidat->delete();
        }
        $formation->delete();
    }
    $referentiel->delete();
    return redirect()->route('referentiels.index')->with('success', 'Référentiel, les formations et les candidats associés ont été supprimés avec succès');
}
}
