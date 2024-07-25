<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form>
                    <div class="form-group row border-bottom">
                        <label for="id" class="col-sm-3 col-form-label">ID</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control-plaintext" readonly id="id" v-model="task.id">
                        </div>
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="title" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control-plaintext" readonly id="title" v-model="task.title">
                        </div>
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="content" class="col-sm-3 col-form-label">Content</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control-plaintext" readonly id="content" v-model="task.content">
                        </div>
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="person-in-charge" class="col-sm-3 col-form-label">Person In Charge</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control-plaintext" readonly id="person-in-charge" v-model="task.person_in_charge">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    props: {
        taskId: String
    },
    data() {
        return {
            task: {}
        };
    },
    methods: {
        getTask() {
            axios.get(`/api/tasks/${this.taskId}`)
                .then((res) => {
                    this.task = res.data;
                })
                .catch((error) => {
                    console.error('Error fetching task:', error);
                });
        }
    },
    mounted() {
        this.getTask();
    }
}
</script>
