<?php

use yii\db\Migration;

/**
 * Handles the creation of table `stock`.
 */
class m161031_064453_create_stock_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('stock', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'track_number' => $this->string(255)->notNull(),
            'weight' => $this->string(255),
            'link' => $this->string(255),
            'price' => $this->float(),
            'dt_add' => $this->integer(11),
            'dt_update' => $this->integer(11),
            'status' => $this->integer(2)->defaultValue(1),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('stock');
    }
}
