<template>
    <transition name="fade">
        <div v-if="show" class="loader_bg">
            <div class="loader">

            </div>
        </div>
    </transition>
</template>

<style lang="scss" scoped>
.loader_bg {
    position: absolute;
    display: flex;
    align-items: center;
    justify-content: center;
    top: 71px;
    left: 15.4rem;
    background-color: #fff;
    width: calc(100% - 15.4rem);
    height: calc(100% - 71px);
    z-index: 9999;

    .loader {
        border: 0 solid transparent;
        border-radius: 50%;
        width: 150px;
        height: 150px;
        position: absolute;
        top: calc(50vh - 146px);
        left: calc(50vw - 15.4rem +75px);

        &:before, &:after {
            content: '';
            border: 1em solid #38c172;
            border-radius: 50%;
            width: inherit;
            height: inherit;
            position: absolute;
            top: 0;
            left: 0;
            animation: loader .8s linear infinite;
            opacity: 0;
        }

        &:before {
            animation-delay: .8s;
        }

        @keyframes loader {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            50% {
                opacity: 1;
            }
            100% {
                transform: scale(1);
                opacity: 0;
            }
        }
    }
}

@media (max-width: 1280px) {
    .loader_bg {
        left: 0;

        .loader {
            left: calc(50vw - 75px);
        }
    }
}

@media (max-width: 800px) {
    .loader_bg {
        width: calc(100%);
    }
}
</style>


<script>
export default {
    data() {
        return {
            show: true
        }
    },
    mounted() {
        if (Boolean(this.show)) this.showToggle()
    },
    methods: {
        showToggle() {
            setTimeout(() => {
                this.show = false
            }, 800)
        }
    }
}
</script>

