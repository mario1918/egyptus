<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TourguideTrip
 *
 * @property $id
 * @property $tourguide_id
 * @property $title
 * @property $description
 * @property $activities
 * @property $hours
 * @property $fair
 * @property $created_at
 * @property $updated_at
 *
 * @property Tourguide $tourguide
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TourguideTrip extends Model
{
    
    static $rules = [
		'title' => 'required',
		'description' => 'required',
		'activities' => 'required',
		'hours' => 'required',
		'fair' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tourguide_id','title','description','activities','hours','fair'];
    protected $casts = [
      'activities' => 'array'
  ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tourguide()
    {
        return $this->hasOne('App\Models\Tourguide', 'id', 'tourguide_id');
    }
    
    public function activities()
    {
      $activities = array();
      foreach($this->activities as $actId)
      {
        $activity = Activity::findOrFail($actId);
        array_push($activities,$activity);
      }
      return $activities;

    }
    

}
