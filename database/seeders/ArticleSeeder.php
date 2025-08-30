<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => 'New Centrality',
                'excerpt' => '“Centrality” conveys the concept that specific areas within a city
                wield a central or dominant role in terms of social and cultural
                importance.',
                'summary' => '“Centrality” conveys the concept that specific areas within a city
                wield a central or dominant role in terms of social and cultural
                importance. These pivotal locations transcend mere geography,
                serving as hubs where social, economic, and political activities
                intersect. They often symbolize authority, influence, and a
                concentration of resources. The essence of centrality is twofold—it
                is both a cognitive process and a social phenomenon. Mentally,',
                'description' => '“Centrality” conveys the concept that specific areas within a city
                wield a central or dominant role in terms of social and cultural
                importance. These pivotal locations transcend mere geography,
                serving as hubs where social, economic, and political activities
                intersect. They often symbolize authority, influence, and a
                concentration of resources. The essence of centrality is twofold—it
                is both a cognitive process and a social phenomenon. Mentally, it
                involves the simultaneous consideration of events and perceptions
                of elements within a comprehensive “reality.” Socially, it entails
                the convergence and amalgamation of assets, products, wealth,
                and activities. Consequently, centrality can be interpreted as a
                comprehensive amalgamation of diverse elements.
                The new Baggerarea is remodeld by doing small interferences to
                help create new social and cultural importance. One of the main
                interferences is opening up the inner dyke to to the public and
                making it a public property only accessible by pedestrians like the
                old dyke used to be.
                Furthermore new functions are added to the area like a new inner
                making street in the Rotterdam Steelworks BV shipyard with a Box
                in Box system wich can be entered from the North and the south
                of the dyke. Secondly the old Dredging museum including the
                extension are converted into an hotel. The current Wow-Keet will
                be cladded with wooden material and be used as a Pavilion were
                people from the can rest and have a coffee.',
                'date' => now(),
            ],
            [
                'title' => 'Hard to miss Bashar',
                'description' => 'Bashar Al Assad jr',
                'date' => now(),
            ],
            [
                'title' => 'Hard to miss Apsilon',
                'description' => 'Born and bred Berliner artist, his rap is a mix of German and Turkish influences',
                'date' => now(),
            ],
            [
                'title' => 'Hard to miss Skepta',
                'description' => 'Nigerian MC and Grime artist',
                'date' => now(),
            ],
            [
                'title' => 'Hard to miss Celeste',
                'description' => 'Upcoming, shining doing her thing in style, mentality and goals. Di Nero is di shit.',
                'date' => now(),
            ],
            [
                'title' => 'Hard to miss Milo',
                'description' => 'Milo makes it work. What can we say. Heb je leren pijpen?',
                'date' => now(),
            ],
            [
                'title' => 'Hard to miss Richmond',
                'description' => 'Richy is going strong and thriving. Hotter than your father, hide ya wife',
                'date' => now(),
            ],
            [
                'title' => 'Hard to miss Zaïra',
                'description' => 'She can do everything, cooks the nicest eggs and has the kindest heart',
                'date' => now(),
            ],
        ];

        foreach ($articles as $data) {
            Article::create($data);
        }
    }
}
