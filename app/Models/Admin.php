<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Admin
 *
 * @property int $id
 * @property int $isSuperAdmin
 * @property int $idUser
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereIsSuperAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\User|null $user
 */
class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'idUser', 'isSuperAdmin'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "idUser");
    }
}
