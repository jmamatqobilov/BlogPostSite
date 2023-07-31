<?php

namespace App\Services;

use App\Models\Application;
use App\Services\BaseService;


class ApplicationService extends BaseService
{
    public function __construct(Application $serviceModel)
    {
        $this->model = $serviceModel;

        parent::__construct();
    }
}