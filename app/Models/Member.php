<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Member extends Model
{
    use HasFactory;

    protected $fillable = ['member_id_number', 'full_name', 'date_of_birth', 'gender', 'contact_number', 'email', 'address', 'joined_at'];

    protected function casts(): array
    {
        return ['date_of_birth' => 'date', 'joined_at' => 'date'];
    }

    public function borrowings(): HasMany
    {
        return $this->hasMany(Borrowing::class);
    }
}
