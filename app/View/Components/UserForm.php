<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserForm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $user = null,
        public $roles = [],
        public $id = 'user-form'
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user-form');
    }
}
