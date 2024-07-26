<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form v-on:submit.prevent="submit">
                    <div class="form-group row">
                        <label for="title" class="col-sm-4 col-form-label">TItle</label>
                        <input type="text" class="col-sm-9 form-control" id="title"  v-model="task.title">
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-sm-4 col-form-label">Content</label>
                        <input type="text" class="col-sm-9 form-control" id="content"  v-model="task.content">
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-sm-4 col-form-label">Person In Charge</label>
                        <input type="text" class="col-sm-9 form-control" id="person_in_charge"  v-model="task.person_in_charge">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
   data: function (){
       return {
           task: {}
       }
   },
   methods: {
    submit() {
            axios.post('/api/tasks', this.task).then((res) => {
                    console.log('Task data:', this.task); // デバッグ用のログ
                    this.$router.push({ name: 'task.list' });
                })
                .catch((error) => {
                    console.error('Error submitting task:', error);
                });
        }
   }
}
</script>

