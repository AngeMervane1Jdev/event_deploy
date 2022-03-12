<?php

namespace Database\Seeders;

use DateTime;
use App\Models\User;
use App\Models\Event;
use App\Models\Tiket;
use App\Models\Agence;
use App\Models\Commande;
use App\Models\TypeUser;
use App\Models\Categorie;
use App\Models\TypeTiket;
use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
           ["name"=>"privé","description"=>'Culturel category'],
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
         User::create(["name"=>"organisateur","email"=>"o@o.com","password"=>Hash::make("00000000"),"contact"=>"00000000","agence_id"=>1,"type_user_id"=>1]);
         User::create(["name"=>"promoteur","email"=>"p@p.com","password"=>Hash::make("00000000"),"contact"=>"00000000","type_user_id"=>2]);
         User::create(["name"=>"client","email"=>"c@c.com","password"=>Hash::make("00000000"),"contact"=>"00000000","type_user_id"=>3]);
        User::create(["name"=>"massali","email"=>"a@a.com","password"=>Hash::make("00000000"),"contact"=>"0000000","agence_id"=>1,"type_user_id"=>2,"is_admin"=>true]);
         
          Event::create(["event_name"=>"best event32","event_description"=>"event description","zone"=>"IUT","end_time"=>date_add(now(),date_interval_create_from_date_string("11 days")),"start_time"=>date_add(now(),date_interval_create_from_date_string("1 days")),"user_id"=>2,"status"=>0,"cats"=>json_encode('e')]);
          Event::create(["event_name"=>"best event25","event_description"=>"event description","zone"=>"IUT","end_time"=>date_add(now(),date_interval_create_from_date_string("15 days")),"start_time"=>date_add(now(),date_interval_create_from_date_string("1 days")),"user_id"=>1,"status"=>1,"cats"=>json_encode('e')]);
          Tiket::create(["price"=>100,"event_id"=>1,"type_id"=>1]);
          Tiket::create(["price"=>100,"event_id"=>1,"type_id"=>1]);
          Tiket::create(["price"=>100,"event_id"=>2,"type_id"=>2]);
          Tiket::create(["price"=>22222,"event_id"=>2,"type_id"=>3]);
          Tiket::create(["price"=>1100,"event_id"=>1,"type_id"=>2]);

    Transaction::create(["numero"=>"+299 90 99 36 12","amount"=>"26$","transref"=>"Mtn","ticket_id"=>4,"client_id"=>4]);
    Transaction::create(["numero"=>"+299 68 58 69 22","amount"=>"30$","transref"=>"Moov","ticket_id"=>5,"client_id"=>4]);
    Transaction::create(["numero"=>"+299 68 06 83 24","amount"=>"40$","transref"=>"Moov","ticket_id"=>6,"client_id"=>4]);
    Transaction::create(["numero"=>"+299 94 91 75 46","amount"=>"50$","transref"=>"Mtn","ticket_id"=>2,"client_id"=>5]);
    }
}
