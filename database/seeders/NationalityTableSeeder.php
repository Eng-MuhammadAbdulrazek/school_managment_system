<?php

namespace Database\Seeders;

use App\Models\Nationality;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NationalityTableSeeder extends Seeder
{
    
   
    public function run(): void
    {
        $nations = [
            [
              'en' => 'American',
              'ar' => 'أمريكي'
            ],
            [
              'en' => 'Egyptian',
              'ar' => 'مصري'
            ],
            [
              'en' => 'Chinese',
              'ar' => 'صيني'
            ],
            [
              'en' => 'Indian',
              'ar' => 'هندي'
            ],
            [
              'en' => 'Brazilian',
              'ar' => 'برازيلي'
            ],
            [
              'en' => 'Japanese',
              'ar' => 'ياباني'
            ],
            [
              'en' => 'Russian',
              'ar' => 'روسي'
            ],
            [
              'en' => 'German',
              'ar' => 'ألماني'
            ],
            [
              'en' => 'French',
              'ar' => 'فرنسي'
            ],
            [
              'en' => 'British',
              'ar' => 'بريطاني'
            ],
            [
              'en' => 'Italian',
              'ar' => 'إيطالي'
            ],
            [
              'en' => 'Spanish',
              'ar' => 'إسباني'
            ],
            [
              'en' => 'Canadian',
              'ar' => 'كندي'
            ],
            [
              'en' => 'Australian',
              'ar' => 'أسترالي'
            ],
            [
              'en' => 'Mexican',
              'ar' => 'مكسيكي'
            ],
            [
              'en' => 'South African',
              'ar' => 'جنوب أفريقي'
            ],
            [
              'en' => 'Argentinian',
              'ar' => 'أرجنتيني'
            ],
            [
              'en' => 'Turkish',
              'ar' => 'تركي'
            ],
            [
              'en' => 'South Korean',
              'ar' => 'كوري جنوبي'
            ],
            [
              'en' => 'Saudi Arabian',
              'ar' => 'سعودي'
            ],
            [
              'en' => 'Afghan',
              'ar' => 'أفغاني'
            ],
            [
              'en' => 'Algerian',
              'ar' => 'جزائري'
            ],
            [
              'en' => 'Bahraini',
              'ar' => 'بحريني'
            ],
            [
              'en' => 'Emirati',
              'ar' => 'إماراتي'
            ],
            [
              'en' => 'Iraqi',
              'ar' => 'عراقي'
            ],
            [
              'en' => 'Jordanian',
              'ar' => 'أردني'
            ],
            [
              'en' => 'Kuwaiti',
              'ar' => 'كويتي'
            ],
            [
              'en' => 'Lebanese',
              'ar' => 'لبناني'
            ],
            [
              'en' => 'Libyan',
              'ar' => 'ليبي'
            ],
            [
              'en' => 'Moroccan',
              'ar' => 'مغربي'
            ],
            [
              'en' => 'Omani',
              'ar' => 'عماني'
            ],
            [
              'en' => 'Palestinian',
              'ar' => 'فلسطيني'
            ],
            [
              'en' => 'Qatari',
              'ar' => 'قطري'
            ],
            [
              'en' => 'Saudi',
              'ar' => 'سعودي'
            ],
            [
              'en' => 'Sudanese',
              'ar' => 'سوداني'
            ],
            [
              'en' => 'Syrian',
              'ar' => 'سوري'
            ],
            [
              'en' => 'Tunisian',
              'ar' => 'تونسي'
            ],
            [
              'en' => 'Yemeni',
              'ar' => 'يمني'
            ]
            ];
            DB::table('nationalities')->delete();
            foreach($nations as $nation){
                Nationality::create([
                    'name'=>$nation,
                ]);
            }
    }
}
