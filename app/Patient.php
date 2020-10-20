<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'name','password','birth_date', 'diabetes_type', 'injury_year', 'phone', 'email', 'weight', 'height', 'state','chronic_diseases','Allergy_medicine','surgery', 'doctor_id'
    ];
    public static function validationRules()
    {
        return [
           // 'name' => 'required|string|max:55',
           'name' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'birth_date' => 'required|date',
            'gender'=> 'required',
            'diabetes_type' => 'required|numeric',
            'injury_year' => 'required|numeric',
            'phone' => 'required|numeric|unique:patients,phone',
            'email' => 'required|email|unique:patients,email',
            'state' => 'required',
            'chronic_diseases'=>'required',
            'Allergy_medicine' => 'required',
            'surgery' => 'required',
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
