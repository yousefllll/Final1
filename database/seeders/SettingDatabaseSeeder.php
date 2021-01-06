<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::setMany([
            'default_locale' => 'ar',
            'default_timezone' => 'Asia/Riyadh',
            'reviews_enabled' => true,
            'auto_approve_reviews' => true,
            'supported_currencies' => ['USD','SYP','SAR'],
            'default_currency' => 'SAR',
            'store_email' => 'yousefnaderas2003@gmail.comt',
            'search_engine' => 'mysql',
            'local_shipping_cost' => 0,
            'outer_shipping_cost' => 0,
            'free_shipping_cost' => 0,
            'translatable' => [
                'store_name' => 'المتجر الذكي',
                'free_shipping_label' => 'توصيل مجاني',
                'local_label' => 'توصيل محلي',
                'outer_label' => 'توصيل خارجي',
            ],
        ]);

    }
}
