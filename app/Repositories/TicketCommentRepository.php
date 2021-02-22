<?php

namespace App\Repositories;

use App\Models\TicketComment;
use Illuminate\Database\Eloquent\Model;
use SaineshMamgain\LaravelRepositories\Exceptions\RepositoryException;
use SaineshMamgain\LaravelRepositories\Repositories\BaseRepository;

class TicketCommentRepository extends BaseRepository
{

    /**
     * @var TicketComment $model
     */
    protected $model;

    public function __construct(TicketComment $model = null)
    {
        if (empty($model)) {
            $model = new TicketComment();
        } elseif (! $model instanceof TicketComment) {
            throw new RepositoryException(get_class($model) . ' is not an instance of TicketComment model');
        }
        parent::__construct($model);
    }

    /**
     * @return TicketComment|Model
     * @throws RepositoryException
     */
    public function create($fields)
    {
        return parent::create($fields);
    }

    /**
     * @return TicketComment[]|Model[]
     * @throws RepositoryException
     */
    public function createMany($rows)
    {
        return parent::createMany($rows);
    }

    /**
     * @return TicketComment|Model
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
     * @return TicketComment|Model
     */
    public function restore()
    {
        return parent::restore();
    }
}
