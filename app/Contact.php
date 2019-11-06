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
        'email' => 'required',
    ];

    public function person()
    {
        return $this->belongsTo('App\Person');
    }
}
