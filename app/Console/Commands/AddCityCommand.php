<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Area;
use App\Models\City;
use Cocur\Slugify\Slugify;


class AddCityCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'factory:add-city';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add to DB Russia city';

    private function createSlug(string $string) 
    {
        $slugify = new Slugify();

        $slug = $slugify->slugify($string);
       
        return $slug;
    }
    
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = Http::get('https://api.hh.ru/areas')[0]['areas'];
        foreach ($data as $item) {
            $area = Area::query()->create([
                'name' => $item['name'],
                'slug' => $this->createSlug($item['name'])
            ]);

            foreach ($item['areas'] as $city) {
                City::query()->create([
                    'name' => $city['name'],
                    'slug' => $this->createSlug($city['name']),
                    'area_id' => $area->id
                ]);
            }
        }

        $this->info('Cities added to the database');
    }
}
