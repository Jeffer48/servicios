<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class lista extends Component
{
    public function __construct($idC,$idS,$labelP,$labelS,$classP,$classS)
    {
        $this->idC = $idC;
        $this->idS = $idS;
        $this->labelP = $labelP;
        $this->labelS = $labelS;
        $this->classP = $classP;
        $this->classS = $classS;
    }

    public function render(): View|Closure|string
    {
        return view('components.lista',[
            'idC' => $this->idC,
            'idS' => $this->idS,
            'labelP' => $this->labelP,
            'labelS' => $this->labelS,
            'classP' => $this->classP,
            'classS' => $this->classS
        ]);
    }
}
