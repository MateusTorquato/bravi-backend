<?php

namespace App\Repositories;

use DB;
use App\Person;
use Illuminate\Support\Facades\Validator;

class PersonRepository
{
    public function insertOrUpdate($data, $id = null) : array
    {
        try {
            DB::beginTransaction();
            $person = isset($id) ? Person::find($id) : new Person();
            $person->fill($data);

            $validator = Validator::make($data, $person::$rules);
            if ($validator->fails()) {
                DB::rollback();
                return ['valid' => false, 'message' => implode($validator->messages()->all())];
            }

            $person->save();
            DB::commit();

            return ['valid' => true, 'message' => 'ok', 'person' => $person];
        } catch (\Exception $e) {
            DB::rollback();
            return ['valid' => false, 'message' => $e->getMessage()];
        }
    }
}
