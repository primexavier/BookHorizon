<?php

use Illuminate\Database\Seeder;

class CategoryGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => 1,
            'name' => "ARTS & PHOTOGRAPHY",
            'description' => "Publisher Test",
        ]);
        DB::table('categories')->insert([
            'id' => 2,
            'name' => "CHILDREN'S BOOKS",
            'description' => "Publisher Test",
        ]);
        DB::table('categories')->insert([
            'id' => 3,
            'name' => "BIOGRAPHIES",
            'description' => "Publisher Test",
        ]);
        DB::table('genres')->insert([
            'id' => 1,
            'genre' => "Self-Help/Personal Development"
        ]);
        DB::table('genres')->insert([
            'id' => 2,
            'genre' => "Psychology"
        ]);
        DB::table('genres')->insert([
            'id' => 3,
            'genre' => "Wildlife Animals"
        ]);
    }
}
