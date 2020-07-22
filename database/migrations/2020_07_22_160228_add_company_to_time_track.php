<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Timetrack;

class AddCompanyToTimeTrack extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('timetracks', function (Blueprint $table) {
            $table->integer('company')->default('1');
        });
        $now = Carbon::now();
        $times = Timetrack::whereYear('created_at', $now->year)->get();
        $times->each( function ($item){
            $item->company = 2;
            $item->save();
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
