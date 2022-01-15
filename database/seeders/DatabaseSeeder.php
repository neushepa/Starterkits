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
                    'id_number' => '11411143',
                    'name' => 'member',
                    'email' => 'member@test.com',
                    'password' => bcrypt('123456'),
                    'role' => 'member',
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
                    'category_name' => 'Headline',
                    'category_slug' => 'headline',
                    'updated_by' => '1',
                    'created_at' => '2021-12-12 12:12:12',
                    'updated_at' => '2021-12-12 12:12:12',
                ],
                [
                    'user_id' => '1',
                    'category_name' => 'Services',
                    'category_slug' => 'services',
                    'updated_by' => '1',
                    'created_at' => '2021-12-12 12:12:12',
                    'updated_at' => '2021-12-12 12:12:12',
                ],
                [
                    'user_id' => '1',
                    'category_name' => 'Features',
                    'category_slug' => 'features',
                    'updated_by' => '1',
                    'created_at' => '2021-12-12 12:12:12',
                    'updated_at' => '2021-12-12 12:12:12',
                ],
                [
                    'user_id' => '1',
                    'category_name' => 'Others',
                    'category_slug' => 'others',
                    'updated_by' => '1',
                    'created_at' => '2021-12-12 12:12:12',
                    'updated_at' => '2021-12-12 12:12:12',
                ]
            ]
        );

        \App\Models\Poststatus::insert(
            [
                [
                    'status_post' => 'Publish',
                    'status_description' => 'Post has been published',
                    'created_at' => '2021-12-12 12:12:12',
                    'updated_at' => '2021-12-12 12:12:12',
                ],
                [
                    'status_post' => 'Draft',
                    'status_description' => 'Post has been drafted',
                    'created_at' => '2021-12-12 12:12:12',
                    'updated_at' => '2021-12-12 12:12:12',
                ],
                [
                    'status_post' => 'Pending',
                    'status_description' => 'Post has been pending',
                    'created_at' => '2021-12-12 12:12:12',
                    'updated_at' => '2021-12-12 12:12:12',
                ],
                [
                    'status_post' => 'Rejected',
                    'status_description' => 'Post has been rejected',
                    'created_at' => '2021-12-12 12:12:12',
                    'updated_at' => '2021-12-12 12:12:12',
                ],
            ]
        );

        \App\Models\Post::insert(
            [
                [
                    'user_id' => '1',
                    'banner' => 'default.jpg',
                    'title' => 'Hello World',
                    'slug' => 'hello-world',
                    'post_type' => 'Blog',
                    'category_id' => '1',
                    'excerpt' => 'Hello, World!" program is generally a computer program that outputs or displays the message "Hello, World!"',
                    'body' => '<p>A "Hello, World!" program is generally a computer program that outputs or displays the message "Hello, World!". This program is very simple to write in many programming languages, and is often used to illustrate a languages basic syntax. Hello, World! programs are often the first a student learns to write in a given language, and they can also be used as a sanity test to ensure computer software intended to compile or run source code is correctly installed, and that its operator understands how to use it.</p>',
                    'is_publish' => '1',
                    'updated_by' => '1',
                    'created_at' => '2021-12-12 12:12:12',
                    'updated_at' => '2021-12-12 12:12:12',
                ],
                [
                    'user_id' => '1',
                    'banner' => 'default.jpg',
                    'title' => 'What is Lorem Ipsum ?',
                    'slug' => 'what-is',
                    'post_type' => 'Blog',
                    'category_id' => '1',
                    'excerpt' => 'Contrary to popular belief, Lorem Ipsum is not simply random text',
                    'body' => '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>',
                    'is_publish' => '1',
                    'updated_by' => '1',
                    'created_at' => '2021-12-12 12:12:12',
                    'updated_at' => '2021-12-12 12:12:12',
                ],
                [
                    'user_id' => '1',
                    'banner' => 'default.jpg',
                    'title' => 'Why do we use it ?',
                    'slug' => 'why-do',
                    'post_type' => 'Blog',
                    'category_id' => '1',
                    'excerpt' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout',
                    'body' => '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy.</p>',
                    'is_publish' => '1',
                    'updated_by' => '1',
                    'created_at' => '2021-12-12 12:12:12',
                    'updated_at' => '2021-12-12 12:12:12',
                ],
                [
                    'user_id' => '1',
                    'banner' => 'default.jpg',
                    'title' => 'Website Development',
                    'slug' => 'website-development',
                    'post_type' => 'Page',
                    'category_id' => '2',
                    'excerpt' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
                    'body' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
                    'is_publish' => '1',
                    'updated_by' => '1',
                    'created_at' => '2021-12-12 12:12:12',
                    'updated_at' => '2021-12-12 12:12:12',
                ],
                [
                    'user_id' => '1',
                    'banner' => 'default.jpg',
                    'title' => 'Virtual Private Server',
                    'slug' => 'vps',
                    'post_type' => 'Page',
                    'category_id' => '2',
                    'excerpt' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
                    'body' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
                    'is_publish' => '1',
                    'updated_by' => '1',
                    'created_at' => '2021-12-12 12:12:12',
                    'updated_at' => '2021-12-12 12:12:12',
                ],
                [
                    'user_id' => '1',
                    'banner' => 'default.jpg',
                    'title' => 'Mail Server',
                    'slug' => 'mail-server',
                    'post_type' => 'Page',
                    'category_id' => '2',
                    'excerpt' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
                    'body' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
                    'is_publish' => '1',
                    'updated_by' => '1',
                    'created_at' => '2021-12-12 12:12:12',
                    'updated_at' => '2021-12-12 12:12:12',
                ],
                [
                    'user_id' => '1',
                    'banner' => 'default.jpg',
                    'title' => 'Dedicated Server',
                    'slug' => 'server',
                    'post_type' => 'Page',
                    'category_id' => '2',
                    'excerpt' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
                    'body' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
                    'is_publish' => '1',
                    'updated_by' => '1',
                    'created_at' => '2021-12-12 12:12:12',
                    'updated_at' => '2021-12-12 12:12:12',
                ],
                [
                    'user_id' => '1',
                    'banner' => 'default.jpg',
                    'title' => 'Where does it come from?',
                    'slug' => 'where-is',
                    'post_type' => 'Blog',
                    'category_id' => '4',
                    'excerpt' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
                    'body' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
                    'is_publish' => '1',
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

        \App\Models\Gallery::insert(
            [
                [
                    'album_id' => '1',
                    'title' => 'Headphone',
                    'picture' => 'default-1.jpg',
                    'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
                    'created_at' => '2021-12-12 12:12:12',
                    'updated_at' => '2021-12-12 12:12:12',
                ],
                [
                    'album_id' => '2',
                    'title' => 'Men Watch',
                    'picture' => 'default-2.jpg',
                    'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
                    'created_at' => '2021-12-12 12:12:12',
                    'updated_at' => '2021-12-12 12:12:12',
                ],
                [
                    'album_id' => '2',
                    'title' => 'Eyeglass Frame',
                    'picture' => 'default-3.jpg',
                    'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
                    'created_at' => '2021-12-12 12:12:12',
                    'updated_at' => '2021-12-12 12:12:12',
                ],
                [
                    'album_id' => '1',
                    'title' => 'Decorative Plants',
                    'picture' => 'default-4.jpg',
                    'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
                    'created_at' => '2021-12-12 12:12:12',
                    'updated_at' => '2021-12-12 12:12:12',
                ],
                [
                    'album_id' => '1',
                    'title' => 'Food photograph',
                    'picture' => 'default-5.jpg',
                    'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
                    'created_at' => '2021-12-12 12:12:12',
                    'updated_at' => '2021-12-12 12:12:12',
                ],
                [
                    'album_id' => '2',
                    'title' => 'Airin Parfume',
                    'picture' => 'default-6.jpg',
                    'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
                    'created_at' => '2021-12-12 12:12:12',
                    'updated_at' => '2021-12-12 12:12:12',
                ],
            ]
        );

        \App\Models\Todo::insert(
            [
                [
                    'user_id' => '1',
                    'Todo' => 'Google Single Sign On',
                    'description' => 'Lorem Ipsum is simply dummy text of the printing',
                    'assigned_to' => '3',
                    'start_date' => '2021-12-12 12:12:12',
                    'end_date' => '2021-12-31 12:12:12',
                    'status' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => '3',
                    'Todo' => 'Landing Page Slider',
                    'description' => 'Lorem Ipsum is simply dummy text of the printing',
                    'assigned_to' => '3',
                    'start_date' => '2021-12-12 12:12:12',
                    'end_date' => '2021-12-31 12:12:12',
                    'status' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]
        );

        \App\Models\TodoStatus::insert(
            [
                [
                    'id' => '1',
                    'status_name' => 'Todo',
                    'status_description' => 'New Task',
                    'created_at' => now(),
                ],
                [
                    'id' => '2',
                    'status_name' => 'On Progress',
                    'status_description' => 'Task on Progress',
                    'created_at' => now(),
                ],
                [
                    'id' => '3',
                    'status_name' => 'Completed',
                    'status_description' => 'Task Completed',
                    'created_at' => now(),
                ],
            ]
        );
    }
}
