<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use SaineshMamgain\LaravelRepositories\Exceptions\RepositoryException;
use SaineshMamgain\LaravelRepositories\Repositories\BaseRepository;

class UserRepository extends BaseRepository
{

    /**
     * @var User $model
     */
    protected $model;

    public function __construct(User $model = null)
    {
        if (empty($model)) {
            $model = new User();
        } elseif (! $model instanceof User) {
            throw new RepositoryException(get_class($model) . ' is not an instance of User model');
        }
        parent::__construct($model);
    }

    /**
     * @return User|Model
     * @throws RepositoryException
     */
    public function create($fields)
    {
        return parent::create($fields);
    }

    /**
     * @return User[]|Model[]
     * @throws RepositoryException
     */
    public function createMany($rows)
    {
        return parent::createMany($rows);
    }

    /**
     * @return User|Model
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
     * @return User|Model
     */
    public function restore()
    {
        return parent::restore();
    }
}
