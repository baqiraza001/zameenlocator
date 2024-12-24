<?php
namespace App\Models;

use Botble\Base\Casts\SafeContent;
use Botble\Base\Models\BaseModel;
use Botble\Revision\RevisionableTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static \Botble\Base\Models\BaseQueryBuilder<static> query()
 */
class City extends BaseModel
{
    use RevisionableTrait;

    protected $table = 'zl_cities';

    protected bool $revisionEnabled = true;
    protected bool $revisionCleanup = true;
    protected int $historyLimit = 20;
    protected array $dontKeepRevisionOf = [];
    public $timestamps = false;
    public const CITY_IMAGES_PATH = 'cities/';

    protected $fillable = [
        'city_name',
        'country',
        'city_image',
    ];

    protected $casts = [
        'city_name' => SafeContent::class,
        'country' => SafeContent::class,
        'city_image' => SafeContent::class,
    ];

    public function setCityImageAttribute($value)
    {
        if (!empty($this->attributes['city_image'])) {
            $existingFile = public_path(self::CITY_IMAGES_PATH.$this->attributes['city_image']);
            if (file_exists($existingFile)) {
                unlink($existingFile);
            }
        }

        if ($value && $value instanceof \Illuminate\Http\UploadedFile) {
            $fileName = $value->getClientOriginalName();
            $fileName = time()."-".str_replace(' ','',$fileName);

            $value->move(public_path(self::CITY_IMAGES_PATH), $fileName); 
            $this->attributes['city_image'] = $fileName; 
        } else {
            $this->attributes['city_image'] = $value; 
        }
    }

}
