import { Head, Link } from "@inertiajs/react";
import Hero from "@/Components/Hero";
import ProjectSlider from "@/Components/ProjectSlider";
import PropertyCard from "@/Components/PropertyCard";
import Contact from "@/Components/Contact";
import { FiHome, FiMapPin, FiTrendingUp, FiArrowLeft } from "react-icons/fi";

export default function Home({ featuredProjects, featuredProperties, stats }) {
    return (
        <>
            <Head>
                <title>عقارات - منصتك العقارية الموثوقة</title>
                <meta
                    name="description"
                    content="مرحبًا بك في عقارات، منصتك الموثوقة للعقارات والمشاريع العقارية في المنطقة. اكتشف أفضل العروض العقارية والمشاريع الحديثة بسهولة وأمان."
                />
            </Head>

            <Hero />


            {/* Featured Projects Slider */}
            {featuredProjects && featuredProjects.length > 0 && (
                <ProjectSlider projects={featuredProjects} />
            )}

            {/* Featured Properties Section */}
            {featuredProperties && featuredProperties.length > 0 && (
                <section className="py-20 bg-white">
                    <div className="max-w-7xl mx-auto px-4">
                        <div className="flex justify-between items-center mb-12">
                            <div>
                                <h2 className="text-5xl md:text-6xl font-bold mb-4 text-slate-900">
                                    عقارات مميزة
                                </h2>
                                <p className="text-slate-600 text-xl max-w-2xl">
                                    اختر من بين أفضل العقارات المتاحة التي تناسب احتياجاتك
                                </p>
                            </div>
                            <Link
                                href="/properties"
                                className="hidden md:flex items-center gap-2 text-slate-800 hover:text-slate-600 font-semibold text-lg transition-all"
                            >
                                عرض الكل
                                <FiArrowLeft />
                            </Link>
                        </div>

                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            {featuredProperties.slice(0, 6).map((property) => (
                                <PropertyCard key={property.id} property={property} />
                            ))}
                        </div>

                        <div className="mt-10 text-center md:hidden">
                            <Link
                                href="/properties"
                                className="inline-flex items-center gap-2 text-slate-800 hover:text-slate-600 font-semibold text-lg transition-all"
                            >
                                عرض جميع العقارات
                                <FiArrowLeft />
                            </Link>
                        </div>
                    </div>
                </section>
            )}

            {/* Why Choose Us Section */}
            <section className="py-20 bg-gradient-to-b from-slate-50 to-white">
                <div className="max-w-7xl mx-auto px-4 mb-8">
                    <div className="text-center mb-16">
                        <h2 className="text-5xl md:text-6xl font-bold mb-6 text-slate-900">
                            لماذا تختار عقارات؟
                        </h2>
                        <p className="text-slate-600 text-xl max-w-3xl mx-auto">
                            نقدم لك أفضل الخدمات العقارية بمعايير عالية الجودة
                        </p>
                    </div>

                    <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div className="bg-white p-10 rounded-3xl shadow-sm hover:shadow-lg transition-all text-center border border-slate-100">
                            <div className="w-20 h-20 bg-gradient-to-br from-sky-100 to-sky-200 rounded-2xl flex items-center justify-center mx-auto mb-6">
                                <svg className="w-10 h-10 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 className="text-2xl font-bold mb-4 text-slate-900">موثوقية عالية</h3>
                            <p className="text-slate-600 text-lg leading-relaxed">
                                نضمن لك صفقات آمنة وموثوقة مع متابعة دقيقة لكل التفاصيل
                            </p>
                        </div>

                        <div className="bg-white p-10 rounded-3xl shadow-sm hover:shadow-lg transition-all text-center border border-slate-100">
                            <div className="w-20 h-20 bg-gradient-to-br from-indigo-100 to-indigo-200 rounded-2xl flex items-center justify-center mx-auto mb-6">
                                <svg className="w-10 h-10 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 className="text-2xl font-bold mb-4 text-slate-900">خدمة سريعة</h3>
                            <p className="text-slate-600 text-lg leading-relaxed">
                                نوفر لك استجابة سريعة وخدمة متميزة في جميع الأوقات
                            </p>
                        </div>

                        <div className="bg-white p-10 rounded-3xl shadow-sm hover:shadow-lg transition-all text-center border border-slate-100">
                            <div className="w-20 h-20 bg-gradient-to-br from-emerald-100 to-emerald-200 rounded-2xl flex items-center justify-center mx-auto mb-6">
                                <svg className="w-10 h-10 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <h3 className="text-2xl font-bold mb-4 text-slate-900">فريق محترف</h3>
                            <p className="text-slate-600 text-lg leading-relaxed">
                                فريق من الخبراء المتخصصين لمساعدتك في كل خطوة
                            </p>
                        </div>
                    </div>
                </div>
                <div className="max-w-7xl mx-auto px-4">
                    <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div className="text-center p-10 bg-white rounded-3xl shadow-sm hover:shadow-lg transition-all border border-slate-100">
                            <div className="w-20 h-20 bg-gradient-to-br from-sky-400 to-sky-500 rounded-2xl flex items-center justify-center mx-auto mb-6">
                                <FiHome className="w-10 h-10 text-white" />
                            </div>
                            <div className="text-5xl font-bold text-slate-900 mb-3">{stats?.total_properties || 0}</div>
                            <div className="text-slate-600 text-lg">عقار متاح</div>
                        </div>
                        <div className="text-center p-10 bg-white rounded-3xl shadow-sm hover:shadow-lg transition-all border border-slate-100">
                            <div className="w-20 h-20 bg-gradient-to-br from-indigo-400 to-indigo-500 rounded-2xl flex items-center justify-center mx-auto mb-6">
                                <FiTrendingUp className="w-10 h-10 text-white" />
                            </div>
                            <div className="text-5xl font-bold text-slate-900 mb-3">{stats?.total_projects || 0}</div>
                            <div className="text-slate-600 text-lg">مشروع عقاري</div>
                        </div>
                        <div className="text-center p-10 bg-white rounded-3xl shadow-sm hover:shadow-lg transition-all border border-slate-100">
                            <div className="w-20 h-20 bg-gradient-to-br from-emerald-400 to-emerald-500 rounded-2xl flex items-center justify-center mx-auto mb-6">
                                <FiMapPin className="w-10 h-10 text-white" />
                            </div>
                            <div className="text-5xl font-bold text-slate-900 mb-3">{stats?.cities_count || 0}</div>
                            <div className="text-slate-600 text-lg">مدينة</div>
                        </div>
                    </div>
                </div>
            </section>
    <Contact />
        </>
    );
}

