<template>
    <div class="firstHome mt-5" @load="onload">
        <!-- Overlay -->
        <div class="background-overlay"></div>
        <!-- content -->
        <div class="content d-flex flex-column w-75 m-auto gap-5">
            <!-- row1 -->
            <div class="child">
                <!-- title -->
                <h2 class="mb-4">{{ $t("CarViseta in Numbers") }}</h2>
                <!-- content-child -->
                <div class="content-child mt-5">
                    <!-- col1 -> row1 -->
                    <div class="child child1 d-flex gap-3">
                        <FirstHomeDesc
                            icon="bi bi-calendar-fill"
                            d1="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5h16V4H0V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5z"
                            :title="$t('Launched in Sep 2021')"
                        />
                    </div>
                    <!-- col2 -> row1 -->
                    <div class="child child2 d-flex gap-3">
                        <FirstHomeDesc
                            icon="bi bi-sort-numeric-up"
                            d1="M12.438 1.668V7H11.39V2.684h-.051l-1.211.859v-.969l1.262-.906h1.046z"
                            d2="M11.36 14.098c-1.137 0-1.708-.657-1.762-1.278h1.004c.058.223.343.45.773.45.824 0 1.164-.829 1.133-1.856h-.059c-.148.39-.57.742-1.261.742-.91 0-1.72-.613-1.72-1.758 0-1.148.848-1.835 1.973-1.835 1.09 0 2.063.636 2.063 2.687 0 1.867-.723 2.848-2.145 2.848zm.062-2.735c.504 0 .933-.336.933-.972 0-.633-.398-1.008-.94-1.008-.52 0-.927.375-.927 1 0 .64.418.98.934.98z"
                            d3="M4.5 13.5a.5.5 0 0 1-1 0V3.707L2.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.498.498 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L4.5 3.707V13.5z"
                            :title="$t('240+ Customers Served')"
                            :paragraph="$t('Add counting')"
                        />
                    </div>
                </div>
            </div>
            <!-- Col2 -->
            <div class="child">
                <!-- title -->
                <h2 class="mb-4">{{ $t("Why Choose CarViseta") }}</h2>
                <!-- content-child -->
                <div class="content-child mt-5">
                    <!-- col1 row1 -->
                    <div class="child child1 d-flex gap-3">
                        <FirstHomeDesc
                            icon="bi bi-briefcase"
                            d1="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z"
                            :title="$t('We Make it Easy')"
                            :paragraph="
                                $t(
                                    'We provide 24/7 booking services and our mechanics are available during the day and in the evenings. Whether you\'re at home, office, or anywhere, we will reach you at the scheduled time.'
                                )
                            "
                        />
                    </div>
                    <!-- col2 row1-->
                    <div class="child child2 d-flex gap-3">
                        <FirstHomeDesc
                            icon="bi bi-briefcase"
                            d1="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0Zm9.646 10.646a.5.5 0 0 1 .708 0l2.914 2.915a.5.5 0 0 1-.707.707l-2.915-2.914a.5.5 0 0 1 0-.708ZM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11Z"
                            :title="$t('Genuine & Aftermarket Parts')"
                            :paragraph="
                                $t(
                                    'We offer both genuine and aftermarket parts, that are manufactured and provided to our customers upon request, following the industry specifications.'
                                )
                            "
                        />
                    </div>
                    <!-- col1 row2 -->
                    <div class="child child2 d-flex gap-3">
                        <FirstHomeDesc
                            icon="bi bi-briefcase"
                            d1="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"
                            :title="$t('Fair and Transparent Pricing')"
                            :paragraph="
                                $t(
                                    'Because we aim to be your permanent partner, we put more value into our products, offering fair and transparent pricing to our customers. We work to achieve quality, transparency, and affordability.'
                                )
                            "
                        />
                    </div>
                    <!-- col2 row2 -->
                    <div class="child child2 d-flex gap-3">
                        <FirstHomeDesc
                            icon="bi bi-briefcase"
                            d1="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                            d2="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"
                            :title="$t('High-quality')"
                            :paragraph="
                                $t(
                                    'As we don\'t settle for less, we offer extensive training to our technicians, utilizing high - quality services and tools to achieve customer satisfaction.All you have to do is book through our application.'
                                )
                            "
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import FirstHomeDesc from "./FirstHomeDesc.vue";

export default {
    name: "FirstHome",
    data() {
        return {
            FirstTitle: "CarViseta in Numbers",
            SecondTitle: "Why Choose CarViseta",
        };
    },
    components: { FirstHomeDesc },
    methods: {
        onload() {
            console.log("loaded1");
        },
    }
};
</script>

<style scoped>
.firstHome {
    background-image: url(../../images/home/background.png);
    background-position: center;
    background-size: cover;
    background-attachment: fixed;
    height: 100%;
    color: var(--background-color);
    backdrop-filter: brightness(60%);
    padding: 50px;
    position: relative;
}
.firstHome .background-overlay {
    position: absolute;
    background-color: #282828;
    opacity: 0.5;
    z-index: -2;
    width: 100%;
    top: 0;
    left: 0;
    height: 100%;
    transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
}
.firstHome .content .content-child {
    display: grid;
    grid-template-columns: repeat(2, 48%);
    grid-gap: 20px;
}
.firstHome .content .icon span {
    background-color: var(--background-color);
    padding: 20px 15px;
    border-radius: 50%;
}
.firstHome .content .icon svg {
    fill: var(--secondary-text-color);
}
@media screen and (max-width: 767px) {
    .content {
        width: 100% !important;
        margin: auto;
    }
    .firstHome .content .content-child {
        grid-template-columns: repeat(1, 100%);
        grid-gap: 50px;
    }
}
.firstHome .child1 {
    position: relative;
}
.firstHome .child1::before {
    content: "";
    width: 30%;
    height: 3px;
    background-color: var(--background-color);
    position: absolute;
    left: 0;
    top: -30px;
}
</style>
