import { Head, Link } from "@inertiajs/react";
import LeadForm from "@/Components/LeadForm";
import { FiMail, FiPhone, FiMapPin, FiClock } from "react-icons/fi";

export default function Contact() {
    return (
        <>
            <Head>
                <title>اتصل بنا - عقارات</title>
                <meta
                    name="description"
                    content="تواصل معنا للحصول على استشارة مجانية أو الإجابة على استفساراتك. فريقنا جاهز لمساعدتك."
                />
            </Head>

            <div className="min-h-screen bg-gray-50">
                {/* Hero Section */}
                <section className="bg-gradient-to-r from-orange-600 to-orange-500 text-white pb-16 pt-40">
                    <div className="max-w-7xl mx-auto px-4">
                        <h1 className="text-4xl md:text-6xl font-bold mb-4">اتصل بنا</h1>
                        <p className="text-xl md:text-2xl text-orange-100">
                            نحن هنا لمساعدتك في العثور على عقارك المثالي
                        </p>
                    </div>
                </section>

                <div className="max-w-7xl mx-auto px-4 py-16">
                    <div className="grid grid-cols-1 lg:grid-cols-2 gap-12">
                        {/* Contact Information */}
                        <div>
                            <h2 className="text-3xl font-bold text-gray-900 mb-6">
                                كيف يمكننا مساعدتك؟
                            </h2>
                            <p className="text-gray-600 text-lg mb-8 leading-relaxed">
                                سواء كنت تبحث عن عقار للشراء أو الإيجار، أو ترغب في بيع عقارك،
                                فريقنا من الخبراء جاهز لتقديم أفضل الحلول العقارية التي تناسب احتياجاتك.
                            </p>

                            <div className="space-y-6">
                                {/* Address */}
                                <div className="flex items-start gap-4 bg-white p-6 rounded-2xl shadow-md">
                                    <div className="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <FiMapPin className="w-6 h-6 text-orange-500" />
                                    </div>
                                    <div>
                                        <h3 className="font-bold text-gray-900 mb-2">العنوان</h3>
                                        <p className="text-gray-600">
                                            الرياض، المملكة العربية السعودية
                                        </p>
                                    </div>
                                </div>

                                {/* Phone */}
                                <div className="flex items-start gap-4 bg-white p-6 rounded-2xl shadow-md">
                                    <div className="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <FiPhone className="w-6 h-6 text-blue-500" />
                                    </div>
                                    <div>
                                        <h3 className="font-bold text-gray-900 mb-2">الهاتف</h3>
                                        <a
                                            href="tel:0500000000"
                                            className="text-gray-600 hover:text-orange-500 transition"
                                        >
                                            0500000000
                                        </a>
                                    </div>
                                </div>

                                {/* Email */}
                                <div className="flex items-start gap-4 bg-white p-6 rounded-2xl shadow-md">
                                    <div className="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <FiMail className="w-6 h-6 text-green-500" />
                                    </div>
                                    <div>
                                        <h3 className="font-bold text-gray-900 mb-2">البريد الإلكتروني</h3>
                                        <a
                                            href="mailto:info@3aqarat.com"
                                            className="text-gray-600 hover:text-orange-500 transition"
                                        >
                                            info@3aqarat.com
                                        </a>
                                    </div>
                                </div>

                                {/* Working Hours */}
                                <div className="flex items-start gap-4 bg-white p-6 rounded-2xl shadow-md">
                                    <div className="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <FiClock className="w-6 h-6 text-purple-500" />
                                    </div>
                                    <div>
                                        <h3 className="font-bold text-gray-900 mb-2">ساعات العمل</h3>
                                        <div className="text-gray-600 space-y-1">
                                            <p>السبت - الخميس: 9:00 ص - 6:00 م</p>
                                            <p>الجمعة: مغلق</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {/* Why Contact Us */}
                            <div className="mt-8 bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-6">
                                <h3 className="font-bold text-gray-900 mb-4 text-xl">لماذا تتواصل معنا؟</h3>
                                <ul className="space-y-3">
                                    <li className="flex items-start gap-3">
                                        <svg className="w-6 h-6 text-orange-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span className="text-gray-700">استشارة مجانية من خبراء العقارات</span>
                                    </li>
                                    <li className="flex items-start gap-3">
                                        <svg className="w-6 h-6 text-orange-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span className="text-gray-700">رد سريع خلال 24 ساعة</span>
                                    </li>
                                    <li className="flex items-start gap-3">
                                        <svg className="w-6 h-6 text-orange-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span className="text-gray-700">خيارات متنوعة تناسب ميزانيتك</span>
                                    </li>
                                    <li className="flex items-start gap-3">
                                        <svg className="w-6 h-6 text-orange-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span className="text-gray-700">دعم كامل حتى إتمام الصفقة</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        {/* Contact Form */}
                        <div>
                            <div className="bg-white rounded-2xl shadow-lg p-8 sticky top-24">
                                <div className="mb-6">
                                    <h2 className="text-3xl font-bold text-gray-900 mb-2">
                                        أرسل رسالتك
                                    </h2>
                                    <p className="text-gray-600">
                                        املأ النموذج وسنتواصل معك في أقرب وقت ممكن
                                    </p>
                                </div>

                                <LeadForm title="" />
                            </div>
                        </div>
                    </div>

                    {/* FAQ Section */}
                    <div className="mt-20">
                        <h2 className="text-3xl md:text-4xl font-bold text-slate-900 text-center mb-12">
                            الأسئلة الشائعة
                        </h2>

                        <div className="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-6xl mx-auto">
                            <div className="bg-white rounded-2xl p-6 shadow-md border border-slate-100">
                                <h3 className="font-bold text-slate-900 mb-3 text-lg">
                                    كيف يمكنني البحث عن عقار؟
                                </h3>
                                <p className="text-slate-600">
                                    يمكنك استخدام صفحة العقارات للبحث والفلترة حسب المدينة، السعر، عدد الغرف، والمزيد من المعايير.
                                </p>
                            </div>

                            <div className="bg-white rounded-2xl p-6 shadow-md border border-slate-100">
                                <h3 className="font-bold text-slate-900 mb-3 text-lg">
                                    هل الاستشارة مجانية؟
                                </h3>
                                <p className="text-slate-600">
                                    نعم، نقدم استشارة مجانية لجميع عملائنا لمساعدتهم في اختيار العقار المناسب.
                                </p>
                            </div>

                            <div className="bg-white rounded-2xl p-6 shadow-md border border-slate-100">
                                <h3 className="font-bold text-slate-900 mb-3 text-lg">
                                    كم يستغرق الرد على طلبي؟
                                </h3>
                                <p className="text-slate-600">
                                    نحرص على الرد على جميع الطلبات خلال 24 ساعة كحد أقصى.
                                </p>
                            </div>

                            <div className="bg-white rounded-2xl p-6 shadow-md border border-slate-100">
                                <h3 className="font-bold text-slate-900 mb-3 text-lg">
                                    هل يمكنني زيارة العقار؟
                                </h3>
                                <p className="text-slate-600">
                                    بالتأكيد! يمكنك حجز موعد لزيارة العقار من خلال التواصل مع الوكيل المسؤول.
                                </p>
                            </div>
                        </div>
                    </div>

                    {/* CTA Section */}
                    <div className="mt-20 bg-gradient-to-r from-slate-800 to-slate-700 rounded-3xl p-8 md:p-12 text-center text-white">
                        <h2 className="text-3xl md:text-4xl font-bold mb-4">
                            جاهز لبدء رحلتك العقارية؟
                        </h2>
                        <p className="text-xl mb-8 text-slate-200">
                            تصفح عقاراتنا المتاحة واعثر على منزل أحلامك اليوم
                        </p>
                        <div className="flex flex-col sm:flex-row gap-4 justify-center">
                            <Link
                                href="/properties"
                                className="bg-white text-slate-800 px-8 py-3 rounded-full font-semibold hover:bg-slate-100 transition inline-block"
                            >
                                تصفح العقارات
                            </Link>
                            <Link
                                href="/projects"
                                className="bg-slate-900 text-white px-8 py-3 rounded-full font-semibold hover:bg-slate-950 transition inline-block border border-slate-600"
                            >
                                تصفح المشاريع
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}
