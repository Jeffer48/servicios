<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class input extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct($label,$name,$text,$type,$id,$size,$placeh)
    {
        $this->label = $label;
        $this->name = $name;
        $this->type = $type;
        $this->text = $text;
        $this->id = $id;
        $this->size = $size;
        $this->placeh =$placeh;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input',[
            'label' => $this->label,
            'name' => $this->name,
            'type' => $this->type,
            'text' => $this->text,
            'id' => $this->id,
            'size' => $this->size,
            'placeh' => $this->placeh
        ]);
    }
}
