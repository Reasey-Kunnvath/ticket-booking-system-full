<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Organizaton;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrganizationController extends Controller
{

    public function index()
    {
        $organizations = Organizaton::all();
        return $this->successResponse($organizations);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:organization,name',
            'type' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return $this->badRequestResponse($validator->errors());
        }

        $organization = Organizaton::create($validator->validated());
        return  $this->successResponse($organization);
    }


    public function show(string $id)
    {
        $organization = Organizaton::find($id);
        if (!$organization) {
            return $this->notFoundResponse();
        }
        return $this->successResponse($organization);
    }


    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return $this->badRequestResponse($validator->errors());
        }

        $organization = Organizaton::find($id);
        if (!$organization) {
            return $this->notFoundResponse();
        }
        $organization->update($validator->validated());
        return $this->successResponse($organization);
    }

    public function destroy(string $id)
    {
        $organization = Organizaton::find($id);
        if (!$organization) {
            return $this->notFoundResponse();
        }
        $organization->delete();
        return $this->successResponse($organization);
    }
}
