<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageSection extends Model
{
    const SectionType = [
        'Tabbed'=>1,
        'Carousel'=>2,
        'Grid'=>3,
    ];

    protected $table = 'homepage_sections';

    protected $primaryKey = 'section_id';

    protected $fillable = [
        'section_title',
        'attachment_id',
        'section_type',
        'section_position',
        'section_status',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $appends = [
        'type_label',
    ];

    public function getTypeLabelAttribute()
    {
        $types = Self::sectionTypeFlip();
        return $types[$this->attributes['section_type']];
    }

    public static function sectionTypeFlip()
    {
        return array_flip(Self::SectionType);
    }

    public static function sectionTypeSelect()
    {
        $type = [];
        foreach (Self::sectionTypeFlip() as $key=> $value){
            array_push($type, [
                'id'=>$key,
                'text'=>$value
            ]);
        }
        return $type;
    }

    public function scopeIsActive($query){
        return $query->where('section_status', config('app.active'));
    }

    public function scopeNotDelete($query)
    {
        return $query->where('section_status', '!=', config('app.delete'));
    }

    public function sectionCategories()
    {
        return $this->hasMany(SectionCategory::class, 'section_id', 'section_id');
    }

    public function sectionProducts()
    {
        return $this->hasMany(SectionProduct::class, 'section_id', 'section_id');
    }

    public function attachment(){
        return $this->hasOne(Attachment::class, 'attachment_id', 'attachment_id');
    }
}
