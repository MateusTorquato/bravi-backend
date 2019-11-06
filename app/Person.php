<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'name',
        'last_name',
    ];

    public static $rules = [
        'name' => 'required',
    ];

    public function contacts()
    {
        return $this->hasMany('App\Contact');
    }
}
