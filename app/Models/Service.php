<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'type_id',
        'is_active'
    ];

    public function category(){ return $this->belongsTo('App\Models\ListData', 'category_id', 'id');}
    public function type(){ return $this->belongsTo('App\Models\ListData', 'type_id', 'id');} 

    protected static function booted()
    {
        static::creating(function ($model) {
            if (\Auth::check()) {
                $user = \Auth::user();
                $model->user_id = $user->id;
            }else{
                abort(403, 'No user found');
            }
        });
    }
}
