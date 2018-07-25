<?php

use Illuminate\Database\Seeder;

class CommonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert([
            0 =>
                [
                    'id'             => 3,
                    'name'           => 'Admin',
                    'email'          => 'admin@qq.com',
                    'password'       => '$2y$10$VGvbiFe2Lj2nBucHsFFzQOkmbl47WZZlzqDrbKtG8pJ.yqIPo5J2.',
                    'is_super_admin' => 1,
                    'remember_token' => 'igLbXF1RMdkJ1HBYnGZv7UmlJ3MRWcjzF42JNfUIhkovmRl7CwpfAOxCci4g',
                    'created_at'     => '2017-02-03 09:52:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            1 =>
                [
                    'id'             => 4,
                    'name'           => 'test',
                    'email'          => 'test@qq.com',
                    'password'       => '$2y$10$ry50YODZzVAbRTeYbKyPGeJIpoJGNDERUYmZwXx2tWDDbP1ubewpe',
                    'is_super_admin' => 1,
                    'remember_token' => '',
                    'created_at'     => '2017-02-03 09:52:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
        ]);

        \DB::table('abouts')->delete();

        \DB::table('abouts')->insert([
            0 =>
                [
                    'id'             => 3,
                    'title'           => '关于我们',
                    'type'          => 1,
                    'content'          => '',
                    'created_at'     => '2017-02-03 09:52:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            1 =>
                [
                    'id'             => 4,
                    'title'           => '存款帮助',
                    'type'          => 2,
                    'content'          => '',
                    'created_at'     => '2017-02-03 09:52:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            2 =>
                [
                    'id'             => 5,
                    'title'           => '取款帮助',
                    'type'          => 3,
                    'content'          => '',
                    'created_at'     => '2017-02-03 09:52:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            3 =>
                [
                    'id'             => 6,
                    'title'           => '常见问题',
                    'type'          => 4,
                    'content'          => '',
                    'created_at'     => '2017-02-03 09:52:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
        ]);

        \DB::table('roles')->delete();

        \DB::table('roles')->insert([
            0 =>
                [
                    'id'             => 1,
                    'name'          => '普通管理员',
                    'created_at'     => '2017-02-03 09:52:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
        ]);

        \DB::table('system_config')->delete();

        \DB::table('system_config')->insert([
            0 =>
                [
                    'id'             => 1,
                    'site_name'      => '网站名称',
                    'site_title'     => '网站标题',
                    'keyword'       => '关键词1,关键词2,关键词3,关键词4,关键词5',
                    'phone1'        => '027-87411245',
                    'phone2'        => '027-63524125',
                    'site_domain'   => 'www.agbbin.com',
                    'active_member_money' => 200,
                    'third_version' => '1.0',
                    'third_pay_url' => '',
                    'created_at'     => '2017-02-03 09:52:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
        ]);

        \DB::table('api')->delete();

        \DB::table('api')->insert([
            0 =>
                [
                    'id'             => 3,
                    'api_name'      => 'AG',
                    'api_title'     => 'AG',
                    'on_line'       => 1,
                    'type'          => 1,
                    'created_at'     => '2017-02-03 09:00:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            1 =>
                [
                    'id'             => 4,
                    'api_name'      => 'BBIN',
                    'api_title'     => 'BBIN',
                    'on_line'       => 1,
                    'type'          => 1,
                    'created_at'     => '2017-02-03 09:01:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            2 =>
                [
                    'id'             => 5,
                    'api_name'      => 'AB',
                    'api_title'     => 'AB',
                    'on_line'       => 1,
                    'type'          => 1,
                    'created_at'     => '2017-02-03 09:02:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            3 =>
                [
                    'id'             => 6,
                    'api_name'      => 'PT',
                    'api_title'     => 'PT',
                    'on_line'       => 1,
                    'type'          => 1,
                    'created_at'     => '2017-02-03 09:03:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            4 =>
                [
                    'id'             => 7,
                    'api_name'      => 'MG',
                    'api_title'     => 'MG',
                    'on_line'       => 1,
                    'type'          => 1,
                    'created_at'     => '2017-02-03 09:04:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            5 =>
                [
                    'id'             => 8,
                    'api_name'      => 'TTG',
                    'api_title'     => 'TTG',
                    'on_line'       => 1,
                    'type'          => 1,
                    'created_at'     => '2017-02-03 09:05:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            6 =>
                [
                    'id'             => 9,
                    'api_name'      => 'IBC',
                    'api_title'     => 'IBC',
                    'on_line'       => 1,
                    'type'          => 1,
                    'created_at'     => '2017-02-03 09:06:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            7 =>
                [
                    'id'             => 10,
                    'api_name'      => 'YC',
                    'api_title'     => 'YC',
                    'on_line'       => 1,
                    'type'          => 1,
                    'created_at'     => '2017-02-03 09:07:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            8 =>
                [
                    'id'             => 11,
                    'api_name'      => 'CG',
                    'api_title'     => 'CG',
                    'on_line'       => 1,
                    'type'          => 1,
                    'created_at'     => '2017-02-03 09:08:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            9 =>
                [
                    'id'             => 12,
                    'api_name'      => 'SA',
                    'api_title'     => 'SA',
                    'on_line'       => 1,
                    'type'          => 1,
                    'created_at'     => '2017-02-03 09:09:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            10 =>
                [
                    'id'             => 13,
                    'api_name'      => 'BG',
                    'api_title'     => 'BG',
                    'on_line'       => 1,
                    'type'          => 1,
                    'created_at'     => '2017-02-03 09:10:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            11 =>
                [
                    'id'             => 14,
                    'api_name'      => 'DT',
                    'api_title'     => 'DT',
                    'on_line'       => 1,
                    'type'          => 1,
                    'created_at'     => '2017-02-03 09:11:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            14 =>
                [
                    'id'             => 2,
                    'api_name'      => 'BI',
                    'api_title'       => 'BI',
                    'on_line'       => 1,
                    'type'          => 1,
                    'created_at'     => '2017-02-03 09:14:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            18 =>
                [
                    'id'             => 20,
                    'api_name'      => 'PNG',
                    'api_title'     => 'PNG',
                    'on_line'       => 1,
                    'type'          => 1,
                    'created_at'     => '2017-02-03 09:17:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            20 =>
                [
                    'id'             => 22,
                    'api_name'      => 'SS',
                    'api_title'     => 'SS',
                    'on_line'       => 1,
                    'type'          => 1,
                    'created_at'     => '2017-02-03 09:17:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            21 =>
                [
                    'id'             => 23,
                    'api_name'      => 'BS',
                    'api_title'     => 'BS',
                    'on_line'       => 1,
                    'type'          => 1,
                    'created_at'     => '2017-02-03 09:17:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            22 =>
                [
                    'id'             => 24,
                    'api_name'      => 'MW',
                    'api_title'     => 'MW',
                    'on_line'       => 1,
                    'type'          => 1,
                    'created_at'     => '2017-02-03 09:17:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            25 =>
                [
                    'id'             => 27,
                    'api_name'      => 'SUNBET',
                    'api_title'     => 'SUNBET',
                    'on_line'       => 1,
                    'type'          => 1,
                    'created_at'     => '2017-02-03 09:17:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            // t 2

            50 =>
                [
                    'id'             => 50,
                    'api_name'      => 'AG',
                    'api_title'     => 'AG',
                    'on_line'       => 1,
                    'type'          => 2,
                    'created_at'     => '2017-02-03 09:17:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            51 =>
                [
                    'id'             => 51,
                    'api_name'      => 'BBIN',
                    'api_title'     => 'BBIN',
                    'on_line'       => 1,
                    'type'          => 2,
                    'created_at'     => '2017-02-03 09:01:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            52 =>
                [
                    'id'             => 52,
                    'api_name'      => 'MG',
                    'api_title'     => 'MG',
                    'on_line'       => 1,
                    'type'          => 2,
                    'created_at'     => '2017-02-03 09:01:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            53 =>
                [
                    'id'             => 53,
                    'api_name'      => 'PT',
                    'api_title'     => 'PT',
                    'on_line'       => 1,
                    'type'          => 2,
                    'created_at'     => '2017-02-03 09:01:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            54 =>
                [
                    'id'             => 54,
                    'api_name'      => 'EBET',
                    'api_title'     => 'EBET',
                    'on_line'       => 1,
                    'type'          => 2,
                    'created_at'     => '2017-02-03 09:01:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            55 =>
                [
                    'id'             => 55,
                    'api_name'      => 'OG',
                    'api_title'     => 'OG',
                    'on_line'       => 1,
                    'type'          => 2,
                    'created_at'     => '2017-02-03 09:01:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            56 =>
                [
                    'id'             => 56,
                    'api_name'      => 'EG',
                    'api_title'     => 'EG',
                    'on_line'       => 1,
                    'type'          => 2,
                    'created_at'     => '2017-02-03 09:01:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            57 =>
                [
                    'id'             => 57,
                    'api_name'      => 'GD',
                    'api_title'     => 'GD',
                    'on_line'       => 1,
                    'type'          => 2,
                    'created_at'     => '2017-02-03 09:01:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            //t 3
            100 =>
                [
                    'id'             => 100,
                    'api_name'      => 'TGAME',
                    'api_title'     => 'TGAME',
                    'on_line'       => 1,
                    'type'          => 3,
                    'created_at'     => '2017-02-03 09:17:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            101 =>    [
                    'id'             => 101,
                    'api_name'      => 'AG',
                    'api_title'     => 'AG',
                    'on_line'       => 1,
                    'type'          => 3,
                    'created_at'     => '2017-02-03 09:17:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            102 =>    [
                'id'             => 102,
                'api_name'      => 'NAG',
                'api_title'     => 'AG',
                'on_line'       => 1,
                'type'          => 3,
                'created_at'     => '2017-02-03 09:17:51',
                'updated_at'     => '2017-02-03 09:52:51',
            ],
            // t 5
            250 =>
                [
                    'id'             => 250,
                    'api_name'      => 'SELF',
                    'api_title'     => 'SELF',
                    'on_line'       => 1,
                    'type'          => 5,
                    'created_at'     => '2017-02-03 09:17:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            251 =>
                [
                    'id'             => 251,
                    'api_name'      => 'AG',
                    'api_title'     => 'AG',
                    'on_line'       => 1,
                    'type'          => 5,
                    'created_at'     => '2017-02-03 09:17:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            252 =>
                [
                    'id'             => 252,
                    'api_name'      => 'BBIN',
                    'api_title'     => 'BBIN',
                    'on_line'       => 1,
                    'type'          => 5,
                    'created_at'     => '2017-02-03 09:17:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            253 =>
                [
                    'id'             => 253,
                    'api_name'      => 'MG',
                    'api_title'     => 'MG',
                    'on_line'       => 1,
                    'type'          => 5,
                    'created_at'     => '2017-02-03 09:17:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            254 =>
                [
                    'id'             => 254,
                    'api_name'      => 'EG',
                    'api_title'     => 'EG',
                    'on_line'       => 1,
                    'type'          => 5,
                    'created_at'     => '2017-02-03 09:17:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            255 =>
                [
                    'id'             => 255,
                    'api_name'      => 'PT',
                    'api_title'     => 'PT',
                    'on_line'       => 1,
                    'type'          => 5,
                    'created_at'     => '2017-02-03 09:17:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            256 =>
                [
                    'id'             => 256,
                    'api_name'      => 'PNG',
                    'api_title'     => 'PNG',
                    'on_line'       => 1,
                    'type'          => 5,
                    'created_at'     => '2017-02-03 09:17:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            257 =>
                [
                    'id'             => 257,
                    'api_name'      => 'SS',
                    'api_title'     => 'SS',
                    'on_line'       => 1,
                    'type'          => 5,
                    'created_at'     => '2017-02-03 09:17:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            258 =>
                [
                    'id'             => 258,
                    'api_name'      => 'AB',
                    'api_title'     => 'AB',
                    'on_line'       => 1,
                    'type'          => 5,
                    'created_at'     => '2017-02-03 09:17:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            259 =>
                [
                    'id'             => 259,
                    'api_name'      => 'MW',
                    'api_title'     => 'MW',
                    'on_line'       => 1,
                    'type'          => 5,
                    'created_at'     => '2017-02-03 09:17:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            260 =>
                [
                    'id'             => 260,
                    'api_name'      => 'SA',
                    'api_title'     => 'SA',
                    'on_line'       => 1,
                    'type'          => 5,
                    'created_at'     => '2017-02-03 09:17:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
        ]);

        //插入游戏
        $game_list_data = config('game_list');
        $api_list = \App\Models\Api::orderBy('created_at', 'desc')->pluck('id', 'api_name')->toArray();
        foreach ($game_list_data as $api_name => $item)
        {
            if (count(array_filter($item)) > 0)
            {
                $api_id = $api_list[strtoupper($api_name)];
                foreach ($item as $k => $v)
                {
                    if (count(array_filter($v)) > 0)
                    {
                        $client_type = $k == 'web'?1:2;
                        foreach ($v as $value)
                        {
                            \App\Models\GameList::create([
                                'api_name' => strtoupper($api_name),
                                'name' => $value['name'],
                                'client_type' => $client_type,
                                'game_type' => 3,//默认电子
                                'game_id' => $value['id'],
                                'img_path' => $value['img'],
                                'on_line' => 0,
                                'game_name' => isset($value['game_name'])?$value['game_name']:''
                            ]);
                        }
                    }

                }
            }


        }


    }
}
