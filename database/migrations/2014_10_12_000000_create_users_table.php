<?php

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('phone')->nullable()->unique();
            $table->string('type')->default('patient');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        // DB::insert("insert into users (name, email, password) values ('admin','admin@admin.com', '123')");
         User::create([
            'name' => 'admin',
            'email' =>'admin@admin.com',
            'type' =>'admin',
            'password' => Hash::make('123'),
        ]);
        User::create([
            'name' => 'tareq',
            'email' =>'t@t.com',
            'type' =>'patient',
            'password' => Hash::make('123'),
        ]);

         User::create([
            'name' => 'doc',
            'email' =>'d@d.com',
            'type' =>'doctor',
            'password' => Hash::make('123'),
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
};
