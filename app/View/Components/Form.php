<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    public $action_link, $send_method;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($actionLink = '#', $sendMethod = 'GET')
    {
        $this->action_link = $actionLink;
        $this->send_method = $sendMethod;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form');
    }
}
