<?php

use yii\db\Migration;

/**
 * Handles the creation of table `packed`.
 */
class m161101_112651_create_packed_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('packed', [
            'id' => $this->primaryKey(),
            'dt_add' => $this->integer(11),
            'idStock' => $this->string(255),
            'address_id' => $this->integer(11),
            'price' => $this->integer(11),
            'number' => $this->string(255),
            'comment' => $this->string(255),
            'status' => $this->string(2)->defaultValue(1)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('packed');
    }
}
