<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Model::unguard();

    $this->call(UsersTableSeeder::class);
    $this->call(SubjectsTableSeeder::class);
    $this->call(TraineesTableSeeder::class);
    $this->call(PostsTableSeeder::class);

    Model::reguard();
  }
}
