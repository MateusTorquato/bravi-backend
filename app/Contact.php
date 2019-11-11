<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'last_name',
        'phone',
        'whatsapp',
        'email',
        'person_id',
    ];

    public static $rules = [
        'name' => 'required',
        'email' => 'nullable|email',
        'person_id' => 'required|exists:people,id',
    ];

    public function person()
    {
        return $this->belongsTo('App\Person');
    }
}
