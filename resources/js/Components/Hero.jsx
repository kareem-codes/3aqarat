import { Link } from "@inertiajs/react";
import {FiPhone} from "react-icons/fi";

export default function Hero() {
    return (
        <>
            <section id="hero">
                <div className="bg-black w-full h-full hero-bg">
                </div>
                <div className="hero-image"></div>
                <div className="hero-content-wrapper hero-text">
                    <div className="hero-text-section"><h1
                        className="text-5xl md:text-6xl lg:text-7xl font-bold text-white text-shadow-lg mb-6 text-center leading-tight">
                        ارتقِ بحياتك إلى مستوى جديد<br/>
                        برفاهية مصممة لتتجاوز توقعاتك.
                    </h1>
                        <p className="text-lg md:text-3xl text-white text-shadow-lg mb-8 max-w-8xl text-center leading-relaxed mx-auto">
                            اكتشف أسلوب حياة يتجاوز كل توقعاتك، حيث تجتمع الرفاهية بالراحة، وتصبح كل غرفة مصممة
                            وفقًا لرؤيتك، لتضمن تجربة حياة فريدة.
                        </p>
                    </div>
                </div>
            </section>
            {/* Brief Section with embedded image */}
            <section id="brief" className="py-20 px-4 bg-white">
                <div className="max-w-6xl mx-auto text-center">
                    <h2 className="text-4xl md:text-6xl font-bold mb-6 text-gray-900 flex justify-center items-center gap-4 flex-wrap">
                        <span className="block mb-4">نضمن عـقارات تُجسّد</span>
                        <span className="flex justify-center items-center gap-4">
                            <span className="inline-flex items-center relative">
                                <img
                                    src="/storage/hero-brief.png"
                                    alt="vision"
                                    className="w-32 h-16 md:w-40 md:h-20 object-cover rounded-2xl inline-block"
                                />
                            </span>
                            رؤيتك.
                        </span>
                    </h2>
                    <p className="text-gray-600 text-lg md:text-xl mb-10 max-w-3xl mx-auto leading-relaxed">
                        نصمم مساحات تمتزج فيها رؤيتك بالأناقة الخالدة، مع التأكد من أن كل تفصيل يعكس شخصيتك وطموحاتك
                        بدقة وإبداع.
                    </p>
                    <div className="flex flex-col sm:flex-row gap-4 justify-center items-center">

                        <Link
                            href='contact'
                            className="btn-primary flex items-center gap-3 hover:bg-gray-800 transition-all group text-lg font-medium"
                        >
                            <FiPhone className="text-xl"/>
                            احجز استشارتك
                        </Link>
                        <Link
                            href="/projects"
                            className="btn-secondary text-lg font-medium"
                        >
                            تعرف على المزيد
                        </Link>
                    </div>
                </div>
            </section>
        </>
    );
}
