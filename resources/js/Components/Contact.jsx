import LeadForm from "./LeadForm";

export default function Contact() {
    return (
        <>
            <section className="py-20 bg-white" id="contact">
                <div className="max-w-7xl mx-auto px-4">
                    <div className="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                        <div>
                            <h2 className="text-5xl md:text-6xl font-bold mb-8 text-slate-900">
                                هل تبحث عن عقارك المثالي؟
                            </h2>
                            <p className="text-slate-600 text-xl mb-8 leading-relaxed">
                                تواصل معنا الآن ودعنا نساعدك في العثور على العقار الذي تحلم به. فريقنا المتخصص جاهز
                                لخدمتك.
                            </p>
                            <ul className="space-y-5">
                                <li className="flex items-start gap-4">
                                    <svg className="w-7 h-7 text-sky-500 flex-shrink-0 mt-1" fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                              d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span className="text-slate-700 text-lg">استشارة مجانية من خبرائنا</span>
                                </li>
                                <li className="flex items-start gap-4">
                                    <svg className="w-7 h-7 text-sky-500 flex-shrink-0 mt-1" fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                              d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span className="text-slate-700 text-lg">مجموعة واسعة من الخيارات</span>
                                </li>
                                <li className="flex items-start gap-4">
                                    <svg className="w-7 h-7 text-sky-500 flex-shrink-0 mt-1" fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                              d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span className="text-slate-700 text-lg">متابعة شاملة حتى إتمام الصفقة</span>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <LeadForm title="احجز استشارتك المجانية"/>
                        </div>
                    </div>
                </div>
            </section>
        </>
    )
};
