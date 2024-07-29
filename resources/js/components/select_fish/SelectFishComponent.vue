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
                    <td>{{ fish.category_name }}</td>
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
                        <button class="btn btn-danger" v-on:click="deletefish(fish.id)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
    import axios from 'axios';
    export default {
        data: function () {
            return {
                fishsAll: [],
                fishs: []
            }
        },
        methods: {
            getfishs() {
                axios.get('/api/select_mode')
                    .then((res) => {
                        this.fishsAll = res.data;
                        this.fishs = this.fishsAll.trans_category_name || [];
                        console.log(this.fishs);
                    })
                    .catch((error) => {
                        console.error('Error fetching fish data:', error);
                    });
            },
            deletefish(id) {
                axios.delete('/api/select_mode/' + id)
                    .then((res) => {
                        this.getfishs();
                    })
                    .catch((error) => {
                        console.error('Error deleting fish:', error);
                    });
                }
            },
        mounted(){
            this.getfishs();
        }
    }
</script>
