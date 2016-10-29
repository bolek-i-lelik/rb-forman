<?php

use yii\db\Migration;

/**
 * Handles the creation for table `rb_categories`.
 */
class m161029_131607_create_rb_categories_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('rb_categories', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'parent' => $this->integer(),
            'alias' => $this->string(400),
            'title' => $this->string(),
            'description' => $this->string(),
            'keywords' => $this->string(),
            'h1' => $this->string(),
            'image' => $this->string(),
            'preview_text' => $this->string(),
            'text' => $this->text(),
            'video' => $this->string(512),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('rb_categories');
    }
}
