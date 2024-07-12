<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motel extends Model
{
    use HasFactory;
    public function user() {
        return $this->beLongsTo(User::class, 'user_id', 'id');
    }
    protected $fillable = [
        'id',
        'title',
        'description',
        'price',
        'area',
        'count_view',
        'address',
        'latlng',
        'images',
        'user_id',
        'category_id',
        'district_id',
        'utilities',
        'created_at',
        'phone',
        'approve',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getRole() {
        return $this->role;
    }
    public function gender() {
        return $this->gender;
    }
    public function getName() {
        return $this->name;
    }
    public function setFilenamesAttribute($value)
    {
        $this->attributes['images'] = json_encode($value);
    }
}