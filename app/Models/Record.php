<?php

// app/Models/Record.php
// This is the Eloquent Model — it represents the 'records' table

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    /**
     * The table this model is linked to.
     * Laravel auto-guesses 'records' from 'Record', but being explicit is good practice.
     */
    protected $table = 'records';

    /**
     * Fields that are allowed to be mass-assigned.
     * This prevents mass assignment vulnerabilities.
     */
    protected $fillable = [
        'name',
        'email',
        'course',
        'year_level',
        'grade',
        'status',
    ];
}