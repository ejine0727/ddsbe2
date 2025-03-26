<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    // ✅ Make sure this matches your database table name
    protected $table = 'tbluser';

    // ✅ Define the primary key
    protected $primaryKey = 'id';

    // ✅ Allow mass assignment for all columns
    protected $fillable = [
        'name',
        'username',
        'password',
        'email',
        'gender'
    ];

    // ✅ Hide password when returning data
    protected $hidden = [
        'password'
    ];

    // ✅ Disable timestamps if your table has no `created_at` and `updated_at`
    public $timestamps = false;
}
