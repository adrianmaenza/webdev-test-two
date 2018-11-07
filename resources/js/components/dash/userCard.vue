<template>
    
    <div class="col-sm-6 col-lg-4">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">{{ firstName }} {{ surname }}</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex"><strong>Date of birth</strong>: <span class="ml-auto">{{ new Date(dob).toDateString() }}</span></li>
                <li class="list-group-item d-flex"><strong>Age</strong>: <span class="ml-auto">{{ age }}</span></li>
                <li 
                    v-for="attribute in attributes" 
                    v-bind:key="attribute.id"
                    class="list-group-item d-flex">
                    <strong>{{ attribute.name }}</strong>: <span class="ml-auto">{{ attribute.pivot.value }}</span></li>
            </ul>
            <div class="card-footer btn-group justify-conent-between">
                <a :href="`/user/${uid}/edit`" class="btn btn-outline-primary btn-sm">Edit</a><a :href="`/user/${uid}/delete/`" class="btn btn-outline-danger btn-sm">Delete</a>
            </div>
        </div>
    </div>
    
    
</template>
<script>
import $ from 'jquery'
export default {
    data(){
        return {
            
        }
    },
    props: [
        'firstName',
        'surname',
        'email',
        'dob',
        'uid',
        'attributes'
    ],
    computed: {
        
        age(){
            let today = new Date();
            let dob = new Date(this.dob);

            let age = (today - dob) / (1000 * 60 * 60 * 24 * 365);

            return Math.floor(age);
        }
    },
    components: {
        'delete-user-modal' : require('./deleteUserModal.vue'),
    }
    
}
</script>

