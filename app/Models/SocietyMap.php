<?php
namespace App\Models;

use Botble\Base\Casts\SafeContent;
use Botble\Base\Models\BaseModel;
use Botble\Revision\RevisionableTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static \Botble\Base\Models\BaseQueryBuilder<static> query()
 */
class SocietyMap extends BaseModel
{
    use RevisionableTrait;

    protected $table = 'zl_g_maps';

    protected bool $revisionEnabled = true;
    protected bool $revisionCleanup = true;
    protected int $historyLimit = 20;
    protected array $dontKeepRevisionOf = [];
    public $timestamps = false;
    public const SOCIETY_MAPS_PATH = 'maps_images/';

    protected $fillable = [
        'city_id',
        'description',
        'society_map_name',
        'district',
        'banner',
        'priority',
        'map_address',
        'master_plan',
    ];

    protected $casts = [
        'society_map_name' => SafeContent::class,
        'district' => SafeContent::class,
        'city_id' => SafeContent::class,
        'master_plan' => SafeContent::class,
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


     // Handle master_plan file upload
    public function setMasterPlanAttribute($value)
    {
        // Check if there is an existing file to delete
        if (!empty($this->attributes['master_plan'])) {
            $existingFile = public_path(self::SOCIETY_MAPS_PATH.$this->attributes['master_plan']);
            if (file_exists($existingFile)) {
                unlink($existingFile); // Delete the existing file
            }
        }

        // Process the new file
        if ($value && $value instanceof \Illuminate\Http\UploadedFile) {
            $fileName = $value->getClientOriginalName();
            $fileName = time()."-".str_replace(' ','',$fileName);
            $value->move(public_path(self::SOCIETY_MAPS_PATH), $fileName); // Move the uploaded file
            $this->attributes['master_plan'] = $fileName; // Save the file path
        } else {
            $this->attributes['master_plan'] = $value; // Keep existing value if no new file is uploaded
        }
    }

    // Handle banner file upload
    public function setBannerAttribute($value)
    {
        // Check if there is an existing file to delete
        if (!empty($this->attributes['banner'])) {
            $existingFile = public_path(self::SOCIETY_MAPS_PATH.$this->attributes['banner']);
            if (file_exists($existingFile)) {
                unlink($existingFile); // Delete the existing file
            }
        }

        // Process the new file
        if ($value && $value instanceof \Illuminate\Http\UploadedFile) {
            $fileName = $value->getClientOriginalName();
            $fileName = time()."-".str_replace(' ','',$fileName);
            $value->move(public_path(self::SOCIETY_MAPS_PATH), $fileName); // Move the uploaded file
            $this->attributes['banner'] = $fileName; // Save the file path
        } else {
            $this->attributes['banner'] = $value; // Keep existing value if no new file is uploaded
        }
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (is_null($model->priority)) {
                $model->priority = 0;
            }
        });
    }
}
