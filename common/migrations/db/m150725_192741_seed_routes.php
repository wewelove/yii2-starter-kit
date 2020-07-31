<?php

use yii\db\Migration;

class m150725_192741_seed_routes extends Migration
{
    /**
     * @return bool|void
     * @throws \yii\base\Exception
     */
    public function safeUp()
    {
        $this->batchInsert('{{%rbac_auth_item}}', 
            ['name', 'type', 'description', 'rule_name', 'data', 'created_at', 'updated_at'],
            [
                ['/admin/*', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/assignment/*', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/assignment/assign', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/assignment/index', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/assignment/revoke', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/assignment/view', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/default/*', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/default/index', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/menu/*', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/menu/create', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/menu/delete', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/menu/index', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/menu/update', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/menu/view', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/permission/*', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/permission/assign', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/permission/create', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/permission/delete', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/permission/index', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/permission/remove', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/permission/update', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/permission/view', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/role/*', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/role/assign', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/role/create', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/role/delete', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/role/index', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/role/remove', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/role/update', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/role/view', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/route/*', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/route/assign', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/route/create', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/route/index', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/route/refresh', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/route/remove', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/rule/*', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/rule/create', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/rule/delete', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/rule/index', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/rule/update', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/rule/view', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/user/*', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/user/activate', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/user/change-password', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/user/delete', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/user/index', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/user/login', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/user/logout', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/user/request-password-reset', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/user/reset-password', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/user/signup', '2', null, null, null, '1596075973', '1596075973'],
                ['/admin/user/view', '2', null, null, null, '1596075973', '1596075973'],
                ['/content/*', '2', null, null, null, '1596075921', '1596075921'],
                ['/content/article/*', '2', null, null, null, '1596075921', '1596075921'],
                ['/content/article/create', '2', null, null, null, '1595840065', '1595840065'],
                ['/content/article/delete', '2', null, null, null, '1595840071', '1595840071'],
                ['/content/article/index', '2', null, null, null, '1595840057', '1595840057'],
                ['/content/article/update', '2', null, null, null, '1595840068', '1595840068'],
                ['/content/article/view', '2', null, null, null, '1595840060', '1595840060'],
                ['/content/category/*', '2', null, null, null, '1596075921', '1596075921'],
                ['/content/category/create', '2', null, null, null, '1596075871', '1596075871'],
                ['/content/category/delete', '2', null, null, null, '1596075872', '1596075872'],
                ['/content/category/index', '2', null, null, null, '1596075871', '1596075871'],
                ['/content/category/update', '2', null, null, null, '1596075872', '1596075872'],
                ['/content/category/view', '2', null, null, null, '1596075871', '1596075871'],
                ['/content/page/*', '2', null, null, null, '1596075921', '1596075921'],
                ['/content/page/create', '2', null, null, null, '1596075897', '1596075897'],
                ['/content/page/delete', '2', null, null, null, '1596075897', '1596075897'],
                ['/content/page/index', '2', null, null, null, '1596075897', '1596075897'],
                ['/content/page/update', '2', null, null, null, '1596075897', '1596075897'],
                ['/content/page/view', '2', null, null, null, '1596075897', '1596075897'],
                ['/file/*', '2', null, null, null, '1596075961', '1596075961'],
                ['/file/manager/*', '2', null, null, null, '1596075961', '1596075961'],
                ['/file/manager/connector', '2', null, null, null, '1596075961', '1596075961'],
                ['/file/manager/index', '2', null, null, null, '1596075961', '1596075961'],
                ['/file/storage/*', '2', null, null, null, '1596075961', '1596075961'],
                ['/file/storage/delete', '2', null, null, null, '1596075961', '1596075961'],
                ['/file/storage/index', '2', null, null, null, '1596075961', '1596075961'],
                ['/file/storage/upload', '2', null, null, null, '1596075961', '1596075961'],
                ['/file/storage/upload-delete', '2', null, null, null, '1596075961', '1596075961'],
                ['/file/storage/upload-imperavi', '2', null, null, null, '1596075961', '1596075961'],
                ['/file/storage/view', '2', null, null, null, '1596075961', '1596075961'],
                ['/home', '2', null, null, null, '1596075850', '1596075850'],
                ['/rbac/*', '2', null, null, null, '1596076006', '1596076006'],
                ['/rbac/rbac-auth-assignment/*', '2', null, null, null, '1596076005', '1596076005'],
                ['/rbac/rbac-auth-assignment/create', '2', null, null, null, '1596076005', '1596076005'],
                ['/rbac/rbac-auth-assignment/delete', '2', null, null, null, '1596076005', '1596076005'],
                ['/rbac/rbac-auth-assignment/index', '2', null, null, null, '1596076005', '1596076005'],
                ['/rbac/rbac-auth-assignment/update', '2', null, null, null, '1596076005', '1596076005'],
                ['/rbac/rbac-auth-assignment/view', '2', null, null, null, '1596076005', '1596076005'],
                ['/rbac/rbac-auth-item-child/*', '2', null, null, null, '1596076005', '1596076005'],
                ['/rbac/rbac-auth-item-child/create', '2', null, null, null, '1596076005', '1596076005'],
                ['/rbac/rbac-auth-item-child/delete', '2', null, null, null, '1596076005', '1596076005'],
                ['/rbac/rbac-auth-item-child/index', '2', null, null, null, '1596076005', '1596076005'],
                ['/rbac/rbac-auth-item-child/update', '2', null, null, null, '1596076005', '1596076005'],
                ['/rbac/rbac-auth-item-child/view', '2', null, null, null, '1596076005', '1596076005'],
                ['/rbac/rbac-auth-item/*', '2', null, null, null, '1596076005', '1596076005'],
                ['/rbac/rbac-auth-item/create', '2', null, null, null, '1596076005', '1596076005']
            ]
        );
    }

    /**
     * @return bool|void
     */
    public function safeDown()
    {
        $this->truncateTable('{{%rbac_auth_item}}', null, []);
    }
}