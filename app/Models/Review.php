<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Review
 *
 * @property $id
 * @property $tourguide_id
 * @property $review
 * @property $reviewer

 * @property Tourguide $tourguide
 * @property User $reviewer
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Review extends Model
{
    use HasFactory;
    protected $fillable = ['review','tourguide_id','reviewer'];

    public function reviewerName()
    {
        return $this->belongsTo('App\Models\User', 'reviewer', 'id');
    }
}
