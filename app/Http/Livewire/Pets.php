<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use Carbon\Carbon;
use Livewire\Component;

class Pets extends Component
{
    public $pets;

    public function mount()
    {
        $this->load8RandomPets();
    }

    public function load8RandomPets()
    {
        $dogs = Pet::select('id', 'name', 'species','age', 'sex','color','size')
            ->where('species', 'Perro')
            ->inRandomOrder()
            ->take(4)
            ->get();

        $cats = Pet::select('id', 'name', 'species','age', 'sex','color','size')
            ->where('species', 'Gato')
            ->inRandomOrder()
            ->take(4)
            ->get();

        $pets = $dogs->merge($cats);

        foreach ($pets as $pet) {
            $fechaActual = Carbon::now();
            
            // Convierte la fecha de nacimiento del animal en un objeto Carbon
            $fechaNacimientoPet = Carbon::parse($pet->age);
            
            // Calcula la diferencia de años, meses y días entre la fecha dada y la fecha actual
            $diff = $fechaNacimientoPet->diff($fechaActual);
            
            // Acceder a los componentes de la diferencia (años, meses)
            $años = $diff->y;
            $meses = $diff->m;

            if ($años == 1 && $meses == 1) {
                $pet->age = "$años año, $meses mes";
            } elseif ($años == 1 && $meses == 0) {
                $pet->age = "$años año";
            } elseif ($años == 0 && $meses == 1) {
                $pet->age = "$meses mes";
            } elseif ($años == 0 && $meses == 0) {
                $pet->age = "1 mes";
            } elseif ($años == 1 && $meses > 1) {
                $pet->age = "$años año, $meses meses";
            } elseif ($años > 1 && $meses == 1) {
                $pet->age = "$años años, $meses mes";
            } elseif ($años > 1 && $meses == 0) {
                $pet->age = "$años años";
            } elseif ($años == 0 && $meses > 1) {
                $pet->age = "$meses meses";
            } else {
                $pet->age = "$años años, $meses meses";
            }           
        }
        
        $this->pets = $pets->shuffle();
    }

    public function render()
    {
        return view('livewire.pets');
    }
}
