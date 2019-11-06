<?php

namespace App\Repositories;

use DB;
use App\Contact;
use Illuminate\Support\Facades\Validator;

class ContactRepository
{
    public function insertOrUpdate($data, $id = null) : array
    {
        try {
            DB::beginTransaction();
            $contact = isset($id) ? Contact::find($id) : new Contact();
            $contact->fill($data);

            $validator = Validator::make($data, $contact::$rules);
            if ($validator->fails()) {
                DB::rollback();
                return ['valid' => false, 'message' => implode($validator->messages()->all())];
            }

            $contact->save();
            DB::commit();

            return ['valid' => true, 'message' => 'ok', 'contact' => $contact];
        } catch (\Exception $e) {
            DB::rollback();
            return ['valid' => false, 'message' => $e->getMessage()];
        }
    }
}
