<template>
    <div>
        <h2>Update customer</h2>
        <div v-if="message" class="alert alert-primary" role="alert">{{message}}</div>
        <div v-if="errors" class="alert alert-danger" role="alert">
            <div v-for="error in errors">
                *{{ error[0] }}
            </div>
        </div>
        <form @submit.prevent="onSubmit($event)">
            <div class="field">
                <label class="label" for="first_name">First name</label>
                <input class="form-control" id="first_name" v-model="customer.first_name" required />
            </div>
            <div class="field">
                <label class="label" for="last_name">Last name</label>
                <input class="form-control" id="last_name" v-model="customer.last_name" required />
            </div>
            <div class="field">
                <label class="label" for="email">Email</label>
                <input class="form-control" id="email" v-model="customer.email" required />
            </div>
            <div class="field">
                <label class="label" for="address">Address</label>
                <input class="form-control" id="address" v-model="customer.address" />
            </div>
            <div class="field">
                <label class="label" for="gender">Gender</label>
                <select class="form-control" id="gender" v-model="customer.gender" required >
                    <option value="1">Male</option>
                    <option value="0">Female</option>
                </select>
            </div>
            <div class="field mt-2">
                <button class="btn btn-lg btn-primary btn-block" type="submit" :disabled="updating">
                    {{ updating ? 'Updating...' : 'Update' }}
                </button>
            </div>
        </form>
    </div>
</template>

<script>
    import api from '../customers_api';

    export default {
        data() {
            return {
                updating: false,
                message: false,
                errors: false,
                customer: {
                    id: null,
                    first_name: '',
                    last_name: '',
                    email: '',
                    address: '',
                    gender: ''
                }
            }
        },
        created() {
            let id = this.$route.params.id;
            this.loadCustomer(id)
        },
        methods: {
            loadCustomer(id){
                api.find(id)
                    .then((response)=>{
                        this.customer = response.data.data
                        console.log(response);
                    })
                    .catch((e)=>{
                        if (e.response.status === 404) {
                           return this.$router.push('*');
                        }
                    });
            },
            onSubmit($event) {
                this.errors = this.message = null;
                this.updating = true;
                api.update(this.customer.id, this.customer)
                    .then((response) => {
                        this.message = "User updated successfully"
                    })
                    .catch((e)=>{
                        this.errors = e.response.data.errors;
                    })
                    .then(() => this.updating = false)
            }
        }
    }
</script>
