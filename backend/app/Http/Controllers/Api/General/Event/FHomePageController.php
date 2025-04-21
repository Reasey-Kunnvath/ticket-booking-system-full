<?php

namespace App\Http\Controllers\Api\General\Event;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Services\EventService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\General\Event\FEventController;

class FHomePageController extends Controller
{
    protected $eventService;

    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    public function popularEvents(){
        return $this->eventService->mostpopular();
    }

    public function comingEvents(){
        return $this->eventService->eventcoming();
    }
}
