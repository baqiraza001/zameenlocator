<?php
namespace App\Models;

use Botble\Base\Casts\SafeContent;
use Botble\Base\Models\BaseModel;
use Botble\Revision\RevisionableTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static \Botble\Base\Models\BaseQueryBuilder<static> query()
 */
class CityMasterPlan extends BaseModel
{
    use RevisionableTrait;

    protected $table = 'zl_master_plan';

    protected bool $revisionEnabled = true;
    protected bool $revisionCleanup = true;
    protected int $historyLimit = 20;
    protected array $dontKeepRevisionOf = [];
    public $timestamps = false;
    public const CITY_MASTER_PLAN_IMAGES_PATH = 'maps_images/';

    protected $fillable = [
        'name',
        'des',
        'img',
    ];

    protected $casts = [
        'name' => SafeContent::class,
        'des' => SafeContent::class,
        'img' => SafeContent::class,
    ];

    public function setImgAttribute($value)
    {
        if (!empty($this->attributes['img'])) {
            $existingFile = public_path(self::CITY_MASTER_PLAN_IMAGES_PATH.$this->attributes['img']);
            if (file_exists($existingFile)) {
                unlink($existingFile);
            }
        }

        if ($value && $value instanceof \Illuminate\Http\UploadedFile) {
            $fileName = $value->getClientOriginalName();
            $fileName = time()."-".str_replace(' ','',$fileName);

            $value->move(public_path(self::CITY_MASTER_PLAN_IMAGES_PATH), $fileName); 
            $this->attributes['img'] = $fileName; 
        } else {
            $this->attributes['img'] = $value; 
        }
    }

}
