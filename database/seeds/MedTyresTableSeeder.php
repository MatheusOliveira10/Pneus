<?php

use Illuminate\Database\Seeder;
use App\MedTyre;

class MedTyresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("public/js/medtyres.json");
        $data = json_decode($json);
        foreach ($data as $item)
        {
            MedTyre::create(array(
                'id' => $item->id,
                'name' => $item->name,
                'type' => $item->type,
                'abbr' => $item->abbr
            ));
        }
    }
}
