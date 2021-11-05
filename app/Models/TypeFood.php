<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class TypeFood
 * @property int            id
 * @property string         name
 * @property int            created_by
 * @property int            updated_by
 * @property int            deleted_by
 * @property Carbon         created_at
 * @property Carbon         updated_at
 * @property Carbon         deleted_at
 *
 * @property-read User|null createdBy
 * @property-read User|null updatedBy
 * @property-read User|null deletedBy
 *
 * @package App\Models
 */
class TypeFood extends Model
{

    use HasFactory;
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'type_foods';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     * @var array
     */
    protected $hidden = [];

    /**
     * @var array
     */
    protected $casts = [
        'id'         => 'integer',
        'name'       => 'string',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'deleted_by' => 'integer',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s',
    ];


    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }


    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }


    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }
}
