<?php

use Illuminate\Database\Seeder;

class StreamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //
            DB::table('streams')->insert([
        [
            'title' => "World Cafe",
            'image' => "1worldcafe.jpg",
            'description' => "World Cafe is the premier public radio showcase for contemporary music serving up an eclectic blend that includes blues, rock, world, folk, and alternative country. ",
            'source' => "http://audio-ice1.ibiblio.org:8000/wncw-128k",
            'date' => "March 22th, 2016",
            'order' => "3",
        ],
        [
            'title' => "Goin' Across The Mountain",
            'image' => "2gatm.jpg",
            'description' => "Goin’ Across The Mountain is eight hours of the best in Contemporary/Traditional and Historical Bluegrass Music on The Flagship Bluegrass Station, WNCW-FM in Spindale, NC.",
            'source' => "http://audio-ice1.ibiblio.org:8000/wncw-128k",
            'date' => "March 23rd, 2016",
            'order' => "4",
        ],
        [
            'title' => "Dead Air",
            'image' => "3deadair.png",
            'description' => "Dead Air celebrates The Grateful Dead and the music and culture that the band has inspired since their formation in 1965.  Before Dead Air began, WNCW had only one hour of Grateful Dead oriented programming per week, with the Grateful Dead Hour, hosted by",
            'source' => "http://audio-ice1.ibiblio.org:8000/wncw-128k",
            'date' => "March 20th, 2016",
            'order' => "2",
        ],
        [
            'title' => "Celtic Winds",
            'image' => "4celticwinds.jpg",
            'description' => "Celtic Winds is one of the signature programs produced weekly at WNCW.  From popular and emerging artists, to classic recordings gleaned from our large library, there is sure to be something different every week.  Celtic music is an integral part of the musical heartland of Western North Carolina where WNCW is located, but it exploded onto the world stage during the revival of the last century, and is now recognized as a dominant...",
            'source' => "http://audio-ice1.ibiblio.org:8000/wncw-128k",
            'date' => "March 18th, 2016",
            'order' => "1",
        ]
        ]);
    }
}
