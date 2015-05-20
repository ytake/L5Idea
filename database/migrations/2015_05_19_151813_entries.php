<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Entries
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class Entries extends Migration
{

    /** @var string  */
    protected $table = 'entries';

    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('entry_id');
            $table->string('title')->index('entry_title');
            $table->longText('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::drop($this->table);
    }
}
