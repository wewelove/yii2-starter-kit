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
                ['3', '内容', null, '/content', null, '3', '1'],
                ['4', '文章', null, '/content/article', 'newspaper', '4', '0'],
                ['5', '页面', null, '/content/page/index', 'laptop-code', '5', '0'],
                ['6', '部件', null, '/widget', 'puzzle-piece', '6', '0'],
                ['7', '系统', null, '/system', null, '7', '1'],
                ['8', '用户管理', null, '/user/index', 'users', '8', '0'],
                ['9', '权限管理', null, '/admin', 'user-shield', '9', '0'],
                ['10', '文件', null, '/file', 'folder-open', '10', '0'],
                ['11', '键值存储', null, '/system/key-storage/index', 'exchange-alt', '11', '0'],
                ['12', '缓存', null, '/system/cache/index', 'sync', '12', '0'],
                ['13', '系统信息', null, '/system/information/index', 'tachometer-alt', '13', '0'],
                ['14', '日志', null, '/system/log/index', 'clipboard-list', '14', '0'],
                ['15', '文章', '4', '/content/article/index', 'newspaper', '1', '0'],
                ['16', '分类', '4', '/content/category/index', 'th', '2', '0'],
                ['17', '文本', '6', '/widget/text/index', 'font', '1', '0'],
                ['18', '菜单', '6', '/widget/menu/index', 'bars', '2', '0'],
                ['19', '轮播', '6', '/widget/carousel/index', 'images', '3', '0'],
                ['20', '角色', '9', '/admin/role/index', 'user-tie', '2', '0'],
                ['21', '权限', '9', '/admin/permission/index', 'shield-alt', '3', '0'],
                ['22', '路由', '9', '/admin/route/index', 'globe-asia', '4', '0'],
                ['23', '规则', '9', '/admin/rule/index', 'grip-horizontal', '5', '0'],
                ['24', '菜单', '9', '/admin/menu/index', 'bars', '6', '0'],
                ['25', '存储', '10', '/file/storage/index', 'database', '1', '0'],
                ['26', '管理', '10', '/file/manager/index', 'archive', '1', '0']
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