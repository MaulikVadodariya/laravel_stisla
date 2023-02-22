<?php

namespace App\Repositories;

use App\Models\Company;
use App\Repositories\BaseRepository;
use Intervention\Image\Facades\Image;

class CompanyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'website'
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
        return Company::class;
    }

    public function storeCompany($input)
    {
        $company = Company::create($input);

        if (isset($input['image']) && ! empty($input['image'])) {
            $image = $input['image'];
            $company->addMedia($image)->toMediaCollection(Company::LOGO_PATH,
                config('app.media_disc'));
        }  

        return true;
    }
    
    public function updateCompany($input, $company)
    {
        $company->update($input);
        
        if (isset($input['image']) && ! empty($input['image'])) {
            $company->clearMediaCollection(Company::LOGO_PATH);
            $company->addMedia($input['image'])->toMediaCollection(Company::LOGO_PATH,
                config('app.media_disc'));
        }

        return true;
    }
}
