<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Company extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public $table = 'companies';

    public const LOGO_PATH = 'companies';
    
    public $appends = ['logo_url'];
    
    public $fillable = [
        'name',
        'email',
        'website',
    ];

    public static $rules = [
        'name' => 'required',
        'email' => 'email|nullable',
        'website' => 'url|nullable',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function getLogoUrlAttribute()
    {
        /** @var Media $media */
        $media = $this->media->first();
        if (! empty($media)) {
            return $media->getFullUrl();
        }

        return $this->value;
    }

}
