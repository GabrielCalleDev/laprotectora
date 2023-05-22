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
        
        $this->pets = $pets->shuffle();
    }

    public function render()
    {
        return view('livewire.pets');
    }
}
