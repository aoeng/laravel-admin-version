<?php

namespace Aoeng\Laravel\Admin\Version\Models;


use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Model;

/**
 * @group 版本 version
 * Class version
 * @package App\Models
 */
class Version extends Model
{
    use DefaultDatetimeFormat;

    
    const TYPE_STRONG = 1;
    const TYPE_WEAK = 2;

    public static $typeMap = [
        self::TYPE_STRONG => '强更',
        self::TYPE_WEAK   => '弱更'
    ];
}
