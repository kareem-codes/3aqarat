import { FiPhone } from "react-icons/fi";
export default function Hero() {
    return (
        <>
            <section id="hero">
                <div className="hero-text">
                    <div className="text-3xl md:text-5xl font-bold mb-2">ارتقِ بحياتك إلى مستوى جديد</div>
                    <div className="text-3xl md:text-6xl font-bold mb-4">برفاهية مصممة لتتجاوز توقعاتك</div>
                    <div className="text-lg md:text-3xl mb-6 max-w-4xl mx-auto">اكتشف منازل أحلامك مع عقارات و استمتع بأسلوب حياة حيث تمتزج الرفاهية بالراحة بانسجامٍ تام… ليغدو كل يوم تجربة فريدة ولحظة استثنائية تُحاكي تطلعاتك</div>
                </div>
            </section>
            <section id="brief" className="py-20 px-4 bg-white">
                <div className="max-w-6xl mx-auto text-center">
                    <h2 className="text-4xl md:text-6xl font-bold mb-6 flex justify-center items-center">
                        نضمن عـقارات تُجسّد
                        <span className="inline-flex items-center mx-3 relative">
                            <img
                                src="/storage/hero-brief.png"
                                alt="رؤيتك"
                                className="w-24 h-12 md:w-32 md:h-16 object-cover rounded-full inline-block"
                            />
                        </span>
                        رؤيتك.
                    </h2>
                    <p className="text-gray-600 text-lg md:text-2xl mb-10 max-w-3xl mx-auto">
                        نوفر مساحات فريدة تمتزج فيها رؤيتك بتصميم خالد، لنضمن أن كل تفصيل يعكس شخصيتك وطموحاتك.
                    </p>
                    <div className="flex flex-col sm:flex-row gap-4 justify-center items-center">
                        <a
                            href="#contact"
                            className="animate-pulse bg-black text-white px-8 py-4 rounded-full flex items-center gap-2 hover:bg-gray-800 transition group"
                        >
                            <FiPhone className="text-xl" />
                            ابقَ على تواصل
                        </a>
                        <a
                            href="#learn-more"
                            className="hover:text-black px-8 py-4 text-gray-700 transition font-medium bg-gray-100 rounded-full"
                        >
                            اعرف المزيد
                        </a>
                    </div>
                </div>
            </section>
        </>
    )
}