import { FiArrowUpRight } from "react-icons/fi";
import { Link } from "@inertiajs/react";

export default function ProjectCard({ project, isList = false }) {
    return (
        <Link
            href={`/projects/${project.slug}`}
            className={`relative rounded-2xl overflow-hidden ${!isList ? 'h-full' : 'h-[400px]'} w-full group cursor-pointer shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 bg-slate-100 block`}
        >
            {/* Image with overlay */}
            <div className="absolute inset-0">
                <img
                    src={project.image ? '/storage/'+ project.image : '/storage/default.jpg'}
                    alt={project.name}
                    className="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105"
                />
                {/* Enhanced gradient overlay */}
                <div className="absolute inset-0 bg-linear-to-t from-slate-900/95 via-slate-900/60 to-slate-900/20"></div>
            </div>

            {/* Properties Count Badge */}
            {project.properties_count > 0 && (
                <div className="absolute top-5 right-5 z-10">
                    <div className="bg-white/95 backdrop-blur-md px-4 py-2.5 rounded-full flex items-center gap-2.5 shadow-lg border border-white/20 transition-all duration-300 group-hover:bg-white group-hover:scale-105">
                        <svg className="w-4 h-4 text-slate-700" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                        </svg>
                        <span className="font-bold text-sm text-slate-700">{project.properties_count} عقار</span>
                    </div>
                </div>
            )}

            {/* Content Section */}
            <div className="absolute bottom-0 left-0 right-0 p-7 text-white z-10">
                <div className="space-y-3">
                    <h3 className="text-2xl md:text-3xl font-bold tracking-tight leading-tight drop-shadow-lg line-clamp-2">
                        {project.name}
                    </h3>

                    {(project.city || project.state) && (
                        <div className="flex items-center gap-2 text-white/90">
                            <svg className="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fillRule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clipRule="evenodd" />
                            </svg>
                            <p className="text-sm md:text-base drop-shadow-md font-medium">
                                {project.city && project.state ? `${project.city}, ${project.state}` : (project.city || project.state || '')}
                            </p>
                        </div>
                    )}

                    {project.price_range && (
                        <div className="inline-block bg-white/10 backdrop-blur-sm px-4 py-2 rounded-lg border border-white/20">
                            <p className="text-sm font-semibold text-white/95">
                                متوسط السعر: {project.price_range} ج.م
                            </p>
                        </div>
                    )}
                </div>
            </div>

            {/* Arrow Icon */}
            <div className="absolute bottom-7 left-7 z-10">
                <div className="w-12 h-12 bg-white/10 backdrop-blur-md border border-white/20 rounded-full flex items-center justify-center transition-all duration-300 group-hover:bg-white group-hover:border-white group-hover:scale-110 group-hover:rotate-45 shadow-lg">
                    <FiArrowUpRight className="text-white text-xl transition-colors duration-300 group-hover:text-slate-900" />
                </div>
            </div>
        </Link>
    );
}

