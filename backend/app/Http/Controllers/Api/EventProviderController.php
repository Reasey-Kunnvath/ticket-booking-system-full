<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class EventProviderController extends Controller
{

    private function allow_update($request, $id)
    {

        if ($request->user()->role_id === config('roles.admin')) {
            return true;
        }

        if ($request->user()->id === $id) {
            return true;
        }

        return false;
    }

    public function index()
    {
        $eventProviders = User::where('role_id', config('roles.event-provider'))->get();
        return $this->successResponse($eventProviders);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return $this->badRequestResponse($validator->errors()->messages());
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => config('roles.event-provider'),
        ]);

        return $this->successResponse($user);
    }

    public function show($id)
    {
        $user = User::find($id);


        if (!$user) {
            return $this->notFoundResponse('Event provider not found');
        }

        return $this->successResponse($user);
    }

    public function update(Request $request, $id)
    {

        if (!$this->allow_update($request, $id)) {
            return $this->forbiddenResponse("You are not allowed to update resource");
        }

        $user = User::find($id);



        if (!$user) {
            return $this->notFoundResponse('Event provider not found');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8',
        ]);

        if ($validator->fails()) {
            return $this->badRequestResponse($validator->errors()->messages());
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return $this->successResponse($user);
    }

    public function destroy($id)
    {

        $user = User::find($id);

        if (!$user) {
            return $this->notFoundResponse('Event provider not found');
        }

        $user->delete();

        return $this->successResponse(null, 'Event provider deleted successfully');
    }
}
