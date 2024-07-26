<template>
    <div class="container">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">Size</th>
                    <th scope="col">Select</th>
                    <th scope="col">Edit</th>
                    <th scope="col" style="visibility: hidden;">Cost</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(fish, index) in fishs" :key="index">
                    <th scope="row">{{ fish.id }}</th>
                    <td>{{ fish.name }}</td>
                    <td>{{ fish.category }}</td>
                    <td>{{ fish.description }}</td>
                    <td>{{ fish.size }}</td>
                    <td>
                        <router-link v-bind:to="{name: 'select_mode.detail', params: {fishId: fish.id }}">
                            <button class="btn btn-primary">Show</button>
                        </router-link>
                    </td>
                   <td>
                        <router-link v-bind:to="{name: 'select_mode.update', params: {fishId: fish.id }}">
                            <button class="btn btn-success">Edit</button>
                        </router-link>
                    </td>
                    <td>
                        <button class="btn btn-danger" v-on:click="deleteTask(fish.id)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
    import axios from 'axios';
    export default{
        data: function () {
            return {
                fishs: []
            }
        },
        methods: {
            getfishs() {
                axios.get('api/select_mode').then((res) => {
                    this.fishs = res.data;
                });
            }
        },
        mounted(){
            this.getfishs();
        }
    }
</script>