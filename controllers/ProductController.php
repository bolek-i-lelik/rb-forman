<?php

namespace app\controllers;

use app\models\Products;
use app\controllers\MainController;
use Yii;
use app\models\RbCategories;

class ProductController extends MainController
{
    public function actionIndex()
    {

    	$request = Yii::$app->request;

    	$alias = $request->get('alias');

    	$product = Products::find()->where(['alias'=>$alias])->one();

    	$parent = RbCategories::find()->where(['id'=>$product['parent']])->one();

    	$parent = $parent->alias;

    	return $this->render('index',[
    		'product' => $product,
    		'parent' => $parent,
    	]);
    }

}
