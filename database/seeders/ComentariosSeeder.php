<?php

namespace Database\Seeders;

use App\Models\Comentario;
use App\Models\Post;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class ComentariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();
        $posts->each(function ($post) {
            Comentario::factory()->count(3)->create([
                'post_id' => $post->id
            ]);
        });
    }
}
