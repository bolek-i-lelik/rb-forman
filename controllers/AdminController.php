<?php

namespace app\controllers;

use app\models\RbCategories;
use app\models\Products;

class AdminController extends MainController
{
	public $layout = 'admin';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionNewkerama()
    {
    	//получаем информацию о керамической плитке керама марацци
    	$fileName = 'rusceramica.xlsx';

		$data = \moonland\phpexcel\Excel::import($fileName); // $config is an optional
 
		$data = \moonland\phpexcel\Excel::widget([
			'mode' => 'import', 
		    'fileName' => $fileName, 
		    'setFirstRecordAsKeys' => true, // if you want to set the keys of record column with first record, if it not set, the header with use the alphabet column on excel. 
		    'setIndexSheetByName' => true, // set this if your excel data with multiple worksheet, the index of array will be set with the sheet name. If this not set, the index will use numeric. 
		    'getOnlySheet' => 'sheet1', // you can set this property if you want to get the specified sheet from the excel data with multiple worksheet.
		]);

		//разбираем категории
		/*foreach($data as $dat){
			if($dat['Коллекция']){
				$collection = RbCategories::find()->where(['name'=>$dat['Коллекция']])->one();
				if(!empty($collection['id'])){
					echo 'коллекция '.$dat['Коллекция']. ' уже существует<hr>';
				}else{
					$category = new RbCategories;
					$category->name = $dat['Коллекция'];
					$category->parent = 30;
					$category->alias = $this->str2url($dat['Коллекция']);
					$category->save();
					echo $dat['Коллекция'].' добавлена<hr>';
				}
			}
		}*/

		//разбираем продукты
		foreach ($data as $dat) {
			if($dat['АРТИКУЛ КЕРАМА']){
				$product = Products::find()->where(['name'=>$dat['Наименование товара']])->one();
				if(!empty($product)){
					$product->name = $dat['Наименование товара'];
					
					$product->alias = $this->str2url($dat['Наименование товара']);
					$product->price = str_replace(',', '', $dat['Минимальная розничная цена, рекомендуемая производителем,руб.с НДС']);
					$product->articul = $dat['АРТИКУЛ КЕРАМА'];
					$parent = RbCategories::find()->where(['name'=>$dat['Коллекция']])->one();
					$product->parent = $parent->id;
					$product->image = $dat['АРТИКУЛ КЕРАМА'].'.jpg';
					$product->size = $dat['размер'];
					$product->edizm = $dat['единиц.измер.'];
					$product->save();
				}
				else{
					$product = new Products();
					$product->name = $dat['Наименование товара'];
					$product->title = $dat['Наименование товара'];
					$product->description = $dat['Наименование товара'];
					$product->keywords = $dat['Наименование товара'];
					$product->text = $dat['Наименование товара'];
					$product->podcat = 0;
					$product->price_r = 0;
					$product->h1 = $dat['Коллекция'].' - '.$dat['Наименование товара'];
					$product->alias = $this->str2url($dat['Наименование товара']);
					$product->price = $dat['Минимальная розничная цена, рекомендуемая производителем,руб.с НДС'];
					$product->articul = $dat['АРТИКУЛ КЕРАМА'];
					$parent = RbCategories::find()->where(['name'=>$dat['Коллекция']])->one();
					$product->parent = $parent->id;
					$product->image = $dat['АРТИКУЛ КЕРАМА'].'.jpg';
					$product->size = $dat['размер'];
					$product->edizm = $dat['единиц.измер.'];
					$product->save();
					echo 'Продукт '.$dat['Наименование товара'].' сохранён<hr>';
				}
			}
			
		}
		exit();

		return $this->render('newkerama');
    }

    protected function rus2translit($string) {
        $converter = array(
            'а' => 'a',   'б' => 'b',   'в' => 'v',
            'г' => 'g',   'д' => 'd',   'е' => 'e',
            'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
            'и' => 'i',   'й' => 'y',   'к' => 'k',
            'л' => 'l',   'м' => 'm',   'н' => 'n',
            'о' => 'o',   'п' => 'p',   'р' => 'r',
            'с' => 's',   'т' => 't',   'у' => 'u',
            'ф' => 'f',   'х' => 'h',   'ц' => 'c',
            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
            'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
            'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
        
            'А' => 'A',   'Б' => 'B',   'В' => 'V',
            'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
            'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
            'И' => 'I',   'Й' => 'Y',   'К' => 'K',
            'Л' => 'L',   'М' => 'M',   'Н' => 'N',
            'О' => 'O',   'П' => 'P',   'Р' => 'R',
            'С' => 'S',   'Т' => 'T',   'У' => 'U',
            'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
            'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
            'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
            'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
        );
        return strtr($string, $converter);
    }

    protected function str2url($str) {
        // переводим в транслит
        $str = $this->rus2translit($str);
        // в нижний регистр
        $str = strtolower($str);
        // заменям все ненужное нам на "-"
        $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
        // удаляем начальные и конечные '-'
        $str = trim($str, "-");
        return $str;
    }

}
