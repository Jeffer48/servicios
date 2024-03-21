<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class input_disabled extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct($label,$name,$value,$text,$type,$id,$size)
    {
        $this->label = $label;
        $this->name = $name;
        $this->value = $value;
        $this->type = $type;
        $this->text = $text;
        $this->id = $id;
        $this->size = $size;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-disabled',[
            'label' => $this->label,
            'name' => $this->name,
            'value' => $this->value,
            'type' => $this->type,
            'text' => $this->text,
            'id' => $this->id,
            'size' => $this->size
        ]);
    }
}
