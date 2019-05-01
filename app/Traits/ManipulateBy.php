<?php


namespace App\Traits;


use Illuminate\Support\Facades\Auth;

trait ManipulateBy
{
    public static function bootManipulateBy()
    {
        static::saving(function ($model) {
            $model->created_by = Auth::id();
        });

        static::creating(function($model){
            $model->created_by = Auth::id();
        });

        static::created(function($model){
            $model->created_by = Auth::id();
        });

        static::updating(function($model){
            $model->updated_by = Auth::id();
        });

        static::updated(function($model){
            $model->updated_by = Auth::id();
        });

        static::deleting(function($model){
            $model->deleted_by = Auth::id();
        });

        static::deleted(function($model){
            $model->deleted_by = Auth::id();
        });
    }
}
