<?php

use App\server;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'payload' => 'GET shi://sni.cloudflaressl.com HTTP/1.1[crlf]Host: vip1.hivevpn.tk[crlf]Upgrade: websocket[crlf][crlf]',
            'ip' => '157.245.11.150',
            'country' => 'USA',
            'province' => 'new york',
            'days' => 31,
            'price' => 4,
            'type' => 'premium',
            'limit' => 50,
            'domain' => 'vip1.hivevpn.tk',
            'vps_user' => 'root',
            'vps_passwd' => 'vps-2021-hive',
            'user_id' => 1,
            'service_id' => 1,
            'status' => 1
        ]);
        server::create([
            'name' => 'Estados Unidos',
            'payload' => 'GET shi://sni.cloudflaressl.com HTTP/1.1[crlf]Host: usa1.vip-cloud.tk[crlf]Upgrade: websocket[crlf][crlf]',
            'ip' => '138.197.65.194',
            'country' => 'USA',
            'province' => 'New York',
            'days' => 3,
            'price' => 3,
            'type' => 'free',
            'limit' => 100,
            'domain' => 'usa1.vip-cloud.tk',
            'vps_user' => 'root',
            'vps_passwd' => 'vps-2021-hive',
            'user_id' => 1,
            'service_id' => 1,
            'status' => 1
        ]);
        server::create([
            'name' => 'Estados Unidos',
            'payload' => 'GET shi://sni.cloudflaressl.com HTTP/1.1[crlf]Host: sf.vpn-internet.tk[crlf]Upgrade: websocket[crlf][crlf]',
            'ip' => '143.244.188.234',
            'country' => 'USA',
            'province' => 'San Francisco',
            'days' => 3,
            'price' => 0,
            'type' => 'free',
            'limit' => 50,
            'domain' => 'sf.vpn-internet.tk',
            'vps_user' => 'root',
            'vps_passwd' => 'vps-2021-hive',
            'user_id' => 1,
            'service_id' => 1,
            'status' => 1
        ]);
    }
}
