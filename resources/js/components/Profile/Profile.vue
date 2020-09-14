<template>
    <div>
        <preload-page></preload-page>
        <div class="profile__page">
            <div class="page__title">
                <h1>Профиль</h1>
            </div>

            <div class="profile__page-settings">
                <div> {{ user.name }}, +79785737230</div>
                <router-link tag="a" to="/lk/profile/username"> Изменить</router-link>
            </div>
            <div class="profile__page-password">
                {{ user.email }}
            </div>
        </div>
    </div>
</template>


<style lang="scss" scoped>
@import '../../../sass/variables';

.page__title {
    font-size: 25px;
    color: $main-color;
    margin-bottom: 20px;
}

.profile__page {
    color: $main-color;
    font-size: 16px;

    &-settings {
        margin-bottom: 30px;

        a {
            color: $main-color;
            font-weight: 400;
            text-decoration: none;
            font-size: 14px;
            padding: 8px 16px;
            text-align: center;
            border: 1px solid $main-color;
            text-transform: uppercase;
            transition: all .3s;
            font-weight: 600;
            border-radius: 5px;

            &:hover {
                color: #fff;
                background: #5cd08d;
                border: 1px solid #fff;
            }
        }
    }

    &-settings, &-password {
        max-width: 500px;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }
}
</style>


<script>
import PreloadPage from "../PreloadPage";

export default {
    component: {
        PreloadPage
    },
    data() {
        return {
            config: {
                headers: {
                    Authorization: 'Bearer ' + window.Laravel.api_token,
                    Accept: 'application/json'
                }
            },
            user: [],
        }
    },
    methods: {
        getUser() {
            axios.get('/api/users/', this.config)
                .then(response => {
                    this.user = response.data
                })
                .catch(error => {
                    console.log(error)
                })
        }
    },
    mounted() {
        this.getUser()
    }
}


</script>
