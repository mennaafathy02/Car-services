<template>
    <div
        class="how-it-work d-flex flex-column align-items-center justify-content-center"
    >
        <div class="container py-4 px-0">
            <h2 class="text-center mt-3 mb-4">{{ $t("How It Works") }}</h2>
            <div
                class="service-body justify-content-lg-center d-flex flex-wrap"
            >
            <Card/>
                <!-- <Card
                    :title="$t('OIL REPLACEMENT')"
                    :description="
                        $t(
                            'Oil Replacement is done quickly and professionally, following the industry standards'
                        )
                    "
                    image="../../images/services/1.jpg"
                ></Card>
                <Card
                    :title="$t('CHECKUP AND PERIODIC MAINTENANCE')"
                    :description="
                        $t(
                            'Offering resale checkup and periodic maintenance to guarantee the best car performance and avoid costly breakdowns'
                        )
                    "
                    image="../../images/services/2.jpg"
                ></Card>
                <Card
                    :title="$t('BRAKE SERVICE AND REPAIRS')"
                    :description="
                        $t(
                            'Offering comprehensive inspection of cars and maintenance, testing brakes & tires safety'
                        )
                    "
                    image="../../images/services/3.webp"
                ></Card> -->
            </div>
        </div>
    </div>
</template>
<script>
import Card from "./Card.vue";

export default {
    name: "HowitWorks",
    data() {
        return {};
    },
    components: {
        Card,
    },
};
</script>

<style scoped>
h2 {
    color: var(--secondary-text-color);
    font-weight: 700;
}
</style>
