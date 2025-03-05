<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class AlertComponent extends Component
{

    public $text;


    /**
     * Create a new component instance.
     */
    public function __construct(string $text = 'Default')
    {
        $this->text = Str::upper($text);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert-component');
    }
}
