<?php

namespace App\Repositories;

use App\Models\TicketCommentAttachment;
use Illuminate\Database\Eloquent\Model;
use SaineshMamgain\LaravelRepositories\Exceptions\RepositoryException;
use SaineshMamgain\LaravelRepositories\Repositories\BaseRepository;

class TicketCommentAttachmentRepository extends BaseRepository
{

    /**
     * @var TicketCommentAttachment $model
     */
    protected $model;

    public function __construct(TicketCommentAttachment $model = null)
    {
        if (empty($model)) {
            $model = new TicketCommentAttachment();
        } elseif (! $model instanceof TicketCommentAttachment) {
            throw new RepositoryException(get_class($model) . ' is not an instance of TicketCommentAttachment model');
        }
        parent::__construct($model);
    }

    /**
     * @return TicketCommentAttachment|Model
     * @throws RepositoryException
     */
    public function create($fields)
    {
        return parent::create($fields);
    }

    /**
     * @return TicketCommentAttachment[]|Model[]
     * @throws RepositoryException
     */
    public function createMany($rows)
    {
        return parent::createMany($rows);
    }

    /**
     * @return TicketCommentAttachment|Model
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
     * @return TicketCommentAttachment|Model
     */
    public function restore()
    {
        return parent::restore();
    }
}
