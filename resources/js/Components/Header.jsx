import { usePage } from "@inertiajs/react";
import { FiPhone, FiMenu, FiX } from "react-icons/fi";
import { useState } from "react";

export default function Header() {
    const { url } = usePage();
    const [isMenuOpen, setIsMenuOpen] = useState(false);

    const isActive = (path) => {
        if (path === '/') {
            return url === path;
        }
        return url.startsWith(path);
    };

    const linkClass = (path) => {
        return isActive(path)
            ? "text-dark px-2 md:px-4 mx-1 py-2 rounded-full bg-white transition hover:bg-gray-200"
            : "text-white px-2 md:px-4 mx-1 py-2 rounded-full hover:bg-white hover:text-black transition";
    };

    const mobileLinkClass = (path) => {
        return isActive(path)
            ? "block text-dark px-4 py-3 rounded-full bg-white transition hover:bg-gray-200"
            : "block text-white px-4 py-3 rounded-full hover:bg-white hover:text-black transition";
    };

    return (
        <div className="bg-transparent absolute top-0 left-0 z-10 w-full">
            <nav
                className="bg-transparent mt-4 p-3 rounded-3xl mx-auto max-w-[calc(100%-2rem)] flex items-center justify-between"
                id="header-nav"
            >
                <div className="text-3xl font-bold text-white">عـقارات</div>

                <nav className="hidden md:flex items-center">
                    <div>
                        <a href="/" className={linkClass('/')}> الرئيسية</a>
                    </div>
                    <div>
                        <a href="/properties" className={linkClass('/properties')}> العقارات</a>
                    </div>
                    <div>
                        <a href="/projects" className={linkClass('/projects')}> المشاريع</a>
                    </div>
                    <div>
                        <a href="/agents" className={linkClass('/agents')}> الوكلاء</a>
                    </div>
                </nav>
                <div className="flex items-center gap-2">
                    <div>
                        <a href="#contact" className="text-dark px-2 md:px-4 py-2 rounded-full bg-white transition flex items-center gap-1 hover:bg-gray-200"><FiPhone /><span className="hidden md:flex">تواصل معنا</span></a>
                    </div>
                    <button
                        className="md:hidden text-white text-2xl p-2"
                        onClick={() => setIsMenuOpen(!isMenuOpen)}
                        aria-label="Toggle menu"
                    >
                        {isMenuOpen ? <FiX /> : <FiMenu />}
                    </button>
                </div>
            </nav>

            {/* Mobile Menu */}
            {isMenuOpen && (
                <div className="md:hidden backdrop-blur-md mt-2 p-4 rounded-3xl mx-auto max-w-[calc(100%-2rem)] space-y-2">
                    <a href="/" className={mobileLinkClass('/')} onClick={() => setIsMenuOpen(false)}>
                        الرئيسية
                    </a>
                    <a href="/properties" className={mobileLinkClass('/properties')} onClick={() => setIsMenuOpen(false)}>
                        العقارات
                    </a>
                    <a href="/projects" className={mobileLinkClass('/projects')} onClick={() => setIsMenuOpen(false)}>
                        المشاريع
                    </a>
                    <a href="/agents" className={mobileLinkClass('/agents')} onClick={() => setIsMenuOpen(false)}>
                        الوكلاء
                    </a>
                    <a href="#contact" className="block px-4 py-3 rounded-full transition hover:bg-gray-200 text-white" onClick={() => setIsMenuOpen(false)}>
                        تواصل معنا
                    </a>
                </div>
            )}
        </div>
    );
}
