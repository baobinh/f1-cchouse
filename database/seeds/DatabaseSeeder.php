<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

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

    $this->call(SubjectsTableSeeder::class);
    $this->call(TraineesTableSeeder::class);
    $this->call(PostsTableSeeder::class);

    Model::reguard();
  }
}
