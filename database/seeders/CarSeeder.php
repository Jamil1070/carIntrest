<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    public function run()
    {
        $cars = [
            [
                'name' => 'Porsche',
                'model' => '911 Carrera',
                'description' => 'De Porsche 911 Carrera is een iconische sportwagen met een perfecte balans tussen snelheid en luxe.',
                'photo_url' => 'images/porsche_911.jpg',
            ],
            [
                'name' => 'Tesla',
                'model' => 'Model S',
                'description' => 'Tesla Model S is een elektrische luxe sedan met indrukwekkende prestaties en geavanceerde technologie.',
                'photo_url' => 'images/tesla_model_s.jpg',
            ],
            [
                'name' => 'Ferrari',
                'model' => '488 GTB',
                'description' => 'De Ferrari 488 GTB is een high-performance sportwagen met een krachtige V8 motor.',
                'photo_url' => 'images/ferrari_488.jpg',
            ],
            [
                'name' => 'Audi',
                'model' => 'A6',
                'description' => 'Audi A6 is een stijlvolle en comfortabele executive sedan met veel technologie aan boord.',
                'photo_url' => 'images/audi_a6.jpg',
            ],
            [
                'name' => 'BMW',
                'model' => 'M3',
                'description' => 'BMW M3 staat bekend om zijn sportieve rijeigenschappen en dynamisch design.',
                'photo_url' => 'images/bmw_m3.jpg',
            ],
            [
                'name' => 'Mercedes-Benz',
                'model' => 'C-Klasse',
                'description' => 'Mercedes-Benz C-Klasse combineert luxe met comfort en geavanceerde veiligheidsfeatures.',
                'photo_url' => 'images/mercedes_c_klasse.jpg',
            ],
        ];

        foreach ($cars as $car) {
            Car::create($car);
        }
    }
}
