<?php

namespace App\View\Components;

use App\Models\Brand as ModelsBrand;
use Illuminate\View\Component;

class Brand extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.brand' , [
            'brands' => ModelsBrand::all()
        ]);

    }
}
