<template>
    <div class="loader" v-show="show" ref="preloader">
        <svg class="car" width="102" height="40" xmlns="http://www.w3.org/2000/svg">
            <g transform="translate(2 1)" stroke="#000" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                <path class="car__body" d="M47.293 2.375C52.927.792 54.017.805 54.017.805c2.613-.445 6.838-.337 9.42.237l8.381 1.863c2.59.576 6.164 2.606 7.98 4.531l6.348 6.732 6.245 1.877c3.098.508 5.609 3.431 5.609 6.507v4.206c0 .29-2.536 4.189-5.687 4.189H36.808c-2.655 0-4.34-2.1-3.688-4.67 0 0 3.71-19.944 14.173-23.902zM36.5 15.5h54.01" stroke-width="3"/>
                <ellipse class="car__wheel--left" stroke-width="3.2" fill="#FFF" cx="83.493" cy="30.25" rx="6.922" ry="6.808"/>
                <ellipse class="car__wheel--right" stroke-width="3.2" fill="#FFF" cx="46.511" cy="30.25" rx="6.922" ry="6.808"/>
                <path class="car__line car__line--top" d="M22.5 16.5H2.475" stroke-width="3"/>
                <path class="car__line car__line--middle" d="M20.5 23.5H.4755" stroke-width="3"/>
                <path class="car__line car__line--bottom" d="M25.5 9.5h-19" stroke-width="3"/>
            </g>
        </svg>
    </div>
</template>

<script>
import {mapActions} from "vuex";
import { mapGetters } from "vuex";
import { mapState } from "vuex";
import state from "../store/index"
import { ref } from "vue";
export default {
    name: "Preloader",
        data() {
            return {
                show: true
            }
    },
    created() {

    },

    computed: {
        ...mapGetters({
            timeLoaded: "auth/timeLoaded",
        }),
    },
    methods: {
        ...mapActions({
            SET_TimeLoaded: 'auth/SET_TimeLoaded',
        }),
        windowLoaded() {
            this.$store.dispatch("auth/SET_TimeLoaded", this.timeLoaded + 500);
            window.scrollTo(0, 0);
            window.document.body.style.overflow = "hidden";
            setTimeout(() => {
                this.show = false;
                // make scroll to top & overflow hidden
                window.scrollTo(0, 0);
                document.body.style.overflow = "auto";
            }, this.timeLoaded);
        },
        showPreloader() {
            this.windowLoaded();
        }
    },
    async mounted() {
        this.windowLoaded();
    }
}
</script>

<style scoped>
.loader {
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  position: absolute;
  top: 0;
  left: 0;
  position: fixed;
  display: grid;
  place-items: center;
  z-index: 9999;
  background-color: #fff;
}

.car__body {
  -webkit-animation: shake 0.2s ease-in-out infinite alternate;
          animation: shake 0.2s ease-in-out infinite alternate;
}
.car path, .car ellipse {
  fill: gold;
}
.car__line {
  transform-origin: center right;
  stroke-dasharray: 22;
  -webkit-animation: line 0.8s ease-in-out infinite;
          animation: line 0.8s ease-in-out infinite;
  -webkit-animation-fill-mode: both;
          animation-fill-mode: both;
}
.car__line--top {
  -webkit-animation-delay: 0s;
          animation-delay: 0s;
}
.car__line--middle {
  -webkit-animation-delay: 0.2s;
          animation-delay: 0.2s;
}
.car__line--bottom {
  -webkit-animation-delay: 0.4s;
          animation-delay: 0.4s;
}

@-webkit-keyframes shake {
  0% {
    transform: translateY(-1%);
  }
  100% {
    transform: translateY(3%);
  }
}

@keyframes shake {
  0% {
    transform: translateY(-1%);
  }
  100% {
    transform: translateY(3%);
  }
}
@-webkit-keyframes line {
  0% {
    stroke-dashoffset: 22;
  }
  25% {
    stroke-dashoffset: 22;
  }
  50% {
    stroke-dashoffset: 0;
  }
  51% {
    stroke-dashoffset: 0;
  }
  80% {
    stroke-dashoffset: -22;
  }
  100% {
    stroke-dashoffset: -22;
  }
}
@keyframes line {
  0% {
    stroke-dashoffset: 22;
  }
  25% {
    stroke-dashoffset: 22;
  }
  50% {
    stroke-dashoffset: 0;
  }
  51% {
    stroke-dashoffset: 0;
  }
  80% {
    stroke-dashoffset: -22;
  }
  100% {
    stroke-dashoffset: -22;
  }
}
</style>
