<template>
    <div class="WhoAreAboutPage mt-5 mb-5 m-auto">
        <!-- Images -->
        <div class="images">
            <img :src="imageSrc" class="w-100" :alt="imageAlt" />
        </div>
        <!-- Text -->
        <div class="text">
            <WhoAreText
                :titleText="$t('WHO WE ARE?')"
                :paragraphTwo="
                    $t(
                        'CarViseta is a privately owned company that focuses on making car owners life easier to maintain their cars in excellent conditions while having a convenient car service in terms of time and location with the best price possible. Our focus is customer’s satisfaction and ensuring the car maintenance is headache-free. We started with key services that customers need on a frequent basis and we keept adding services based on listening to our customers, stay tuned for more.'
                    )
                "
            />

            <WhoAreText
                :titleText="$t('OUR MISSION')"
                :paragraphOne="
                    $t(
                        'To become the leading car maintenance provider in the regional market by providing best quality, convenience and value for money car services to our beloved customers We are changing the industry of the car maintenance by simplifying the process of consuming the services and ensure our customers’ ownership of a car is an enjoyable journey'
                    )
                "
            />

            <WhoAreText
                :titleText="$t('OUR VISION')"
                :paragraphOne="
                    $t(
                        'Provide high-quality car maintenance service through 100% mobilized workshops with best market standards, using latest available technologies'
                    )
                "
            />
        </div>
    </div>
</template>

<script>
import WhoAreText from "./WhoAreText.vue";
export default {
    name: "WhoAreAboutPage",
    data() {
        return {
            imageSrc: "../../images/about/Who1.png",
            imageAlt: "Image About",
        };
    },
    components: { WhoAreText },
};
</script>

<style scoped>
.WhoAreAboutPage {
    width: 70%;
    display: grid;
    grid-template-columns: repeat(2, 48%);
    grid-gap: 20px;
}

@media screen and (max-width: 767px) {
    .WhoAreAboutPage {
        width: 90%;
        display: grid;
        grid-template-columns: repeat(1, 100%);
        grid-gap: 20px;
    }
}
</style>
