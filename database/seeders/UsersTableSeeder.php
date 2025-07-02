<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            ['over_name' => '田中',
            'under_name'=> '一郎',
            'over_name_kana'=>'タナカ',
            'under_name_kana' => 'イチロウ',
            'mail_address' => 'itirou@mail',
            'sex' => 1,
            'birth_day' =>'1992-01-01',
            'role' => 1,
            'password' => 'itiroukunn'
           ],

           ['over_name' => '田中',
           'under_name'=> '二郎',
           'over_name_kana'=>'タナカ',
           'under_name_kana' => '二ロウ',
           'mail_address' => 'jirou@mail',
           'sex' => 1,
           'birth_day' =>'1992-02-02',
           'role' => 2,
           'password' => 'jiroukunn',
          ],

          ['over_name' => '田中',
          'under_name'=> '三郎',
          'over_name_kana'=>'タナカ',
          'under_name_kana' => 'サブロウ',
          'mail_address' => 'saburou@mail',
          'sex' => 1,
          'birth_day' =>'1992-03-03',
          'role' => 3,
          'password' => 'saburoukunn'
         ],

         ['over_name' => '田中',
         'under_name'=> '四郎',
         'over_name_kana'=>'タナカ',
         'under_name_kana' => 'シロウ',
         'mail_address' => 'sirou@mail',
         'sex' => 1,
         'birth_day' =>'1992-04-04',
         'role' => 4,
         'password' => 'siroukunn'
        ],

        ['over_name' => '田中',
        'under_name'=> '五郎',
        'over_name_kana'=>'タナカ',
        'under_name_kana' => 'ゴロウ',
        'mail_address' => 'gorou@mail',
        'sex' => 1,
        'birth_day' =>'1992-05-05',
        'role' => 4,
        'password' => 'goroukunn'
       ],

        ['over_name' => '佐藤',
        'under_name'=> '一子',
        'over_name_kana'=>'サトウ',
        'under_name_kana' => 'イチコ',
        'mail_address' => 'itiko@mail',
        'sex' => 2,
        'birth_day' =>'1992-06-06',
        'role' => 1,
        'password' => 'itikosan'
       ],

       ['over_name' => '佐藤',
       'under_name'=> '二子',
       'over_name_kana'=>'サトウ',
       'under_name_kana' => 'フタコ',
       'mail_address' => 'hutako@mail',
       'sex' => 2,
       'birth_day' =>'1992-07-07',
       'role' => 2,
       'password' => 'hutakosan'
      ],

      ['over_name' => '佐藤',
      'under_name'=> '三子',
      'over_name_kana'=>'サトウ',
      'under_name_kana' => 'ミコ',
      'mail_address' => 'miko@mail',
      'sex' => 2,
      'birth_day' =>'1992-08-08',
      'role' => 3,
      'password' => 'miikosan'
     ],

     ['over_name' => '佐藤',
     'under_name'=> '四子',
     'over_name_kana'=>'サトウ',
     'under_name_kana' => 'ヨンコ',
     'mail_address' => 'yonnko@mail',
     'sex' => 2,
     'birth_day' =>'1992-09-09',
     'role' => 4,
     'password' => 'yonnkosan'
    ],
    ['over_name' => '佐藤',
    'under_name'=> '五子',
    'over_name_kana'=>'サトウ',
    'under_name_kana' => 'イツコ',
    'mail_address' => 'ituko@mail',
    'sex' => 2,
    'birth_day' =>'1992-10-10',
    'role' => 4,
    'password' => 'itukosan'
   ],
        ]);

    }
}
