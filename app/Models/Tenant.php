<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    public mixed $name;
    protected $fillable = [
        'name', 'contact', 'room_number'
    ];

    public static function create(mixed $validated)
    {
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
}
