<?php

namespace Database\Seeders;

use App\Models\Relegion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RelegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Relegions = [
            [
                'en' => 'Cristian',
                'ar' => 'مسيحي',
            ],
            [
                'en' => 'Muslim',
                'ar' => 'مسلم',
            ],
            [
                'en' => 'Other',
                'ar' => 'غير ذلك',
            ],
        ];
        DB::table('relegions')->delete();

        foreach($Relegions as $Relegion){
            Relegion::create(['name'=>$Relegion]);
        }
    }
}
