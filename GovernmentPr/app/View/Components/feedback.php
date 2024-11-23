<?php

namespace App\View\Components;

use Illuminate\View\Component;

class feedback extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $alertType, $msgTitle, $msg;

    public function __construct($alertType, $msgTitle, $msg)
    {
        //
        $this->alertType = $alertType;
        $this->msgTitle = $msgTitle;
        $this->$msg = $msg;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.feedback');
    }
}
