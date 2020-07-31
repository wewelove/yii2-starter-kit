<?php

/**
 * Migration table of table_menu
 * 
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class m140704_111327_menu extends \yii\db\Migration
{

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('{{%menu}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(128)->notNull(),
            'parent' => $this->integer(),
            'route' => $this->string(),
            'icon' => $this->string(),
            'order' => $this->integer(),
            'header' => $this->integer(),
            'data' => $this->binary()
        ]);

        $this->addForeignKey('fk_menu_parent', '{{%menu}}', 'parent', '{{%menu}}', 'id', 'cascade', 'cascade');
     
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_menu_parent', '{{%menu}}');
        $this->dropTable('{{%menu}}', );
    }
}
