<?php

use Illuminate\Database\Seeder;
use App\Proposition;

class PropositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proposition::insert([
        	[
        		'propositions' => '1. คำใดไม่ใช่คำภาษาต่างประเทศ',
        		'answer_1' => 'เซฟ',
        		'answer_2' => 'พิซซ่า',
        		'answer_3' => 'เฮ้าส์',
        		'answer_4' => 'หวาน',
        		'true_answer' => '4',

        	],
        	[
        		'propositions' => '2. "ออทิสติก" อ่านอย่างไร',
        		'answer_1' => 'ออ-ทิ-ติก',
        		'answer_2' => 'ออ-ที้-ติก',
        		'answer_3' => 'ออ-ทิ้ด-ติก',
        		'answer_4' => 'ออ-ทิด-ติก',
        		'true_answer' => '3',

        	],
        	[
        		'propositions' => '3. ข้อใดคือขั้นตอนแรกของการเขียนเล่าเรื่อง',
        		'answer_1' => 'เขียนวันที่เล่า',
        		'answer_2' => 'จดจำสิ่งที่พบเห็น',
        		'answer_3' => 'เรียงเรียงความคิด',
        		'answer_4' => 'กำหนดเวลาและสถานที่ในการเล่าเรื่อฃ',
        		'true_answer' => '2',

        	],
        	[
        		'propositions' => '4. คำในข้อใดมาก่อนคำอื่นในพจนานุกรม',
        		'answer_1' => 'วาง',
        		'answer_2' => 'ปอง',
        		'answer_3' => 'เข็ญ',
        		'answer_4' => 'หล่น',
        		'true_answer' => '3',

        	],
        	[
        		'propositions' => '5. "ใช้วิธีบังคับให้จำยอม" ตรงกับสำนวนใด',
        		'answer_1' => 'เบี้ยล่าง',
        		'answer_2' => 'แผลเก่า',
        		'answer_3' => 'ทางออก',
        		'answer_4' => 'มัดมือชก',
        		'true_answer' => '4',

        	],



        	]);
    }
}
