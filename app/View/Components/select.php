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
    public function __construct($label,$name,$text,$options,$id,$size)
    {
        $this->label = $label;
        $this->name = $name;
        $this->options = $options;
        $this->text = $text;
        $this->id = $id;
        $this->size = $size;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select',[
            'label' => $this->label,
            'name' => $this->name,
            'options' => $this->options,
            'text' => $this->text,
            'id' => $this->id,
            'size' => $this->size
        ]);
    }
}
