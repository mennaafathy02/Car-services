<template>
    <div class="booked mt-5" v-if="authenticated && user.type === 'customer'">
        <button @click="showBookings" class="btn d-flex justify-content-center m-auto w-50" data-toggle="modal" data-target="#exampleModal">{{ $t('Show Booked Services') }}</button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $t('The services you booked') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center" v-for="book in bookedServices" :key="book.id"><span>&#10003;</span> {{ book.title }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn border-none" data-dismiss="modal">{{ $t('Close') }}</button>
                </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { mapGetters } from "vuex";

export default {
    name: "Booked",
    data() {
        return {
            bookedServices: []
        }
    },
    // async mounted() {
    //     let booked = await axios.get("/api/user-services");
    //     console.log(booked.data.data);
    //     this.bookedServices = booked.data.data;
    // },
    computed: {
        ...mapGetters({
            authenticated: "auth/authenticated",
            user: "auth/user",
        })
    },
    methods: {
        async showBookings() {
            let booked = await axios.get("/api/bookings",
            );
                // get bookings with user id axios
            let bookedServices = await axios.get("/api/bookings", {
                params: {
                    user_id: 5
                }
            });
            console.log(bookedServices);
            console.log(5)



            console.log(booked);
            this.bookedServices = +booked.data.data;
        }
    }
}
</script>

<style scoped>
    .booked button:first-child{
        background-color: var(--secondary-text-color);
        color:#fff;
    }
    .close{
        background: none;
        border:none;
    }
    .close span{
        font-size: 20px;
    }
.modal-body {
    display:grid;
    grid-template-columns: repeat(2,50%);
}
.modal-body p{
    border-bottom: 1px solid #eee;
    padding-bottom: 15px;
}
.modal-body p:last-child{
    border:none
}
</style>
