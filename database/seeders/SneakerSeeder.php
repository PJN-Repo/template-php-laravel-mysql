<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use File;
use App\Models\Sneaker;

class SneakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get data
        $data = File::get("data/sneakers.json");
        $sneakers = json_decode($data);

        // Loop through data and write to table
        foreach ($sneakers->results as $key => $value)
        {
            Sneaker::create([
                'brand' => $value->brand,
                'colorway' => $value->colorway,
                'gender' => $value->gender,
                'name' => $value->name,
                'releaseDate' => $value->releaseDate,
                'retailPrice' => $value->retailPrice,
                'shoe' => $value->shoe,
                'styleId' => $value->styleId,
                'title' => $value->title,
                'year' => $value->year,
                'media' => $value->media,
            ]);
        }
    }
}
