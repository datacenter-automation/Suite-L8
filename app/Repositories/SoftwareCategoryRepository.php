<?php

namespace App\Repositories;

use App\Models\SoftwareCategory;
use Illuminate\Database\Eloquent\Model;
use SaineshMamgain\LaravelRepositories\Exceptions\RepositoryException;
use SaineshMamgain\LaravelRepositories\Repositories\BaseRepository;

class SoftwareCategoryRepository extends BaseRepository
{

    /**
     * @var SoftwareCategory $model
     */
    protected $model;

    public function __construct(SoftwareCategory $model = null)
    {
        if (empty($model)) {
            $model = new SoftwareCategory();
        } elseif (! $model instanceof SoftwareCategory) {
            throw new RepositoryException(get_class($model) . ' is not an instance of SoftwareCategory model');
        }
        parent::__construct($model);
    }

    /**
     * @return SoftwareCategory|Model
     * @throws RepositoryException
     */
    public function create($fields)
    {
        return parent::create($fields);
    }

    /**
     * @return SoftwareCategory[]|Model[]
     * @throws RepositoryException
     */
    public function createMany($rows)
    {
        return parent::createMany($rows);
    }

    /**
     * @return SoftwareCategory|Model
     */
    public function update($fields)
    {
        return parent::update($fields);
    }

    /**
     * @return bool|null
     */
    public function destroy($permanent = false)
    {
        return parent::destroy($permanent);
    }

    /**
     * @return SoftwareCategory|Model
     */
    public function restore()
    {
        return parent::restore();
    }
}
