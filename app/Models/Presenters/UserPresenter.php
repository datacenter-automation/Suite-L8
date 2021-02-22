<?php

namespace App\Models\Presenters;

use TheHiveTeam\Presentable\Presenter;

class UserPresenter extends Presenter
{

    /**
     * @return string
     */
    public function name()
    {
        return ucwords($this->model->name);
    }
}
