<template>
    <div class="card g-col-4" v-for="card in cards" :key="card.id">
        <div class="card-img">
            <img
                :src="card.media.url"
                class="card-img-top img-fluid"
                :alt="card.media.name"
            />
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ card.title }}</h5>
            <p class="card-text">{{ card.description }}</p>
        </div>
        <div
            class="w-100 d-flex flex-column gap-3 align-items-center justify-content-center p-2"
        >
            <a
                v-if="authenticated && user.type === 'customer'"
                :href="card.link"
                class="btn mx-auto btn-primary"
                @click="booking( card.id )"
                >{{ $t("Book Now") }}</a
            >
        </div>
    </div>
</template>
<script>
import axios from "axios";
import { mapGetters } from "vuex";
import { mapActions } from "vuex";
// ES6 Modules or TypeScript
import Swal from 'sweetalert2'
// CommonJS
// const Swal = require('sweetalert2')

export default {
    name: "Card",
    data() {
        return {
            cards: [],
        };
    },

    computed: {
        ...mapGetters({
            authenticated: "auth/authenticated",
            user: "auth/user",
            timeLoaded: "auth/timeLoaded",
        }),
    },
    methods: {
        ...mapActions({
            SET_TimeLoaded: 'auth/SET_TimeLoaded',
        }),
        booking(id) {
            axios.post(`/api/book-service/${id}`, this.cards.map((e)=> e) ).then((res) => {
                if (res.status == 200) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'The Booking Has Been Completed Successfully',
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            }).catch(() => {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Something went wrong, Try again',
                    showConfirmButton: false,
                    timer: 2000
                })
            })

        },
    },
    async mounted() {
        const request_start_at = performance.now();

        const response = await axios.get(`/api/services`);

        const request_end_at = performance.now();
        const request_duration = request_end_at - request_start_at;

        if (response.status === 200) {
            this.$store.dispatch('auth/SET_TimeLoaded', (request_duration / 1000) + 1000);
        }
        else {
            this.$store.dispatch('auth/SET_TimeLoaded', 1000);
        }
        this.cards = response.data.data;

    },
};
</script>

<style>
.card {
    width: calc((100% / 3) - 2rem);
    margin: 15px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}
.card-title {
    font-weight: bold;
    color: var(--secondary-text-color);
}
.card-body {
    line-height: 1.5;
    text-align: center;
}
.card-img:hover img {
    transform: scale(1.1);
    transition: 1s;
}
a button {
    background-color: var(--secondary-text-color) !important;
    color: #fff !important;
}
.btn-primary {
    background-color: var(--secondary-text-color);
    border: none;
    color: #fff;
    font-weight: bold;
}
.btn-primary:hover,
.btn-primary:active {
    background-color: var(--secondary-text-color) !important;
    color: #fff;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2) !important;
}

@media (width<62rem) {
    .card {
        width: calc((100% / 2) - 2rem);
    }
}
@media (width<48rem) {
    .card {
        width: calc((100% / 2) - 1.25rem);
        margin: 0.625rem;
    }
}
@media (width<36rem) {
    .card {
        width: calc((100% / 2) - 1.25rem);
        font-size: 0.9rem;
    }
    .card .card-title {
        font-size: 1rem;
    }
}
</style>
