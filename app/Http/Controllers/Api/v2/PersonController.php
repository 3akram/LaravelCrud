<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Http\Resources\v2\PersonResource;
use App\Http\Resources\v2\PersonResourceCollection;
use App\Models\Person;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * @return PersonResourceCollection
     */
    public function index(): PersonResourceCollection
    {
        return new PersonResourceCollection(Person::paginate());
    }

    /**
     * @param Person $person
     * @return PersonResource
     */
    public function show(Person $person): PersonResource
    {
        return new PersonResource($person);
    }

    /**
     * @param Person $person
     * @param Request $request
     * @return PersonResource
     */
    public function update(Person $person, Request $request): PersonResource
    {
        $person->update($request->all());
        return new PersonResource($person);
    }

    /**
     * @param Request $request
     * @return PersonResource
     */
    public function store(Request $request): PersonResource
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'phone'      => 'required',
            'city'       => 'required',
            'email'      => 'required'
        ]);

        $person = Person::create($request->all());
        return new PersonResource($person);
    }

    /**
     * @param Person $person
     * @return JsonResponse
     */
    public function destroy(Person $person)
    {

        try {
            $person->delete();
            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false], 404);
        }

    }
}
