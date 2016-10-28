<?php

namespace app\widgets\menu;

use app\widgets\menu\MainMenuAsset;
use yii\helpers\Html;
use yii\web\View;
use Yii;
use app\models\Menu;
use yii\helpers\Url;

class MainMenu extends \yii\bootstrap\Widget
{

	public $content;

	public function run() 
	{

		echo Html::beginTag('div', ['class'=>'btn-group-vertical']);

		//echo Html::beginTag('ul', ['class'=>'menu', 'id' => 'left_m']);

		$categories = Menu::find()->where(['parent' => 0])->all();

		foreach ($categories as $categorie) {
			
			$issetchild = Menu::find()->where(['parent' => $categorie->id])->one();
			if($issetchild){

				echo Html::beginTag('div', ['class' => 'btn-group menu', 'id' => 'left_m']);
				echo Html::beginTag('button', ['type' => 'button', 'class' => 'btn btn-default dropdown-toggle', 'data-toggle' => 'dropdown']);
				echo $categorie->name;
				//echo Html::Tag('span', ['class' => 'caret']);
				echo Html::endTag('button');
				echo Html::beginTag('ul', ['class' => 'dropdown-menu']);
				echo $this->submenu($categorie->id);
				echo Html::endTag('ul');
				echo Html::endTag('div');

			}else{
				echo Html::beginTag('button', ['class' => 'btn btn-default', 'type' => 'button']);
				echo Html::Tag('a', $categorie->name, ['href'=> Url::to('category/'.$categorie->alias, true)]);
				echo Html::endTag('button');
			}
			
		}

		echo Html::endTag('ul');
		echo Html::endTag('div');
		
	}

	public function submenu($id)
	{

		$dataset = Menu::find()->where(['parent' => $id]) -> all();

		foreach ($dataset as $data) {
			echo Html::beginTag('li');
			echo Html::Tag('a', Html::encode($data->name), ['href' => Url::to('categoryNext/'.$data->alias, true)]);
			echo Html::endTag('li');
			$issetchild = Menu::find() -> where(['parent' => $data->id])->one();
			//if($issetchild){
			//	$this->submenu($data->id);
			//} 
		}

		return;

	}

}

?>