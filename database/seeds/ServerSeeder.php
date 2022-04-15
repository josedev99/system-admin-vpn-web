<?php

use App\server;
use Illuminate\Database\Seeder;

class ServerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        server::create([
            'name' => 'Estados Unidos',
            'payload' => 'HTTP/1.1 wss//',
            'ip' => '157.245.11.150',
            'country' => 'USA',
            'province' => 'new york',
            'days' => 3,
            'price' => 3,
            'type' => 'free',
            'limit' => 100,
            'domain' => 'vip-cloud.tk',
            'vps_user' => 'root',
            'vps_passwd' => 'vps-2021-hive'
        ]);
    }
}
