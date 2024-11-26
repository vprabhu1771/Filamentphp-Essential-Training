<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\SystemSetting;

class SystemSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SystemSetting::create([
            'company_name' => 'KING FLEX INDIA INNOVATIONS',
            'email' => 'kingflexmattress@gmail.com',
            'website' => 'kingflexindia.com',
            'customer_care_no' => '+91-88700 44463',
        ]);
    }
}
