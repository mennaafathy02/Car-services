<template>
    <div class="SecondHome m-auto d-flex flex-column gap-5">
        <!-- Title -->
        <div class="title text-center">
            <h2>{{ $t("Our Featured Services") }}</h2>
            <p>
                {{
                    $t(
                        "We provide full-mobilized car workshop services at the chosen time and location, with experienced technicians, high-quality tools, and competitive prices."
                    )
                }}
            </p>
        </div>
        <!-- Content -->
        <div class="content mt-2">
            <!-- col1 -->
            <div class="column1">
                <SecondHomeDesc
                    :titleDesc="$t('Diagnostics')"
                    :paragrapghDes="
                        $t(
                            'We provide several checkup services providing accurate assessment for Cars using latest tools.'
                        )
                    "
                    icon="bi bi-check-circle"
                    d1="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                    d2="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"
                />
                <!-- row2 -->
                <SecondHomeDesc
                    :titleDesc="$t('Periodic Maintenance')"
                    :paragrapghDes="
                        $t(
                            'Periodic Maintenance is crucial for the overall health of your car, diagnosing and efficiently fixing the engine problems.'
                        )
                    "
                    icon="bi bi-car-front-fill"
                    d1="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17 1.247 0 3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z"
                />
            </div>
            <!-- Image -->
            <div class="imageCar">
                <img :src="imgCarSrc" class="w-100" :alt="imgCarAlt" />
            </div>
            <!-- Col3 -->
            <div class="column3">
                <!-- row1 -->
                <SecondHomeDesc
                    :titleDesc="$t('Coolant System')"
                    :paragrapghDes="
                        $t(
                            'Periodical Inspection of the Coolant System and checking the concentration of the coolant are critical steps to protect your engine from overheating or freezing.'
                        )
                    "
                    icon="bi bi-fan"
                    d1="M10 3c0 1.313-.304 2.508-.8 3.4a1.991 1.991 0 0 0-1.484-.38c-.28-.982-.91-2.04-1.838-2.969a8.368 8.368 0 0 0-.491-.454A5.976 5.976 0 0 1 8 2c.691 0 1.355.117 1.973.332.018.219.027.442.027.668Zm0 5c0 .073-.004.146-.012.217 1.018-.019 2.2-.353 3.331-1.006a8.39 8.39 0 0 0 .57-.361 6.004 6.004 0 0 0-2.53-3.823 9.02 9.02 0 0 1-.145.64c-.34 1.269-.944 2.346-1.656 3.079.277.343.442.78.442 1.254Zm-.137.728a2.007 2.007 0 0 1-1.07 1.109c.525.87 1.405 1.725 2.535 2.377.2.116.402.222.605.317a5.986 5.986 0 0 0 2.053-4.111c-.208.073-.421.14-.641.199-1.264.339-2.493.356-3.482.11ZM8 10c-.45 0-.866-.149-1.2-.4-.494.89-.796 2.082-.796 3.391 0 .23.01.457.027.678A5.99 5.99 0 0 0 8 14c.94 0 1.83-.216 2.623-.602a8.359 8.359 0 0 1-.497-.458c-.925-.926-1.555-1.981-1.836-2.96-.094.013-.191.02-.29.02ZM6 8c0-.08.005-.16.014-.239-1.02.017-2.205.351-3.34 1.007a8.366 8.366 0 0 0-.568.359 6.003 6.003 0 0 0 2.525 3.839 8.37 8.37 0 0 1 .148-.653c.34-1.267.94-2.342 1.65-3.075A1.988 1.988 0 0 1 6 8Zm-3.347-.632c1.267-.34 2.498-.355 3.488-.107.196-.494.583-.89 1.07-1.1-.524-.874-1.406-1.733-2.541-2.388a8.363 8.363 0 0 0-.594-.312 5.987 5.987 0 0 0-2.06 4.106c.206-.074.418-.14.637-.199ZM8 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z"
                    d2="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14Zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16Z"
                />
                <!-- row2 -->
                <SecondHomeDesc
                    :titleDesc="$t('Brakes')"
                    :paragrapghDes="
                        $t(
                            'Brakes inspection and maintenance is an important procedure to be done regularly, ensuring the safety of the car and preventing any sudden accidents or potential tragedies.'
                        )
                    "
                    icon="bi bi-gear"
                    d1="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"
                    d2="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"
                />
            </div>
        </div>
    </div>
</template>

<script>
import SecondHomeDesc from "./SecondHomeDesc.vue";

export default {
    name: "SecondHome",
    data() {
        return {
            title: "Our Featured Services",
            titleDescription:
                "We provide full-mobilized car workshop services at the chosen time and location, with experienced technicians, high-quality tools, and competitive prices.",
            imgCarSrc: "../../images/home/carServices.png",
            imgCarAlt: "Image Car",
        };
    },
    components: {
        SecondHomeDesc,
    },
};
</script>

<style scoped>
.SecondHome {
    width: 70%;
}
.SecondHome .content {
    display: grid;
    grid-template-columns: repeat(3, 32%);
    justify-content: space-evenly;
}
.column1,
.column3 {
    display: grid;
}
.column1 {
    direction: rtl;
}
@media screen and (max-width: 767px) {
    .SecondHome {
        width: 80%;
    }
    .SecondHome .content {
        text-align: center;
        justify-content: center;
        grid-template-columns: repeat(1, 100%);
        grid-gap: 20px;
    }
    .column1,
    .column3 {
        grid-gap: 20px;
    }
    .column1 div,
    .column3 div {
        display: flex;
        flex-direction: column;
    }
}
@media screen and (min-width: 768px) and (max-width: 1200px) {
    .SecondHome {
        width: 90%;
    }
}
h2 {
    color: var(--secondary-text-color);
    font-weight: 600;
}
small {
    color: var(--secondary-text-color);
}
</style>
