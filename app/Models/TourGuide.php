<?php
namespace App\Models;

use Botble\Base\Casts\SafeContent;
use Botble\Base\Models\BaseModel;
use Botble\Revision\RevisionableTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static \Botble\Base\Models\BaseQueryBuilder<static> query()
 */
class TourGuide extends BaseModel
{
    use RevisionableTrait;

    protected $table = 'zl_tour_guide';

    protected bool $revisionEnabled = true;
    protected bool $revisionCleanup = true;
    protected int $historyLimit = 20;
    protected array $dontKeepRevisionOf = [];
    public $timestamps = false;
    public const TOUR_GUIDE_IMAGES_PATH = 'tour_guide/';

    protected $fillable = [
        'name',
        'des',
        'country',
        'city',
        'image',
    ];

    protected $casts = [
        'name' => SafeContent::class,
        'des' => SafeContent::class,
        'image' => SafeContent::class,
    ];

    public function setImageAttribute($value)
    {
        if (!empty($this->attributes['image'])) {
            $existingFile = public_path(self::TOUR_GUIDE_IMAGES_PATH.$this->attributes['image']);
            if (file_exists($existingFile)) {
                unlink($existingFile);
            }
        }

        if ($value && $value instanceof \Illuminate\Http\UploadedFile) {
            $fileName = $value->getClientOriginalName();
            $fileName = time()."-".str_replace(' ','',$fileName);

            $value->move(public_path(self::TOUR_GUIDE_IMAGES_PATH), $fileName); 
            $this->attributes['image'] = $fileName; 
        } else {
            $this->attributes['image'] = $value; 
        }
    }

    /**
     * Get the city related to this society map.
     */
    public function cityRelation(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city');
    }

    /**
     * Get the district related to this society map.
     */
    public function countryRelation(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country');
    }
}

