<?php

// Define the folder where seeders are located
$seeder_folder = 'database/seeders/';


// loop through all files in the seeders folder and include them
foreach(glob($seeder_folder.'*.php') as $file) {
    include_once $file;
}

$DatabaseSeeders=[
    new BookSeeder(),
    new DVDSeeder(),
    new FurnitureSeeder(),
    new ProductSeeder(),

];

$input=readline('Do you want to create tables before seeding [y/n] ? ');

//loop through the seeders and run the run method
foreach($DatabaseSeeders as $class) {
    if (is_subclass_of($class, 'Seeder')) {
        $seeder = new $class();
        $seeder->run();
    }
}

// Print success message
echo 'All seeders have been run successfully!';