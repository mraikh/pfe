<?php

namespace Database\Seeders;

use App\Models\Chapitre;
use App\Models\Cours;
use App\Models\Formateur;
use App\Models\Formation;
use App\Models\Role;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();
        Role::create([
            'id' => 1,
            'name' => 'formateur',
        ]);

        Role::create([
            'id' => 2,
            'name' => 'apprenant',
        ]);
        Role::create([
            'id' => 3,
            'name' => 'admin',
        ]);
        User::create([
            'name' => 'admin',
            'password' => 'admin 123',
            'email' => 'admin@gmail.com',
            'role_id' => 3,
        ]);
        $user = User::create([
            'name' => 'mehdi jai',
            'password' => '123456789',
            'email' => 'contact@mehdijai.com',
            'role_id' => 1,
        ]);

        $formateur = Formateur::create([
            'specialite' => "Fullstack web dev",
            'biography' => "UI/UX designer & fullstack developer specialized in Laravel, VueJS, NodeJS and ElectronJS",
            'user_id' => $user->id,
        ]);

        $formation = Formation::create([
            'intitule' => 'Frontend dev',
            'formateur_id' => $formateur->id,
            'description' => 'Learn frontend dev from A->Z',
        ]);

        $cours = Cours::create([
            'intitule' => 'HTML CSS JS - Beginner start pack',
            'formation_id' => $formation->id,
            'description' => 'Learn the basics of web dev with the Monster Trio; HTML CSS and JavaScript',
            'duree' => '1 mois',
        ]);

        $quiz = json_encode([
            [
                "id" => 1,
                "question_content" => "What stands HTTP for?",
                "answers" => [
                    [
                        "title" => "A",
                        "content" => "Hypertext telecommunicate protocol",
                        "point" => -1,
                    ],
                    [
                        "title" => "B",
                        "content" => "Hypertext transfer protocol",
                        "point" => 1,
                    ],
                    [
                        "title" => "A",
                        "content" => "Hypertext transmitting protocol",
                        "point" => -1,
                    ],
                ],
            ],
            [
                "id" => 2,
                "question_content" => "What stands CSS for?",
                "answers" => [
                    [
                        "title" => "A",
                        "content" => "Cascading stylesheet",
                        "point" => 1,
                    ],
                    [
                        "title" => "B",
                        "content" => "Custom stylesheet",
                        "point" => -1,
                    ],
                    [
                        "title" => "A",
                        "content" => "Custom style script",
                        "point" => -1,
                    ],
                ],
            ],
        ]);

        $chapitre = Chapitre::create([
            'intitule' => 'Introduction to web development',
            'description' => 'An introduction to web development history and how it started',
            'file' => null,
            'quiz' => $quiz,
            'cours_id' => $cours->id,
        ]);

    }
}
