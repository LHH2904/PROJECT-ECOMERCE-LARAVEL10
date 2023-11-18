<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorShopProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'vendor@gmail.com')->first();

        $vendor = new Vendor();
        $vendor->banner = 'uploads/1342.jpg';
        $vendor->shop_name = 'Vendor Shop';
        $vendor->phone = '1231231231';
        $vendor->email = 'vendor@gmail.com';
        $vendor->address = 'VietNam';
        $vendor->description = 'Shop Description';
        $vendor->user_id = $user->id;
        $vendor->save();
    }
}
