<?php

namespace App\Models;

use App\Traits\TranslateTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    use HasFactory, HasTranslations, TranslateTrait;
    public $translatable = ['name'];
    protected $fillable = ['name', 'slug', 'value'];
    protected $table = 'settings';

}
