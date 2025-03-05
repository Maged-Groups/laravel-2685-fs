<?php

namespace App\View\Components;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PriceLabel extends Component
{

    public $price;
    public $label;
    public $bg;

    /**
     * Create a new component instance.
     */
    public function __construct(int $price = 0)
    {

        $this->price = $price;
        $label = '';
        $bg = '';

        if ($price >= 100000) {
            $label = 'Platinum';
            $bg = 'bg-yellow-400';
        } elseif ($price >= 50000) {
            $label = 'Gold';
            $bg = 'bg-yellow-600';
        } elseif ($price >= 10000) {
            $label = 'Sliver';
            $bg = 'bg-gray-400';
        } elseif ($price >= 1000) {
            $label = 'Pronze';
            $bg = 'bg-purple-600';
        } elseif ($price >= 500) {
            $label = 'Chrome';
            $bg = 'bg-pink-400';
        } else {
            $label = 'Zinc';
            $bg = 'bg-zinc-600';
        }

        $this->label = $label;
        $this->bg = $bg;

    }

    public function shouldRender()
    {
        $date = Carbon::now();

        $current_hour = $date->hour;

        // dd($current_hour);

        // dd($date->day);
        // dd($date->second);
        // dd($date->minute);

        // The component will be rendered only if:
            // Price greater than 100
            // Time is between 8 AP and 4 PM (Working hours)
        return $this->price > 100 && ($current_hour >= 8 && $current_hour <= 20);
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.price-label');
    }
}
