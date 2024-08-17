<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Evidence extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    protected $hidden = ['media'];

    protected $appends = ['attachment'];

    protected $dates = ['deleted_at'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('attachment');
    }

    public function getAttachmentAttribute()
    {
        return $this->getMedia('attachment');
    }
}
