<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rb_categories".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent
 * @property string $alias
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $h1
 * @property string $image
 * @property string $preview_text
 * @property string $text
 * @property string $video
 */
class RbCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rb_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent'], 'integer'],
            [['text'], 'string'],
            [['name', 'title', 'description', 'keywords', 'h1', 'image', 'preview_text'], 'string', 'max' => 255],
            [['alias'], 'string', 'max' => 400],
            [['video'], 'string', 'max' => 512],
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
            'parent' => 'Parent',
            'alias' => 'Alias',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'h1' => 'H1',
            'image' => 'Image',
            'preview_text' => 'Preview Text',
            'text' => 'Text',
            'video' => 'Video',
        ];
    }
}
