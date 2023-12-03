<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Faker\Generator;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ForumController extends Controller
{

    private Client $client;
    private Generator $faker;
    private GoogleTranslate $tr;

    public function __construct()
    {
        $this->client = new Client(['headers' => [
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36'
        ]]);
        $this->faker = Faker::create('vi');
        $this->tr = new GoogleTranslate;
        $this->tr->setSource();
    }

    public function index(Request $request)
    {
        $d_posts = Post::query()->paginate();
        $q = $request->get('q');
        $url = isset($q) ? "https://voz.vn/f/$q" : 'https://voz.vn/whats-new/posts/10778607/';
        $posts = $this->getPosts($url);

        return view('forum.index', [
            'posts' => $posts,
            'd_posts' => $d_posts,
        ]);
    }

    private function getPosts($url): array
    {
        $response = $this->client->get($url)->getBody()->getContents();
        preg_match_all('/<a href="\/t\/.*" class data-tp-primary="on" .*a>/U', $response, $hrefs);

        $posts = [];
        foreach ($hrefs[0] as $href) {
            preg_match('/href=".*"/U', $href, $url);
            $url = substr($url[0], 9, -1);
            $posts[] = [
                'author' => $this->faker->name,
                'title' => html_entity_decode(preg_replace('/<.*>/U', '', $href)),
                'path' => $url,
                'created_at' => $this->faker->dateTimeBetween('-1 week'),
            ];
        }

        return $posts;
    }

    public function create()
    {
        return view('forum.create');
    }

    private function translateHtml($path): string
    {
        $content = file_get_contents(resource_path($path));
        preg_match_all('/<.*>.*<.*>/U', $content, $tags);
        $content = '';
        foreach ($tags[0] as $tag) {
            $content .= preg_replace('/<.*>/U', '', $tag);
            $content .= "\n";
        }
        $t_content = $this->tr->translate($content);
        $t_contents = explode("\n", $t_content);
        $html_content = '';
        foreach ($tags[0] as $i => $tag) {
            $html_content .= preg_replace('/>.*</', ">$t_contents[$i]<", $tag);
        }

        return $html_content;
    }

    public function show($slug, Request $request)
    {
        $languages = require 'assets/languages.php';
        $l = $request->get('l') ?? 'en';
        $this->tr->setTarget($l);

        $html_content = $this->translateHtml('views/forum/post_content.blade.php');
        $html_title = $this->translateHtml('views/forum/post_title.blade.php');


        $post = Post::query()->with('user')->firstOrFail();
        $relate_posts = Post::query()->inRandomOrder()->limit(3)->get();

        return view('forum.show', [
            'post' => $post,
            'html_content' => $html_content,
            'html_title' => $html_title,
            'relate_posts' => $relate_posts,
            'languages' => $languages,
            'selected_l' => $languages[$l] ?? null,
        ]);
    }

}
