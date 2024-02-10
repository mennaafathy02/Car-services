<template>
    <div class="ContactInfoText d-flex gap-3">
        <!-- Icon -->
        <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg"
                width="70"
                height="75"
                fill="currentColor"
                :class="icon"
                viewBox="0 0 16 16">
            <path :d="d1" />
            <path :d="d2" />
            <path :d="d3" />
            </svg>
        </div>
        <!-- Text -->
        <div class="text gap-2">
            <h2>{{ text }}</h2>
            <!-- Paragraph -->
            <div class="para">
                <p>{{ paragraphOne }}</p>
                <p>{{ paragraphTwo }}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ContactInfoText",
    props: ["icon", "text", "d1","d2","paragraphOne","paragraphTwo"]
    }
</script>

<style scoped>
h2{
        font-weight: 700;
        color:var(--primary-text-color)
    }
    svg{
        fill: var(--secondary-text-color)
    }
    @media screen and (max-width:767px){
        .ContactInfoText{
            flex-direction: column;
            justify-content: center;
            text-align: center;
            padding: 5px;
        }
    }
    .ContactInfoText{
        background-color: #fff;
        padding:15px;
        border-radius: 10px;
        box-shadow: rgba(0,0,0,.1) 0px 0px 50px;
    }
</style>