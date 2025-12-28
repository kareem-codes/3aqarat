import {Head, Link} from "@inertiajs/react";
import {useState} from "react";
import PropertyCard from "@/Components/PropertyCard";
import LeadForm from "@/Components/LeadForm";
import {
    FiMapPin, FiBriefcase, FiMaximize2, FiChevronLeft,
    FiChevronRight, FiMail, FiPhone, FiStar
} from "react-icons/fi";
import {FaBed} from "react-icons/fa";

export default function PropertyShow({property, relatedProperties}) {
    const [currentImageIndex, setCurrentImageIndex] = useState(0);
    const images = property.images || [];

    const nextImage = () => {
        setCurrentImageIndex((prev) => (prev + 1) % images.length);
    };

    const prevImage = () => {
        setCurrentImageIndex((prev) => (prev - 1 + images.length) % images.length);
    };

    const formatPrice = (price) => {
        return new Intl.NumberFormat('ar-EG', {
            style: 'currency',
            currency: 'EGP',
            maximumFractionDigits: 0,
        }).format(price);
    };

    return (
        <>
            <Head title={`${property.name || 'عقار'} - عقارات`}>
                <meta name="description" content={property.description || `تفاصيل عقار ${property.name || 'عقار'}`}/>
            </Head>

            <div className="min-h-screen bg-gray-50">
                {/* Breadcrumb */}
                <div className="bg-blue-100 bp-5 pt-30 ">
                    <div className="max-w-7xl mx-auto px-4 py-4">
                        <div className="flex items-center gap-2 text-xl text-gray-600">
                            <Link href="/" className="hover:text-orange-500 transition">الرئيسية</Link>
                            <span>/</span>
                            <Link href="/properties" className="hover:text-orange-500 transition">العقارات</Link>
                            <span>/</span>
                            <span className="text-gray-900 font-semibold">{property.name}</span>
                        </div>
                    </div>
                </div>

                <div className="max-w-7xl mx-auto px-4 py-8">
                    <div className="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        {/* Main Content */}
                        <div className="lg:col-span-2 space-y-8">
                            {/* Image Gallery */}
                            {images.length > 0 && (
                                <div className="bg-white rounded-2xl overflow-hidden shadow-lg">
                                    <div className="relative h-96 md:h-[500px] bg-gray-200">
                                        <img
                                            src={'/storage/' + images[currentImageIndex]}
                                            alt={`${property.name} - صورة ${currentImageIndex + 1}`}
                                            className="w-full h-full object-cover"
                                        />
                                        <div className="absolute top-4 right-4 flex gap-2">
                                            {property.is_for_sale && (
                                                <span
                                                    className="bg-orange-500 text-white px-3 py-1.5 rounded-full text-sm font-semibold shadow-lg">
                                                    للبيع
                                                </span>
                                            )}
                                            {property.is_for_rent && (
                                                <span
                                                    className="bg-blue-500 text-white px-3 py-1.5 rounded-full text-sm font-semibold shadow-lg">
                                                    للإيجار
                                                </span>
                                            )}
                                        </div>

                                        {property.is_featured && (
                                            <div className="absolute top-4 left-4">
                                                <span
                                                    className="bg-yellow-500 text-white px-3 py-1.5 rounded-full text-sm font-semibold shadow-lg">
                                                    مميز
                                                </span>
                                            </div>
                                        )}

                                        {images.length > 1 && (
                                            <>
                                                <button
                                                    onClick={prevImage}
                                                    className="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-white/90 hover:bg-white rounded-full flex items-center justify-center shadow-lg transition"
                                                >
                                                    <FiChevronRight className="text-xl"/>
                                                </button>
                                                <button
                                                    onClick={nextImage}
                                                    className="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-white/90 hover:bg-white rounded-full flex items-center justify-center shadow-lg transition"
                                                >
                                                    <FiChevronLeft className="text-xl"/>
                                                </button>

                                                <div
                                                    className="absolute bottom-4 left-1/2 -translate-x-1/2 bg-black/50 text-white px-4 py-2 rounded-full text-sm">
                                                    {currentImageIndex + 1} / {images.length}
                                                </div>
                                            </>
                                        )}
                                    </div>

                                    {images.length > 1 && (
                                        <div className="p-4 flex gap-2 overflow-x-auto">
                                            {images.map((image, index) => (
                                                <button
                                                    key={index}
                                                    onClick={() => setCurrentImageIndex(index)}
                                                    className={`flex-shrink-0 w-20 h-20 rounded-lg overflow-hidden border-2 transition ${
                                                        index === currentImageIndex
                                                            ? 'border-orange-500'
                                                            : 'border-gray-200 hover:border-gray-300'
                                                    }`}
                                                >
                                                    <img
                                                        src={'/storage/' + image}
                                                        alt={`صورة مصغرة ${index + 1}`}
                                                        className="w-full h-full object-cover"
                                                    />
                                                </button>
                                            ))}
                                        </div>
                                    )}
                                </div>
                            )}

                            {/* Property Details */}
                            <div className="bg-white rounded-2xl shadow-md p-6 md:p-8">
                                <div className="mb-6">
                                    <h1 className="text-3xl md:text-4xl font-bold text-gray-900 mb-3">
                                        {property.name}
                                    </h1>
                                    {(property.city || property.state) && (
                                        <div className="flex items-center text-gray-600 text-lg">
                                            <FiMapPin className="ml-2"/>
                                            <span>
                                                {property.city && property.state
                                                    ? `${property.city}, ${property.state}`
                                                    : property.city || property.state}
                                            </span>
                                        </div>
                                    )}
                                </div>

                                {property.price && (
                                    <div className="mb-6 pb-6 border-b">
                                        <div className="text-sm text-gray-600 mb-1">السعر</div>
                                        <div className="text-3xl font-bold text-orange-500">
                                            {formatPrice(property.price)}
                                        </div>
                                    </div>
                                )}

                                {/* Features */}
                                <div className="mb-6 pb-6 border-b">
                                    <h3 className="font-semibold text-gray-900 mb-4 text-xl">المواصفات</h3>
                                    <div className="grid grid-cols-2 md:grid-cols-4 gap-4">
                                        {property.bedrooms && (
                                            <div className="flex items-center gap-3 bg-gray-50 p-4 rounded-lg">
                                                <div
                                                    className="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center">
                                                    <FaBed className="text-orange-500"/>
                                                </div>
                                                <div>
                                                    <div className="text-sm text-gray-600">غرف النوم</div>
                                                    <div className="font-bold text-gray-900">{property.bedrooms}</div>
                                                </div>
                                            </div>
                                        )}
                                        {property.bathrooms && (
                                            <div className="flex items-center gap-3 bg-gray-50 p-4 rounded-lg">
                                                <div
                                                    className="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                                    <FiBriefcase className="text-blue-500"/>
                                                </div>
                                                <div>
                                                    <div className="text-sm text-gray-600">الحمامات</div>
                                                    <div className="font-bold text-gray-900">{property.bathrooms}</div>
                                                </div>
                                            </div>
                                        )}
                                        {property.space && (
                                            <div className="flex items-center gap-3 bg-gray-50 p-4 rounded-lg">
                                                <div
                                                    className="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                                    <FiMaximize2 className="text-green-500"/>
                                                </div>
                                                <div>
                                                    <div className="text-sm text-gray-600">المساحة</div>
                                                    <div className="font-bold text-gray-900">{property.space} م²</div>
                                                </div>
                                            </div>
                                        )}
                                    </div>
                                </div>

                                {property.categories && property.categories.length > 0 && (
                                    <div className="mb-6 pb-6 border-b">
                                        <h3 className="font-semibold text-gray-900 mb-3">الفئات</h3>
                                        <div className="flex flex-wrap gap-2">
                                            {property.categories.map((category, index) => (
                                                <span
                                                    key={index}
                                                    className="bg-gray-100 text-gray-700 px-4 py-2 rounded-full text-sm"
                                                >
                                                    {category}
                                                </span>
                                            ))}
                                        </div>
                                    </div>
                                )}

                                {property.description && (
                                    <div>
                                        <h3 className="font-semibold text-gray-900 mb-3 text-xl">الوصف</h3>
                                        <div className="text-gray-700 leading-relaxed whitespace-pre-line">
                                            {property.description}
                                        </div>
                                    </div>
                                )}
                            </div>

                            {/* Project Info */}
                            {property.project && (
                                <div className="bg-gradient-to-r from-orange-50 to-orange-100 rounded-2xl p-6 md:p-8">
                                    <h3 className="font-semibold text-gray-900 mb-4 text-xl">جزء من مشروع</h3>
                                    <Link
                                        href={`/projects/${property.project.slug}`}
                                        className="flex items-center gap-4 group"
                                    >
                                        {property.project.images && property.project.images[0] && (
                                            <img
                                                src={'/storage/' + property.project.images[0]}
                                                alt={property.project.name}
                                                className="w-20 h-20 rounded-lg object-cover"
                                            />
                                        )}
                                        <div className="flex-1">
                                            <h4 className="font-bold text-lg group-hover:text-orange-500 transition">
                                                {property.project.name}
                                            </h4>
                                            {property.project.description && (
                                                <p className="text-gray-600 text-sm line-clamp-2">
                                                    {property.project.description}
                                                </p>
                                            )}
                                        </div>
                                        <FiChevronLeft className="text-orange-500 text-xl"/>
                                    </Link>
                                </div>
                            )}
                        </div>

                        {/* Sidebar */}
                        <div className="lg:col-span-1">
                            <div className="sticky top-24 space-y-6">
                                {/* Agent Card */}
                                {property.agent && (
                                    <div className="bg-white rounded-2xl shadow-md p-6">
                                        <h3 className="font-semibold text-gray-900 mb-4">تواصل مع الوكيل</h3>
                                        <div className="flex items-start gap-4 mb-4">
                                            <img
                                                src={property.agent.image ? '/storage/' + property.agent.image : '/storage/default.jpg'}
                                                alt={property.agent.name}
                                                className="w-16 h-16 rounded-full object-cover"
                                            />
                                            <div className="flex-1">
                                                <h4 className="font-bold text-lg text-gray-900">{property.agent.name}</h4>
                                                {property.agent.rating && (
                                                    <div className="flex items-center gap-1 text-yellow-500 mt-1">
                                                        <FiStar className="fill-current"/>
                                                        <span className="text-gray-700 text-sm font-semibold">
                                                            {property.agent.rating}
                                                        </span>
                                                    </div>
                                                )}
                                            </div>
                                        </div>

                                        {property.agent.bio && (
                                            <p className="text-gray-600 text-sm mb-4 line-clamp-3">
                                                {property.agent.bio}
                                            </p>
                                        )}

                                        <div className="space-y-3">
                                            {property.agent.phone && (
                                                <a
                                                    href={`tel:${property.agent.phone}`}
                                                    className="flex items-center gap-2 text-gray-700 hover:text-orange-500 transition"
                                                >
                                                    <FiPhone className="flex-shrink-0"/>
                                                    <span className="text-sm">{property.agent.phone}</span>
                                                </a>
                                            )}
                                            {property.agent.email && (
                                                <a
                                                    href={`mailto:${property.agent.email}`}
                                                    className="flex items-center gap-2 text-gray-700 hover:text-orange-500 transition"
                                                >
                                                    <FiMail className="flex-shrink-0"/>
                                                    <span className="text-sm truncate">{property.agent.email}</span>
                                                </a>
                                            )}
                                        </div>

                                        <Link
                                            href={`/agents/${property.agent.id}`}
                                            className="mt-4 block w-full bg-gray-100 hover:bg-gray-200 text-gray-900 py-2 rounded-lg transition text-center font-semibold"
                                        >
                                            عرض الملف الشخصي
                                        </Link>
                                    </div>
                                )}

                                {/* Lead Form */}
                                <LeadForm
                                    propertyId={property.id}
                                    agentId={property.agent?.id}
                                    title="هل أنت مهتم بهذا العقار؟"
                                />
                            </div>
                        </div>
                    </div>

                    {/* Related Properties */}
                    {relatedProperties && relatedProperties.length > 0 && (
                        <div className="mt-16">
                            <h2 className="text-3xl font-bold text-gray-900 mb-8">عقارات مشابهة</h2>
                            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                                {relatedProperties.map((relatedProperty) => (
                                    <PropertyCard key={relatedProperty.id} property={relatedProperty}/>
                                ))}
                            </div>
                        </div>
                    )}
                </div>
            </div>
        </>
    );
}
