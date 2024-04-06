<?php
declare(strict_types=1);

namespace App\Presenters;



use App\Model\Movies;
use App\Services\ApiController;
use Nette\Application\UI\Presenter;
use Nette\Database\Connection;
use Nette\Database\Explorer;

class ApiPresenter extends Presenter
{
    private ApiController $apiController;

    public function __construct(ApiController $apiController)
    {
        parent::__construct();
        $this->apiController = $apiController;
    }

    public function movies()
    {
        $this->sendJson($this->apiController->movies());

    }

}