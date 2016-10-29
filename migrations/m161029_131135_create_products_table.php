<?php

use yii\db\Migration;

/**
 * Handles the creation for table `products`.
 */
class m161029_131135_create_products_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'alias' => $this->string(),
            'name' => $this->string(),
            'title' => $this->string(),
            'h1' => $this->string(),
            'description' => $this->string(),
            'keywords' => $this->string(),
            'text' => $this->text(),
            'price' => $this->integer(),
            'articul' => $this->string(),
            'parent' => $this->integer(),
            'image' => $this->string(),
            'podcat' => $this->integer(2),
            'size' => $this->string(),
            'price_r' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('products');
    }
}
