<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        if (!DB::table('settings')->where('key', 'footer_text')->exists()) {
            DB::table('settings')->insert([
                'key' => 'footer_text',
                'value' => 'Your default footer text here',
                'type' => 'text',
            ]);
        }
    }

    public function down()
    {
        DB::table('settings')->where('key', 'footer_text')->delete();
    }
};
