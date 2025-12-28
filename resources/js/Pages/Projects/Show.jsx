import { Head, Link } from "@inertiajs/react";
import { useState } from "react";
import PropertyCard from "@/Components/PropertyCard";
import ProjectCard from "@/Components/ProjectCard";
import LeadForm from "@/Components/LeadForm";
import { FiMapPin, FiGrid, FiChevronLeft, FiChevronRight } from "react-icons/fi";

export default function ProjectShow({ project, relatedProjects }) {
    const [currentImageIndex, setCurrentImageIndex] = useState(0);
    const images = project.images || [];

    const nextImage = () => {
        setCurrentImageIndex((prev) => (prev + 1) % images.length);
    };

    const prevImage = () => {
        setCurrentImageIndex((prev) => (prev - 1 + images.length) % images.length);
    };

    return (
        <>
            <Head title={`${project.name || 'مشروع'} - عقارات`}>
                <meta name="description" content={project.description || `تفاصيل مشروع ${project.name || 'مشروع'}`} />
            </Head>

            <div className="min-h-screen bg-gray-50">
                {/* Breadcrumb */}
                <div className="bg-blue-100 bp-5 pt-30 ">
                    <div className="max-w-7xl mx-auto px-4 py-4">
                        <div className="flex items-center gap-2 text-xl text-gray-600">
                            <Link href="/" className="hover:text-orange-500 transition">الرئيسية</Link>
                            <span>/</span>
                            <Link href="/projects" className="hover:text-orange-500 transition">المشاريع</Link>
                            <span>/</span>
                            <span className="text-gray-900 font-semibold">{project.name}</span>
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
                                            alt={`${project.name} - صورة ${currentImageIndex + 1}`}
                                            className="w-full h-full object-cover"
                                        />

                                        {images.length > 1 && (
                                            <>
                                                <button
                                                    onClick={prevImage}
                                                    className="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-white/90 hover:bg-white rounded-full flex items-center justify-center shadow-lg transition"
                                                >
                                                    <FiChevronRight className="text-xl" />
                                                </button>
                                                <button
                                                    onClick={nextImage}
                                                    className="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-white/90 hover:bg-white rounded-full flex items-center justify-center shadow-lg transition"
                                                >
                                                    <FiChevronLeft className="text-xl" />
                                                </button>

                                                <div className="absolute bottom-4 left-1/2 -translate-x-1/2 bg-black/50 text-white px-4 py-2 rounded-full text-sm">
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

                            {/* Project Details */}
                            <div className="bg-white rounded-2xl shadow-md p-6 md:p-8">
                                <div className="flex items-start justify-between mb-6">
                                    <div>
                                        <h1 className="text-3xl md:text-4xl font-bold text-gray-900 mb-3">
                                            {project.name}
                                        </h1>
                                        {(project.city || project.state) && (
                                            <div className="flex items-center text-gray-600">
                                                <FiMapPin className="ml-2" />
                                                <span>
                                                    {project.city && project.state
                                                        ? `${project.city}, ${project.state}`
                                                        : project.city || project.state}
                                                </span>
                                            </div>
                                        )}
                                    </div>
                                    {project.is_featured && (
                                        <span className="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-semibold">
                                            مميز
                                        </span>
                                    )}
                                </div>

                                {project.price_range && (
                                    <div className="mb-6 pb-6 border-b">
                                        <div className="text-sm text-gray-600 mb-1">نطاق الأسعار</div>
                                        <div className="text-2xl font-bold text-orange-500">
                                            {project.price_range} ج.م
                                        </div>
                                    </div>
                                )}

                                {project.categories && project.categories.length > 0 && (
                                    <div className="mb-6">
                                        <h3 className="font-semibold text-gray-900 mb-3">الفئات</h3>
                                        <div className="flex flex-wrap gap-2">
                                            {project.categories.map((category, index) => (
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

                                {project.description && (
                                    <div>
                                        <h3 className="font-semibold text-gray-900 mb-3 text-xl">وصف المشروع</h3>
                                        <div className="text-gray-700 leading-relaxed whitespace-pre-line">
                                            {project.description}
                                        </div>
                                    </div>
                                )}
                            </div>

                            {/* Project Properties */}
                            {project.properties && project.properties.length > 0 && (
                                <div className="bg-white rounded-2xl shadow-md p-6 md:p-8">
                                    <div className="flex items-center justify-between mb-6">
                                        <h2 className="text-2xl font-bold text-gray-900">
                                            العقارات المتاحة ({project.properties_count})
                                        </h2>
                                    </div>
                                    <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        {project.properties.map((property) => (
                                            <PropertyCard key={property.id} property={property} />
                                        ))}
                                    </div>
                                    {project.properties_count > 6 && (
                                        <div className="mt-6 text-center">
                                            <Link
                                                href={`/properties?project_id=${project.id}`}
                                                className="inline-flex items-center gap-2 text-orange-500 hover:text-orange-600 font-semibold transition"
                                            >
                                                عرض جميع العقارات
                                                <FiChevronLeft />
                                            </Link>
                                        </div>
                                    )}
                                </div>
                            )}
                        </div>

                        {/* Sidebar */}
                        <div className="lg:col-span-1">
                            <div className="sticky top-24 space-y-6">
                                <LeadForm
                                    title="هل أنت مهتم بهذا المشروع؟"
                                />

                                {project.properties_count > 0 && (
                                    <div className="bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-6 text-center">
                                        <FiGrid className="w-12 h-12 text-orange-500 mx-auto mb-3" />
                                        <div className="text-3xl font-bold text-gray-900 mb-1">
                                            {project.properties_count}
                                        </div>
                                        <div className="text-gray-700">عقار متاح</div>
                                    </div>
                                )}
                            </div>
                        </div>
                    </div>

                    {/* Related Projects */}
                    {relatedProjects && relatedProjects.length > 0 && (
                        <div className="mt-16">
                            <h2 className="text-3xl font-bold text-gray-900 mb-8">مشاريع مشابهة</h2>
                            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                                {relatedProjects.map((relatedProject) => (
                                    <ProjectCard key={relatedProject.id} project={relatedProject} />
                                ))}
                            </div>
                        </div>
                    )}
                </div>
            </div>
        </>
    );
}
