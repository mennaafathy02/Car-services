<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UniqueFieldTranslation implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(private $table, private $field, private $lang, private $id = null)
    {
        $this->table = $table;
        $this->field = $field;
        $this->lang = $lang;
        $this->id = $id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->id) {
            $model = DB::table($this->table)->where("id", "!=", $this->id)->whereRaw("JSON_EXTRACT($this->field, '$.$this->lang') = '$value'")->first();
        } else {
            $model = DB::table($this->table)->whereRaw("JSON_EXTRACT($this->field, '$.$this->lang') = '$value'")->first();
        }

        if ($model) {
            return false;
        }
        return true;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __("messages.filed unique");
    }
}
