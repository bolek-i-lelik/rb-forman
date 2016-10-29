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
 * @property string $image
 * @property integer $podcat
 * @property string $size
 * @property string $price_r
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
            [['text'], 'string'],
            [['price', 'parent', 'podcat'], 'integer'],
            [['alias', 'name', 'title', 'h1', 'description', 'keywords', 'articul', 'image', 'size', 'price_r'], 'string', 'max' => 255],
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
            'image' => 'Image',
            'podcat' => 'Podcat',
            'size' => 'Size',
            'price_r' => 'Price R',
        ];
    }
}
