<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FaqCategory;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create categories
        $algemeen = FaqCategory::create([
            'name' => 'Algemene Auto Informatie',
            'description' => 'Basisinformatie over verschillende automerken en modellen',
            'sort_order' => 1
        ]);

        $specificaties = FaqCategory::create([
            'name' => 'Specificaties & Prestaties',
            'description' => 'Technische details en prestatie-informatie van auto\'s',
            'sort_order' => 2
        ]);

        $onderhoud = FaqCategory::create([
            'name' => 'Onderhoud & Verzorging',
            'description' => 'Tips en informatie over het onderhouden van uw auto',
            'sort_order' => 3
        ]);

        // Create FAQs for Algemene Auto Informatie
        Faq::create([
            'faq_category_id' => $algemeen->id,
            'question' => 'Wat zijn de verschillen tussen Duitse premium merken?',
            'answer' => 'BMW staat bekend om sportieve rijdynamiek en prestaties, Mercedes-Benz focust op luxe en comfort, en Audi combineert technologie met elegante designs. Elk merk heeft zijn eigen filosofie: BMW voor "Ultimate Driving Machine", Mercedes voor luxe en status, en Audi voor "Vorsprung durch Technik".',
            'sort_order' => 1
        ]);

        Faq::create([
            'faq_category_id' => $algemeen->id,
            'question' => 'Wat betekenen de verschillende auto-klassen?',
            'answer' => 'Auto-klassen worden vaak aangeduid met letters: A-klasse (compact), B-klasse (klein), C-klasse (middensegment), D-klasse (hogere middensegment), E-klasse (business), F-klasse (luxe). Deze classificatie helpt bij het vergelijken van vergelijkbare modellen tussen merken.',
            'sort_order' => 2
        ]);

        Faq::create([
            'faq_category_id' => $algemeen->id,
            'question' => 'Wat is het verschil tussen benzine, diesel en elektrisch?',
            'answer' => 'Benzine motors zijn lichter en responsiever, diesel motors verbruiken minder en hebben meer koppel, elektrische auto\'s zijn stil en emissievrij. Elektrische auto\'s hebben directe krachtoverbrenging en lage onderhoudskosten, maar beperktere actieradius.',
            'sort_order' => 3
        ]);

        // Create FAQs for Specificaties & Prestaties
        Faq::create([
            'faq_category_id' => $specificaties->id,
            'question' => 'Wat betekent pk en Nm bij auto\'s?',
            'answer' => 'PK (paardenkracht) meet het vermogen van de motor - hoe snel de auto kan gaan. Nm (Newton-meter) meet het koppel - de trekkracht van de motor. Hoog vermogen zorgt voor hoge snelheid, hoog koppel zorgt voor snelle acceleratie en trekkracht.',
            'sort_order' => 1
        ]);

        Faq::create([
            'faq_category_id' => $specificaties->id,
            'question' => 'Wat is het verschil tussen voorwiel-, achterwiel- en vierwielaandrijving?',
            'answer' => 'Voorwielaandrijving is zuinig en goedkoop, geschikt voor dagelijks gebruik. Achterwielaandrijving biedt betere gewichtsverdeling en sportieve handling. Vierwielaandrijving geeft maximale tractie en is ideaal voor alle weersomstandigheden en terrein.',
            'sort_order' => 2
        ]);

        Faq::create([
            'faq_category_id' => $specificaties->id,
            'question' => 'Hoe werkt turbo en wat zijn de voordelen?',
            'answer' => 'Een turbo gebruikt uitlaatgassen om extra lucht in de motor te persen, waardoor meer vermogen uit een kleinere motor gehaald wordt. Voordelen: meer power, lager verbruik, kleinere motor. Nadeel: kan complexer zijn in onderhoud.',
            'sort_order' => 3
        ]);

        // Create FAQs for Onderhoud & Verzorging
        Faq::create([
            'faq_category_id' => $onderhoud->id,
            'question' => 'Hoe vaak moet ik mijn auto laten onderhouden?',
            'answer' => 'Moderne auto\'s hebben meestal een onderhoudsinterval van 15.000-30.000 km of 1-2 jaar. Check altijd het onderhoudsboekje van uw specifieke model. Olie verversen is meestal vaker nodig dan andere onderdelen.',
            'sort_order' => 1
        ]);

        Faq::create([
            'faq_category_id' => $onderhoud->id,
            'question' => 'Wat zijn de belangrijkste vloeistoffen in mijn auto?',
            'answer' => 'Motorolie (smering), koelvloeistof (temperatuur), remvloeistof (veiligheid), ruitensproeiervloeistof (zicht), en transmissievloeistof (versnellingsbak). Controleer deze regelmatig en vervang volgens schema.',
            'sort_order' => 2
        ]);

        Faq::create([
            'faq_category_id' => $onderhoud->id,
            'question' => 'Hoe kan ik de levensduur van mijn auto verlengen?',
            'answer' => 'Regelmatig onderhoud, zachte rijstijl (geleidelijk accelereren en remmen), motor warm laten draaien in de winter, auto regelmatig rijden, en beschermen tegen weersinvloeden. Ook belangrijke: kwaliteitsonderdelen gebruiken en naar een betrouwbare garage gaan.',
            'sort_order' => 3
        ]);

        $this->command->info('FAQ test data succesvol toegevoegd!');
    }
}
