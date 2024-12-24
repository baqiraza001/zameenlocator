<?php
namespace App\Models;

use Botble\Base\Casts\SafeContent;
use Botble\Base\Models\BaseModel;
use Botble\Revision\RevisionableTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static \Botble\Base\Models\BaseQueryBuilder<static> query()
 */
class Society extends BaseModel
{
    use RevisionableTrait;

    protected $table = 'zl_socities_l_i';

    protected bool $revisionEnabled = true;
    protected bool $revisionCleanup = true;
    protected int $historyLimit = 20;
    protected array $dontKeepRevisionOf = [];
    public $timestamps = false;

    protected $fillable = [
        'society_name',
        'city_id',
        'district',
        'status',
        'society_description',
    ];

    protected $casts = [
        'society_name' => SafeContent::class,
        'district' => SafeContent::class,
        'city_id' => SafeContent::class,
    ];

    /**
     * Get the city related to this society map.
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    /**
     * Get the district related to this society map.
     */
    public function districtRelation(): BelongsTo
    {
        return $this->belongsTo(District::class, 'district');
    }

    /**
     * Accessor to get city and district names together.
     */
    public function getCityAndDistrictAttribute()
    {
        return [
            'city_name' => $this->city->city_name ?? null,
            'district_name' => $this->districtRelation->district_name ?? null,
        ];
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
