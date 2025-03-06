<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EventCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventCategoryController extends Controller
{
    public function index()
    {
        $eventCategories = EventCategory::all();
        return $this->successResponse($eventCategories);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:event_categories,name',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return $this->badRequestResponse($validator->errors()->messages());
        }

        $eventCategory = EventCategory::create($validator->validated());

        return $this->successResponse($eventCategory);
    }

    public function show(string $id)
    {
        $eventCategory = EventCategory::find($id);

        if (!$eventCategory) {
            return $this->notFoundResponse("Event category not found");
        }

        return $this->successResponse($eventCategory);
    }

    public function update(Request $request, string $id)
    {

        $eventCategory = EventCategory::find($id);

        if (!$eventCategory) {
            return $this->notFoundResponse("Event category not found");
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return $this->badRequestResponse($validator->errors()->messages());
        }

        $eventCategory->update($validator->validated());

        return $this->successResponse($eventCategory);
    }

    public function destroy(string $id)
    {

        $eventCategory = EventCategory::find($id);

        if (!$eventCategory) {
            return $this->notFoundResponse();
        }

        $eventCategory->delete();

        return $this->successResponse([
            "message" => "Event category deleted successfully"
        ]);
    }
}
