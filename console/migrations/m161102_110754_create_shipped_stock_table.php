<?php

use yii\db\Migration;

/**
 * Handles the creation of table `shipped_stock`.
 */
class m161102_110754_create_shipped_stock_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('shipped_packed', [
            'id' => $this->primaryKey(),
            'shipped_id' => $this->integer(11)->notNull(),
            'packed_id' => $this->integer(11)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('shipped_packed');
    }
}
