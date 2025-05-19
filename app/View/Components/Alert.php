<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public string $type;
    public string $title;
    public string $id;

    public function __construct($type = 'success', $title = 'This is a success alert', $id = 'alert_1')
    {
        $this->type = $type;
        $this->title = $title;
        $this->id = $id;
    }
    
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}
