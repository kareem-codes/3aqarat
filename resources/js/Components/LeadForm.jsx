import { useState } from "react";
import { useForm } from "@inertiajs/react";
import Input from "./Input";
import Textarea from "./Textarea";
import Select from "./Select";
import Button from "./Button";
import { FiCheckCircle } from "react-icons/fi";

export default function LeadForm({ propertyId = null, agentId = null, title = "هل أنت مهتم؟" }) {
    const [showSuccess, setShowSuccess] = useState(false);

    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        email: '',
        phone: '',
        time_range_to_contact: '',
        property_id: propertyId,
        agent_id: agentId,
        message: '',
    });

    const handleSubmit = (e) => {
        e.preventDefault();

        post('/leads', {
            onSuccess: () => {
                reset();
                setShowSuccess(true);
                setTimeout(() => setShowSuccess(false), 5000);
            },
        });
    };

    if (showSuccess) {
        return (
            <div className="bg-emerald-50 border-2 border-emerald-500 rounded-3xl p-8 text-center">
                <FiCheckCircle className="w-16 h-16 text-emerald-500 mx-auto mb-4" />
                <h3 className="text-2xl font-bold text-slate-900 mb-2">تم الإرسال بنجاح!</h3>
                <p className="text-slate-600">شكراً لتواصلك معنا. سنتواصل معك في أقرب وقت ممكن.</p>
            </div>
        );
    }

    return (
        <div className="bg-white rounded-3xl shadow-lg p-6 md:p-8 border border-slate-100">
            <h3 className="text-2xl font-bold text-slate-900 mb-6">{title}</h3>

            <form onSubmit={handleSubmit} className="space-y-4">
                <Input
                    label="الاسم"
                    value={data.name}
                    onChange={(e) => setData('name', e.target.value)}
                    error={errors.name}
                    required
                    placeholder="أدخل اسمك الكامل"
                />

                <Input
                    label="البريد الإلكتروني"
                    type="email"
                    value={data.email}
                    onChange={(e) => setData('email', e.target.value)}
                    error={errors.email}
                    placeholder="example@email.com"
                />

                <Input
                    label="رقم الهاتف"
                    type="tel"
                    value={data.phone}
                    onChange={(e) => setData('phone', e.target.value)}
                    error={errors.phone}
                    required
                    placeholder="05xxxxxxxx"
                />

                <Select
                    label="الوقت المفضل للتواصل"
                    value={data.time_range_to_contact}
                    onChange={(e) => setData('time_range_to_contact', e.target.value)}
                    error={errors.time_range_to_contact}
                    options={[
                        { value: 'morning', label: 'صباحاً (9 ص - 12 م)' },
                        { value: 'afternoon', label: 'ظهراً (12 م - 3 م)' },
                        { value: 'evening', label: 'مساءً (3 م - 6 م)' },
                        { value: 'night', label: 'ليلاً (6 م - 9 م)' },
                    ]}
                    placeholder="اختر الوقت المناسب"
                />

                <Textarea
                    label="رسالتك"
                    value={data.message}
                    onChange={(e) => setData('message', e.target.value)}
                    error={errors.message}
                    placeholder="أخبرنا بالمزيد عن احتياجاتك..."
                    rows={5}
                />

                <Button
                    type="submit"
                    loading={processing}
                    className="w-full"
                    size="lg"
                >
                    إرسال الطلب
                </Button>
            </form>
        </div>
    );
}
