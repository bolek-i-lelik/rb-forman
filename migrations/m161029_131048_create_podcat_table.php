<?php

use yii\db\Migration;

/**
 * Handles the creation for table `podcat`.
 */
class m161029_131048_create_podcat_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('podcat', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('podcat');
    }
}
