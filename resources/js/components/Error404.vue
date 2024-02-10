<template>
    <div class="notFound">
        <lord-icon
            src="https://cdn.lordicon.com/inrunzby.json"
            trigger="hover"
            style="width:350px;height:350px">
        </lord-icon>
        <h1>Not Found (404)</h1>
    </div>
</template>

<script>
export default {
        name : "NotFound"
    }
</script>

<style scoped>
    .notFound {
        width:100%;
        height:calc(100vh - 90px);
        display: flex;
        align-items: center;
        text-align: center;
        justify-content: center;
        flex-direction: column;

    }
    h1{
        font-size: 2.5rem;
        color:rgb(129, 0, 0);
        font-weight: bolder;
    }
</style>
