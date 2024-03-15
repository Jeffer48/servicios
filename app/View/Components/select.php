<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class select extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct($type,$text,$options,$id)
    {
        $this->type = $type;
        $this->options = $options;
        $this->text = $text;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select',[
            'label' => $this->type,
            'options' => $this->options,
            'text' => $this->text,
            'id' => $this->id
        ]);
    }
}
