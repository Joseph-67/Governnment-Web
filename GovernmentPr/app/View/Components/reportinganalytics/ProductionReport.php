<?php

namespace App\View\Components\reportinganalytics;

use Illuminate\View\Component;

class ProductionReport extends Component
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
        return view('components.reportinganalytics.production-report');
    }
}
