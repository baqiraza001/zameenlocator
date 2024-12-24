<?php
namespace App\Models;

use Botble\Base\Models\BaseModel;

class District extends BaseModel
{
    protected $table = 'zl_districts';
    public $timestamps = false;

    protected $fillable = [
        'district_name',
    ];
}
