import { Link, usePage } from "@inertiajs/react";
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
            ? "text-slate-800 px-2 md:px-4 mx-1 py-2 rounded-full bg-white/90 transition hover:bg-white font-medium"
            : "text-white px-2 md:px-4 mx-1 py-2 rounded-full hover:bg-white/80 hover:text-slate-900 transition font-medium";
    };

    const mobileLinkClass = (path) => {
        return isActive(path)
            ? "block text-slate-800 px-4 py-3 rounded-full bg-white/90 transition hover:bg-white font-medium"
            : "block text-slate-700 px-4 py-3 rounded-full hover:bg-white/80 hover:text-slate-900 transition font-medium";
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
                        <Link href="/" className={linkClass('/')}> الرئيسية</Link>
                    </div>
                    <div>
                        <Link href="/properties" className={linkClass('/properties')}> العقارات</Link>
                    </div>
                    <div>
                        <Link href="/projects" className={linkClass('/projects')}> المشاريع</Link>
                    </div>
                    <div>
                        <Link href="/agents" className={linkClass('/agents')}> الوكلاء</Link>
                    </div>
                </nav>
                <div className="flex items-center gap-2">
                    <div>
                        <Link href="/contact" className="text-white px-3 md:px-5 py-2 md:py-2.5 rounded-full bg-slate-800 hover:bg-slate-700 transition flex items-center gap-2 font-medium shadow-md"><FiPhone /><span className="hidden md:flex">احجز استشارتك</span></Link>
                    </div>
                    <button
                        className="md:hidden text-slate-800 text-2xl p-2"
                        onClick={() => setIsMenuOpen(!isMenuOpen)}
                        aria-label="Toggle menu"
                    >
                        {isMenuOpen ? <FiX /> : <FiMenu />}
                    </button>
                </div>
            </nav>

            {/* Mobile Menu */}
            {isMenuOpen && (
                <div className="md:hidden backdrop-blur-md bg-white/80 mt-2 p-4 rounded-3xl mx-auto max-w-[calc(100%-2rem)] space-y-2 shadow-lg">
                    <Link href="/" className={mobileLinkClass('/')} onClick={() => setIsMenuOpen(false)}>
                        الرئيسية
                    </Link>
                    <Link href="/properties" className={mobileLinkClass('/properties')} onClick={() => setIsMenuOpen(false)}>
                        العقارات
                    </Link>
                    <Link href="/projects" className={mobileLinkClass('/projects')} onClick={() => setIsMenuOpen(false)}>
                        المشاريع
                    </Link>
                    <Link href="/agents" className={mobileLinkClass('/agents')} onClick={() => setIsMenuOpen(false)}>
                        الوكلاء
                    </Link>
                    <Link href="#contact" className="block px-4 py-3 rounded-full transition hover:bg-slate-100 text-slate-800 font-medium" onClick={() => setIsMenuOpen(false)}>
                        احجز استشارتك
                    </Link>
                </div>
            )}
        </div>
    );
}
