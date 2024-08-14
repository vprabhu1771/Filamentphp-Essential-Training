<?php

use App\Http\Controllers\SeederController;

Route::get('/run-user-seeder', [SeederController::class, 'runUserSeeder']);


// Access the route in your browser or through an API client like Postman to trigger the seeder:

// http://your-app-url/run-user-seeder


// Remember, running seeders via controllers should be done with caution, and it's important to be aware of the potential consequences, especially in a production environment. It's typically a better practice to run seeders during the development phase or as part of the deployment process.

