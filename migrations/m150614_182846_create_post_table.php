<?php

use yii\db\Schema;
use yii\db\Migration;

class m150614_182846_create_post_table extends Migration
{
    public function up()
    {
        $this->createTable('post', ['id' => 'pk', 'title' => 'string NOT NULL', 'description' => 'string NOT NULL'] );
    }

    public function down()
    {
       $this->dropTable('post');
    }
}
