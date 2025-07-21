<?php

namespace Modules\Language\Repositories;

use Modules\Core\Repositories\BaseRepository;
use Modules\Language\Models\Language;

class LanguageRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return Language::class;
    }
}
