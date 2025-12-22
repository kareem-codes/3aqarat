import { Head, Link } from "@inertiajs/react";
import PropertyCard from "@/Components/PropertyCard";
import Pagination from "@/Components/Pagination";
import EmptyState from "@/Components/EmptyState";
import LeadForm from "@/Components/LeadForm";
import { FiMail, FiPhone, FiStar, FiHome, FiAward } from "react-icons/fi";

export default function AgentShow({ agent, properties }) {
    return (
        <>
            <Head title={`${agent.name || 'وكيل'} - الوكلاء - عقارات`}>
                <meta name="description" content={agent.bio || `الملف الشخصي للوكيل ${agent.name || 'وكيل'}`} />
            </Head>

            <div className="min-h-screen bg-gray-50">
                {/* Breadcrumb */}
                <div className="bg-orange-100 bp-5 pt-30 ">
                    <div className="max-w-7xl mx-auto px-4 py-4">
                        <div className="flex items-center gap-2 text-xl text-gray-600">
                            <Link href="/" className="hover:text-orange-500 transition">الرئيسية</Link>
                            <span>/</span>
                            <Link href="/agents" className="hover:text-orange-500 transition">الوكلاء</Link>
                            <span>/</span>
                            <span className="text-gray-900 font-semibold">{agent.name}</span>
                        </div>
                    </div>
                </div>

                <div className="max-w-7xl mx-auto px-4 py-8">
                    <div className="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        {/* Main Content */}
                        <div className="lg:col-span-2 space-y-8">
                            {/* Agent Profile Card */}
                            <div className="bg-white rounded-2xl shadow-lg overflow-hidden">
                                <div className="relative h-48 bg-gradient-to-r from-orange-500 to-orange-600">
                                    <div className="absolute -bottom-16 left-8">
                                        <img
                                            src={agent.image ? '/storage/' + agent.image : '/storage/default.jpg'}
                                            alt={agent.name}
                                            className="w-32 h-32 rounded-full object-cover border-4 border-white shadow-xl"
                                        />
                                    </div>
                                </div>

                                <div className="pt-20 px-8 pb-8">
                                    <div className="flex flex-col md:flex-row md:items-start md:justify-between gap-4 mb-6">
                                        <div>
                                            <h1 className="text-3xl font-bold text-gray-900 mb-2">{agent.name}</h1>
                                            {agent.rating && (
                                                <div className="flex items-center gap-2">
                                                    <div className="flex items-center gap-1 text-yellow-500">
                                                        <FiStar className="fill-current" />
                                                        <FiStar className="fill-current" />
                                                        <FiStar className="fill-current" />
                                                        <FiStar className="fill-current" />
                                                        <FiStar className={agent.rating >= 5 ? 'fill-current' : ''} />
                                                    </div>
                                                    <span className="text-gray-700 font-semibold">{agent.rating}</span>
                                                </div>
                                            )}
                                        </div>

                                        {agent.properties_count > 0 && (
                                            <div className="bg-orange-100 text-orange-700 px-6 py-3 rounded-full font-semibold flex items-center gap-2">
                                                <FiHome />
                                                {agent.properties_count} عقار
                                            </div>
                                        )}
                                    </div>

                                    {agent.bio && (
                                        <div className="mb-6">
                                            <h3 className="font-semibold text-gray-900 mb-3 text-lg">نبذة عني</h3>
                                            <p className="text-gray-700 leading-relaxed whitespace-pre-line">
                                                {agent.bio}
                                            </p>
                                        </div>
                                    )}

                                    <div className="border-t pt-6">
                                        <h3 className="font-semibold text-gray-900 mb-4 text-lg">معلومات الاتصال</h3>
                                        <div className="space-y-3">
                                            {agent.email && (
                                                <div className="flex items-center gap-3 text-gray-700">
                                                    <div className="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center">
                                                        <FiMail className="text-orange-500" />
                                                    </div>
                                                    <div>
                                                        <div className="text-sm text-gray-600">البريد الإلكتروني</div>
                                                        <a
                                                            href={`mailto:${agent.email}`}
                                                            className="font-medium hover:text-orange-500 transition"
                                                        >
                                                            {agent.email}
                                                        </a>
                                                    </div>
                                                </div>
                                            )}
                                            {agent.phone && (
                                                <div className="flex items-center gap-3 text-gray-700">
                                                    <div className="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center">
                                                        <FiPhone className="text-orange-500" />
                                                    </div>
                                                    <div>
                                                        <div className="text-sm text-gray-600">رقم الهاتف</div>
                                                        <a
                                                            href={`tel:${agent.phone}`}
                                                            className="font-medium hover:text-orange-500 transition"
                                                        >
                                                            {agent.phone}
                                                        </a>
                                                    </div>
                                                </div>
                                            )}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {/* Agent Properties */}
                            <div className="bg-white rounded-2xl shadow-md p-6 md:p-8">
                                <div className="flex items-center gap-3 mb-6">
                                    <div className="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center">
                                        <FiHome className="w-6 h-6 text-orange-500" />
                                    </div>
                                    <div>
                                        <h2 className="text-2xl font-bold text-gray-900">
                                            عقارات {agent.name}
                                        </h2>
                                        <p className="text-gray-600">
                                            {agent.properties_count} عقار متاح
                                        </p>
                                    </div>
                                </div>

                                {properties.data.length > 0 ? (
                                    <>
                                        <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            {properties.data.map((property) => (
                                                <PropertyCard key={property.id} property={property} />
                                            ))}
                                        </div>

                                        {/* Pagination */}
                                        {properties.links.length > 3 && (
                                            <Pagination links={properties.links} className="mt-8" />
                                        )}
                                    </>
                                ) : (
                                    <EmptyState
                                        icon={FiHome}
                                        title="لا توجد عقارات"
                                        description="لم يقم هذا الوكيل بإضافة أي عقارات بعد."
                                    />
                                )}
                            </div>
                        </div>

                        {/* Sidebar */}
                        <div className="lg:col-span-1">
                            <div className="sticky top-24 space-y-6">
                                {/* Quick Contact Card */}
                                <div className="bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-6">
                                    <h3 className="font-bold text-gray-900 mb-4 text-lg">تواصل سريع</h3>
                                    <div className="space-y-3">
                                        {agent.phone && (
                                            <a
                                                href={`tel:${agent.phone}`}
                                                className="block w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-lg transition text-center font-semibold flex items-center justify-center gap-2"
                                            >
                                                <FiPhone />
                                                اتصل الآن
                                            </a>
                                        )}
                                        {agent.email && (
                                            <a
                                                href={`mailto:${agent.email}`}
                                                className="block w-full bg-white hover:bg-gray-50 text-gray-900 border-2 border-orange-500 py-3 rounded-lg transition text-center font-semibold flex items-center justify-center gap-2"
                                            >
                                                <FiMail />
                                                أرسل بريد
                                            </a>
                                        )}
                                    </div>
                                </div>

                                {/* Stats Card */}
                                {agent.properties_count > 0 && (
                                    <div className="bg-white rounded-2xl shadow-md p-6">
                                        <h3 className="font-bold text-gray-900 mb-4 text-lg">الإحصائيات</h3>
                                        <div className="space-y-4">
                                            <div className="flex items-center justify-between">
                                                <span className="text-gray-600">عدد العقارات</span>
                                                <span className="font-bold text-xl text-orange-500">
                                                    {agent.properties_count}
                                                </span>
                                            </div>
                                            {agent.rating && (
                                                <div className="flex items-center justify-between">
                                                    <span className="text-gray-600">التقييم</span>
                                                    <div className="flex items-center gap-1">
                                                        <FiStar className="text-yellow-500 fill-current" />
                                                        <span className="font-bold text-xl text-gray-900">
                                                            {agent.rating}
                                                        </span>
                                                    </div>
                                                </div>
                                            )}
                                        </div>
                                    </div>
                                )}

                                {/* Lead Form */}
                                <LeadForm
                                    agentId={agent.id}
                                    title="تواصل مع الوكيل"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}
