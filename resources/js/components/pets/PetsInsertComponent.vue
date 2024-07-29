<template>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <form v-on:submit.prevent="submit">
                        <div class="form-group row">
                            <label for="name" class="col-sm-8 col-form-label">Name1</label>
                            <input type="text" class="col-sm-9 form-control" id="name" v-model="pet.name">
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-8 col-form-label">f_cost</label>
                            <input type="text" class="col-sm-9 form-control" id="f_cost" v-model="pet.f_cost">
                        </div>
                        <div class="form-group row">
                            <label for="category" class="col-sm-8 col-form-label">Category1</label>
                            <input type="text" class="col-sm-9 form-control" id="category" v-model="pet.category">
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Description</label>
                            <input type="text" class="col-sm-9 form-control" id="description" v-model="pet.description">
                        </div>
                        <div class="form-group row">
                            <label for="size" class="col-sm-3 col-form-label">Size</label>
                            <input type="text" class="col-sm-9 form-control" id="size" v-model="pet.size">
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-8 col-form-label">caution_flg</label>
                            <input type="text" class="col-sm-9 form-control" id="caution_flg" v-model="pet.caution_flg">
                        </div>
                        <div class="form-group row">
                            <label for="size" class="col-sm-8 col-form-label">np_flg</label>
                            <input type="text" class="col-sm-9 form-control" id="np_flg" v-model="pet.np_flg">
                        </div>
                        <div class="form-group row">
                            <label for="size" class="col-sm-8 col-form-label">Display_flg</label>
                            <input type="text" class="col-sm-9 form-control" id="display"  v-model="pet.display">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <!-- 表を追加する -->
                <div class="col-sm-6">
                    <h3>category_list</h3>
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Category</th>
                                <th scope="col">Pyhylum</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(category, index) in categories" :key="index">
                                <td>{{ category.category }}</td>
                                <td>{{ category.phylum }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</template>
    
<script>
import axios from 'axios';
export default {
    data: function (){
        return {
            pet: {},
            categories: [] 
        }
    },
    methods: {
        submit() {
            console.log('pet data:', this.pet); // デバッグ用のログ
            axios.post('/api/pets', this.pet).then((res) => {
                console.log('pet data:', this.pet); // デバッグ用のログ
                this.$router.push({ name: 'pet.list' });
            })
            .catch((error) => {
                if (error.response && error.response.status === 422) {
                    console.error('Validation errors:', error.response.data);
                } else {
                    console.error('Error submitting pet:', error);
                }
            });
        },
        getCategories(){
            axios.get('/api/categories').then((res) => {
                this.categories = res.data;
                console.log(this.categories);
            })
            .catch((error) => {
                console.error('Error fetching categories: error');
            });
        }
    },
    mounted(){
        this.getCategories();
    }
}
</script>
    