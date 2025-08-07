<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Car;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = Car::all();

        if ($cars->isEmpty()) {
            $this->command->info('Geen auto\'s gevonden. Voer eerst CarSeeder uit.');
            return;
        }

        $comments = [
            ['author' => 'Jan de Vries', 'content' => 'Prachtige auto! Ik ben er dol op.'],
            ['author' => 'Marie Jansen', 'content' => 'Geweldig design en uitstekende prestaties.'],
            ['author' => 'Piet Bakker', 'content' => 'Deze auto staat op mijn verlanglijstje!'],
            ['author' => 'Lisa van Dijk', 'content' => 'Fantastische rijeigenschappen en comfort.'],
            ['author' => 'Mark de Jong', 'content' => 'Absoluut mijn favoriete model!'],
            ['author' => 'Anna Smit', 'content' => 'De technologie in deze auto is indrukwekkend.'],
            ['author' => 'Tom Visser', 'content' => 'Een droom om in te rijden!'],
            ['author' => 'Sophie Hendriks', 'content' => 'Perfect voor lange ritten.'],
        ];

        foreach ($cars as $car) {
            // Voeg 1-3 willekeurige commentaren toe per auto
            $numberOfComments = rand(1, 3);
            $selectedComments = collect($comments)->random($numberOfComments);
            
            foreach ($selectedComments as $commentData) {
                Comment::create([
                    'car_id' => $car->id,
                    'author' => $commentData['author'],
                    'content' => $commentData['content'],
                ]);
            }
        }

        $this->command->info('Commentaren succesvol toegevoegd!');
    }
}
