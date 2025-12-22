import { Link } from "@inertiajs/react";

export default function Pagination({ links, className = '' }) {
    return (
        <nav className={`flex items-center justify-center gap-1 ${className}`}>
            {links.map((link, index) => {
                if (!link.url) {
                    return (
                        <span
                            key={index}
                            className="px-4 py-2 text-gray-400 cursor-not-allowed"
                            dangerouslySetInnerHTML={{ __html: link.label }}
                        />
                    );
                }

                return (
                    <Link
                        key={index}
                        href={link.url}
                        className={`px-4 py-2 rounded-lg transition ${
                            link.active
                                ? 'bg-orange-500 text-white font-semibold'
                                : 'bg-white text-gray-700 hover:bg-gray-100 border'
                        }`}
                        dangerouslySetInnerHTML={{ __html: link.label }}
                    />
                );
            })}
        </nav>
    );
}
