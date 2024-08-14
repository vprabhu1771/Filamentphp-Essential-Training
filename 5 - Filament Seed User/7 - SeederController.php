<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SeederController extends Controller
{
    public function runUserSeeder()
    {
        try {
            // Run the UsersTableSeeder
            Artisan::call('db:seed', ['--class' => 'UsersTableSeeder']);

            // Optionally, you can get the output of the seed command
            $output = Artisan::output();

            return response()->json(['message' => 'Seeder successfully executed', 'output' => $output]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error running seeder', 'message' => $e->getMessage()], 500);
        }
    }
}
