<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EventListing extends Component
{

    public $events;
    public $title;
    public function __construct($events, $title)
    {
        $this->events = $events;
        $this->title = $title;
    }

    public function render(): View|Closure|string
    {
        return view('components.event-listing');
    }
}
