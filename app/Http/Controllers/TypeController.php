<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        return view('type.index',compact('types'));
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
           'libelle' => 'required'
       ];
   }
   public function messages()
   {
       return [
           'libelle.required' => 'Desolé! Le champ Libelle du Type est obligatoire Veuillez le renseignez SVP'
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
      
        $type = new Type();
        $type->libelle = $request->libelle;
        
        $type->save();

        return redirect()->route('types.index')->with('success','Type Enregistrer avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }
    public function modif($id)
    {
        $type=Type::find($id);
        return view('type.update',compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->rules(), $this->messages());
         $type = Type::find($id);
       
        $type->libelle = $request->libelle;
        
        $type->save();

        return redirect()->route('types.index')->with('success','Type Enregistrer avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    $type = Type::find($id);
    $referentiels = $type->referentiels;
    foreach ($referentiels as $referentiel) {
        $formations = $referentiel->formations;
        foreach ($formations as $formation) {
            $candidats = $formation->candidats;
            foreach ($candidats as $candidat) {
                $candidat->delete();
            }
            $formation->delete();
        }
        $referentiel->delete();
    }
    $type->delete();
    return redirect()->route('types.index')->with('success', 'Type, les référentiels, les formations et les candidats associés ont été supprimés avec succès');
}

}
