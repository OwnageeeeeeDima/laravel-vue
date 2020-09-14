<template>
    <div>
        <preload-page></preload-page>
        <div class="parcels">
            <div class="page__title">
                <h1>Посылки</h1>
            </div>
            <div class="page__info">
                Здесь появятся посылки, сформированные
                из ваших покупок. Следите за их статусом, оплачивайте и отправляйте себе.
            </div>
        </div>
    </div>
</template>

<script>
import PreloadPage from '../PreloadPage'

export default {
    component: {
        PreloadPage
    },
}
</script>

<style lang="scss" scoped>
@import '../../../sass/variables';

.page__title {
    font-size: 25px;
    color: $main-color;
}

.page__info {
    font-size:22px;
    max-width: 500px;
    line-height: 1.5;
    color: $main-color;
}
</style>
