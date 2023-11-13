<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendor;
use App\Models\User;

class AdminProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'admin@gmail.com')->first();

        $vendor = new Vendor();
        $vendor->banner = 'uploads/1342.jpg';
        $vendor->phone = '1231231231';
        $vendor->email = 'admin@gmail.com';
        $vendor->address = 'VietNam';
        $vendor->description = 'Shop Description';
        $vendor->user_id = $user->id;
        $vendor->save();
    }
}
