<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
    {
        return view('adopciones',[
            'pets' => $this->loadAllPets()
        ]);
    }

    public function show(Pet $pet)
    {
        return view('mascota',[
            'pet' => $pet
        ]);
    }

    public function request(Pet $pet)
    {
        return view('informacion',[
            'pet' => $pet
        ]);
    }

    public function search(Request $request){

        $search = new Pet;
        
        if($request->input('species') != null){
            $search = $search->bySpecies($request->input('species'));
        }

        if($request->input('age') != null){
            $search = $search->byAge($request->input('age'));
        }
        
        if($request->input('genre') != null){
            $search = $search->byGenre($request->input('genre'));
        }
        
        if($request->input('size') != null){
            $search = $search->bySize($request->input('size'));
        }

        return view('adopciones',[
            'pets' => $search->paginate(8)->withQueryString(),
            'query' => $request->all()
        ]);
    }

    public function loadAllPets()
    {
        return Pet::select('id', 'name', 'species','age', 'sex','color','size')->orderBy('id', 'desc')->paginate(8);
    }
}
