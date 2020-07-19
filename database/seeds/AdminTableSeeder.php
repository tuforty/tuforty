<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $isProduction = app()->environment('production');
        $canCreate = !$isProduction || ($isProduction && is_null(Admin::first()));

        if ($canCreate) {
            return factory(Admin::class, 1)->create();
        }

        echo ("Can't create another admin user in production\n");
    }
}
