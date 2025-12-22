import { FiMail, FiPhone, FiStar, FiBriefcase } from "react-icons/fi";
import { Link } from "@inertiajs/react";

export default function AgentCard({ agent }) {
    return (
        <Link
            href={`/agents/${agent.id}`}
            className="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300"
        >
            <div className="relative h-64 overflow-hidden bg-gradient-to-br from-orange-100 to-orange-50">
                <img
                    src={agent.image ? '/storage/' + agent.image : '/storage/default.jpg'}
                    alt={agent.name}
                    className="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                />
                <div className="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
            </div>

            <div className="p-6">
                <div className="flex items-start justify-between mb-3">
                    <div>
                        <h3 className="text-xl font-bold text-gray-900 mb-1 group-hover:text-orange-500 transition">
                            {agent.name}
                        </h3>
                        {agent.rating && (
                            <div className="flex items-center gap-1 text-yellow-500">
                                <FiStar className="fill-current" />
                                <span className="text-gray-700 font-semibold">{agent.rating}</span>
                            </div>
                        )}
                    </div>
                    {agent.properties_count > 0 && (
                        <div className="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-sm font-semibold">
                            {agent.properties_count} عقار
                        </div>
                    )}
                </div>

                {agent.bio && (
                    <p className="text-gray-600 text-sm mb-4 line-clamp-2">
                        {agent.bio}
                    </p>
                )}

                <div className="space-y-2 text-sm">
                    {agent.email && (
                        <div className="flex items-center gap-2 text-gray-600">
                            <FiMail className="text-orange-500 flex-shrink-0" />
                            <span className="truncate">{agent.email}</span>
                        </div>
                    )}
                    {agent.phone && (
                        <div className="flex items-center gap-2 text-gray-600">
                            <FiPhone className="text-orange-500 flex-shrink-0" />
                            <span>{agent.phone}</span>
                        </div>
                    )}
                </div>

                <button className="mt-4 w-full bg-orange-500 hover:bg-orange-600 text-white py-2 rounded-lg transition font-semibold">
                    عرض الملف الشخصي
                </button>
            </div>
        </Link>
    );
}
