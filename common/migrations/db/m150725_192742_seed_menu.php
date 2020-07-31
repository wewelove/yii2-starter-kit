<?php

use yii\db\Migration;

class m150725_192742_seed_menu extends Migration
{
    /**
     * @return bool|void
     * @throws \yii\base\Exception
     */
    public function safeUp()
    {
        $this->batchInsert('{{%menu}}', 
            ['id', 'name', 'parent', 'route', 'icon', 'order', 'header'],
            [
                ['1', '首页', null, '/home', null, '1', '1'],
                ['2', '时间轴', null, '/timeline-event/index', 'stream', '2', '0'],
                ['3', '用户', null, '/user/index', 'users', '3', '0'],
                ['4', '内容', null, '/content', null, '4', '1'],
                ['5', '文章', null, '/content/article', 'newspaper', '5', '0'],
                ['6', '页面', null, '/content/page/index', 'laptop-code', '6', '0'],
                ['7', '部件', null, '/widget', 'puzzle-piece', '7', '0'],
                ['8', '系统', null, '/system', null, '8', '1'],
                ['9', '用户管理', null, '/user/index', 'users', '9', '0'],
                ['10', '权限管理', null, '/admin', 'user-shield', '10', '0'],
                ['11', '文件', null, '/file', 'folder-open', '11', '0'],
                ['12', '键值存储', null, '/system/key-storage/index', 'exchange-alt', '12', '0'],
                ['13', '缓存', null, '/system/cache/index', 'sync', '13', '0'],
                ['14', '系统信息', null, '/system/information/index', 'tachometer-alt', '14', '0'],
                ['15', '日志', null, '/system/log/index', 'clipboard-list', '15', '0'],
                ['16', '文章', '5', '/content/article/index', 'newspaper', '1', '0'],
                ['17', '分类', '5', '/content/category/index', 'th', '2', '0'],
                ['18', '文本', '7', '/widget/text/index', 'font', '1', '0'],
                ['19', '菜单', '7', '/widget/menu/index', 'bars', '2', '0'],
                ['20', '轮播', '7', '/widget/carousel/index', 'images', '3', '0'],
                ['21', '授权', '10', '/admin/assignment/index', 'portrait', '1', '0'],
                ['22', '角色', '10', '/admin/role/index', 'user-tie', '2', '0'],
                ['23', '权限', '10', '/admin/permission/index', 'shield-alt', '3', '0'],
                ['24', '路由', '10', '/admin/route/index', 'globe-asia', '4', '0'],
                ['25', '规则', '10', '/admin/rule/index', 'grip-horizontal', '5', '0'],
                ['26', '菜单', '10', '/admin/menu/index', 'bars', '6', '0'],
                ['27', '存储', '11', '/file/storage/index', 'database', '1', '0'],
                ['28', '管理', '11', '/file/manager/index', 'archive', '1', '0']
            ]
        );
    }

    /**
     * @return bool|void
     */
    public function safeDown()
    {
        $this->truncateTable('{{%menu}}');
    }
}