<?php

declare(strict_types=1);

namespace GameeApi\Presenters;

use Nette;

class DefaultPresenter extends Nette\Application\UI\Presenter
{
    public function actionDefault()
    {
        $this->sendJson(['status' => 'ok']);
    }
}
