<?php

namespace App\Repositories;

use App\Models\TicketStatus;
use Illuminate\Database\Eloquent\Model;
use SaineshMamgain\LaravelRepositories\Exceptions\RepositoryException;
use SaineshMamgain\LaravelRepositories\Repositories\BaseRepository;

class TicketStatusRepository extends BaseRepository
{

    /**
     * @var TicketStatus $model
     */
    protected $model;

    public function __construct(TicketStatus $model = null)
    {
        if (empty($model)) {
            $model = new TicketStatus();
        } elseif (! $model instanceof TicketStatus) {
            throw new RepositoryException(get_class($model) . ' is not an instance of TicketStatus model');
        }
        parent::__construct($model);
    }

    /**
     * @return TicketStatus|Model
     * @throws RepositoryException
     */
    public function create($fields)
    {
        return parent::create($fields);
    }

    /**
     * @return TicketStatus[]|Model[]
     * @throws RepositoryException
     */
    public function createMany($rows)
    {
        return parent::createMany($rows);
    }

    /**
     * @return TicketStatus|Model
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
     * @return TicketStatus|Model
     */
    public function restore()
    {
        return parent::restore();
    }
}
