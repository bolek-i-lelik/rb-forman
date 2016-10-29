<?php

use yii\db\Migration;

/**
 * Handles the creation for table `collection`.
 */
class m161029_130803_create_collection_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('collection', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'title' => $this->string(),
            'description' => $this->string(),
            'parent' => $this->integer(),
            'image' => $this->string(),
            'count_podcat' => $this->integer(1),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('collection');
    }
}
