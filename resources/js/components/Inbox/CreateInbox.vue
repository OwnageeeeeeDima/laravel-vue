<template>
    <div>
        <div class="go__back">
            <i @click="goBack" class="far fa-arrow-alt-circle-left"></i>
        </div>

        <div class="create__purchase">
            <div class="page__title">
                <h1>Заполните карточку</h1>
            </div>

            <div class="create__purchase-text">
                Тип товара укажите на русском, а бренд на английском. Укажите каждый товар отдельно. Как заполнять
                декларацию?
            </div>
            <div class="create__purchase-example">
                Например: Футболка Carters, красная, хлопок, размер 3М.
            </div>
            <div class="form">
                <form novalidate="novalidate">
                    <div class="form__inner">
                        <input v-model="product.description" type="text" placeholder="Тип товара и марка">
                        <input v-model="product.product_link" type="text" placeholder="Ссылка на товар">
                        <div class="form__inner-meta">
                            <input v-model="product.count" type="number" placeholder="Кол-во">
                            <input v-model="product.price" type="number" placeholder="Цена">
                        </div>
                        <button @click.prevent="createProduct" type="submit">Добавить</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            config: {
                headers: {
                    Authorization: 'Bearer ' + window.Laravel.api_token,
                    Accept: 'application/json'
                }
            },
            product: {
                description: '',
                product_link: '',
                count: '',
                price: '',
            }
        }
    }
    ,
    methods: {
        goBack() {
            this.$router.go(-1)
        }
        ,
        createProduct() {
            axios.post('/api/products', {
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


                .then(responce => {
                    window.location.href = "/lk/inbox"
                })
                .catch(error => {
                    console.log(error)
                })
        }


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

.create__purchase {
    max-width: 600px;

    &-text {
        color: $main-color;
        line-height: 1.7;
        margin-bottom: 1.6rem;
    }

    &-example {
        margin-bottom: 1.6rem;
    }
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

        &:hover {
            border-color: #00CC66;
        }
    }

    &-meta {
        display: flex;
        justify-content: space-between;

        input {
            width: 43%;
        }
    }
}


</style>
