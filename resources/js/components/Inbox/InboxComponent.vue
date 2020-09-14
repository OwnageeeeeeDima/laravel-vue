<template>
    <div>
        <preload-page></preload-page>
        <div class="inbox">

            <div class="page__title">
                <h1>Покупки</h1>
                <div class="add__product" v-if="products.length > 0">
                    <i class="fas fa-plus-circle"></i>
                    <router-link to="/lk/inbox/create" class="add__product-link">Добавить товар</router-link>
                </div>

            </div>
            <div class="inbox__empty" v-if="products.length < 1">
                <div class="inbox__empty-text">
                    <p> Здесь появятся покупки, которые вы заказали на один из ваших адресов.</p>
                </div>
                <div class="inbox__empty-advice">
                    Совет: Добавляйте покупки сразу после оформления заказа. Если собрать посылку заранее, она быстрее
                    доберется до вас.
                </div>
                <router-link to="/lk/inbox/create" class="add-index">Добавить товар</router-link>

                <router-view></router-view>
            </div>

            <div class="products" v-else="products.length > 0">
                <!--            <div v-for="product in products" :key="product.id" class="product__item">-->
                <router-link v-for="product in products" :key="product.id" :to="`/lk/inbox/edit/${product.product_id}`"
                             class="product__item">
                    <div class="product__item-short">
                        {{ product.product_number }}
                    </div>
                    <div class="product__item-more">
                        <i class="far fa-clock"></i>
                    </div>
                    <div class="product__item-ellipsis">
                        <i @click.prevent="deleteProduct(product.product_id)" class="fas fa-ellipsis-h"></i>
                    </div>
                </router-link>
            </div>

        </div>
    </div>

    <!--    </div>-->

</template>

<script>
import PreloadPage from '../PreloadPage'

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
            products: [],


        }
    },

    methods: {
        deleteProduct(id) {
            if (confirm('Вы серьезно хотите удалить выбранный товар?'))
                axios.delete('/api/products/' + id, {
                    config: this.config,
                    headers: {
                        Authorization: 'Bearer ' + window.Laravel.api_token,
                        Accept: 'application/json',
                    },
                })
                    .then(response => {
                        console.log(response.data)
                        axios.get('/api/products', this.config)
                            .then((response => {
                                this.products = response.data
                                console.log(response.data)

                            }))
                    })
                    .catch(error => {
                        console.log(error)
                    })
        },
    },
    created() {

        axios.get('/api/products', this.config)
            .then((response => {
                this.products = response.data
                console.log(response.data)
            }))
    }
}

</script>


<style lang="scss" scoped>
@import '../../../sass/variables';



.page__title {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 25px;
    color: $main-color;
}

.add__product {
    display: flex;
    align-items: center;
    color: #727272;
    padding: 10px;
    transition: background-color .3s;
    border-radius: 5px;

    &:hover {
        background-color: rgba(0, 0, 0, .1);
    }

    i {
        font-size: 16px;
        padding-right: 5px;
    }

    &-link {
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        color: #727272;
        text-transform: uppercase;
    }

}

.inbox__empty {
    display: flex;
    flex-direction: column;
    color: $main-color;
    width: 50%;

    &-text {
        font-size: 25px;
        margin-bottom: 17px;
    }

    &-advice {
        color: $gray;
        line-height: 1.45;
        font-weight: 400;
        margin-bottom: 3rem;
    }
}

.add-index {
    text-decoration: none;
    background: $main-green;
    text-transform: uppercase;
    color: #fff;
    padding: 10px 15px;
    border-radius: 5px;
    font-size: 14px;
    font-weight: 600;
    border-width: 1px;
    width: 150px;
    text-align: center;

    &:hover {
        background: #00CC66;
    }
}

.products {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;

}

.product__item {
    display: flex;
    flex-direction: column;
    color: #000;
    text-decoration: none;
    width: 250px;
    background-color: #38c172;
    height: 250px;
    border-radius: 1.4rem;
    transition: background .2s;
    position: relative;
    margin: 10px 10px;
    cursor: pointer;


    &:hover {
        background: #2a9055;
    }

    &-short {
        padding: 20px;
        color: $main-color;
        font-weight: 600;
    }

    &-more {
        text-align: center;
        padding-top: 30px;

        i {
            font-size: 60px;
            color: #fff;
        }

    }

    &-ellipsis {
        position: absolute;
        bottom: 15px;
        right: 20px;
        transition: color .2s;

        &:hover {
            color: #fff;
        }
    }
}
</style>
