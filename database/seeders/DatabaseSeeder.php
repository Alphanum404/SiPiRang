<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Faculty;
use App\Models\Building;
use App\Models\Room;
use App\Models\Admin;
use App\Models\Role;
use App\Models\Rent;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        { {
            }
        }
        // \Ap{{ p\Mo }}dels\User::factory()->create([
        //    {{  'na }}me' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Role::create([
            'name' => 'super admin',
        ]);

        Role::create([
            'name' => 'admin',
        ]);

        Role::create([
            'name' => 'dosen',
        ]);

        Role::create([
            'name' => 'ketua kelas',
        ]);

        Role::create([
            'name' => 'mahasiswa',
        ]);

        Role::create([
            'name' => 'guest',
        ]);

        User::create([
            'name' => 'SuperAdmin',
            'email' => 'supra@gmail.com',
            'password' => bcrypt('supra'),
            'nomor_induk' => '0',
            'role_id' => 1,
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'nomor_induk' => '00',
            'role_id' => 2 ,
        ]);

        User::create([
            'name' => 'Nimatul',
            'email' => '2302042@mahasiswa.poltek-gt.ac.id',
            'password' => bcrypt('nimatul'),
            'nomor_induk' => '2302042',
            'role_id' => 2,
        ]);

        User::create([
            'name' => 'Aldi',
            'email' => '2302010@mahasiswa.poltek-gt.ac.id',
            'password' => bcrypt('aldi'),
            'nomor_induk' => '2302010',
            'role_id' => 2,
        ]);

        User::create([
            'name' => 'Ammar',
            'email' => '2302001@mahasiswa.poltek-gt.ac.id',
            'password' => bcrypt('ammar'),
            'nomor_induk' => '2302001',
            'role_id' => 2,
        ]);

        User::create([
            'name' => 'Luthfi',
            'email' => '2302002@mahasiswa.poltek-gt.ac.id',
            'password' => bcrypt('luthfi'),
            'nomor_induk' => '2302002',
            'role_id' => 4,
        ]);

        User::create([
            'name' => 'Ridwan',
            'email' => 'ridwan@poltek.ac.id',
            'password' => bcrypt('ridwan'),
            'nomor_induk' => '0415069202',
            'role_id' => 3,
        ]);

        Faculty::create([
            'code' => 'TEKNIK',
            'name' => 'Fakultas Teknik',
        ]);

        Building::create([
            'code' => 'UTAMA',
            'name' => 'GEDUNG UTAMA',
            'location' => 'https://goo.gl/maps/s2vi7qUzymFgEXqH6',
            'faculty_id' => 1,
        ]);

        Building::create([
            'code' => 'MELATI-A',
            'name' => 'MELATI ATAS',
            'location' => 'https://goo.gl/maps/fUsDWZE1CZEF1C1YA',
            'faculty_id' => 2,
        ]);

        Building::create([
            'code' => 'MELATI-B',
            'name' => 'MELATI BAWAH',
            'location' => 'https://goo.gl/maps/osU487Y3MGa8rhgk7',
            'faculty_id' => 2,
        ]);

        Room::create([
            'code' => 'CL01',
            'name' => 'Lab Komputer',
            'img' => 'room-image/roomdefault.jpg',
            'floor' => 1,
            'status' => false,
            'capacity' => 30,
            'type' => 'Laboratorium',
            'description' => 'Lab komputer ini biasanya digunakan mahasiswa untuk pembelajaran atau praktek mata kuliah yang menggunakan komputer',
            'building_id' => 1,
        ]);

        Rent::create([
            'room_id' => mt_rand(1, 15),
            'user_id' => mt_rand(1, 5),
            'transaction_start' => now(),
            'transaction_end' => null,
            'time_start_use' => '2022-05-11 08:00:00',
            'time_end_use' => '2022-05-11 12:00:00',
            'purpose' => 'praktikum',
            'status' => 'dipinjam',
        ]);
    }
}
