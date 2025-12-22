import { FiMapPin, FiBriefcase, FiMaximize2 } from "react-icons/fi";
// FaBed
import { FaBed } from "react-icons/fa";
import { Link } from "@inertiajs/react";

export default function PropertyCard({ property }) {
    const formatPrice = (price) => {
        return new Intl.NumberFormat('ar-EG', {
            style: 'currency',
            currency: 'EGP',
            maximumFractionDigits: 0,
            notation: 'compact',
        }).format(price);
    };

    return (
        <Link
            href={`/properties/${property.slug}`}
            className="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col border border-slate-100"
        >
            <div className="relative h-56 overflow-hidden">
                <img
                    src={property.image ? '/storage/' + property.image : '/storage/default.jpg'}
                    alt={property.name}
                    className="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                />
                <div className="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>

                <div className="absolute top-4 right-4 flex gap-2">
                    {property.is_for_sale && (
                        <span className="bg-slate-800 text-white px-3 py-1.5 rounded-full text-sm font-semibold shadow-md">
                            للبيع
                        </span>
                    )}
                    {property.is_for_rent && (
                        <span className="bg-sky-500 text-white px-3 py-1.5 rounded-full text-sm font-semibold shadow-md">
                            للإيجار
                        </span>
                    )}
                </div>

                {property.is_featured && (
                    <div className="absolute top-4 left-4">
                        <span className="bg-amber-500 text-white px-3 py-1.5 rounded-full text-sm font-semibold shadow-md">
                            مميز
                        </span>
                    </div>
                )}

                <div className="absolute bottom-4 left-4 right-4">
                    <div className="text-white font-bold text-2xl drop-shadow-md">
                        {formatPrice(property.price)}
                    </div>
                </div>
            </div>

            <div className="p-5 flex-1 flex flex-col">
                <h3 className="text-xl font-bold text-slate-900 mb-2 line-clamp-1 group-hover:text-slate-700 transition">
                    {property.name}
                </h3>

                {property.city && (
                    <div className="flex items-center text-slate-600 mb-3">
                        <FiMapPin className="ml-1 flex-shrink-0" />
                        <span className="text-sm">{property.city}</span>
                    </div>
                )}

                <div className="flex items-center gap-4 text-slate-700 text-sm mt-auto pt-3 border-t border-slate-100">
                    {property.bedrooms && (
                        <div className="flex items-center gap-1">
                            <FaBed className="text-slate-800" />
                            <span>{property.bedrooms}</span>
                        </div>
                    )}
                    {property.bathrooms && (
                        <div className="flex items-center gap-1">
                            <FiBriefcase className="text-slate-800" />
                            <span>{property.bathrooms}</span>
                        </div>
                    )}
                    {property.space && (
                        <div className="flex items-center gap-1">
                            <FiMaximize2 className="text-slate-800" />
                            <span>{property.space} م²</span>
                        </div>
                    )}
                </div>

                {property.agent && (
                    <div className="flex items-center gap-2 mt-4 pt-4 border-t border-slate-100">
                        <img
                            src={property.agent.image ? '/storage/' + property.agent.image : '/storage/default.jpg'}
                            alt={property.agent.name}
                            className="w-8 h-8 rounded-full object-cover"
                        />
                        <span className="text-sm text-slate-600">{property.agent.name}</span>
                    </div>
                )}
            </div>
        </Link>
    );
}
