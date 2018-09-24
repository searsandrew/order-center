<template>
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6" v-for="order in orders" :key="order.id"> 
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title"><a href="#">{{ order.title }}</a></h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ order.user.name }}</h6>
                    <p class="card-text">{{ order.body.substring(0,50) }}</p>

                    <div class="d-flex bd-highlight">
                        <div class="pr-2 flex-fill bd-highlight"><a @click="getInfo(order.id, this.shared)" class="btn btn-outline-primary btn-block">View Order</a></div>
                        <div class="pl-2 flex-fill bd-highlight"><a :href = "'/orders/complete/'+ order.id" class="btn btn-outline-success btn-block">Complete</a></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Store from '../store';
    export default {
        data: function() {
            return  {
                orders: [],
                order: [],
                shared: Store.state,
            }
        },
        props: [ 'path' ],
        methods: {
            getInfo(orderid) {
                let vm = this;
                axios.get('/orders/show/'+orderid)
                .then(function (response) {
                    vm.shared.message = response.data
                    $('#exampleModal').modal('toggle')
                    console.log(response.data);
                })
                console.log('Get Info');
            }
        },
        mounted() {
            let vm = this;
            axios.get(this.path).then(response => this.orders = response.data);
        }
    }
</script>