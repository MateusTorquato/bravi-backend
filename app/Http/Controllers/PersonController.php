<?php

namespace App\Http\Controllers;

use App\Person;
use App\Repositories\PersonRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request, PersonRepository $reposity) : JsonResponse
    {
        $query = Person::query();

        if (!empty($request->id)) {
            $query->where('id', $request->id);
        }

        $people = $query->with('contacts')->get();

        return response()->json($people);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, PersonRepository $reposity) : JsonResponse
    {
        $return = $reposity->insertOrUpdate($request->all());
        return response()->json($return, $return['valid'] ? 201 : 400);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id, PersonRepository $reposity) : JsonResponse
    {
        $return = $reposity->insertOrUpdate($request->all(), $id);
        return response()->json($return, $return['valid'] ? 200 : 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id) : JsonResponse
    {
        $person = Person::find($id);
        if (!$person) {
            return response()->json(['valid' => false, 'message' => "Person doesn't exist"], 400);
        }

        if ($person->contacts()->exists()) {
            return response()->json(['valid' => false, 'message' => 'Unable to delete person who already have contacts'], 400);
        }

        $person->delete();

        return response()->json(['valid' => true, 'message' => 'ok'], 200);
    }
}
