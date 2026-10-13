<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        if (! Member::query()->exists()) {
            Member::factory(15)->create();
        }
    }
}
