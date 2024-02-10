<?php

namespace App\Models;

use App\Traits\MediaTrait;
use App\Traits\TranslateTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Translatable\HasTranslations;

class Section extends Model implements HasMedia
{
    use HasFactory, MediaTrait, HasTranslations, TranslateTrait;

    public $translatable = ['name'];
    protected $fillable = ['name', 'status', 'section_id'];

    protected $table = 'sections';
    // protected $with = ['media', 'children'];

    // relationships
    public function parent()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function children()
    {
        return $this->hasMany(Section::class, 'section_id');
    }

    public function supervisors()
    {
        return $this->belongsToMany(Supervisor::class, 'section_supervisor');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function rates()
    {
        return $this->hasMany(Rating::class);
    }

    public function hasChildren()
    {
        return $this->children()->count() > 0 ||
        $this->supervisors()->count() > 0 ||
        $this->offers()->count() > 0 ||
        $this->orders()->count() > 0 ||
        $this->rates()->count() > 0;
    }

}
