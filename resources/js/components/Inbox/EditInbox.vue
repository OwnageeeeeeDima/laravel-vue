<template>
    <div>
        <preload-page></preload-page>
        <div class="inbox">
            <div class="go__back">
                <i @click="goBack" class="far fa-arrow-alt-circle-left"></i>
            </div>
            <div class="page__title">
                <h1>Товар {{ product.product_number }}</h1>

            </div>
        </div>

        <div class="form">
            <form novalidate="novalidate">
                <div class="form__inner">
                    <label for="description">Тип товара</label>
                    <input v-model="product.description" id="description" type="text" placeholder="Тип товара и марка">
                    <label for="product_link">Ссылка на товар</label>
                    <input v-model="product.product_link" type="text" id="product_link" placeholder="Ссылка на товар">
                    <div class="form__inner-meta">
                        <label for="count">Кол-во</label>
                        <input v-model="product.count" id="count" type="number" placeholder="Кол-во">
                        <label for="price">Цена</label>
                        <input v-model="product.price" id="price" type="number" placeholder="Цена">
                    </div>
                    <button @click.prevent="updateProduct" type="submit">Сохранить</button>
                </div>

            </form>
        </div>
    </div>
</template>

<script>
import PreloadPage from '../PreloadPage'

export default {
    component: {
        PreloadPage
    },
    data() {

        return {
            product_id: this.$route.params.id,
            product: [],
            config: {
                headers: {
                    Authorization: 'Bearer ' + window.Laravel.api_token,
                    Accept: 'application/json'
                }
            },
        }
    },
    methods: {
        goBack() {
            this.$router.go(-1)
        },
        updateProduct() {
            axios.put('/api/products/'+ this.product_id, {
                config: this.config,
                description: this.product.description,
                product_link: this.product.product_link,
                count: this.product.count,
                price: this.product.price
            }, {
                headers: {
                    Authorization: 'Bearer ' + window.Laravel.api_token,
                    Accept: 'application/json',
                },
            })
            .then(response => {

                window.location.href = '/lk/inbox'
            })
            .catch(error => {
                console.log(error)
            })
        }
    },

    mounted() {
        axios.get('/api/products/' + this.product_id, {
            config: this.config,
            headers: {
                Authorization: 'Bearer ' + window.Laravel.api_token,
                Accept: 'application/json',
            },
        })
            .then(response => {
                this.product = response.data
                console.log(response.data)
            })
            .catch(error => {
                console.log(error)
            })

        console.log(this.product_id)
    }
}
</script>

<style lang="scss" scoped>
@import '../../../sass/variables';

.go__back {

    i {
        font-size: 40px;
        transition: color .2s;

        &:hover {
            color: $main-green;

        }
    }
}
.page__title {
    font-size: 25px;
    color: $main-color;
}

.form {
    width: 50%;
}

.form__inner {

    display: flex;
    flex-direction: column;
    padding: 15px;

    button {
        background: $main-green;
        border: none;
        width: 120px;
        text-align: center;
        font-size: 14px;
        border-radius: 5px;
        color: #fff;
        font-weight: 600;
        text-transform: uppercase;
        padding: 10px;
        transition: background .2s;

        &:hover {
            background: #00CC66;
        }
    }

    label {
        font-size: 12px;
        color: #727272;
        padding-bottom: 5px;
    }

    input {
        border: none;
        outline: none;
        border-bottom: 1px solid #ccc;
        background: transparent;
        font-size: 17px;
        color: $main-color;
        padding: 5px 10px;
        margin-bottom: 30px;
        transition: border-color .2s;
        display: block;

        &:hover {
            border-color: #00CC66;
        }
    }

    &-meta {
        display: flex;
        justify-content: space-between;

        label {
            display: block;
        }
        input {
            width: 43%;
        }
    }
}
</style>
