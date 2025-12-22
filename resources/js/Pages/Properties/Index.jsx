import {Head, Link, router} from "@inertiajs/react";
import {useState} from "react";
import PropertyCard from "@/Components/PropertyCard";
import Pagination from "@/Components/Pagination";
import EmptyState from "@/Components/EmptyState";
import LoadingSpinner from "@/Components/LoadingSpinner";
import Input from "@/Components/Input";
import Select from "@/Components/Select";
import Button from "@/Components/Button";
import {FiSearch, FiFilter, FiHome, FiX} from "react-icons/fi";

export default function PropertiesIndex({properties, filters, cities}) {
    const [showFilters, setShowFilters] = useState(false);
    const [isLoading, setIsLoading] = useState(false);

    const [filterValues, setFilterValues] = useState({
        search: filters.search || '',
        city: filters.city || '',
        category: filters.category || '',
        type: filters.type || '',
        min_price: filters.min_price || '',
        max_price: filters.max_price || '',
        bedrooms: filters.bedrooms || '',
        bathrooms: filters.bathrooms || '',
        min_space: filters.min_space || '',
        featured: filters.featured || '',
        sort: filters.sort || 'created_at',
        direction: filters.direction || 'desc',
    });

    const handleFilter = (e) => {
        e.preventDefault();
        setIsLoading(true);
        router.get('/properties', filterValues, {
            preserveState: true,
            onFinish: () => setIsLoading(false),
        });
    };

    const clearFilters = () => {
        const clearedFilters = {
            search: '',
            city: '',
            category: '',
            type: '',
            min_price: '',
            max_price: '',
            bedrooms: '',
            bathrooms: '',
            min_space: '',
            featured: '',
            sort: 'created_at',
            direction: 'desc',
        };
        setFilterValues(clearedFilters);
        setIsLoading(true);
        router.get('/properties', {}, {
            preserveState: true,
            onFinish: () => setIsLoading(false),
        });
    };

    const hasActiveFilters = Object.values(filterValues).some(
        (value, index) => {
            const key = Object.keys(filterValues)[index];
            if (key === 'sort' || key === 'direction') return false;
            return value !== '';
        }
    );

    return (
        <>
            <Head>
                <title>العقارات - عقارات</title>
                <meta
                    name="description"
                    content="تصفح جميع العقارات المتاحة للبيع والإيجار. شقق، فلل، مكاتب تجارية في مواقع متميزة."
                />
            </Head>

            <div className="min-h-screen bg-gray-50">
                {/* Hero Section */}
                <section className="bg-black text-white pb-16 pt-40 relative overflow-hidden">
                    <div className="hero-image top-0 m-0"></div>

                    <div className="max-w-7xl mx-auto px-4 z-10 relative">
                        <h1 className="text-4xl md:text-6xl font-bold mb-4">العقارات</h1>
                        <p className="text-xl md:text-2xl text-shadow-white">
                            ابحث عن عقارك المثالي من بين مجموعة واسعة من الخيارات
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
                                        placeholder="ابحث عن عقار..."
                                        value={filterValues.search}
                                        onChange={(e) => setFilterValues({...filterValues, search: e.target.value})}
                                        className="w-full"
                                    />
                                </div>
                                <Button
                                    type="button"
                                    variant="outline"
                                    onClick={() => setShowFilters(!showFilters)}
                                    className="md:w-auto"
                                >
                                    <FiFilter/>
                                    {showFilters ? 'إخفاء الفلاتر' : 'إظهار الفلاتر'}
                                </Button>
                                <Button type="submit" loading={isLoading} className="md:w-auto">
                                    <FiSearch/>
                                    بحث
                                </Button>
                            </div>

                            {/* Advanced Filters */}
                            {showFilters && (
                                <div className="mt-6 pt-6 border-t grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <Select
                                        label="المدينة"
                                        value={filterValues.city}
                                        onChange={(e) => setFilterValues({...filterValues, city: e.target.value})}
                                        options={cities.map(city => ({value: city, label: city}))}
                                        placeholder="جميع المدن"
                                    />

                                    <Select
                                        label="النوع"
                                        value={filterValues.type}
                                        onChange={(e) => setFilterValues({...filterValues, type: e.target.value})}
                                        options={[
                                            {value: 'sale', label: 'للبيع'},
                                            {value: 'rent', label: 'للإيجار'},
                                        ]}
                                        placeholder="الكل"
                                    />

                                    <Select
                                        label="الفئة"
                                        value={filterValues.category}
                                        onChange={(e) => setFilterValues({...filterValues, category: e.target.value})}
                                        options={[
                                            {value: 'apartment', label: 'شقة'},
                                            {value: 'villa', label: 'فيلا'},
                                            {value: 'office', label: 'مكتب'},
                                            {value: 'land', label: 'أرض'},
                                        ]}
                                        placeholder="جميع الفئات"
                                    />

                                    <Input
                                        label="السعر الأدنى"
                                        type="number"
                                        placeholder="0"
                                        value={filterValues.min_price}
                                        onChange={(e) => setFilterValues({...filterValues, min_price: e.target.value})}
                                    />

                                    <Input
                                        label="السعر الأقصى"
                                        type="number"
                                        placeholder="∞"
                                        value={filterValues.max_price}
                                        onChange={(e) => setFilterValues({...filterValues, max_price: e.target.value})}
                                    />

                                    <Select
                                        label="عدد الغرف"
                                        value={filterValues.bedrooms}
                                        onChange={(e) => setFilterValues({...filterValues, bedrooms: e.target.value})}
                                        options={[
                                            {value: '1', label: '1+'},
                                            {value: '2', label: '2+'},
                                            {value: '3', label: '3+'},
                                            {value: '4', label: '4+'},
                                            {value: '5', label: '5+'},
                                        ]}
                                        placeholder="الكل"
                                    />

                                    <Select
                                        label="عدد الحمامات"
                                        value={filterValues.bathrooms}
                                        onChange={(e) => setFilterValues({...filterValues, bathrooms: e.target.value})}
                                        options={[
                                            {value: '1', label: '1+'},
                                            {value: '2', label: '2+'},
                                            {value: '3', label: '3+'},
                                            {value: '4', label: '4+'},
                                        ]}
                                        placeholder="الكل"
                                    />

                                    <Input
                                        label="المساحة الأدنى (م²)"
                                        type="number"
                                        placeholder="0"
                                        value={filterValues.min_space}
                                        onChange={(e) => setFilterValues({...filterValues, min_space: e.target.value})}
                                    />

                                    <Select
                                        label="الترتيب"
                                        value={`${filterValues.sort}-${filterValues.direction}`}
                                        onChange={(e) => {
                                            const [sort, direction] = e.target.value.split('-');
                                            setFilterValues({...filterValues, sort, direction});
                                        }}
                                        options={[
                                            {value: 'created_at-desc', label: 'الأحدث'},
                                            {value: 'created_at-asc', label: 'الأقدم'},
                                            {value: 'price-asc', label: 'السعر (الأقل)'},
                                            {value: 'price-desc', label: 'السعر (الأعلى)'},
                                            {value: 'name-asc', label: 'الاسم (أ-ي)'},
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
                                                <FiX/>
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
                            عرض <span className="font-bold">{properties.data.length}</span> من{' '}
                            <span className="font-bold">{properties.total}</span> عقار
                        </p>
                    </div>

                    {/* Properties Grid */}
                    {isLoading ? (
                        <LoadingSpinner size="xl" className="py-20"/>
                    ) : properties.data.length > 0 ? (
                        <>
                            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                                {properties.data.map((property) => (
                                    <PropertyCard key={property.id} property={property}/>
                                ))}
                            </div>

                            {/* Pagination */}
                            {properties.links.length > 3 && (
                                <Pagination links={properties.links} className="mt-8"/>
                            )}
                        </>
                    ) : (
                        <EmptyState
                            icon={FiHome}
                            title="لم يتم العثور على عقارات"
                            description="لا توجد عقارات تطابق معايير البحث الخاصة بك. جرب تغيير الفلاتر."
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
