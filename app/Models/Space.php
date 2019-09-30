<?php

namespace App\Models;

use App\Traits\FileUploadTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Space extends Model
{
    use SoftDeletes, FileUploadTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'description', 'full_address',
        'lat', 'lng', 'phone', 'website', 'hour_preference'
    ];

    public function images() {
        return $this->hasMany(FileUpload::class, 'table_id' ,'id')
            ->where('slug', '=', 'image')
            ->where('table', '=', $this->getTable());
    }

    public function Amenities(){
       return $this->belongsToMany('App\Models\Amenity');
    }
}
