<?php

namespace App\Repositories;

use App\Models\Manager;
use App\Repositories\BaseRepository;

/**
 * Class ManagerRepository
 * @package App\Repositories
 * @version January 6, 2022, 9:56 am UTC
*/

class ManagerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Manager::class;
    }
}
