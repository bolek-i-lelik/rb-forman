<?php

use yii\db\Migration;

/**
 * Handles the creation for table `articles`.
 */
class m161029_130517_create_articles_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('articles', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'description' => $this->string(),
            'keywords' => $this->string(),
            'text' => $this->text(),
            'alias' => $this->string(),
            'parent' => $this->integer(),
            'intro' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('articles');
    }
}
