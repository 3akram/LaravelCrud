<?php

namespace App\Http\Controllers;

use App\Http\Resources\PersonResource;
use App\Http\Resources\PersonResourceCollection;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    /**
     * @param Person $person
     * @return PersonResource
     */
    public function show(Person $person): PersonResource
    {
        return new PersonResource($person);
    }

    /**
     * @return PersonResourceCollection
     */
    public function index(): PersonResourceCollection
    {
        return new PersonResourceCollection(Person::paginate());
    }

    /**
     * Store Person in the Database
     * @param Request $request
     * @return PersonResource
     */
    public function store(Request $request): PersonResource
    {
        $request->validate([
            'first_name'  => 'required',
            'last_name'   => 'required',
            'city'        => 'required',
            'email'       => 'required',
            'phone'       => 'required'
        ]);

        $person = Person::create($request->all());

        return new PersonResource($person);
    }

    /**
     * Update Person in the Database
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
     * Delete Person from the database -Hard Delete-
     * @param Person $person
     * @return JsonResponse
     */
    public function destroy(Person $person)
    {
        try {
            $person->delete();
            return response()->json(["success" => true], 200);
        } catch (Exception $e) {
            return response()->json(["success" => false], 404);
        }
    }
}
