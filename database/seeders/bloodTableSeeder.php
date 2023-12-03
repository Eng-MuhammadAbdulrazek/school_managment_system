<?php

namespace Database\Seeders;

use App\Models\blood_types;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class bloodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('blood_types')->delete();
        $bgs = [ 'O+' , 'O-' , 'A+' , 'A-' , 'B+' , 'B-' , 'AB+' , 'AB-' ];
        foreach($bgs as $bg){
        blood_types::create(['name'=>$bg]);
        }
    }
}
