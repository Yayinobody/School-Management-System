<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\Department;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        // Find CAS department
        $department = Department::where('code', 'CAS')->first();

        if (!$department) {
            $this->command->error('CAS department not found.');
            return;
        }

        for ($i = 1; $i <= 11; $i++) {

            $roomNumber = str_pad($i, 2, '0', STR_PAD_LEFT);

            Room::create([
                'name' => "CAS 3{$roomNumber}", // CAS 301 → CAS 311
                'department_id' => $department->id,
                'capacity' => 40
            ]);
        }

    }
}
