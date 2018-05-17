<?php

use Illuminate\Database\Seeder;
use App\Models\Parameter;

class ParameterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Parameter::truncate();
        $parameter = new Parameter;
        $parameter->name = "Ram";
        $parameter->save();

        $parameter = new Parameter;
        $parameter->name = "CPU";
        $parameter->save();

        $parameter = new Parameter;
        $parameter->name = "Connection";
        $parameter->save();
    }
}
