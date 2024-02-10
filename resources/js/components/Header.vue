<template>
    <nav class="bg-light">
        <div class="logo">
            <img :src="imageSrc" :alt="imageAlt" />
        </div>
        <div class="hamburger" @click="hamburger">
            <div class="line1 bg-dark"></div>
            <div class="line2 bg-dark"></div>
            <div class="line3 bg-dark"></div>
        </div>
        <ul class="nav-links">
            <li @click="closeMenu">
                <RouterLink  to="/" exact>{{ $t("Home") }}</RouterLink>
            </li>
            <li @click="closeMenu">
                <RouterLink to="/aboutus">{{ $t("About Us") }}</RouterLink>
            </li>
            <li @click="closeMenu">
                <RouterLink to="/services">{{ $t("Services") }}</RouterLink>
            </li>
            <li @click="closeMenu">
                <RouterLink to="/contactus">{{ $t("Contact Us") }}</RouterLink>
            </li>
            <li @click="closeMenu">
                <RouterLink v-if="!authenticated" to="/register">{{
                    $t("RegisterHeader")
                }}</RouterLink>
            </li>
            <li @click="closeMenu">
                <RouterLink v-if="!authenticated" to="/login">{{
                    $t("Log in")
                }}</RouterLink>
            </li>
            <li v-if="authenticated" class="d-flex align-items-center userName">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="16"
                    height="16"
                    fill="currentColor"
                    class="bi bi-person-fill"
                    viewBox="0 0 16 16"
                >
                    <path
                        d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                    />
                </svg>
                <span v-if="authenticated && user.type === 'machine'">
                    <a href="/ar/admin/login">{{ user.name }}</a>
                </span>
                <span v-if="authenticated  && user.type === 'customer'">
                    {{ user.name }}
                </span>
            </li>
            <li @click="closeMenu">
                <!-- logout -->
                <RouterLink
                    @Click="logoutMethod"
                    v-if="authenticated"
                    to="/logout"
                    >{{ $t("Log out") }}</RouterLink
                >
            </li>

            <lang />
        </ul>
    </nav>
</template>

<script>
import Lang from "./lang/Lang.vue";
import { mapActions } from "vuex";
import { mapGetters } from "vuex";
export default {
    components: {
        Lang,
    },
    name: "Header",
    data() {
        return {
            imageSrc: "../../images/logo.png",
            imageAlt: "Logo Image",
        };
    },
    methods: {
        ...mapActions({
            logout: "auth/logout",
        }),
        logoutMethod() {
            this.logout().then(() => {
                this.$router.push("/");
            });
        },
        hamburger() {
            const hamburger = document.querySelector(".hamburger");
            const navLinks = document.querySelector(".nav-links");
            const links = document.querySelectorAll(".nav-links li");
            //Animate Links
            navLinks.classList.toggle("open");
            links.forEach((link) => {
                link.classList.toggle("fade");
            });
            //Hamburger Animation
            hamburger.classList.toggle("toggle");
        },
        closeMenu() {
            const hamburger = document.querySelector(".hamburger");
            const navLinks = document.querySelector(".nav-links");
            const links = document.querySelectorAll(".nav-links li");
            //Animate Links
            navLinks.classList.remove("open");
            links.forEach((link) => {
                link.classList.remove("fade");
            });
            //Hamburger Animation
            hamburger.classList.remove("toggle");
        },
    },
    computed: {
        ...mapGetters({
            authenticated: "auth/authenticated",
            user: "auth/user",
        }),
    },
};
</script>

<style scoped>
nav {
    background-color: #eee;
}
.lang,
select {
    background-color: var(--secondary-text-color);
    padding: 10px 20px;
    color: #fff !important;
    outline: none;
}
.lang:hover {
    transform: scale(1.1, 1.1);
    color: #fff !important;
}
select option:hover {
    background-color: #eee;
}
/*Styling logo*/
.logo {
    padding: 1vh 1vw;
    text-align: center;
    width: 20%;
    display: flex;
    justify-content: end;
}
.logo img {
    height:10rem;
    width:11rem;
    align-self:center;
}
/*Styling Links*/
.nav-links {
    display: flex;
    list-style: none;
    width: 88vw;
    padding: 0 0.7vw;
    align-items: center;
    justify-content: center;
}
.nav-links a {
    text-decoration: none;
    margin: 0 0.7vw;
    color: #000;
    font-weight: 600;
    text-transform: capitalize;
}
.nav-links a:hover,
.nav-links a:focus {
    color: var(--secondary-text-color);
}
.nav-links li a::before {
    display: none !important;
}
.nav-links {
    position: relative;
}
.nav-links li a::before {
    content: "";
    display: block;
    height: 3px;
    width: 0%;
    background-color: #61dafb;
    position: absolute;
    transition: all ease-in-out 250ms;
    margin: 0 0 0 10%;
}
.nav-links li a:hover::before {
    width: 80%;
}

.hamburger {
    display: none;
}

