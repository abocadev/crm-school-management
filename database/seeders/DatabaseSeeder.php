<?php

namespace Database\Seeders;

use App\Models\School;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@technodac.com',
            'password' => Hash::make('password'),
        ]);

        School::create([
            "name" => "Sagrat Cor El Vendrell",
            "direction" => "Ctra. de Valls, 26, 43700 El Vendrell, Tarragona",
            "logo" => "schools_logos/permanent/sagrat_cor_el_vendrell.png",
            "email" => "sagratcorelvendrell@gmail.com",
            "phone" => "+34 977 66 01 73",
            "website" => "http://www.sagratcorelvendrell.cat/"
        ]);

        School::create([
            "name" => "iFP Hospitalet",
            "direction" => "Av. de Josep Tarradellas i Joan, 171, 08901 L'Hospitalet de Llobregat, Barcelona",
            "logo" => "schools_logos/permanent/ifp.png",
            "email" => "hospitalet@ifp.es",
            "phone" => "+34 932 91 27 00",
            "website" => "http://www.ifp.es/"
        ]);

        School::create([
            "name" => "Escola Montserrat",
            "direction" => "Carrer de Montserrat, 21, 08003 Barcelona",
            "logo" => "schools_logos/permanent/escola_montserrat.png",
            "email" => "escolamontserrat@escola.com",
            "phone" => "+34 932 03 21 54",
            "website" => "http://www.escolamontserrat.com/"
        ]);

        School::create([
            "name" => "Institut Verdaguer",
            "direction" => "Carrer de Pau Claris, 50, 08010 Barcelona",
            "logo" => "schools_logos/permanent/institut_verdaguer.jpg",
            "email" => "verdaguer@institut.com",
            "phone" => "+34 933 01 50 00",
            "website" => "http://www.institutverdaguer.cat/"
        ]);

        School::create([
            "name" => "Escola La Immaculada",
            "direction" => "Carrer de la Immaculada, 17, 08017 Barcelona",
            "logo" => "schools_logos/permanent/escola_inmaculada.png",
            "email" => "immaculada@escola.com",
            "phone" => "+34 934 51 23 45",
            "website" => "http://www.escolaimmaculada.com/"
        ]);

        School::create([
            "name" => "Institut de l'Avinguda",
            "direction" => "Avinguda Diagonal, 500, 08006 Barcelona",
            "logo" => "schools_logos/permanent/institut.png",
            "email" => "avenda@institut.com",
            "phone" => "+34 933 52 25 35",
            "website" => "http://www.institutavenda.cat/"
        ]);

        School::create([
            "name" => "Escola Gaudí",
            "direction" => "Carrer de Gaudí, 23, 08041 Barcelona",
            "logo" => "schools_logos/permanent/institut.png",
            "email" => "gaudi@escola.com",
            "phone" => "+34 933 35 44 55",
            "website" => "http://www.escolagaudi.com/"
        ]);

        School::create([
            "name" => "Escola de les Arts",
            "direction" => "Carrer de les Arts, 12, 08030 Barcelona",
            "logo" => "schools_logos/permanent/institut.png",
            "email" => "arts@escola.com",
            "phone" => "+34 934 58 35 80",
            "website" => "http://www.escoladelesarts.cat/"
        ]);

        School::create([
            "name" => "Escola Sant Josep",
            "direction" => "Carrer de Sant Josep, 18, 08030 Barcelona",
            "logo" => "schools_logos/permanent/institut.png",
            "email" => "santjosep@escola.com",
            "phone" => "+34 933 40 45 00",
            "website" => "http://www.escolasantjosep.com/"
        ]);

        School::create([
            "name" => "Escola Ricard Vinyes",
            "direction" => "Carrer Ricard Vinyes, 25, 08009 Barcelona",
            "logo" => "schools_logos/permanent/institut.png",
            "email" => "ricardvinyes@escola.com",
            "phone" => "+34 933 23 19 11",
            "website" => "http://www.escolaricardvinyes.cat/"
        ]);

        School::create([
            "name" => "Escola Nostra Senyora",
            "direction" => "Carrer de Nostra Senyora, 45, 08012 Barcelona",
            "logo" => "schools_logos/permanent/institut.png",
            "email" => "nsenyora@escola.com",
            "phone" => "+34 932 54 21 10",
            "website" => "http://www.escolansenyora.com/"
        ]);

        School::create([
            "name" => "Institut Mare de Déu de Montserrat",
            "direction" => "Carrer de la Mare de Déu, 30, 08012 Barcelona",
            "logo" => "schools_logos/permanent/institut.png",
            "email" => "maredemontserrat@institut.com",
            "phone" => "+34 933 45 23 30",
            "website" => "http://www.institutmaredemontserrat.com/"
        ]);


        $students = [
            ["id" => 1, "name" => "Ana", "surname" => "Pérez", "school_id" => 1, "birthday" => new \DateTime('2001-05-15'), "hometown" => "Vendrell"],
            ["id" => 2, "name" => "Luis", "surname" => "Gómez", "school_id" => 1, "birthday" => new \DateTime('2000-03-10'), "hometown" => "Vendrell"],
            ["id" => 3, "name" => "Sofia", "surname" => "Ruiz", "school_id" => 1, "birthday" => new \DateTime('1999-07-22'), "hometown" => "Vendrell"],
            ["id" => 4, "name" => "Carlos", "surname" => "Martínez", "school_id" => 2, "birthday" => new \DateTime('2002-11-11'), "hometown" => "Vendrell"],
            ["id" => 5, "name" => "Marta", "surname" => "López", "school_id" => 2, "birthday" => new \DateTime('2001-09-14'), "hometown" => "Vendrell"],
            ["id" => 6, "name" => "Juan", "surname" => "López", "school_id" => 2, "birthday" => new \DateTime('2000-02-20'), "hometown" => "Hospitalet"],
            ["id" => 7, "name" => "Antonio", "surname" => "García", "school_id" => 3, "birthday" => new \DateTime('2000-06-15'), "hometown" => "Hospitalet"],
            ["id" => 8, "name" => "Laura", "surname" => "Fernández", "school_id" => 3, "birthday" => new \DateTime('2001-01-25'), "hometown" => "Hospitalet"],
            ["id" => 9, "name" => "Beatriz", "surname" => "Sánchez", "school_id" => 3, "birthday" => new \DateTime('1999-12-05'), "hometown" => "Hospitalet"],
            ["id" => 10, "name" => "David", "surname" => "Romero", "school_id" => 4, "birthday" => new \DateTime('2002-10-13'), "hometown" => "Hospitalet"],
            ["id" => 11, "name" => "María", "surname" => "González", "school_id" => 4, "birthday" => new \DateTime('2000-03-30'), "hometown" => "Montserrat"],
            ["id" => 12, "name" => "Cristina", "surname" => "Díaz", "school_id" => 4, "birthday" => new \DateTime('2000-05-20'), "hometown" => "Montserrat"],
            ["id" => 13, "name" => "Juan Carlos", "surname" => "Pérez", "school_id" => 5, "birthday" => new \DateTime('2001-02-10'), "hometown" => "Montserrat"],
            ["id" => 14, "name" => "Pedro", "surname" => "Sánchez", "school_id" => 6, "birthday" => new \DateTime('2001-04-18'), "hometown" => "Montserrat"],
            ["id" => 15, "name" => "Isabel", "surname" => "Rodríguez", "school_id" => 6, "birthday" => new \DateTime('1999-08-08'), "hometown" => "Montserrat"],
            ["id" => 16, "name" => "Carlos", "surname" => "Martínez", "school_id" => 7, "birthday" => new \DateTime('2000-12-15'), "hometown" => "Verdaguer"],
            ["id" => 17, "name" => "Juan", "surname" => "Pérez", "school_id" => 7, "birthday" => new \DateTime('2001-01-09'), "hometown" => "Verdaguer"],
            ["id" => 18, "name" => "Marta", "surname" => "González", "school_id" => 8, "birthday" => new \DateTime('2001-05-16'), "hometown" => "Verdaguer"],
            ["id" => 19, "name" => "Raúl", "surname" => "Fernández", "school_id" => 8, "birthday" => new \DateTime('2000-08-03'), "hometown" => "Verdaguer"],
            ["id" => 20, "name" => "Patricia", "surname" => "Díaz", "school_id" => 8, "birthday" => new \DateTime('2002-01-27'), "hometown" => "Verdaguer"],
            ["id" => 21, "name" => "Laura", "surname" => "Fernández", "school_id" => 9, "birthday" => new \DateTime('1999-10-12'), "hometown" => "Immaculada"],
            ["id" => 22, "name" => "José", "surname" => "López", "school_id" => 9, "birthday" => new \DateTime('2000-11-17'), "hometown" => "Immaculada"],
            ["id" => 23, "name" => "Marta", "surname" => "Sánchez", "school_id" => 10, "birthday" => new \DateTime('2001-06-25'), "hometown" => "Immaculada"],
            ["id" => 24, "name" => "David", "surname" => "Romero", "school_id" => 10, "birthday" => new \DateTime('2000-01-09'), "hometown" => "Immaculada"],
            ["id" => 25, "name" => "Pedro", "surname" => "Sánchez", "school_id" => null, "birthday" => new \DateTime('2002-04-07'), "hometown" => "Immaculada"],
            ["id" => 26, "name" => "Pedro", "surname" => "Sánchez", "school_id" => null, "birthday" => new \DateTime('2000-12-02'), "hometown" => "Venda"],
            ["id" => 27, "name" => "Laura", "surname" => "Martín", "school_id" => null, "birthday" => new \DateTime('2001-09-25'), "hometown" => "Venda"],
            ["id" => 28, "name" => "Cristina", "surname" => "Díaz", "school_id" => null, "birthday" => new \DateTime('2002-06-14'), "hometown" => "Venda"],
            ["id" => 29, "name" => "Carlos", "surname" => "Fernández", "school_id" => null, "birthday" => new \DateTime('2001-07-10'), "hometown" => "Venda"],
            ["id" => 30, "name" => "Javier", "surname" => "Ruiz", "school_id" => null, "birthday" => new \DateTime('2000-05-21'), "hometown" => "Venda"],
        ];


        foreach ($students as $student) {
            Student::create($student);
        }
    }
}
