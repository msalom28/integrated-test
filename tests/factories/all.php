<?php 

$factory('App\Post', [

	'title' => $faker->sentence,
	'paragraph' => $faker->paragraph
	
]);

$factory('App\User', [

	'name' => $faker->name,
	'email' => $faker->email,
	'password' => bcrypt($faker->password)
	
]);