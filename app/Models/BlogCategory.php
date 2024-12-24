<?php
namespace App\Models;

use Botble\Base\Casts\SafeContent;
use Botble\Base\Models\BaseModel;
use Botble\Revision\RevisionableTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static \Botble\Base\Models\BaseQueryBuilder<static> query()
 */
class BlogCategory extends BaseModel
{
    use RevisionableTrait;

    protected $table = 'zl_category';

    protected bool $revisionEnabled = true;
    protected bool $revisionCleanup = true;
    protected int $historyLimit = 20;
    protected array $dontKeepRevisionOf = [];
    public $timestamps = false;
    public const BLOG_CATEGORIES_IMAGES_PATH = 'cities/';

    protected $fillable = [
        'category',
        'img',
    ];

    protected $casts = [
        'category' => SafeContent::class,
        'img' => SafeContent::class,
    ];

    public function setImgAttribute($value)
    {
        if (!empty($this->attributes['img'])) {
            $existingFile = public_path(self::BLOG_CATEGORIES_IMAGES_PATH.$this->attributes['img']);
            if (file_exists($existingFile)) {
                unlink($existingFile);
            }
        }

        if ($value && $value instanceof \Illuminate\Http\UploadedFile) {
            $fileName = $value->getClientOriginalName();
            $fileName = time()."-".str_replace(' ','',$fileName);

            $value->move(public_path(self::BLOG_CATEGORIES_IMAGES_PATH), $fileName); 
            $this->attributes['img'] = $fileName; 
        } else {
            $this->attributes['img'] = $value; 
        }
    }

}
