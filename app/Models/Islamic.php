<?php
namespace App\Models;

use Botble\Base\Casts\SafeContent;
use Botble\Base\Models\BaseModel;
use Botble\Revision\RevisionableTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static \Botble\Base\Models\BaseQueryBuilder<static> query()
 */
class Islamic extends BaseModel
{
    use RevisionableTrait;

    protected $table = 'zl_quran';

    protected bool $revisionEnabled = true;
    protected bool $revisionCleanup = true;
    protected int $historyLimit = 20;
    protected array $dontKeepRevisionOf = [];
    public $timestamps = false;

    protected $fillable = [
        'ayat',
        'trans',
        'hadess',
        'translation',
    ];

    protected $casts = [
        'ayat' => SafeContent::class,
        'trans' => SafeContent::class,
        'hadess' => SafeContent::class,
        'translation' => SafeContent::class,
    ];
}
