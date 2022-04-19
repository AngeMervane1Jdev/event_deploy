<?php

namespace Database\Seeders;

use DateTime;
use App\Models\User;
use App\Models\Event;
use App\Models\Tiket;
use App\Models\Agence;
use App\Models\Commande;
use App\Models\Profil;
use App\Models\TypeUser;
use App\Models\Type;
use App\Models\TypeTiket;
use App\Models\Transaction;
use App\Models\TypeAgence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Mockery\Matcher\Type as MatcherType;

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
             ["name"=>"Evenementielle","description"=>'Agence Evenementielle'],
             ["name"=>"Communication","description"=>'Agence de communication'],
             ["name"=>"Production Audiovisuel","description"=>"Agence d'audio visuel"],
             ["name"=>"Digitale","description"=>"Agence digitale"],
             ["name"=>"Full Service","description"=>"Agence de Full service"],
             ["name"=>"Marketing","description"=>'Agence de marketinig'],
             ["name"=>"Autres","description"=>'autres']
           
        ];
        $type_tickets=[
            ["type_name"=>"Vip","description"=>"ticket vip"],
            ["type_name"=>"Reservation","description"=>"ticket Reservation"],
            ["type_name"=>"Simple","description"=>'ticket Simple'],
          ];


         foreach ($cat as $key) {
             TypeAgence::create($key);
         }

         foreach ($type as $key) {
             \App\Models\TypeUser::create($key);
         }
         foreach ($type_tickets as $key) {
             \App\Models\TypeTiket::create($key);
        }
        Agence::create(['agence_name'=>"Massali","description"=>"Description massali","type"=>"[\"sportif\"]"]);
        Agence::create(['agence_name'=>"Agence","description"=>"the agence description","type"=>"[\"sportif\"]"]);
         User::create(["name"=>"organisateur","email"=>"o@o.com","password"=>Hash::make("00000000"),"contact"=>"00000000","agence_id"=>1,"type_user_id"=>1]);
         User::create(["name"=>"promoteur","email"=>"p@p.com","password"=>Hash::make("00000000"),"contact"=>"00000000","type_user_id"=>2]);
         User::create(["name"=>"client","email"=>"c@c.com","password"=>Hash::make("00000000"),"contact"=>"00000000","type_user_id"=>3]);
        User::create(["name"=>"massali","email"=>"a@a.com","password"=>Hash::make("00000000"),"contact"=>"0000000","agence_id"=>1,"type_user_id"=>2,"is_admin"=>true]);
         

        Profil::create(["user_id"=>1,"rates"=>0,"type_user"=>1]);
        Profil::create(["user_id"=>2,"rates"=>0,"type_user"=>1]);
        Profil::create(["user_id"=>3,"rates"=>0,"type_user"=>0]);
        Profil::create(["user_id"=>4,"rates"=>0,"type_user"=>1]);
     
          Event::create(["event_name"=>"best event32","event_description"=>"event description","zone"=>"IUT","end_time"=>date_add(now(),date_interval_create_from_date_string("11 days")),"start_time"=>date_add(now(),date_interval_create_from_date_string("1 days")),"user_id"=>2,"status"=>0,"cats"=>json_encode('e')]);
          Event::create(["event_name"=>"best event25","event_description"=>"event description","zone"=>"IUT","end_time"=>date_add(now(),date_interval_create_from_date_string("15 days")),"start_time"=>date_add(now(),date_interval_create_from_date_string("1 days")),"user_id"=>1,"status"=>1,"cats"=>json_encode('e')]);
          Tiket::create(["price"=>100,"event_id"=>1,"type_id"=>1]);
          Tiket::create(["price"=>100,"event_id"=>1,"type_id"=>1]);
          Tiket::create(["price"=>100,"event_id"=>2,"type_id"=>2]);
          Tiket::create(["price"=>22222,"event_id"=>2,"type_id"=>3]);
          Tiket::create(["price"=>1100,"event_id"=>1,"type_id"=>2]);

   
    }
}
