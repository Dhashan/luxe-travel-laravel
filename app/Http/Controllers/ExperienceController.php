<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Experience;
use App\Http\Resources\ExperienceResource;

class ExperienceController extends Controller
{
    public function index() { return ExperienceResource::collection(Experience::all()); }

    public function store(Request $request) {
        $data = $request->validate([
            'destination_id' => 'required|exists:destinations,id', 
            'name' => 'required|string', 
            'category' => 'required|string',
            'price' => 'required|numeric'
            ]);
        return new ExperienceResource(Experience::create($data));
    }

    public function show(Experience $experience) { return new ExperienceResource($experience); }

    public function update(Request $request, Experience $experience) { // PUT
        $experience->update($request->all());
        return new ExperienceResource($experience);
    }

    public function destroy(Experience $experience) { // DELETE
        $experience->delete();
        return response()->json(['message' => 'Experience deleted']);
    }
}
