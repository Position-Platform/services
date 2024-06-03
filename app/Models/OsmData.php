<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OsmData extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'osm_data';

    protected $fillable = [
        'sous_categorie_id',
        'osm_id',
        'name',
        'lon',
        'lat',
        'opening_hours',
        'phone',
        'website',
        'code_postal',
        'city',
        'quartier',
        'rue',
        'image',
        'description',
        'services',
        'commodites',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function souscategorie()
    {
        return $this->belongsTo(Souscategorie::class);
    }
}
