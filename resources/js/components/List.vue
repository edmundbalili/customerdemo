<template>
    <div class="customers">
        <div class="loading" v-if="loading">
            Loading...
        </div>

        <div v-if="errors" class="alert-error">
            {{ errors }}
        </div>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Gender</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody v-if="customers">
                <tr v-for="(customer, index) in customers" v-bind:key="customer.id">
                    <td>{{ customer.first_name|uppercase }}</td>
                    <td>{{ customer.last_name|uppercase }}</td>
                    <td>{{ customer.email }}</td>
                    <td>{{ customer.address }}</td>
                    <td>{{ customer.gender ? "Male" : "Female"  }}</td>
                    <td>
                        <router-link :to="{ name: 'edit', params: {id: customer.id}  }" class="btn btn-secondary btn-block">View</router-link>
                        <button class="btn btn-secondary btn-block" @click="deleteCustomer(customer.id, index)">Delete</button>
                    </td>
                </tr>
            </tbody>
            <tbody v-else>
                <tr>
                    <td colspan="6" class="text-center">{{ message }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import api from '../customers_api';
export default {
    data() {
        return {
            loading: false,
            message: "",
            customers: null,
            error: null,
        };
    },
    created() {
        this.list();
    },
    methods: {
        list() {
            this.errors = null;
            this.loading = true;
            api.all()
                .then((response) => {
                    this.loading = false;
                    if (response.data.data.length) {
                        this.customers = response.data.data;
                    }
                    else{
                        this.message = "No customer data list"
                    }
                })
                .catch((e) => {
                    this.message = e.response.data.message || 'Unable to load customer data list';
                })
        },
        deleteCustomer(id, index) {
            if (confirm("Customer will be delete, proceed?")) {
                api.delete(id)
                    .then((response)=>{
                        this.customers.splice(index, 1);
                    })
                    .catch((e)=>{
                        console.log(e)
                    });
            }
        }

    }
}
</script>
