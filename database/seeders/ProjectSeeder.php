<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'name' => 'مشروع أبراج الخليج',
                'slug' => 'abraj-alkhalij',
                'description' => 'مشروع سكني فاخر يتكون من 4 أبراج سكنية بإطلالات بحرية خلابة. يضم المشروع شققاً من غرفة واحدة إلى 4 غرف، مع مرافق عصرية تشمل مسابح، صالات رياضية، ومناطق ترفيهية للأطفال.',
                'city' => 'دبي',
                'state' => 'إمارة دبي',
                'status' => true,
                'is_featured' => true,
                'categories' => ['residential', 'luxury', 'waterfront'],
            ],
            [
                'name' => 'مجمع النخيل السكني',
                'slug' => 'najeel-residential',
                'description' => 'مجمع سكني متكامل في قلب المدينة يوفر حياة عصرية مريحة. يحتوي على فلل وشقق فاخرة مع حدائق واسعة ومرافق خدمية متنوعة. تصميم معماري حديث يجمع بين الأصالة والمعاصرة.',
                'city' => 'أبوظبي',
                'state' => 'إمارة أبوظبي',
                'status' => true,
                'is_featured' => true,
                'categories' => ['residential', 'gated-community'],
            ],
            [
                'name' => 'مركز الأعمال الدولي',
                'slug' => 'international-business-center',
                'description' => 'مشروع تجاري متميز يضم مكاتب ومحلات تجارية في موقع استراتيجي. مصمم بأحدث المعايير العالمية ليكون وجهة مثالية للأعمال والاستثمار.',
                'city' => 'الرياض',
                'state' => 'منطقة الرياض',
                'status' => true,
                'is_featured' => true,
                'categories' => ['commercial', 'mixed-use'],
            ],
            [
                'name' => 'منتجع الساحل الشمالي',
                'slug' => 'north-coast-resort',
                'description' => 'منتجع سياحي فاخر على شاطئ البحر مباشرة. يوفر فلل وشاليهات راقية مع خدمات فندقية متكاملة. مثالي للسكن الدائم أو الاستثمار السياحي.',
                'city' => 'جدة',
                'state' => 'منطقة مكة المكرمة',
                'status' => true,
                'is_featured' => true,
                'categories' => ['residential', 'waterfront', 'luxury'],
            ],
            [
                'name' => 'حي الياسمين السكني',
                'slug' => 'yasmin-district',
                'description' => 'حي سكني راقي يتميز بالهدوء والأمان. يحتوي على فلل ومنازل عائلية بتصاميم عصرية ومساحات خضراء واسعة. قريب من المدارس والمستشفيات والمراكز التجارية.',
                'city' => 'الشارقة',
                'state' => 'إمارة الشارقة',
                'status' => true,
                'is_featured' => false,
                'categories' => ['residential', 'gated-community'],
            ],
            [
                'name' => 'برج الماسة التجاري',
                'slug' => 'diamond-tower',
                'description' => 'برج تجاري متعدد الاستخدامات في موقع حيوي. يضم مكاتب إدارية، صالات عرض، ومحلات تجارية. مجهز بأحدث التقنيات ومواقف سيارات واسعة.',
                'city' => 'الدوحة',
                'state' => 'قطر',
                'status' => true,
                'is_featured' => true,
                'categories' => ['commercial', 'mixed-use'],
            ],
            [
                'name' => 'قرية الورود السكنية',
                'slug' => 'roses-village',
                'description' => 'مشروع سكني عائلي يوفر بيئة آمنة ومريحة. يتميز بالمساحات الخضراء والحدائق الجميلة. يحتوي على مرافق ترفيهية متكاملة ومدارس داخلية.',
                'city' => 'عجمان',
                'state' => 'إمارة عجمان',
                'status' => true,
                'is_featured' => false,
                'categories' => ['residential', 'affordable', 'gated-community'],
            ],
            [
                'name' => 'مجمع السيف للأعمال',
                'slug' => 'alsaif-business-park',
                'description' => 'مجمع أعمال متكامل يضم مكاتب ومستودعات بمواصفات عالية. موقع استراتيجي قرب الطرق الرئيسية والموانئ. مثالي للشركات والمؤسسات الكبرى.',
                'city' => 'المنامة',
                'state' => 'البحرين',
                'status' => true,
                'is_featured' => false,
                'categories' => ['commercial', 'industrial'],
            ],
            [
                'name' => 'مشروع الربيع الأخضر',
                'slug' => 'green-spring-project',
                'description' => 'مشروع سكني صديق للبيئة يعتمد على الطاقة المتجددة. يوفر شقق وفلل بتصاميم مستدامة ومساحات خضراء واسعة. نموذج مثالي للحياة البيئية الصحية.',
                'city' => 'العين',
                'state' => 'إمارة أبوظبي',
                'status' => true,
                'is_featured' => true,
                'categories' => ['residential', 'eco-friendly', 'gated-community'],
            ],
            [
                'name' => 'أبراج الأفق الحديثة',
                'slug' => 'modern-horizon-towers',
                'description' => 'مجمع أبراج سكنية وتجارية في قلب المدينة. يجمع بين الرفاهية والموقع المتميز. يحتوي على شقق فاخرة ومحلات تجارية وفندق 5 نجوم.',
                'city' => 'الكويت',
                'state' => 'دولة الكويت',
                'status' => true,
                'is_featured' => true,
                'categories' => ['residential', 'commercial', 'mixed-use', 'luxury'],
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
