<?php
namespace App\Models;

use Botble\Base\Casts\SafeContent;
use Botble\Base\Models\BaseModel;
use Botble\Revision\RevisionableTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static \Botble\Base\Models\BaseQueryBuilder<static> query()
 */
class Blog extends BaseModel
{
    use RevisionableTrait;

    protected $table = 'zl_blog';

    protected bool $revisionEnabled = true;
    protected bool $revisionCleanup = true;
    protected int $historyLimit = 20;
    protected array $dontKeepRevisionOf = [];
    public $timestamps = false;
    public const BLOG_IMAGES_PATH = 'maps_images/';

    protected $fillable = [
        'name',
        'des',
        'img',
        'blog_id',
    ];

    protected $casts = [
        'name' => SafeContent::class,
        'des' => SafeContent::class,
        'img' => SafeContent::class,
        'blog_id' => SafeContent::class,
    ];

    public function setImgAttribute($value)
    {
        if (!empty($this->attributes['img'])) {
            $existingFile = public_path(self::BLOG_IMAGES_PATH.$this->attributes['img']);
            if (file_exists($existingFile)) {
                unlink($existingFile);
            }
        }

        if ($value && $value instanceof \Illuminate\Http\UploadedFile) {
            $fileName = $value->getClientOriginalName();
            $fileName = time()."-".str_replace(' ','',$fileName);

            $value->move(public_path(self::BLOG_IMAGES_PATH), $fileName); 
            $this->attributes['img'] = $fileName; 
        } else {
            $this->attributes['img'] = $value; 
        }
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'blog_id');
    }

}
