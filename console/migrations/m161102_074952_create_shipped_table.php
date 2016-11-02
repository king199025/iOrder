<?php

use yii\db\Migration;

/**
 * Handles the creation of table `shipped`.
 */
class m161102_074952_create_shipped_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('shipped', [
            'id' => $this->primaryKey(),
            'dt_add' => $this->integer(11),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('shipped');
    }
}
