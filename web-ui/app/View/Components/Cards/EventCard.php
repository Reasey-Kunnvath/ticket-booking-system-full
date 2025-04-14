<?php

namespace App\View\Components\Cards;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EventCard extends Component
{
    public array $event;

    public function __construct(array $event)
    {

        $this->event = $event;

    }

    public function render(): View|Closure|string
    {
        return view('components.cards.event-card');
    }
}
