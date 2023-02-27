<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Support\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // DB::table('users')->insert()
        // $else = factory(App\User::class, 10)->create();
        // $doe = factory(App\User::class)->states('john-doe')->create();
        // $users = $else->concat([$doe]);
        // // dd(get_class($else));

        // //Seed with relation
        // $posts = factory(App\BlogPost::class, 50)->make()->each(function ($post) use ($users) {
        //     $post->user_id = $users->random()->id;
        //     $post->save();
        // });

        // $comments = factory(App\Comment::class, 100)->make()->each(function ($comment) use ($posts) {
        //     $comment->blog_post_id = $posts->random()->id;
        //     $comment->save();
        // });


        //Break file
        // $this->call(UsersTableSeeder::class);
        // $this->call(BlogPostsTableSeeder::class);
        // $this->call(CommentsTableSeeder::class);

        // if ($this->command->confirm('Do you want to refresh the database?', true)) {
        //     $this->command->call('migrate:refresh');
        //     $this->command->info('Database was refreshed');
        // }

        if ($this->command->confirm('Do you want to refresh the database?')) {
            $this->command->call('migrate:refresh');
            $this->command->info('Database was refreshed');
        }

        $this->call([UsersTableSeeder::class, BlogPostsTableSeeder::class, CommentsTableSeeder::class]);
    }
}
