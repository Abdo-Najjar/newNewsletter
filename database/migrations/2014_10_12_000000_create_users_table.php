<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('last_name');

            //0 for client 1 for admin
            $table->enum('role', [0, 1]);
            $table->string('picture_url')->default('images/defaultUser.jpeg');
            $table->date('dob');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });


        User::create([
            'name' => 'Abood',
            'last_name'=>'Najjar',
            'email' => 'a@a.com',
            'dob' =>    Carbon::create('1997', '11','23') ,
            'password' => bcrypt('123456789'),
            "role"=>User::ADMIN_ROLE
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
