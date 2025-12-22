import { Swiper, SwiperSlide } from 'swiper/react';
import { FreeMode } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/free-mode';
import ProjectCard from "./ProjectCard";

export default function ProjectSlider({ projects }) {
    return (
        <section className="py-16 bg-gray-50 overflow-hidden">
            <div className="max-w-7xl mx-auto px-4 mb-12">
                <h2 className="text-4xl md:text-5xl font-bold text-center mb-4">
                    مشاريعنا المميزة
                </h2>
                <p className="text-gray-600 text-lg text-center max-w-2xl mx-auto">
                    اكتشف مجموعة متنوعة من المشاريع العقارية الفاخرة المصممة لتلبية احتياجاتك
                </p>
            </div>

            <Swiper
                modules={[FreeMode]}
                spaceBetween={24}
                slidesPerView="auto"
                freeMode={true}
                grabCursor={true}
                dir="rtl"
                className="px-4 !pb-4"
            >
                {projects.map((project, index) => (
                    <SwiperSlide
                        key={`${project.id}-${index}`}
                        className="!w-[380px] !h-[400px]"
                        style={index === 0 ? { marginRight: '16px' } : {}}
                    >
                        <ProjectCard project={project} />
                    </SwiperSlide>
                ))}
            </Swiper>
        </section >
    );
}
