<?php

use yii\db\Migration;

/**
 * Handles adding position to table `products`.
 */
class m161030_183228_add_position_column_to_products_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('products', 'edizm', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('products', 'edizm');
    }
}
