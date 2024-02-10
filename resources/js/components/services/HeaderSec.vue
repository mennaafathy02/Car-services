<template>
    <div class="d-flex justify-content-center align-items-center HeaderSec">
        <h2 class="text-center">{{ title }}</h2>
    </div>
</template>
<script>
export default {
    name: "HeaderSec",
    props: {
        title: {
            type: String,
            default: "Header Section",
        },
    },
};
</script>

<style scoped>
.HeaderSec {
    width: 100%;
}
h2 {
    color: var(--background-color);
}
</style>
