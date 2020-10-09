<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advice extends Model
{
    protected $fillable = [
       'user_id','patient_id', 'prescription','review_Date'
    ];

    public static function validationRules()
    {
        return [
            'prescription' => 'required|string',
            'review_Date' => 'required|date',
        ];
    }
    public function doctor(){
        return $this->belongsTo('App\User','user_id');
    }


    public function patient(){
        return $this->belongsTo('App\Patient');
    }

}
 