<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Calendario;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class CreatePost extends Component
{
    public $open = true;

    public function render()
    {
        $calendarios = Calendario::all()->map(function ($calendario) {
            $now = Carbon::now();
            $inicio = Carbon::parse($calendario->fecha_inicio);
            $fin = Carbon::parse($calendario->fecha_fin);

            if ($now->gt($fin)) {
                $calendario->estado = 'atrasado';
            } elseif ($now->gte($inicio) && $now->lte($fin)) {
                $calendario->estado = 'pendiente';
            } else {
                $calendario->estado = 'entregado';
            }

            return $calendario;
        });

        return view('livewire.create-post', compact('calendarios'));
    }
}
