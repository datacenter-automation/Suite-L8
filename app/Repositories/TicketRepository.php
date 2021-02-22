<?php

namespace App\Repositories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;
use SaineshMamgain\LaravelRepositories\Exceptions\RepositoryException;
use SaineshMamgain\LaravelRepositories\Repositories\BaseRepository;

class TicketRepository extends BaseRepository
{

    /**
     * @var Ticket $model
     */
    protected $model;

    public function __construct(Ticket $model = null)
    {
        if (empty($model)) {
            $model = new Ticket();
        } elseif (! $model instanceof Ticket) {
            throw new RepositoryException(get_class($model) . ' is not an instance of Ticket model');
        }
        parent::__construct($model);
    }

    /**
     * @return Ticket|Model
     * @throws RepositoryException
     */
    public function create($fields)
    {
        return parent::create($fields);
    }

    /**
     * @return Ticket[]|Model[]
     * @throws RepositoryException
     */
    public function createMany($rows)
    {
        return parent::createMany($rows);
    }

    /**
     * @return Ticket|Model
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
     * @return Ticket|Model
     */
    public function restore()
    {
        return parent::restore();
    }
}
