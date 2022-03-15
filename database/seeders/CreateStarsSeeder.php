<?php

namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use App\Models\Star;
   
class CreateStarsSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $star = [
            [
                'firstName'=>'Robert',
                'lastName'=>'Pattinson',
                'description'=>'Robert Pattinson est un acteur, mannequin et musicien britannique, né le 13 mai 1986 à Barnes (Londres).',
                'image'=> 'robert.jpg',
            ],
            [
                'firstName'=>'Robert Junior',
                'lastName'=>'Pattinson',
                'description'=>'Robert Pattinson est un acteur, mannequin et musicien britannique, né le 13 mai 1986 à Barnes (Londres).',
                'image'=> 'robert.jpg',
            ],
            [
                'firstName'=>'Robert Junior Junior',
                'lastName'=>'Pattinson',
                'description'=>'Robert Pattinson est un acteur, mannequin et musicien britannique, né le 13 mai 1986 à Barnes (Londres).',
                'image'=> 'robert.jpg',
            ],

        ];
  
        foreach ($star as $key => $value) {
            Star::create($value);
        }
    }
}