<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use App\Models\Room;

class RoomSeeder extends Seeder
{
    public function run()
    {
        Room::create([
            'room_title' => 'Deluxe Suite',
            'description' => 'A luxurious room with a stunning view.',
            'price' => 150,
            'wifi' => 'yes',
            'room_type' => 'apartment',
            'image' => 'default-room.jpg',
        ]);
    }
}

