<?php

namespace app\controllers;

use Yii;
use app\models\RbCategories;
use app\models\Products;
use app\models\Collection;
use app\models\Podcat;

class CollectionController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$request = Yii::$app->request;

		$id = $request->get('id');

        $category = RbCategories::find()->where(['id'=>$id])->one();

        $collections = Collection::find()->where(['parent'=>$id])->all();

        $products = array();

        foreach ($collections as $collection) {
            $productBD = Products::find()->where(['parent'=>$collection->id])->all();
            $products[] = $productBD;
        }

        $podcats = Podcat::find()->all();

        return $this->render('index', [
        	'collections' => $collections,
            'products' => $products,
            'category' => $category,
            'podcats' => $podcats,
        ]);
    }
}