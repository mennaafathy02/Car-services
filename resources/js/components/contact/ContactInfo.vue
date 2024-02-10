<template>
    <div class="ContactInfo m-auto mt-5 mb-5">
        <!-- Address -->
        <ContactInfoText
            icon="bi bi-send-fill"
            d1="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"
            :text="$t('Address')"
            :paragraphTwo="$t('Cairo, Egypt')"
        />
        <!-- Contact Info -->
        <ContactInfoText
            icon="bi bi-info-circle-fill"
            d1="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"
            :text="$t('Contact info')"
            :paragraphOne="$t('Phone : +201273800063')"
            :paragraphTwo="$t('E-mail: Nal.khaled28@gmail.com')"
        />
        <!-- Hours -->
        <ContactInfoText
            icon="bi bi-clock"
            d1="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"
            d2="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"
            :text="$t('Working Hours')"
            :paragraphOne="$t('Saturday - Thursday from')"
            paragraphTwo="9am - 6pm"
        />
    </div>
</template>

<script>
import ContactInfoText from "./ContactInfoText.vue";
export default {
    name: "ContactInfo",
    components: { ContactInfoText },
};
</script>

<style scoped>
.ContactInfo {
    width: 70%;
    display: grid;
    grid-template-columns: repeat(3, 33%);
    justify-content: space-around;
    grid-gap: 20px;
}
@media screen and (max-width: 767px) {
    .ContactInfo {
        width: 90%;
        display: grid;
        grid-template-columns: repeat(1, 100%);
        justify-content: center;
        grid-gap: 10px;
    }
}
@media screen and (min-width: 768px) and (max-width: 1022px) {
    .ContactInfo {
        width: 90%;
        display: grid;
        grid-template-columns: repeat(2, 45%);
        justify-content: center;
    }
}
@media screen and (min-width: 1023px) and (max-width: 1200px) {
    .ContactInfo {
        width: 90%;
        display: grid;
        grid-template-columns: repeat(3, 33%);
        justify-content: center;
    }
}
</style>
