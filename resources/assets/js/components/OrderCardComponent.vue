<template>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12" v-for="order in orders" :key="order.id"> 
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title"><a href="#">{{ order.title }}</a></h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ order.user.name }}</h6>
                    <p class="card-text">{{ order.body.substring(0,50) }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return  {
                orders: []
            }
        },
        mounted() {
            axios.get('/api/pending').then(response => this.orders = response.data);
        }
    }
</script>