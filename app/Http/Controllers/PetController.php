<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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

    public function requestInformation(Pet $pet)
    {
        return view('informacion',[
            'pet' => $pet
        ]);
    }

    public function requestAdoption(Pet $pet)
    {
        return view('adopcion',[
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

    public function formatAge($pets){
        foreach ($pets as $pet) {
            $actualDate = Carbon::now();
            
            // Convert to Carbon instance
            $petBirthday = Carbon::parse($pet->age);
            
            // Calculate the difference
            $diff = $petBirthday->diff($actualDate);
            
            // Access the values
            $years  = $diff->y;
            $months = $diff->m;

            if ($years == 1 && $months == 1) {
                $pet->age = "$years año, $months mes";
            } elseif ($years == 1 && $months == 0) {
                $pet->age = "$years año";
            } elseif ($years == 0 && $months == 1) {
                $pet->age = "$months mes";
            } elseif ($years == 0 && $months == 0) {
                $pet->age = "1 mes";
            } elseif ($years == 1 && $months > 1) {
                $pet->age = "$years año, $months meses";
            } elseif ($years > 1 && $months == 1) {
                $pet->age = "$years años, $months mes";
            } elseif ($years > 1 && $months == 0) {
                $pet->age = "$years años";
            } elseif ($years == 0 && $months > 1) {
                $pet->age = "$months meses";
            } else {
                $pet->age = "$years años, $months meses";
            }           
        }

        return $pets;
    }

    public function loadAllPets()
    {
        return $this->formatAge(Pet::select('id', 'name', 'species','age', 'sex','color','size')->orderBy('id', 'desc')->paginate(8));
    }
}
