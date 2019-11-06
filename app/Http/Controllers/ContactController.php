<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Repositories\ContactRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request) : JsonResponse
    {
        $query = Contact::query();
        if (!empty($request->id)) {
            $query->where('id', $request->id);
        }

        if (!empty($request->person_id)) {
            $query->where('person_id', $request->person_id);
        }

        $contact = $query->get();

        return response()->json($contact);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, ContactRepository $reposity) : JsonResponse
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
    public function update(Request $request, $id, ContactRepository $reposity) : JsonResponse
    {
        $return = $reposity->insertOrUpdate($request->all(), $id);
        return response()->json($return, $return['valid'] ? 201 : 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id) : JsonResponse
    {
        $contact = Contact::find($id);
        if (!$contact) {
            return response()->json(['valid' => false, 'message' => "Contact doesn't exist"], 400);
        }

        $contact->delete();
        return response()->json(['valid' => true, 'message' => 'ok'], 200);
    }
}
