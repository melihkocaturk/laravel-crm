<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use App\User;
use App\Category;
use App\Tag;
use App\Article;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        $categories = [
            'Prologue',
            'Getting Started',
            'Architecture Concepts',
            'The Basics',
            'Frontend',
            'Security',
            'Digging Deeper',
            'Database',
            'Eloquent ORM',
            'Testing',
            'Official Packages',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'slug' => Str::slug($category),
            ]);
        }

        $tags = [
            'Laravel',
            'Homestead',
            'Blade Templates',
            'Facades',
            'Authentication',
            'Authorization',
            'Encryption',
            'Eloquent ORM',
            'Migrations',
            'Seeding',
        ];

        foreach ($tags as $tag) {
            Tag::create([
                'name' => $tag,
                'slug' => Str::slug($tag),
            ]);
        }

        for ($i=1; $i <= 10; $i++) {
            $title = $faker->sentence(rand(3, 5));

            $article = Article::create([
                'user_id' => User::first()->id,
                'title' => $title,
                'content' => $faker->paragraph(10),
                'slug' => Str::slug($title),
            ]);

            $article->categories()->attach(Category::inRandomOrder()->first()->id);
            $article->tags()->attach(Tag::inRandomOrder()->first()->id);
        }
    }
}
