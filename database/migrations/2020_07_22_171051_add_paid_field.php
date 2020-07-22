<?php

use App\Timetrack;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaidField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('timetracks', function (Blueprint $table) {
            Schema::table('timetracks', function (Blueprint $table) {
                $table->boolean('paid')->default(false);
            });

            $now = Carbon::now();
            $times = Timetrack::whereYear('created_at','!=',$now->year)->get();
            $times->each( function ($item){
                $item->paid = true;
                $item->save();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('timetracks', function (Blueprint $table) {
            //
        });
    }
}
