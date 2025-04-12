<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserJob extends Model
{
    // Name of the table
    protected $table = 'tbluserjob';

    // Columns that are mass assignable
    protected $fillable = [
        'username',
        'job_title',
        'gender',
        'jobid', 
    ];

    // Disable timestamps (created_at and updated_at)
    public $timestamps = false;

    // Set custom primary key
    protected $primaryKey = 'id';
}
