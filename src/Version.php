<?php


namespace Aoeng\Laravel\Admin\Version;


use Encore\Admin\Extension;

class Version extends Extension
{
    public $name = 'version';


    public function __construct()
    {
        self::routes(__DIR__ . '/../routes/admin.php');
    }

    /**
     * {@inheritdoc}
     */
    public static function import()
    {
        parent::createMenu('版本管理', 'versions', 'fa-stack-overflow');
        parent::createPermission('Admin Versions', 'ext.versions', 'versions/*');
    }
}
