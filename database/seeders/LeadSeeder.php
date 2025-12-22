<?php

namespace Database\Seeders;

use App\Models\Lead;
use Illuminate\Database\Seeder;

class LeadSeeder extends Seeder
{
    public function run(): void
    {
        $properties = \App\Models\Property::all();
        $agents = \App\Models\Agent::all();

        $leads = [
            [
                'name' => 'عمر سعيد الظاهري',
                'email' => 'omar.alzaheri@email.com',
                'phone' => '+971501112233',
                'time_range_to_contact' => 'صباحاً من 9-12',
                'property_id' => $properties[0]->id ?? null,
                'agent_id' => $agents[0]->id ?? null,
                'message' => 'مهتم بالشقة، أرغب في معاينة العقار والتعرف على طرق الدفع المتاحة.',
                'status' => 'new',
            ],
            [
                'name' => 'سارة محمد الحمادي',
                'email' => 'sara.alhamadi@email.com',
                'phone' => '+971502223344',
                'time_range_to_contact' => 'مساءً من 5-8',
                'property_id' => $properties[1]->id ?? null,
                'agent_id' => $agents[1]->id ?? null,
                'message' => 'أبحث عن فيلا عائلية، هل يمكن ترتيب زيارة في نهاية الأسبوع؟',
                'status' => 'contacted',
            ],
            [
                'name' => 'ياسر أحمد الشحي',
                'email' => 'yaser.alshehhi@email.com',
                'phone' => '+971503334455',
                'time_range_to_contact' => 'في أي وقت',
                'property_id' => $properties[2]->id ?? null,
                'agent_id' => $agents[2]->id ?? null,
                'message' => 'مهتم بالمكتب التجاري لتوسيع أعمالنا. أرجو التواصل لمناقشة التفاصيل.',
                'status' => 'qualified',
            ],
            [
                'name' => 'منى خالد السويدي',
                'email' => 'mona.alsuwaidi@email.com',
                'phone' => '+971504445566',
                'time_range_to_contact' => 'صباحاً من 10-1',
                'property_id' => $properties[3]->id ?? null,
                'agent_id' => $agents[3]->id ?? null,
                'message' => 'الشاليه رائع! أريد معرفة المزيد عن الخدمات المتوفرة وإمكانية الإيجار الشهري.',
                'status' => 'new',
            ],
            [
                'name' => 'محمود حسن البلوشي',
                'email' => 'mahmoud.albalushi@email.com',
                'phone' => '+971505556677',
                'time_range_to_contact' => 'مساءً من 6-9',
                'property_id' => $properties[4]->id ?? null,
                'agent_id' => $agents[4]->id ?? null,
                'message' => 'أبحث عن منزل لعائلتي في منطقة هادئة. هل المنزل قريب من المدارس؟',
                'status' => 'contacted',
            ],
            [
                'name' => 'فهد عبدالله القحطاني',
                'email' => 'fahad.alqahtani@email.com',
                'phone' => '+971506667788',
                'time_range_to_contact' => 'صباحاً من 8-11',
                'property_id' => $properties[5]->id ?? null,
                'agent_id' => $agents[5]->id ?? null,
                'message' => 'مهتم بالمحل التجاري لفتح مشروع جديد. ما هي شروط الإيجار؟',
                'status' => 'new',
            ],
            [
                'name' => 'هند راشد المزروعي',
                'email' => 'hind.almazrouei@email.com',
                'phone' => '+971507778899',
                'time_range_to_contact' => 'في أي وقت',
                'property_id' => $properties[6]->id ?? null,
                'agent_id' => $agents[6]->id ?? null,
                'message' => 'الاستوديو مناسب جداً. هل هو مفروش بالكامل؟ ومتى يمكن الانتقال؟',
                'status' => 'qualified',
            ],
            [
                'name' => 'علي سالم الكتبي',
                'email' => 'ali.alketbi@email.com',
                'phone' => '+971508889900',
                'time_range_to_contact' => 'صباحاً من 9-12',
                'property_id' => $properties[7]->id ?? null,
                'agent_id' => $agents[7]->id ?? null,
                'message' => 'نحتاج مستودع لتخزين بضائعنا. ما هي المساحة المتوفرة وتكلفة الإيجار الشهري؟',
                'status' => 'contacted',
            ],
            [
                'name' => 'ريم يوسف الهاشمي',
                'email' => 'reem.alhashemi@email.com',
                'phone' => '+971509990011',
                'time_range_to_contact' => 'مساءً من 4-7',
                'property_id' => $properties[8]->id ?? null,
                'agent_id' => $agents[8]->id ?? null,
                'message' => 'الدوبلكس فاخر جداً! أرغب في التفاوض على السعر ومعرفة خيارات التمويل.',
                'status' => 'converted',
            ],
            [
                'name' => 'سلطان أحمد الشامسي',
                'email' => 'sultan.alshamsi@email.com',
                'phone' => '+971500001122',
                'time_range_to_contact' => 'في أي وقت',
                'property_id' => $properties[9]->id ?? null,
                'agent_id' => $agents[9]->id ?? null,
                'message' => 'مهتم بشراء الأرض للاستثمار. هل تراخيص البناء جاهزة؟',
                'status' => 'new',
            ],
        ];

        foreach ($leads as $lead) {
            Lead::create($lead);
        }
    }
}
