<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'title' => 'Lorem, ipsum dolor.',
            'subtitle' => 'Lorem, ipsum dolor.',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit mollitia tempora, incidunt laborum,
                        possimus
                        amet, maiores nisi earum saepe veniam ea reprehenderit. Dolorem, aliquam ducimus?',
            'url' => 'https://picsum.photos/200',
            'image' => 'https://picsum.photos/200'
        ];

        foreach (range(1, 9) as $index) {
            Project::create([
                'title' => $data['title'],
                'subtitle' => $data['subtitle'],
                'description' => $data['description'],
                'url' => $data['url'],
                'image' => $data['image'],
            ]);
        }
    }
}
