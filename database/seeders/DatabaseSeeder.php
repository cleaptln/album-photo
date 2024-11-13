<?php
// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Album;
use App\Models\Tag;
use App\Models\Photo;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Album::create(["titre" => "Album1", "creation"=> "2023-07-14"]);
        Album::create(["titre" => "Album2", "creation"=> "2023-02-25"]);
        Tag::create(["nom" => "neige"]);
        Tag::create(["nom" => "vacances"]);
        Tag::create(["nom" => "mer"]);
        Tag::create(["nom" => "repas"]);

        Photo::create(["titre"=> "Ski", "url"=>"https://media.skirentalsolution.sport2000.fr/images/cache/cms_image_runtime/rc/bkNlTEFr/cms/CMS%20Guide%20Sport%202000/Ski-Alpin-histoire.jpg", "note"=>4, "album_id"=>2]);
        Photo::create(["titre"=> "Raquette", "url"=>"https://img.hardloop.com/image/upload/v1609858588/articles/id-645-comment-choisir-ses-raquettes-a-neige/randonnee-en-raquettes.jpg", "note"=>2, "album_id"=>2]);
        Photo::create(["titre"=> "Raclette", "url" => "https://static.actu.fr/uploads/2021/10/la-friche-gourmande-hiver-raclette-station-de-ski-lille-marcq-en-baroeul-960x640.jpg", "note"=>4, "album_id"=>2]);

        Photo::create(["titre"=> "caraibes", "url" =>"https://www.lodge-coco.com/wp-content/uploads/2020/05/Plage-Grande-Anse-Deshaies-Guadeloupe-1000-768x513.jpg", "note"=>4, "album_id"=>1]);
        Photo::create(["titre"=> "fruits", "url" =>"https://www.autolagon.fr/blog/wp-content/uploads/2019/08/58845566_719194398539870_1399447932997992448_o-1080x675.jpg", "note"=>2, "album_id"=>1]);

        DB::insert("INSERT INTO possede_tag values(NULL, 1, 1)");
        DB::insert("INSERT INTO possede_tag values(NULL, 1, 2)");

        DB::insert("INSERT INTO possede_tag values(NULL, 2, 1)");
        DB::insert("INSERT INTO possede_tag values(NULL, 2, 2)");

        DB::insert("INSERT INTO possede_tag values(NULL, 3, 1)");
        DB::insert("INSERT INTO possede_tag values(NULL, 3, 4)");

        DB::insert("INSERT INTO possede_tag values(NULL, 4, 2)");
        DB::insert("INSERT INTO possede_tag values(NULL, 4, 3)");

        DB::insert("INSERT INTO possede_tag values(NULL, 5, 2)");
        DB::insert("INSERT INTO possede_tag values(NULL, 5, 4)");
    }
}
