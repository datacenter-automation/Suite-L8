<?php

namespace App\Repositories;

use App\Models\SoftwareInstalled;
use Illuminate\Database\Eloquent\Model;
use SaineshMamgain\LaravelRepositories\Exceptions\RepositoryException;
use SaineshMamgain\LaravelRepositories\Repositories\BaseRepository;

class SoftwareInstalledRepository extends BaseRepository
{

    /**
     * @var SoftwareInstalled $model
     */
    protected $model;

    public function __construct(SoftwareInstalled $model = null)
    {
        if (empty($model)) {
            $model = new SoftwareInstalled();
        } elseif (! $model instanceof SoftwareInstalled) {
            throw new RepositoryException(get_class($model) . ' is not an instance of SoftwareInstalled model');
        }
        parent::__construct($model);
    }

    /**
     * @return SoftwareInstalled|Model
     * @throws RepositoryException
     */
    public function create($fields)
    {
        return parent::create($fields);
    }

    /**
     * @return SoftwareInstalled[]|Model[]
     * @throws RepositoryException
     */
    public function createMany($rows)
    {
        return parent::createMany($rows);
    }

    /**
     * @return SoftwareInstalled|Model
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
     * @return SoftwareInstalled|Model
     */
    public function restore()
    {
        return parent::restore();
    }
}
