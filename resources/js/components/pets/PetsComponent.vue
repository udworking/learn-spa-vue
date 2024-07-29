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
                    <th scope="col">Delete</th>
                    <th scope="col" style="visibility: hidden;">Cost</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(pet, index) in pets" :key="index">
                    <th scope="row">{{  pet.id }}</th>
                    <td>{{ pet.name }}</td>
                    <td>{{ pet.category_name }}</td>
                    <td>{{ pet.description }}</td>
                    <td>{{ pet.size }}</td>
                    <td>
                        <router-link v-bind:to="{name:'pet.detail', params: {petId: pet.id}}">
                            <button class="btn btn-primary">Detail</button>
                        </router-link>
                    </td>
                    <td>
                        <router-link v-bind:to="{name: 'pet.edit', params: {petId: pet.id}}">
                            <button class="btn btn-success">Edit</button>
                        </router-link>
                    </td>
                    <td>
                        <button class="btn btn-danger" v-on:click="deletePets(pet.id)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
    import axios from 'axios';
    export default {
        data:function(){
            return {
                pets: []
            }
        },
        methods: {
            getPets(){
                axios.get('api/pets').then((res)=> {
                    this.pets = res.data[0];
                    console.log(this.pets);
                })
                .catch((error) =>{
                    console.error('Error fetching fish data:' , error);
                });
            },
            deletePets(id) {
                axios.delete('api/pets/' + id).then((res) => {
                    this.getPets();
                });
            }
        },
        mounted(){
            this.getPets();
        }
    }
</script>
