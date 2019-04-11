<?php

use Illuminate\Database\Seeder;

class CharacterSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('characters')->insert($this->getCharacters());
    }
    private function getCharacters()
    {
        return [
            [
                'maximum_hp' => 22,
                'name' => 'Ragnar Ironside',
                'level' => 7,
                'classes' => 'Barbarian',
                'race' => 'Human',
                'theme_color' => 'grey',
                'user_id' => 1
            ]
        ];
    }
}
