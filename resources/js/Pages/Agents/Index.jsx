import { Head, router } from "@inertiajs/react";
import { useState } from "react";
import AgentCard from "@/Components/AgentCard";
import Pagination from "@/Components/Pagination";
import EmptyState from "@/Components/EmptyState";
import LoadingSpinner from "@/Components/LoadingSpinner";
import Input from "@/Components/Input";
import Select from "@/Components/Select";
import Button from "@/Components/Button";
import { FiSearch, FiFilter, FiUsers, FiX } from "react-icons/fi";

export default function AgentsIndex({ agents, filters }) {
    const [showFilters, setShowFilters] = useState(false);
    const [isLoading, setIsLoading] = useState(false);

    const [filterValues, setFilterValues] = useState({
        search: filters.search || '',
        min_rating: filters.min_rating || '',
        sort: filters.sort || 'rating',
        direction: filters.direction || 'desc',
    });

    const handleFilter = (e) => {
        e.preventDefault();
        setIsLoading(true);
        router.get('/agents', filterValues, {
            preserveState: true,
            onFinish: () => setIsLoading(false),
        });
    };

    const clearFilters = () => {
        const clearedFilters = {
            search: '',
            min_rating: '',
            sort: 'rating',
            direction: 'desc',
        };
        setFilterValues(clearedFilters);
        setIsLoading(true);
        router.get('/agents', {}, {
            preserveState: true,
            onFinish: () => setIsLoading(false),
        });
    };

    const hasActiveFilters = filterValues.search || filterValues.min_rating;

    return (
        <>
            <Head>
                <title>الوكلاء العقاريون - عقارات</title>
                <meta
                    name="description"
                    content="تواصل مع أفضل الوكلاء العقاريين المحترفين. فريق من الخبراء جاهزون لمساعدتك."
                />
            </Head>

            <div className="min-h-screen bg-gray-50">
                {/* Hero Section */}
                <section className="bg-black text-white pb-10 pt-30 relative overflow-hidden">
                    <div className="hero-image top-0 m-0"></div>

                    <div className="max-w-7xl mx-auto px-4 z-10 relative">
                        <h1 className="text-4xl md:text-6xl font-bold mb-4">الوكلاء العقاريون</h1>
                        <p className="text-xl md:text-2xl text-shadow-white">
                            تواصل مع أفضل الخبراء العقاريين المحترفين
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
                                        placeholder="ابحث عن وكيل..."
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
                                        label="التقييم الأدنى"
                                        value={filterValues.min_rating}
                                        onChange={(e) => setFilterValues({ ...filterValues, min_rating: e.target.value })}
                                        options={[
                                            { value: '3', label: '3+ نجوم' },
                                            { value: '4', label: '4+ نجوم' },
                                            { value: '4.5', label: '4.5+ نجوم' },
                                        ]}
                                        placeholder="جميع التقييمات"
                                    />

                                    <Select
                                        label="الترتيب"
                                        value={`${filterValues.sort}-${filterValues.direction}`}
                                        onChange={(e) => {
                                            const [sort, direction] = e.target.value.split('-');
                                            setFilterValues({ ...filterValues, sort, direction });
                                        }}
                                        options={[
                                            { value: 'rating-desc', label: 'أعلى تقييم' },
                                            { value: 'rating-asc', label: 'أقل تقييم' },
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
                            عرض <span className="font-bold">{agents.data.length}</span> من{' '}
                            <span className="font-bold">{agents.total}</span> وكيل
                        </p>
                    </div>

                    {/* Agents Grid */}
                    {isLoading ? (
                        <LoadingSpinner size="xl" className="py-20" />
                    ) : agents.data.length > 0 ? (
                        <>
                            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
                                {agents.data.map((agent) => (
                                    <AgentCard key={agent.id} agent={agent} />
                                ))}
                            </div>

                            {/* Pagination */}
                            {agents.links.length > 3 && (
                                <Pagination links={agents.links} className="mt-8" />
                            )}
                        </>
                    ) : (
                        <EmptyState
                            icon={FiUsers}
                            title="لم يتم العثور على وكلاء"
                            description="لا يوجد وكلاء يطابقون معايير البحث الخاصة بك. جرب تغيير الفلاتر."
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
