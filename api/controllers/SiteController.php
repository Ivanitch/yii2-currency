<?php

namespace api\controllers;

use yii\rest\Controller;

class SiteController extends Controller
{
    public function actionIndex(): string
    {
        return 'api';
    }
}
