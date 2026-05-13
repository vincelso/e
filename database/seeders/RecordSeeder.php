<?php

// database/seeders/RecordSeeder.php
// Populates the records table with sample data for testing
// Run with: php artisan db:seed --class=RecordSeeder

namespace Database\Seeders;

use App\Models\Record;
use Illuminate\Database\Seeder;

class RecordSeeder extends Seeder
{
    public function run(): void
    {
        // Sample student records
        $records = [
            ['name' => 'Juan Dela Cruz',   'email' => 'juan@email.com',   'course' => 'BSIT', 'year_level' => '3rd Year', 'grade' => 92.5,  'status' => 'active'],
            ['name' => 'Maria Santos',     'email' => 'maria@email.com',  'course' => 'BSIT', 'year_level' => '3rd Year', 'grade' => 88.0,  'status' => 'active'],
            ['name' => 'Pedro Reyes',      'email' => 'pedro@email.com',  'course' => 'BSCS', 'year_level' => '2nd Year', 'grade' => 75.5,  'status' => 'active'],
            ['name' => 'Ana Gonzales',     'email' => 'ana@email.com',    'course' => 'BSIT', 'year_level' => '3rd Year', 'grade' => 95.0,  'status' => 'active'],
            ['name' => 'Carlo Bautista',   'email' => 'carlo@email.com',  'course' => 'BSCS', 'year_level' => '4th Year', 'grade' => 60.0,  'status' => 'inactive'],
        ];

        // Insert each record into the database
        foreach ($records as $record) {
            Record::create($record);
        }
    }
}