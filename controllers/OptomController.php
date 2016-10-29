<?php

namespace app\controllers;

use Yii;
use app\models\Articles;
use app\controllers\MainController;

class OptomController extends MainController
{
    public function actionIndex()
    {
    	$request = Yii::$app->request;

    	$alias = $request->get('alias');

    	$article = Articles::find()->where(['alias' => $alias])->one();

        return $this->render('index', [
        	'article' => $article
        ]);
    }

}
