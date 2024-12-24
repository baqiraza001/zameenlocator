<?php
namespace App\Models;

use Botble\Base\Casts\SafeContent;
use Botble\Base\Models\BaseModel;
use Botble\Revision\RevisionableTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static \Botble\Base\Models\BaseQueryBuilder<static> query()
 */
class Agent extends BaseModel
{
    use RevisionableTrait;

    protected $table = 'zl_agent';

    protected bool $revisionEnabled = true;
    protected bool $revisionCleanup = true;
    protected int $historyLimit = 20;
    protected array $dontKeepRevisionOf = [];
    public $timestamps = false;
    public const AGENT_IMAGES_PATH = 'agent/';

    protected $fillable = [
        'name',
        'email',
        'contact',
        'city',
        'area',
        'address',
        'status',
        'image',
    ];

    protected $casts = [
        'name' => SafeContent::class,
        'image' => SafeContent::class,
    ];

    public function setImageAttribute($value)
    {
        if (!empty($this->attributes['image'])) {
            $existingFile = public_path(self::AGENT_IMAGES_PATH.$this->attributes['image']);
            if (file_exists($existingFile)) {
                unlink($existingFile);
            }
        }

        if ($value && $value instanceof \Illuminate\Http\UploadedFile) {
            $fileName = $value->getClientOriginalName();
            $fileName = time()."-".str_replace(' ','',$fileName);

            $value->move(public_path(self::AGENT_IMAGES_PATH), $fileName); 
            $this->attributes['image'] = $fileName; 
        } else {
            $this->attributes['image'] = $value; 
        }
    }

    public function cityRelation(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city');
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
