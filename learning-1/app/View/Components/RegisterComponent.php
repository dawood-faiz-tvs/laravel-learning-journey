<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RegisterComponent extends Component
{
    public $type = "";
    public $name = "";
    public $label = "";
    public $old = "";
    public $info = "";
    public $val = "";
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $name, $label, $old=null, $info, $val=null)
    {
        $this->type = $type;
        $this->name = $name;
        $this->label = $label;
        $this->old = $old;
        $this->info = $info;
        $this->val = $val;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.register-component');
    }
}
