<?php
namespace App\Models;

use Botble\Base\Casts\SafeContent;
use Botble\Base\Models\BaseModel;
use Botble\Revision\RevisionableTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static \Botble\Base\Models\BaseQueryBuilder<static> query()
 */
class Diary extends BaseModel
{
    use RevisionableTrait;

    protected $table = 'zl_property_diary';

    protected bool $revisionEnabled = true;
    protected bool $revisionCleanup = true;
    protected int $historyLimit = 20;
    protected array $dontKeepRevisionOf = [];
    public $timestamps = false;
    public const DIARY_IMAGES_PATH = 'diary/';

    protected $fillable = [
        'des',
        'price',
        'status',
        'image1',
        'image2',
    ];

    protected $casts = [
        'price' => SafeContent::class,
        'des' => SafeContent::class,
        'image1' => SafeContent::class,
        'image2' => SafeContent::class,
    ];

    public function setImage1Attribute($value)
    {
        if (!empty($this->attributes['image1'])) {
            $existingFile = public_path(self::DIARY_IMAGES_PATH.$this->attributes['image1']);
            if (file_exists($existingFile)) {
                unlink($existingFile);
            }
        }

        if ($value && $value instanceof \Illuminate\Http\UploadedFile) {
            $fileName = $value->getClientOriginalName();
            $fileName = time()."-".str_replace(' ','',$fileName);

            $value->move(public_path(self::DIARY_IMAGES_PATH), $fileName); 
            $this->attributes['image1'] = $fileName; 
        } else {
            $this->attributes['image1'] = $value; 
        }
    }

    public function setImage2Attribute($value)
    {
        if (!empty($this->attributes['image2'])) {
            $existingFile = public_path(self::DIARY_IMAGES_PATH.$this->attributes['image2']);
            if (file_exists($existingFile)) {
                unlink($existingFile);
            }
        }

        if ($value && $value instanceof \Illuminate\Http\UploadedFile) {
            $fileName = $value->getClientOriginalName();
            $fileName = time()."-".str_replace(' ','',$fileName);

            $value->move(public_path(self::DIARY_IMAGES_PATH), $fileName); 
            $this->attributes['image2'] = $fileName; 
        } else {
            $this->attributes['image2'] = $value; 
        }
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (is_null($model->status)) {
                $model->status = 0;
            }
        });
    }
}
