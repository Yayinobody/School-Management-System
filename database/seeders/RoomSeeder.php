<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\College;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $colleges = College::all()->keyBy('code');

        $roomsByCollege = [

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

        foreach ($roomsByCollege as $code => $data) {

            if (!isset($colleges[$code])) {
                $this->command->error("$code college not found.");
                continue;
            }

            for ($i = $data['start']; $i <= $data['end']; $i++) {

                Room::create([
                    'code' => "{$code} {$i}",
                    'college_id' => $colleges[$code]->id,
                    'capacity' => $data['capacity'],
                ]);
            }
        }
    }
}
