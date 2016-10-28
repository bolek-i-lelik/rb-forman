<?php

namespace widgets\menu;

use yii\web\AssetBundle;

class MainMenuAsset extends AssetBundle
{
	public $sourcePath = '@widgets/menu/assets';

	public $css = [
		'css/site.css'
	];
	
	public $js = [
    	'bootstrap.js',
	];

	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapAsset',
	];
}
?>