<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait TranslateTrait
{

    public function name(): Attribute
    {
        return Attribute::make(
            get:fn($value) => $this->getTranslation('name', app()->getLocale()),
        );
    }
    protected function nameEn(): Attribute
    {
        return Attribute::make(
            get:fn($value) => $this->getTranslation('name', 'en'),
        );
    }

    protected function nameAr(): Attribute
    {
        return Attribute::make(
            get:fn($value) => $this->getTranslation('name', 'ar'),
        );
    }



}
