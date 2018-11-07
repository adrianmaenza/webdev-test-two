<template>
    <div class="row">
        <div class="col-4">
            <input class="form-control" v-model="day" type="text" name="day" placeholder="DD" required>
        </div>
        <div class="col-4">
            <input class="form-control" v-model="month" type="text" name="month" placeholder="MM" required>
        </div>
        <div class="col-4">
            <input class="form-control" v-model="year" type="text" name="year" placeholder="YYYY" required>
        </div>
        <input type="hidden" name="date_of_birth" v-model="dob">
    </div>
</template>
<script>
export default {
    data(){
        return {
            day: "",
            month: "",
            year: ""
        }
    },
    props: [
        'date_of_birth'
    ],
    computed: {
        dob(){
            return `${this.year}-${this.month}-${this.day}`;
        }
    },
    methods: {
        setUp(){
            if(this.date_of_birth != null){
                let dob = new Date(this.date_of_birth);
                this.day = dob.getDate();
                // plus one as it uses zero based index
                this.month = dob.getMonth() + 1;
                this.year = dob.getFullYear();
            } 
        }
    },
    created(){
        this.setUp();
    }
}
</script>

