<?php

namespace app\controllers;

class AdminController extends MainController
{
	public $layout = 'admin';

    public function actionIndex()
    {
        return $this->render('index');
    }

}
