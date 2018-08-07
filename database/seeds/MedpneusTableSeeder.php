<?php

use Illuminate\Database\Seeder;
use App\Medpneus;

class MedpneusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("public/js/medpneus.json");
        $data = json_decode($json);
        foreach ($data as $item)
        {
            Medpneus::create(array(
                'id' => $item->id,
                'name' => $item->name
            ));
        }
    }
}
