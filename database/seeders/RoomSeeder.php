<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\Department;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $departments = Department::all()->keyBy('code');

        $roomsByDepartment = [

            'CAS' => [
                'start' => 301,
                'end' => 310,
                'capacity' => 40,
            ],

            'CIT' => [
                'start' => 101,
                'end' => 210,
                'capacity' => 40,
            ],


        ];

        foreach ($roomsByDepartment as $code => $data) {

            if (!isset($departments[$code])) {
                $this->command->error("$code department not found.");
                continue;
            }

            for ($i = $data['start']; $i <= $data['end']; $i++) {

                Room::create([
                    'name' => "{$code} {$i}",
                    'department_id' => $departments[$code]->id,
                    'capacity' => $data['capacity'],
                ]);
            }
        }
    }
}
