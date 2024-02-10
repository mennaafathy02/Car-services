<?php

namespace App\Models;

use App\Traits\MediaTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Translatable\HasTranslations;

class Service extends Model implements HasMedia
{
    use HasFactory, MediaTrait, HasTranslations;

    protected $fillable = [
        'title',
        'description',
    ];
    public $translatable = ['title', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookings()
    {
        return $this->belongsToMany(User::class, 'bookings', 'service_id', 'user_id');
    }

    // get title en attribute

    public function getTitleEnAttribute()
    {
        return $this->getTranslation('title', 'en');
    }

    // get title ar attribute

    public function getTitleArAttribute()
    {
        return $this->getTranslation('title', 'ar');
    }

    // get description en attribute

    public function getDescriptionEnAttribute()
    {
        return $this->getTranslation('description', 'en');
    }

    // get description ar attribute

    public function getDescriptionArAttribute()
    {
        return $this->getTranslation('description', 'ar');
    }

}
