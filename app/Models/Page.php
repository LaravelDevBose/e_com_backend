<?php

namespace App\Models;

use App\Traits\ManipulateBy;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use ManipulateBy;

    const MENU_SHOW_IN = [
        'Header'=>1,
        'Footer'=>2,
        'Both'=>3,
    ];

    protected $table = 'pages';

    protected $primaryKey = 'page_id';

    protected $fillable = [
        'page_title',
        'menu_title',
        'page_slug',
        'show_in',
        'menu_position',
        'body_content',
        'other_content',
        'attachment_id',
        'page_status',
    ];



    public function scopeIsActive($query){
        return $query->where('page_status', config('app.active'));
    }

    public function scopeNotShowIn($query, $notShowIn){
        return $query->where('show_in','!=', $notShowIn);
    }

    public function scopeNotDelete($query){
        return $query->where('page_status', '!=', config('app.delete'));
    }

    public function scopeBySearch($query, $request){
        return $query;
    }

    public function attachment(){
        return $this->hasOne(Attachment::class,'attachment_id', 'attachment_id');
    }

}
