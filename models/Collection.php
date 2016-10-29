<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "collection".
 *
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $description
 * @property integer $parent
 */
class Collection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'collection';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'title', 'description', 'parent'], 'required'],
            [['parent'], 'integer'],
            [['name', 'title', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'title' => 'Title',
            'description' => 'Description',
            'parent' => 'Parent',
        ];
    }
}
