<?php

namespace Database\Seeders;

use App\Models\Agence;
use App\Models\Commande;
use App\Models\Event;
use App\Models\Tiket;
use App\Models\User;
use DateTime;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $type=[
            ["type_name"=>"Organisateur","description"=>"Organisateur d'évenement"],
            ["type_name"=>"Promoteur","description"=>"Promoteur d'évènement"],
            ["type_name"=>"Client","description"=>'Client'],
          ];
        $cat=[
            ["name"=>"public","description"=>'Public category'],
            ["name"=>"sportif","description"=>'Sportif category'],
            ["name"=>"Culturel","description"=>'Culturel category'],
        ];
        $type_tickets=[
            ["type_name"=>"Vip","description"=>"ticket vip"],
            ["type_name"=>"Reservation","description"=>"ticket Reservation"],
            ["type_name"=>"Simple","description"=>'ticket Simple'],
          ];

         
         foreach ($cat as $key) {
             \App\Models\Categorie::create($key);
         }

         foreach ($type as $key) {
             \App\Models\TypeUser::create($key);
         }
         foreach ($type_tickets as $key) {
             \App\Models\TypeTiket::create($key);
        }
        Agence::create(['agence_name'=>"Massali","description"=>"Description massali","categories"=>"[\"sportif\"]"]); 
        Agence::create(['agence_name'=>"Agence","description"=>"the agence description","categories"=>"[\"sportif\"]"]);
        User::create(["name"=>"test3","email"=>"test52@gmai.com","password"=>"00000000","contact"=>"00000000","agence_id"=>1,"type_user_id"=>1]);
       User::create(["name"=>"test6","email"=>"test55@gmai.com","password"=>"00000000","contact"=>"00000000","agence_id"=>1,"type_user_id"=>2]);
       User::create(["name"=>"test7","email"=>"test25@gmai.com","password"=>"00000000","contact"=>"00000000","agence_id"=>1,"type_user_id"=>2]);
        Event::create(["event_name"=>"best event32","event_description"=>"event description","zone"=>"IUT","end_time"=>date_add(now(),date_interval_create_from_date_string("11 days")),"start_time"=>date_add(now(),date_interval_create_from_date_string("1 days")),"user_id"=>2,"tag"=>"tag,tag" ,"status"=>0,"cats"=>json_encode(['e'=>'this']),"agence_id"=>1]);
        Event::create(["event_name"=>"best event25","event_description"=>"event description","zone"=>"IUT","end_time"=>date_add(now(),date_interval_create_from_date_string("15 days")),"start_time"=>date_add(now(),date_interval_create_from_date_string("1 days")),"user_id"=>3,"tag"=>"tag,tag","status"=>1,"cats"=>json_encode(['e'=>'this']),"agence_id"=>1]);
        Tiket::create(["price"=>100,"event_id"=>1,"type_id"=>1]);
        Tiket::create(["price"=>100,"event_id"=>1,"type_id"=>1]);
        Tiket::create(["price"=>100,"event_id"=>2,"type_id"=>2]);
        Tiket::create(["price"=>22222,"event_id"=>2,"type_id"=>3]);
        Tiket::create(["price"=>1100,"event_id"=>1,"type_id"=>2]);
    }
}
