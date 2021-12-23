<?php
namespace Database\Seeders;

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
        \App\Models\User::insert(
            [
                [
                    'id_number' => '11211121',
                    'name' => 'Admin',
                    'email' => 'admin@test.com',
                    'password' => bcrypt('123456'),
                    'role' => 'admin',
                ],
                [
                    'id_number' => '11411141',
                    'name' => 'Joe',
                    'email' => 'joe@test.com',
                    'password' => bcrypt('123456'),
                    'role' => 'admin',
                ],
                [
                    'id_number' => '11511211',
                    'name' => 'User',
                    'email' => 'user@test.com',
                    'password' => bcrypt('123456'),
                    'role' => 'guest',
                ]]
        );

        \App\Models\Category::insert(
            [
                [
                    'user_id' => '1',
                    'category_name' => 'Lorem Ipsum',
                    'category_slug' => 'lorem-ipsum',
                    'updated_by' => '1',
                ]
            ]
        );

        \App\Models\Post::insert(
            [
                [
                    'user_id' => '1',
                    'banner' => 'banner-default.jpg',
                    'title' => 'What is Lorem Ipsum',
                    'slug' => 'what-is',
                    'category_id' => '1',
                    'excerpt' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
                    'body' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
                    'is_publish' => '0',
                    'updated_by' => '1',
                    'created_at' => '2021-12-12 12:12:12',
                    'updated_at' => '2021-12-12 12:12:12',
                ],
                [
                    'user_id' => '1',
                    'banner' => 'banner-default.jpg',
                    'title' => 'Where does it come from?',
                    'slug' => 'where-is',
                    'category_id' => '1',
                    'excerpt' => 'Contrary to popular belief, Lorem Ipsum is not simply random text',
                    'body' => '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>',
                    'is_publish' => '0',
                    'updated_by' => '1',
                    'created_at' => '2021-12-12 12:12:12',
                    'updated_at' => '2021-12-12 12:12:12',
                ]
            ]
        );

        \App\Models\Album::insert(
            [
                [
                    'album_name' => 'UI UX',
                    'album_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
                    'created_at' => '2021-12-12 12:12:12',
                    'updated_at' => '2021-12-12 12:12:12',
                ],
                [
                    'album_name' => 'DESIGN',
                    'album_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
                    'created_at' => '2021-12-12 12:12:12',
                    'updated_at' => '2021-12-12 12:12:12',
                ]
            ]
        );

        \App\Models\Todo::insert(
            [
                [
                    'user_id' => '1',
                    'Todo' => 'Google Single Sign On',
                    'start_date' => '2021-12-12 12:12:12',
                    'end_date' => '2021-12-31 12:12:12',
                    'status' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => '1',
                    'Todo' => 'Landing Page Slider',
                    'start_date' => '2021-12-12 12:12:12',
                    'end_date' => '2021-12-31 12:12:12',
                    'status' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]
        );
    }
}
