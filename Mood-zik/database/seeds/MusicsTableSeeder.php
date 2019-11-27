<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MusicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('musics')->insert([
          'title' => 'Dance Monkey - Tones and I',
          'artist' => 'Tones and I',
          'embed' => '<iframe src="https://open.spotify.com/embed/track/1rgnBhdG2JDFTbYkYRZAku" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>',
        ]);

        DB::table('musics')->insert([
          'title' => 'ROXANNE - Arizona Zevras',
          'artist' => 'Arizona Zevras',
          'embed' => '<iframe src="https://open.spotify.com/embed/track/696DnlkuDOXcMAnKlTgXXK" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>',
        ]);

        DB::table('musics')->insert([
          'title' => 'Memories - Maroon 5',
          'artist' => 'Maroon 5',
          'embed' => '<iframe src="https://open.spotify.com/embed/track/2b8fOow8UzyDFAE27YhOZM" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>',
        ]);

        DB::table('musics')->insert([
          'title' => 'everything i wanted - Billie Eilish',
          'artist' => 'Billie Eilish',
          'embed' => '<iframe src="https://open.spotify.com/embed/track/3ZCTVFBt2Brf31RLEnCkWJ" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>',
        ]);

        DB::table('musics')->insert([
          'title' => 'Circles - Post Malone',
          'artist' => 'Post Malone',
          'embed' => '<iframe src="https://open.spotify.com/embed/track/21jGcNKet2qwijlDFuPiPb" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>',
        ]);

        DB::table('musics')->insert([
          'title' => 'Don\'t Start Now - Dua Lipa',
          'artist' => 'Dua Lipa',
          'embed' => '<iframe src="https://open.spotify.com/embed/track/6WrI0LAC5M1Rw2MnX2ZvEg" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>',
        ]);

    }
}
