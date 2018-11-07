<template>
    <div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Attributes</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#addAttributeModal">Add new</button>
                </div>
            </div>
        </div>
        <div v-if="loaded" class=" card table-responsive">
            <table v-if="attributes.length > 0" class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Name</th>
                        <th>Date added</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="attribute in attributes" v-bind:key='attribute.id'>
                        <td>{{ attribute.id }}</td>
                        <td>{{ attribute.name }}</td>
                        <td>{{ new Date(attribute.created_at).toDateString() }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a :href="`/attribute/${attribute.id}/edit`" class="btn btn-outline-secondary">Edit</a>
                                <button class="btn btn-outline-danger" @click="openDeleteDialog(attribute.id)">Delete</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div v-else class="alert alert-info">
                No attributes stored in the database. Click <a href="#" data-toggle="modal" data-target="#addAttributeModal">here</a> to add a new attribute.
            </div>
        </div>
        <div v-else>
            <div class="card card-body card-text text-center">Loading attributes...</div>
        </div>
        <add-attribute-modal></add-attribute-modal>
        <delete-attribute-modal :att_id="selected"></delete-attribute-modal>
    </div>
</template>
<script>
export default {
    data(){
        return {
            loaded: false,
            attributes: [],
            selected: "" 
        }
    },
    methods: {
        getAttributes(){
            let $this = this;
            axios.get('/api/attributes/')
            .then(res => {
                $this.attributes = res.data
                $this.loaded = true;
            })
            .catch(err => console.log(err));
        },
        openDeleteDialog(att_id){
            this.selected = att_id;
            $('#deleteAttributeModal').modal();
        }
    },
    created(){
        this.getAttributes();
    },
    components: {
        'add-attribute-modal': require("./addAttributeModal.vue"),
        'delete-attribute-modal': require("./deleteAttributeModal.vue")
    }
}
</script>
