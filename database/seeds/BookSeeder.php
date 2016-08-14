<?php
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            ['name' => 'Math 2', 'category_id' => '1'],
            ['name' => 'Math 3', 'category_id' => '1'],
            ['name' => 'Physic 1', 'category_id' => '1'],
            ['name' => 'Doi gio hu', 'category_id' => '2'],
            ['name' => 'Su im lang cua bay cuu', 'category_id' => '2'],
            ['name' => 'Mua sao bang', 'category_id' => '2'],
            ['name' => 'Tham hiem cac vi sao', 'category_id' => '3'],
            ['name' => '3 van dam duoi day bien', 'category_id' => '3'],
            ['name' => 'Vu no the ky', 'category_id' => '1']
        ]);
    }
}
