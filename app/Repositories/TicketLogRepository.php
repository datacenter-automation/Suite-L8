<?php

namespace App\Repositories;

use App\Models\TicketLog;
use Illuminate\Database\Eloquent\Model;
use SaineshMamgain\LaravelRepositories\Exceptions\RepositoryException;
use SaineshMamgain\LaravelRepositories\Repositories\BaseRepository;

class TicketLogRepository extends BaseRepository
{

    /**
     * @var TicketLog $model
     */
    protected $model;

    public function __construct(TicketLog $model = null)
    {
        if (empty($model)) {
            $model = new TicketLog();
        } elseif (! $model instanceof TicketLog) {
            throw new RepositoryException(get_class($model) . ' is not an instance of TicketLog model');
        }
        parent::__construct($model);
    }

    /**
     * @return TicketLog|Model
     * @throws RepositoryException
     */
    public function create($fields)
    {
        return parent::create($fields);
    }

    /**
     * @return TicketLog[]|Model[]
     * @throws RepositoryException
     */
    public function createMany($rows)
    {
        return parent::createMany($rows);
    }

    /**
     * @return TicketLog|Model
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
     * @return TicketLog|Model
     */
    public function restore()
    {
        return parent::restore();
    }
}
