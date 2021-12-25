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
 * @property $priceRate
 * @property $video
 * @property $cities
 * @property $personalRate
 * @property $created_at
 * @property $updated_at
 *
 * @property Review[] $reviews
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
		'priceRate' => 'required',
		'cities' => 'required',
		'personalRate' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','profileImg','languages','bio','activities','priceRate','video','cities','personalRate'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany('App\Models\Review', 'tourguide_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }



}
