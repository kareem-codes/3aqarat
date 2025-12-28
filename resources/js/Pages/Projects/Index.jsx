import { Head, Link, router } from "@inertiajs/react";
import { useState } from "react";
import ProjectCard from "@/Components/ProjectCard";
import Pagination from "@/Components/Pagination";
import EmptyState from "@/Components/EmptyState";
import LoadingSpinner from "@/Components/LoadingSpinner";
import Input from "@/Components/Input";
import Select from "@/Components/Select";
import Button from "@/Components/Button";
import { FiSearch, FiFilter, FiGrid, FiX } from "react-icons/fi";

export default function ProjectsIndex({ projects, filters, cities }) {
    const [showFilters, setShowFilters] = useState(false);
    const [isLoading, setIsLoading] = useState(false);

    const [filterValues, setFilterValues] = useState({
        search: filters.search || '',
        city: filters.city || '',
        category: filters.category || '',
        featured: filters.featured || '',
        sort: filters.sort || 'created_at',
        direction: filters.direction || 'desc',
    });

    const handleFilter = (e) => {
        e.preventDefault();
        setIsLoading(true);
        router.get('/projects', filterValues, {
            preserveState: true,
            onFinish: () => setIsLoading(false),
        });
    };

    const clearFilters = () => {
        const clearedFilters = {
            search: '',
            city: '',
            category: '',
            featured: '',
            sort: 'created_at',
            direction: 'desc',
        };
        setFilterValues(clearedFilters);
        setIsLoading(true);
        router.get('/projects', {}, {
            preserveState: true,
            onFinish: () => setIsLoading(false),
        });
    };

    const hasActiveFilters = filterValues.search || filterValues.city || filterValues.category || filterValues.featured;

    return (
        <>
            <Head>
                <title>المشاريع العقارية - عقارات</title>
                <meta
                    name="description"
                    content="تصفح جميع المشاريع العقارية المتاحة. مجموعة واسعة من المشاريع السكنية والتجارية في مواقع متميزة."
                />
            </Head>

            <div className="min-h-screen bg-gray-50">
                {/* Hero Section */}
                <section className="bg-black text-white pb-16 pt-40 relative overflow-hidden">
                    <div className="hero-image top-0 m-0"></div>

                    <div className="max-w-7xl mx-auto px-4 z-10 relative">
                        <h1 className="text-4xl md:text-6xl font-bold mb-4">المشاريع العقارية</h1>
                        <p className="text-xl md:text-2xl text-shadow-white">
                            اكتشف أفضل المشاريع العقارية المتاحة
                        </p>
                    </div>
                </section>

                <div className="max-w-7xl mx-auto px-4 py-8">
                    {/* Search and Filter Bar */}
                    <div className="bg-white rounded-2xl shadow-md p-6 mb-8">
                        <form onSubmit={handleFilter}>
                            <div className="flex flex-col md:flex-row gap-4">
                                <div className="flex-1">
                                    <Input
                                        type="text"
                                        placeholder="ابحث عن مشروع..."
                                        value={filterValues.search}
                                        onChange={(e) => setFilterValues({ ...filterValues, search: e.target.value })}
                                        className="w-full"
                                    />
                                </div>
                                <Button
                                    type="button"
                                    variant="outline"
                                    onClick={() => setShowFilters(!showFilters)}
                                    className="md:w-auto"
                                >
                                    <FiFilter />
                                    {showFilters ? 'إخفاء الفلاتر' : 'إظهار الفلاتر'}
                                </Button>
                                <Button type="submit" loading={isLoading} className="md:w-auto">
                                    <FiSearch />
                                    بحث
                                </Button>
                            </div>

                            {/* Advanced Filters */}
                            {showFilters && (
                                <div className="mt-6 pt-6 border-t grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <Select
                                        label="المدينة"
                                        value={filterValues.city}
                                        onChange={(e) => setFilterValues({ ...filterValues, city: e.target.value })}
                                        options={cities.map(city => ({ value: city, label: city }))}
                                        placeholder="جميع المدن"
                                    />

                                    <Select
                                        label="الفئة"
                                        value={filterValues.category}
                                        onChange={(e) => setFilterValues({ ...filterValues, category: e.target.value })}
                                        options={[
                                            { value: 'residential', label: 'سكني' },
                                            { value: 'commercial', label: 'تجاري' },
                                            { value: 'mixed', label: 'مختلط' },
                                        ]}
                                        placeholder="جميع الفئات"
                                    />

                                    <Select
                                        label="الترتيب"
                                        value={`${filterValues.sort}-${filterValues.direction}`}
                                        onChange={(e) => {
                                            const [sort, direction] = e.target.value.split('-');
                                            setFilterValues({ ...filterValues, sort, direction });
                                        }}
                                        options={[
                                            { value: 'created_at-desc', label: 'الأحدث' },
                                            { value: 'created_at-asc', label: 'الأقدم' },
                                            { value: 'name-asc', label: 'الاسم (أ-ي)' },
                                            { value: 'name-desc', label: 'الاسم (ي-أ)' },
                                        ]}
                                    />

                                    {hasActiveFilters && (
                                        <div className="md:col-span-3">
                                            <Button
                                                type="button"
                                                variant="ghost"
                                                onClick={clearFilters}
                                                className="w-full md:w-auto"
                                            >
                                                <FiX />
                                                مسح الفلاتر
                                            </Button>
                                        </div>
                                    )}
                                </div>
                            )}
                        </form>
                    </div>

                    {/* Results Count */}
                    <div className="flex items-center justify-between mb-6">
                        <p className="text-gray-600">
                            عرض <span className="font-bold">{projects.data.length}</span> من{' '}
                            <span className="font-bold">{projects.total}</span> مشروع
                        </p>
                    </div>

                    {/* Projects Grid */}
                    {isLoading ? (
                        <LoadingSpinner size="xl" className="py-20" />
                    ) : projects.data.length > 0 ? (
                        <>
                            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                                {projects.data.map((project) => (
                                    <ProjectCard key={project.id} project={project} isList={true} />
                                ))}
                            </div>

                            {/* Pagination */}
                            {projects.links.length > 3 && (
                                <Pagination links={projects.links} className="mt-8" />
                            )}
                        </>
                    ) : (
                        <EmptyState
                            icon={FiGrid}
                            title="لم يتم العثور على مشاريع"
                            description="لا توجد مشاريع تطابق معايير البحث الخاصة بك. جرب تغيير الفلاتر."
                            action={
                                hasActiveFilters && (
                                    <Button onClick={clearFilters}>
                                        مسح الفلاتر
                                    </Button>
                                )
                            }
                        />
                    )}
                </div>
            </div>
        </>
    );
}
