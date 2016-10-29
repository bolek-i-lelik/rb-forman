<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $alias
 * @property string $name
 * @property string $title
 * @property string $h1
 * @property string $description
 * @property string $keywords
 * @property string $text
 * @property integer $price
 * @property string $articul
 * @property integer $parent
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'name', 'title', 'h1', 'description', 'keywords', 'text', 'price', 'articul', 'parent'], 'required'],
            [['price', 'parent'], 'integer'],
            [['alias', 'name', 'title', 'h1', 'description', 'keywords', 'text'], 'string', 'max' => 255],
            [['articul'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'name' => 'Name',
            'title' => 'Title',
            'h1' => 'H1',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'text' => 'Text',
            'price' => 'Price',
            'articul' => 'Articul',
            'parent' => 'Parent',
        ];
    }
}
