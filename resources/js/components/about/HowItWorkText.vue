<template>
    <div class="text-icon gap-3">
        <!-- Icon -->
        <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg"
                width="50"
                height="50"
                fill="currentColor"
                :class="bii"
                viewBox="0 0 16 16">
            <path
                :d="d1"
            />
            <path
                :d="d2"
            />
            </svg>
        </div>
        <!-- Text -->
        <div class="text">
            <h4>{{ textAbout }}</h4>
        </div>
    </div>
</template>

<script>
export default {
    name: "HowItWorkText",
        props:["textAbout","bii","d1","d2"]
    }
</script>

<style scoped>
    .text-icon{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
    .text h4{
        color:#707070;
        font-weight: bolder;
    }
</style>
