<template>
    <div>
        <preload-page></preload-page>
        <div class="username">
            <div class="go__back">
                <i @click="goBack" class="far fa-arrow-alt-circle-left"></i>
            </div>
            <div class="page__title">
                <h1>Личные данные</h1>

            </div>
        </div>
    </div>
</template>

<script>
import PreloadPage from "../PreloadPage";

export default {
    components: {
        PreloadPage
    },
    methods: {
        goBack() {
            this.$router.go(-1)
        },
    }
}
</script>

<style lang="scss" scoped>
@import '../../../sass/variables';

.page__title {
    font-size: 25px;
    color: $main-color;
    margin-bottom: 20px;
}

.go__back {

    i {
        font-size: 40px;
        transition: color .2s;

        &:hover {
            color: $main-green;

        }
    }
}
</style>
