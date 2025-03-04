<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    // pel dae frontend request mor endpoint muy na
    // for example: method: GET on /api/examples
    // jg ah ng vea mor ror "index" function
    // if knong frontend request method: PUT on /api/examples/{id}
    // jg ah ng vea more ror "update" function
    // and show on
    public function index()
    {
        // method: GET
        // /api/example
    }

    public function store()
    {
        // method: POST
        // /api/example
    }

    public function show()
    {
        // method: GET
        // /api/example/{id}
    }

    public function update()
    {
        // method: PUT/PATCH
        // /api/example/{id}
    }

    public function destroy()
    {
        // method: DELETE
        // /api/example/{id}
    }

}