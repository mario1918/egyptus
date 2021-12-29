<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Booking
 *
 * @property $id
 * @property $tourist_id
 * @property $activities
 * @property $persons
 * @property $hotel
 * @property $totalPrice
 * @property $notes
 * @property $created_at
 * @property $updated_at
 *
 * @property Tourguide $tourguide
 * @property Tourist $tourist
 * @property Trip $trip
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Booking extends Model
{

    static $rules = [
		'activities' => 'required',
		'persons' => 'required',
		'hotel' => 'required',
		'totalPrice' => 'required',
		'notes' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tourist_id','trips','persons','hotel','totalPrice','notes'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tourist()
    {
        return $this->hasOne('App\Models\Tourist', 'id', 'tourist_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
//    public function trip()
//    {
//        return $this->hasMany('App\Models\Trip', 'id', 'trips');
//    }


}
