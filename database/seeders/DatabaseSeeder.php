<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Content;
use App\Models\Media;
use App\Models\Author;
use App\Models\PostAuthor;
use App\Models\Category;
use App\Models\CategoryName;
use File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/feed.json");
        $feedData = json_decode($json);

        foreach ($feedData as $value) {
            Post::create([
                "id"               => $value->id,
                "source"           => $value->source,
                "title"            => $value->title,
                "subtitle"         => $value->subtitle,
                "slug"             => $value->slug,
                "format"           => $value->format,
                "emoji"            => $value->emoji
            ]);

            Content::create([
                "post_id"      => $value->id,
                "type"         => $value->content[0]->type,
                "content"      => $value->content[0]->content,
                "attributes"   => $value->content[0]->attributes,
            ]);
            if (isset($value->categories->primary)) {

                $categoryName = CategoryName::firstOrCreate([
                    "name" => $value->categories->primary
                ]);

                Category::create([
                    "post_id"            => $value->id,
                    "category_names_id" => $categoryName->id,
                    "primary"            => true,
                ]);
            }

            if (count($value->categories->additional)) {
                foreach ($value->categories->additional as $additional) {
                    $additionalName = CategoryName::firstOrCreate([
                        "name" => $additional
                    ]);

                    Category::create([
                        "post_id"            => $value->id,
                        "category_names_id" => $additionalName->id,
                        "primary"            => false,
                    ]);
                }
            }

            Author::firstOrCreate([
                "id"       => $value->authors[0]->id,
                "name"     => $value->authors[0]->name,
                "slug"     => $value->authors[0]->slug,
                "avatar"   => $value->authors[0]->avatar,
            ]);

            PostAuthor::create([
                "post_id"      => $value->id,
                "author_id"    => $value->authors[0]->id,
            ]);


            if (count($value->media)) {
                Media::create([
                    "id"           => $value->media[0]->media->id,
                    "post_id"      => $value->id,
                    "source"       => $value->media[0]->media->source,
                    "slug"         => $value->media[0]->media->slug,
                    "type"         => $value->media[0]->media->type,
                    "url"          => $value->media[0]->media->attributes->url,
                    "width"        => $value->media[0]->media->attributes->width,
                    "height"       => $value->media[0]->media->attributes->height,
                    "copyright"    => $value->media[0]->media->attributes->copyright,
                    "caption"      => $value->media[0]->media->attributes->caption,
                    "credit"       => $value->media[0]->media->attributes->credit,
                ]);
            }
        }
    }
}
