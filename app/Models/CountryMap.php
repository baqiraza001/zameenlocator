<?php
namespace App\Models;

use Botble\Base\Casts\SafeContent;
use Botble\Base\Models\BaseModel;
use Botble\Revision\RevisionableTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static \Botble\Base\Models\BaseQueryBuilder<static> query()
 */
class CountryMap extends BaseModel
{
    use RevisionableTrait;

    protected $table = 'zl_country_map';

    protected bool $revisionEnabled = true;
    protected bool $revisionCleanup = true;
    protected int $historyLimit = 20;
    protected array $dontKeepRevisionOf = [];
    public $timestamps = false;
    public const COUNTRY_MAP_FLAG_IMAGES_PATH = 'countries/';
    public const COUNTRY_MAP_MAP_IMAGES_PATH = 'countries/';

    protected $fillable = [
        'name',
        'region',
        'population',
        'capital',
        'history',
        'price',
        'flag',
        'map',
    ];

    protected $casts = [
        'name' => SafeContent::class,
        'region' => SafeContent::class,
        'population' => SafeContent::class,
        'capital' => SafeContent::class,
        'history' => SafeContent::class,
        'price' => SafeContent::class,
        'flag' => SafeContent::class,
        'map' => SafeContent::class,
    ];

    public function setFlagAttribute($value)
    {
        if (!empty($this->attributes['flag'])) {
            $existingFile = public_path(self::COUNTRY_MAP_FLAG_IMAGES_PATH.$this->attributes['flag']);
            if (file_exists($existingFile)) {
                unlink($existingFile);
            }
        }

        if ($value && $value instanceof \Illuminate\Http\UploadedFile) {
            $fileName = $value->getClientOriginalName();
            $fileName = time()."-".str_replace(' ','',$fileName);

            $value->move(public_path(self::COUNTRY_MAP_FLAG_IMAGES_PATH), $fileName); 
            $this->attributes['flag'] = $fileName; 
        } else {
            $this->attributes['flag'] = $value; 
        }
    }

    public function setMapAttribute($value)
    {
        if (!empty($this->attributes['map'])) {
            $existingFile = public_path(self::COUNTRY_MAP_MAP_IMAGES_PATH.$this->attributes['map']);
            if (file_exists($existingFile)) {
                unlink($existingFile);
            }
        }

        if ($value && $value instanceof \Illuminate\Http\UploadedFile) {
            $fileName = $value->getClientOriginalName();
            $fileName = time()."-".str_replace(' ','',$fileName);

            $value->move(public_path(self::COUNTRY_MAP_MAP_IMAGES_PATH), $fileName); 
            $this->attributes['map'] = $fileName; 
        } else {
            $this->attributes['map'] = $value; 
        }
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (is_null($model->title)) {
                $model->title = '';
            }
            if (is_null($model->flag) || !is_file($model->flag)) {
                $model->flag = ''; 
            }
            if (is_null($model->map) || !is_file($model->map)) {
                $model->map = ''; 
            }
        });
    }


}
