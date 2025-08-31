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
                'title' => 'Dutch Steps',
                'excerpt' => 'The Dutch Steps is a housing block that aims to create a multi-
                generational, living-working environment.',
                'description' => 'The Dutch Steps is a housing block that aims to create a multi-
                generational, living-working environment. It incorporates student,

                starter, and family housing in a complex space that
                balances recreation, working, and consumer functions in order to
                allow these different parties to not only live together, but improve
                the quality of life of the community as whole.
                Total amount of dwellings: 96
                Dwelling types and amounts:
                6 Types
                Studios - 57
                Student Apartments - 9
                Small Apartments - 3
                Medium Apartments - 17
                Large Apartments - 5
                Row House - 5
                Amenities: Exercise Room, Cinema, Study Library, Cafe (x2),
                Workshops
                (x4), Bike Storage, Community Gardens.
                M1 concrete structure dismountable reusable
                M2 Prefabricated construction elements are efficiently demountable
                and reusable
                M3 Durable concrete composition in structural elements
                M4 Operable return system e.g. roofing/elevator/lighting
                M5 Material savings by making the balconies inward.',
                'date' => now(),
            ],
            [
                'title' => 'De Delft',
                'excerpt' => 'The program of requirements revealed that the building should be
                recognizable, exude sport and generally be a sustainable integral
                building.',
                'description' => 'The program of requirements revealed that the building should be
                recognizable, exude sport and generally be a sustainable integral
                building. I translated this into that the building should be historically
                conscious or grounded. That it should have an open character and
                that it should be made mostly of sustainable material in this case
                wood. The historical character comes from the inspiration source of
                the design “De Delft”. The open character can be seen in the large
                area of glass facade and the open spaces and voids in the building.
                The building is constructed as follows. SHS-HF 400x400 columns
                are poured into the concrete foundation along with the concrete
                cores that house the elevator shafts and staircases. This provides
                the largest load-bearing capacity. The largest span is 25.2 m which
                is achieved with trusses of 1.68 m high in which the sports halls
                will be hung. The beams will consist of HE260 beams for spans
                greater than 7.2 meters and Gl28h glulam beams will be used for
                spans less than 7.2 meters. Floors are made of hollow-core slabs for
                spans of 7.2 meters and CLT slabs are used for spans of 3.6 meters.
                Moment resistant glulam trusses consisting of 4 parts (2 columns
                and 2 beams connected by finger welding) are placed all over the
                building. This construction will support the roof and part of the facade.',
                'date' => now(),
            ],
            [
                'title' => 'Art Box',
                'excerpt' => 'Currently most packaging and transport of artworks is done very
                traditionally, by creating an exclusive wooden crate for each painting.',
                'description' => 'Currently most packaging and transport of artworks is done very
                traditionally, by creating an exclusive wooden crate for each painting.
                Thus Art Salvage gave the assignment to design an art transport box
                preferably for both paintings and 3D models. The main objective
                was to make the box suitable for housing paintings of different sizes
                and shapes. It should be fully equipped to withstanding external
                influences for example temperature changes, fluctuating humidity
                levels and vibrations without damaging the art work contained
                inside.',
                'date' => now(),
            ],
        ];

        foreach ($articles as $data) {
            Article::create($data);
        }
    }
}
