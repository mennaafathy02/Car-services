<template>
    <div class="parentThirdsection">
        <div class="ThirdHome m-auto d-flex justify-content-center gad-5">
            <div class="boxes">
                <!-- Box1 -->
                <div class="box d-flex flex-column gap-2">
                    <!-- icon -->
                    <div class="icon mb-4">
                        <span>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="40"
                                height="40"
                                fill="currentColor"
                                class="bi bi-telephone-fill"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"
                                />
                            </svg>
                        </span>
                    </div>
                    <!-- content -->
                    <div class="content gap-5">
                        <!-- Title -->
                        <h3>{{ $t('Request a Call back') }}</h3>
                        <!-- Paragraph -->
                        <p>{{ $t('Have our experts calling you') }}</p>
                        <!-- Btn -->
                        <a href="">
                            <button class="btn request-call">
                                <a href="/contactus">{{ $t('Click here to request a call') }}</a>
                            </button>
                        </a>
                    </div>
                </div>
                <!-- Box2 -->
                <div class="box d-flex flex-column gap-2">
                    <!-- icon -->
                    <div class="icon mb-4">
                        <span>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="40"
                                height="40"
                                fill="currentColor"
                                class="bi bi-person-fill"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                                />
                            </svg>
                        </span>
                    </div>
                    <!-- content -->
                    <div class="content gap-5">
                        <!-- Title -->
                        <h3>{{ $t('Call us & Whatsapp') }}</h3>
                        <h3 style="direction:ltr">+2001010214055</h3>
                        <!-- times -->
                        <div class="times">
                            <p>
                                <span>&#10003;</span>
                                {{ $t('Saturday - Thursday') }}
                            </p>
                            <p>
                                <span>&#10003;</span>
                                9am - 6pm
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ThirdHome",
};
</script>

<style scoped>
.parentThirdsection {
    width: 100%;
    background-color: #fff;
    color: #000;
    padding: 50px;
}
.parentThirdsection .ThirdHome {
    width: 70%;
}
.boxes {
    display: grid;
    grid-template-columns: repeat(2, 50%);
    box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 50px;
}
.boxes .box {
    background-color: var(--primary-text-color);
    color: var(--secondary-text-color);
    padding: 40px;
    color: #fff;
}
.boxes .box:last-child {
    border-left: 5px solid var(--secondary-text-color);
}
.boxes .box .icon span {
    background-color: #3a3a3a;
    padding: 25px 15px;
    border-radius: 50%;
}
.boxes .icon svg {
    fill: #fff;
}
.content a button {
    background-color: var(--secondary-text-color);
    padding: 15px 30px;
    color: #fff;
}
.request-call a{
    color:#fff;
    text-decoration: none;
}
@media screen and (max-width:767px) {
    .parentThirdsection .ThirdHome .boxes {
        width: 100%;
        grid-template-columns: repeat(1, 100%);
    }
    .boxes .box:last-child {
        border-top: 5px solid var(--secondary-text-color);
        border-left: none;
    }
    .parentThirdsection .ThirdHome {
        width: 100% !important;
        text-align: center;
    }

    .boxes .box {
        padding: 30px;
    }
    .content a button {
        background-color: var(--secondary-text-color);
        padding: 10px 20px;
        color: #fff;
    }
}

@media screen and (min-width:768px) and (max-width:991px){
    .parentThirdsection .ThirdHome {
    width: 100%;
}
}
</style>
