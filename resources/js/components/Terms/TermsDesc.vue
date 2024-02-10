<template>
    <div class="TermsDesc">
        <p>{{ title }}</p>
        <p>{{ description1 }} <a :href="linkDescUrl">{{ linkDesc }}</a></p>
        <p>{{ description2 }}</p>
        <p>{{ description3 }}</p>
        <p>{{ description4 }}</p>
        <p>{{ description5 }}</p>
        <p>{{ description6 }}</p>
        <p>{{ description7 }}</p>
        <p>{{ description8 }}</p>
        <p>{{ description9 }}</p>
        <p>{{ description10 }}</p>
        <p>{{ description11 }}</p>
        <p>{{ description12 }}</p>
    </div>
</template>

<script>
export default {
        name:"TermsDesc",
        props:['title',"linkDesc","linkDescUrl",'description1',"description2","description3","description4","description5","description6","description7","description8","description9","description10","description11","description12"]
    }
</script>

<style scoped>
    p:first-child{
        color:#000;
        font-weight: 700;
    }
    p{
        color:#7a7a7a
    }
    p a{
        text-decoration: none;
    }
</style>
