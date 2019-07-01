<?php

namespace App\Database\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DeviceData extends Model
{
    protected $table = 'device_data';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'data', 'device_id'
    ];

    public function device(): BelongsTo
    {
        return $this->BelongsTo(Device::class);
    }
}
