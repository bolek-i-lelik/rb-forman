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

        //echo $alias;exit();

        if($alias == 'keramicheskaja-plitka-kerama-marazzi'){

            return $this->redirect('kerama/keramicheskaja-plitka-kerama-marazzi');

        }

        if($alias == 'kerama-marazzi-keramogranit'){

            return $this->redirect('kerama/kerama-marazzi-keramogranit');

        }

    	$categories = RbCategories::find()->where(['alias'=>$alias])->one();

        $childs = RbCategories::find()->where(['parent'=>$categories['id']])->one();
        if(empty($childs)){

            return $this->redirect('products/'.$alias);

        }

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

    public function actionKerama()
    {
        $request = Yii::$app->request;

        $alias = $request->get('alias');

        $cat = RbCategories::find()->where(['alias'=>$alias])->one();

        $id = $cat['id'];

        $childCat = RbCategories::find()->where(['parent'=>$id])->one();
        
        if($childCat!=NULL){

            $collections = RbCategories::find()->where(['parent'=>$cat['id']])->all();

        }

        return $this->render('kerama',[
            'collections' => $collections,
        ]);
    }

    public function actionKeramamarazzi()
    {
        $request = Yii::$app->request;

        $alias = $request->get('alias');

        $parent = RbCategories::find()->where(['alias'=>$alias])->one();

        $parent_id = $parent['id'];

        $collections = RbCategories::find()->where(['parent'=>$parent_id])->all();

        return $this->render('keramamarazzi', [
            'collections' => $collections,
        ]);
    }

    public function actionKeramaproducts()
    {
        $request = Yii::$app->request;

        $alias = $request->get('alias');

        $parentcat = RbCategories::find()->where(['alias'=>$alias])->one();

        $products = Products::find()->where(['parent'=>$parentcat['id']])->all();

        return $this->render('keramaproducts',[
            'products' => $products,
            'catalias' => $parentcat['alias'],
        ]);
    }

    public function actionProducts()
    {
        $request = Yii::$app->request;

        $alias = $request->get('alias');

        $parentcat = RbCategories::find()->where(['alias'=>$alias])->one();

        $parent = $parentcat['id'];

        $products = Products::find()->where(['parent'=>$parent])->all();

        return $this->render('products',[
            'products' => $products,
        ]);
    }
}
