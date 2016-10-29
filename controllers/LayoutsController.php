<?php

namespace app\controllers;

use app\models\Menu;
use app\controllers\MainController;

/**
* 
*/
class LayoutsController extends MainController
{
	
	public function main()
	{

		$categories = Menu::find()->all();

		$tree = array();

		foreach ($categories as $id=>&$node){
            if (!$node->parent){
                $tree[$id] = &$node;
            }else{
                $categories[$node->parent][$id] = &$node;
            }
        }

        return $tree;

	}

}