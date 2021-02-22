<?php

namespace App\Repositories;

use App\Models\TicketAttachment;
use Illuminate\Database\Eloquent\Model;
use SaineshMamgain\LaravelRepositories\Exceptions\RepositoryException;
use SaineshMamgain\LaravelRepositories\Repositories\BaseRepository;

class TicketAttachmentRepository extends BaseRepository
{

    /**
     * @var TicketAttachment $model
     */
    protected $model;

    public function __construct(TicketAttachment $model = null)
    {
        if (empty($model)) {
            $model = new TicketAttachment();
        } elseif (! $model instanceof TicketAttachment) {
            throw new RepositoryException(get_class($model) . ' is not an instance of TicketAttachment model');
        }
        parent::__construct($model);
    }

    /**
     * @return TicketAttachment|Model
     * @throws RepositoryException
     */
    public function create($fields)
    {
        return parent::create($fields);
    }

    /**
     * @return TicketAttachment[]|Model[]
     * @throws RepositoryException
     */
    public function createMany($rows)
    {
        return parent::createMany($rows);
    }

    /**
     * @return TicketAttachment|Model
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
     * @return TicketAttachment|Model
     */
    public function restore()
    {
        return parent::restore();
    }
}
