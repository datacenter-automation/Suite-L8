<?php

namespace App\Repositories;

use App\Models\TicketWorker;
use Illuminate\Database\Eloquent\Model;
use SaineshMamgain\LaravelRepositories\Exceptions\RepositoryException;
use SaineshMamgain\LaravelRepositories\Repositories\BaseRepository;

class TicketWorkerRepository extends BaseRepository
{

    /**
     * @var TicketWorker $model
     */
    protected $model;

    public function __construct(TicketWorker $model = null)
    {
        if (empty($model)) {
            $model = new TicketWorker();
        } elseif (! $model instanceof TicketWorker) {
            throw new RepositoryException(get_class($model) . ' is not an instance of TicketWorker model');
        }
        parent::__construct($model);
    }

    /**
     * @return TicketWorker|Model
     * @throws RepositoryException
     */
    public function create($fields)
    {
        return parent::create($fields);
    }

    /**
     * @return TicketWorker[]|Model[]
     * @throws RepositoryException
     */
    public function createMany($rows)
    {
        return parent::createMany($rows);
    }

    /**
     * @return TicketWorker|Model
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
     * @return TicketWorker|Model
     */
    public function restore()
    {
        return parent::restore();
    }
}
