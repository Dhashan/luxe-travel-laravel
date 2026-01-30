<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Destination;
use App\Http\Resources\DestinationResource;

class DestinationController extends Controller
{
    public function index() { return DestinationResource::collection(Destination::with('experiences')->get()); }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required', 
            'description' => 'required', 
            'base_price' => 'required'
            ]);
        return new DestinationResource(Destination::create($data));
    }

    public function show(Destination $destination) { return new DestinationResource($destination->load('experiences')); }

    public function update(Request $request, Destination $destination) { // PUT
        $destination->update($request->all());
        return new DestinationResource($destination);
    }

    public function destroy(Destination $destination) { // DELETE
        $destination->delete();
        return response()->json(['message' => 'Destination deleted']);
    }
}
