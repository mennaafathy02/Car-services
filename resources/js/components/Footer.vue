<template>
    <footer>
        <h6>{{ $t('Copyright ©2022 CarViseta. All Rights Reserved.') }}</h6>
        <h6>
            <a :href="TermsUrl">{{ $t('Terms and Conditions') }}</a>
        </h6>
    </footer>
</template>

<script>
export default {
    name: "Footer",
    data() {
        return {
            copyWrite: "Copyright ©2022 CarViseta. All Rights Reserved.",
            Terms: "Terms and Conditions",
            TermsUrl: "/TermsAndConditions",
        };
    },
};
</script>

<style scoped>
footer {
    width: 100%;
    background-color: #000;
    padding: 40px;
    display: flex;
    justify-content: space-around;
    align-items: center;
    flex-wrap: wrap;
    color: #fff;
}
a {
    color: #fff;
}
a:hover {
    color: var(--secondary-text-color);
}
</style>
