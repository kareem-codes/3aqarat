<?php

namespace Database\Seeders;

use App\Models\Agent;
use Illuminate\Database\Seeder;

class AgentSeeder extends Seeder
{
    public function run(): void
    {
        $agents = [
            [
                'name' => 'أحمد محمد السعيد',
                'email' => 'ahmed.alsaeed@3aqarat.com',
                'phone' => '+971501234567',
                'status' => true,
                'rating' => 4.85,
                'bio' => 'خبرة 10 سنوات في مجال العقارات الفاخرة والاستثمارية',
            ],
            [
                'name' => 'فاطمة خالد العتيبي',
                'email' => 'fatima.alotaibi@3aqarat.com',
                'phone' => '+971502345678',
                'status' => true,
                'rating' => 4.92,
                'bio' => 'متخصصة في العقارات السكنية والشقق الفاخرة',
            ],
            [
                'name' => 'محمد عبدالله الهاجري',
                'email' => 'mohammed.alhajri@3aqarat.com',
                'phone' => '+971503456789',
                'status' => true,
                'rating' => 4.75,
                'bio' => 'مستشار عقاري معتمد مع خبرة في المشاريع التجارية',
            ],
            [
                'name' => 'نورة سالم المري',
                'email' => 'noura.almari@3aqarat.com',
                'phone' => '+971504567890',
                'status' => true,
                'rating' => 4.88,
                'bio' => 'خبيرة في التطوير العقاري والمشاريع السكنية الكبرى',
            ],
            [
                'name' => 'خالد يوسف الشامسي',
                'email' => 'khaled.alshamsi@3aqarat.com',
                'phone' => '+971505678901',
                'status' => true,
                'rating' => 4.70,
                'bio' => 'مختص في الفلل والعقارات الفاخرة في دبي',
            ],
            [
                'name' => 'ريم أحمد البلوشي',
                'email' => 'reem.albalushi@3aqarat.com',
                'phone' => '+971506789012',
                'status' => true,
                'rating' => 4.95,
                'bio' => 'وكيلة عقارية معتمدة متخصصة في الأبراج السكنية',
            ],
            [
                'name' => 'عبدالرحمن سعيد الكعبي',
                'email' => 'abdulrahman.alkaabi@3aqarat.com',
                'phone' => '+971507890123',
                'status' => true,
                'rating' => 4.82,
                'bio' => 'خبرة واسعة في العقارات التجارية والمكاتب',
            ],
            [
                'name' => 'مريم حسن المهيري',
                'email' => 'mariam.almheiri@3aqarat.com',
                'phone' => '+971508901234',
                'status' => true,
                'rating' => 4.78,
                'bio' => 'متخصصة في الاستشارات العقارية والاستثمار',
            ],
            [
                'name' => 'سعيد عمر القاسمي',
                'email' => 'saeed.alqasimi@3aqarat.com',
                'phone' => '+971509012345',
                'status' => true,
                'rating' => 4.90,
                'bio' => 'خبير في تقييم العقارات والمشاريع الاستثمارية',
            ],
            [
                'name' => 'لطيفة راشد الشرقي',
                'email' => 'latifa.alsharqi@3aqarat.com',
                'phone' => '+971500123456',
                'status' => true,
                'rating' => 4.86,
                'bio' => 'وكيلة عقارية محترفة مع تركيز على خدمة العملاء',
            ],
        ];

        foreach ($agents as $agent) {
            Agent::create($agent);
        }
    }
}
