<?php

namespace App\Http\Controllers;

abstract class Controller
{
    // mock data sen
    public $events = [
        [
            'title' => 'Wonderful Festival',
            'image' => 'frontend/assets/images/ticket-01.jpg',
            'price' => 25,
            'tickets_left' => 150,
            'time' => 'Thursday: 05:00 PM to 10:00 PM',
            'location' => '908 Copacabana Beach, Rio de Janeiro',
            'link' => 'ticket-details.html',
        ],
        [
            'title' => 'Golden Festival',
            'image' => 'frontend/assets/images/ticket-02.jpg',
            'price' => 45,
            'tickets_left' => 200,
            'time' => 'Sunday: 06:00 PM to 09:00 PM',
            'location' => '789 Copacabana Beach, Rio de Janeiro',
            'link' => 'ticket-details.html',
        ],
        [
            'title' => 'Summer Music Festival',
            'image' => 'frontend/assets/images/ticket-03.jpg',
            'price' => 35,
            'tickets_left' => 175,
            'time' => 'Saturday: 02:00 PM to 11:00 PM',
            'location' => '123 Venice Beach, Los Angeles',
            'link' => 'ticket-details.html',
        ],
        [
            'title' => 'Rock Concert Night',
            'image' => 'frontend/assets/images/ticket-04.jpg',
            'price' => 55,
            'tickets_left' => 100,
            'time' => 'Friday: 07:00 PM to 11:00 PM',
            'location' => '456 Times Square, New York',
            'link' => 'ticket-details.html',
        ],

    ];
}
