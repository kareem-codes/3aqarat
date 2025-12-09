import { Head } from "@inertiajs/react";
import Hero from "@/Components/Hero";
export default function Home({ properties, projects }) {
    return (
        <>
            <Head>
                <title>عقارات - منصتك العقارية الموثوقة</title>
                <meta
                    name="description"
                    content="مرحبًا بك في عقارات، منصتك الموثوقة للعقارات والمشاريع العقارية في المنطقة. اكتشف أفضل العروض العقارية والمشاريع الحديثة بسهولة وأمان."
                />
            </Head>
            <Hero />
        </>
    );
}