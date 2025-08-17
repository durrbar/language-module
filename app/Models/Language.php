<?php

namespace Modules\Language\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasUuids;
    
    protected $table = 'languages';

    public $guarded = [];
}
