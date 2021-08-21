<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tourguide
 *
 * @property $id
 * @property $user_id
 * @property $profileImg
 * @property $languages
 * @property $bio
 * @property $activities
 * @property $rate
 * @property $video
 * @property $activity_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Activity $activity
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tourguide extends Model
{
    
    static $rules = [
		'profileImg' => 'required',
		'languages' => 'required',
		'bio' => 'required',
		'activities' => 'required',
		'rate' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','profileImg','languages','bio','activities','rate','video','activity_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function activity()
    {
        return $this->hasOne('App\Models\Activity', 'id', 'activity_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