/*Stying for small screens*/
@media screen and (max-width: 800px) {
    .logo {
        width: 30%;
    }
    .hamburger {
        display: block;
        position: absolute;
        cursor: pointer;
        right: 5%;
        top: 50%;
        transform: translate(-5%, -50%);
        z-index: 2;
        transition: all 0.7s ease;
    }

    .navbar-collapse {
        position: absolute;
        top: 6rem;
        left: 0;
        width: 100%;
        background-color: #eee;
    }
}
/*Animating Hamburger Icon on Click*/
.toggle .line1 {
    transform: rotate(-45deg) translate(-5px, 6px);
    background-color: #fff;
}
.toggle .line2 {
    transition: all 0.7s ease;
    width: 0;
    background-color: #fff;
}
.toggle .line3 {
    transform: rotate(45deg) translate(-5px, -6px);
    background-color: #fff;
}

nav {
    height: 6rem;
    width: 100%;
    background-color: #131418;
    box-shadow: 0 3px 20px rgba(0, 0, 0, 0.2);
    display: flex;
    z-index: 10;
    position: absolute;
    top: 0%;
    position: fixed;
}

/*Styling logo*/
/* .logo {
    padding: 1vh 1vw;
    text-align: center;
    width: 20%;
    display: flex;
    justify-content: end;
}
.logo img {
    height: 5rem;
    width: 8rem;
} */

/*Styling Links*/
.nav-links {
    display: flex;
    list-style: none;
    width: 88vw;
    padding: 0 0.7vw;
    align-items: center;
    text-transform: uppercase;
    margin-top: 13px;
}
.nav-links li a {
    text-decoration: none;
    margin: 0 0.7vw;
}
.nav-links li a:hover {
    color: var(--secondary-text-color);
}
.nav-links li {
    position: relative;
}
.nav-links li a::before {
    content: "";
    display: block;
    height: 3px;
    width: 0%;
    background-color: #61dafb;
    position: absolute;
    transition: all ease-in-out 250ms;
    margin: 0 0 0 10%;
}
.nav-links li a:hover::before {
    width: 80%;
}

/*Styling Buttons*/
.login-button {
    background-color: transparent;
    border: 1.5px solid #f2f5f7;
    border-radius: 2em;
    padding: 0.6rem 0.8rem;
    margin-left: 2vw;
    font-size: 1rem;
    cursor: pointer;
}
.login-button:hover {
    color: #131418;
    background-color: #f2f5f7;
    border: 1.5px solid #f2f5f7;
    transition: all ease-in-out 350ms;
}
.join-button {
    color: #131418;
    background-color: #61dafb;
    border: 1.5px solid #61dafb;
    border-radius: 2em;
    padding: 0.6rem 0.8rem;
    font-size: 1rem;
    cursor: pointer;
}
.join-button:hover {
    color: #f2f5f7;
    background-color: transparent;
    border: 1.5px solid #f2f5f7;
    transition: all ease-in-out 350ms;
}

/*Styling Hamburger Icon*/
.hamburger div {
    width: 30px;
    height: 3px;
    background: #f2f5f7;
    margin: 5px;
    transition: all 0.3s ease;
}
.hamburger {
    display: none;
}

/*Stying for small screens*/
@media screen and (max-width: 800px) {
    nav {
        position: fixed;
        justify-content: space-around;
        z-index: 3;
    }
    .hamburger {
        display: block;
        position: absolute;
        cursor: pointer;
        right: 5%;
        top: 50%;
        transform: translate(-5%, -50%);
        z-index: 2;
        transition: all 0.7s ease;
    }
    .nav-links {
        position: fixed;
        background: #fff;
        height: 100vh;
        width: 100%;
        flex-direction: column;
        clip-path: circle(50px at 90% -20%);
        -webkit-clip-path: circle(50px at 90% -10%);
        transition: all 1s ease-out;
        pointer-events: none;
        justify-content: space-evenly;
        margin-top: 0px;
    }
    .nav-links.open {
        clip-path: circle(1000px at 90% -10%);
        -webkit-clip-path: circle(1000px at 90% -10%);
        pointer-events: all;
    }
    .nav-links li {
        opacity: 0;
    }
    .nav-links li:nth-child(1) {
        transition: all 0.5s ease 0.2s;
    }
    .nav-links li:nth-child(2) {
        transition: all 0.5s ease 0.4s;
    }
    .nav-links li:nth-child(3) {
        transition: all 0.5s ease 0.6s;
    }
    .nav-links li:nth-child(4) {
        transition: all 0.5s ease 0.7s;
    }
    .nav-links li:nth-child(5) {
        transition: all 0.5s ease 0.8s;
    }
    .nav-links li:nth-child(6) {
        transition: all 0.5s ease 0.9s;
        margin: 0;
    }
    .nav-links li:nth-child(7) {
        transition: all 0.5s ease 1s;
        margin: 0;
    }
    li.fade {
        opacity: 1;
    }
}
/*Animating Hamburger Icon on Click*/
.toggle .line1 {
    transform: rotate(-45deg) translate(-5px, 6px);
}
.toggle .line2 {
    transition: all 0.7s ease;
    width: 0;
}
.toggle .line3 {
    transform: rotate(45deg) translate(-5px, -6px);
}

/* Custom Select wrapper */

.userName {
    color: var(--secondary-text-color);
    font-weight: 600;
}
.userName span a{
    color:var(--secondary-text-color);
    margin:0;
}
</style>
