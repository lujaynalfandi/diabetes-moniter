<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'name','password','birth_date', 'diabetes_type', 'injury_year', 'phone', 'email', 'weight', 'height', 'state', 'doctor_id'
    ];
    public static function validationRules()
    {
        return [
            'name' => 'required|string',
            'birth_date' => 'required|date',
            'gender'=> 'required',
            'diabetes_type' => 'required|numeric',
            'injury_year' => 'required|numeric',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'state' => 'required',
        ];
    }
    public function doctor(){
        return $this->belongsTo('App\User');
    }
    public function analysis(){
        return $this->hasMany('App\Analysis');
    }
    public function advice(){
        return $this->hasMany('App\Advice');
    }


 
}
