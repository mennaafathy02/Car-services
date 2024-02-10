<template>
    <div class="WhoAreText mt-5">
        <!-- Title -->
        <h2>{{ titleText }}</h2>
        <!-- Paragraph -->
        <div class="paragraph">
            <p>{{ paragraphOne }}</p>
            <p>{{ paragraphTwo }}</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "WhoAreText",
    props: ["titleText", "paragraphOne", "paragraphTwo"],
};
</script>

<style scoped>
h2 {
    color: var(--secondary-text-color);
    font-weight: 800;
}
p {
    color: #707070;
}
</style>
