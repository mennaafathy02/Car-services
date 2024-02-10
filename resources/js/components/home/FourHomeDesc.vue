<template>
        <div class="comment">
            <Swiper
                :modules="modules"
                :loop= true
                :slidesPerView="2"
                :spaceBetween="12"
                :freeMode="true"
                :mousewheel="true"
                :keyboard="true"
                :autoplay="{
                    delay: 3500,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true
                }"
                :pagination="{
                    dynamicBullets: true,
                    clickable: true,
                }"
                class="swipper"
            >
                    <SwiperSlide  v-for="testimonial in testimonials" :key="testimonial.id" class="swipperCard">
                        <!-- Paragrapg -->
                        <div class="content text-center">
                            <p>{{ testimonial.description }}</p>
                        </div>
                        <!-- Quotes -->
                        <div class="quotes">
                            <span>&#8220;</span>
                        </div>
                    </SwiperSlide>
            </Swiper>
        </div>
</template>

<script>
// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from 'swiper/vue';
// Import Swiper styles
import 'swiper/css';
import 'swiper/css/pagination';
// import required modules
import { Autoplay, Pagination, FreeMode, Mousewheel, Keyboard } from 'swiper';
import { mapGetters } from "vuex";
import { mapActions } from "vuex";
import state from "../../store/index.js";
import axios from 'axios';


export default {
    name: "FourHomeDesc",
    components: {
        Swiper,
        SwiperSlide,
    },
    setup() {
        return {
            modules: [Pagination, Autoplay, FreeMode, Mousewheel, Keyboard],
        };
    },
    data() {
        return {
            testimonials: []
        }
    },
    computed: {
        ...mapGetters({
            TimeLoaded: 'auth/TimeLoaded',
        }),
    },
    methods: {
        ...mapActions({
            SET_TimeLoaded: 'auth/SET_TimeLoaded',
        }),
        isMobile() {
            if (screen.width <= 767) {
                return true;
            }
            else {
                return false;
            }
        }
    },
    async mounted() {
        const request_start_at = performance.now();

        const response = await axios.get(`/api/testimonials`, {
            headers : {
                'Authorization': 'Token abc'
            }
        });

        const request_end_at = performance.now();
        const request_duration = request_end_at - request_start_at;

        if (response.status === 200) {
            // console.log(request_duration / 1000);
            // this.$refs.preloader.showPreloader;
            this.$store.dispatch('auth/SET_TimeLoaded', (request_duration / 1000));
        }
        else {
            this.$store.dispatch('auth/SET_TimeLoaded', 0);
        }

        this.testimonials = response.data.data.slice(0, 6);
    },


}
</script>

<style scoped>
.comment {
    height: 100%;
    width: 100%;
    direction: ltr !important;
}
.swipper{
    padding: 20px;
}
.swipperCard{
    padding: 20px 20px 0px 20px;
    background-color: #fff;
    border-radius: 10px 10px 10px 50px;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 8px;
}
@media screen and (max-width:767px){
    .swipperCard{
        padding: 12px 12px 0px 12px;
    }
}
.quotes {
    display: flex;
    justify-content: right;
}

.quotes span {
    font-size: 60px;
    color: var(--secondary-text-color);
}

.image img {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    border: 5px solid rgba(182, 216, 216, 0.213);
}
.name-image {
    display: flex;
    align-items: center;
    gap: 10px;
}
p {
    font-size: 20px;
}
.swiper-pagination-bullet-active{
    background-color: #000 !important;
    color: #000 !important;
}
</style>
