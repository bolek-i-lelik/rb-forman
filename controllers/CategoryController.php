<?php

namespace app\controllers;

use Yii;
use app\models\RbCategories;
use app\models\Products;
use app\controllers\MainController;

class CategoryController extends MainController
{
    public function actionIndex()
    {
    	$request = Yii::$app->request;

		$alias = $request->get('alias');

    	$categories = RbCategories::find()->where(['alias'=>$alias])->one();

        return $this->render('index', [
        	'categories' => $categories
        ]);
    }

	public function actionCategory()
    {
    	$request = Yii::$app->request;

		$alias = $request->get('alias');

		$categories = RbCategories::find()->where(['alias'=>$alias])->one();

		$parentCategory = RbCategories::findOne($categories['parent']);

		$parent = $categories->id;

    	$products = Products::find()->where(['parent'=>$parent])->all();

        return $this->render('index', [
        	'parent' => $parent,
        	'products' => $products,
        	'categories' => $categories,
        	'parentCategory' => $parentCategory,
        ]);
    }    

    public function actionNext()
    {
        $request = Yii::$app->request;

        $alias = $request->get('alias');

        $parent = RbCategories::find()->where(['alias'=>$alias])->one();

        $parent_id = $parent['parent'];

        $parent_parent = RbCategories::find('name')->where(['id'=>$parent_id])->one();

        $parent_id = $parent->id;

        $category_next = RbCategories::find()->where(['parent'=>$parent_id])->all();

        return $this->render('next', [
            'parent_parent' => $parent_parent,
            'parent' => $parent,
            'categories' => $category_next,
        ]);
    }
}
