<template>
    <div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Users</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <button class="btn btn-sm btn-outline-secondary" @click="getUsers('')">Reset sorting</button>
                    <button class="btn btn-sm btn-outline-secondary" @click="getUsers('?sort=first_name')">Sort by name</button>
                    <button class="btn btn-sm btn-outline-secondary" @click="getUsers('?sort=surname')">Sort by surnname</button>
                    <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#addUserModal">Add new</button>
                </div>
            </div>
        </div>

    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>Please note!</strong> Because of the dynamic nature of the attributes, only the core user details
        are required when creating an account. New attributes may be added from the edit menu.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        <div v-if="loaded" class="row">
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <input type="text" class="form-control" placeholder="Type to filter results. This is case sensitive" v-model="filter"> 
                    </div>
                </div>
            </div>
            <user-card v-for="user in users" v-bind:key="user.id" 
                v-if="show(user.first_name, user.surname)"
                :uid="user.id"
                :firstName="user.first_name" 
                :surname="user.surname" 
                :email="user.email" 
                :dob="user.date_of_birth"
                :attributes="user.attributes"
                ></user-card>
        </div>
        <div v-else class="card card-body card-text text-center">
            Loading users...
        </div>
        <add-user-modal></add-user-modal>
        <!-- <delete-user-modal></delete-user-modal> -->
    </div>
</template>
<script>
export default {
    data(){
        return {
            loaded: null,
            users: [],
            filter: '' 
        }
    },
    methods: {
        getUsers(sort=''){
            let $this = this;
            $this.loaded = false;
            axios.get(`/api/users${sort}`)
            .then(res => {
                $this.users = res.data;
                $this.loaded = true;
            })
            .catch(err => console.log(err))
        },
        show(fname, surname){
            if(this.filter == ''){
                return true;
            } else if(fname.indexOf(this.filter) >= 0 || surname.indexOf(this.filter) >= 0){
                return true;
            }
        }
    },
    created(){
        this.getUsers();
    },
    components: {
        'user-card' : require('./userCard.vue'),
        'add-user-modal' : require('./addUserModal.vue'),
    }
}
</script>
