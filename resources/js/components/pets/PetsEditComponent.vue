 <template>
         <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <form v-on:submit.prevent="submit">
                        <div class="form-group row">
                            <label for="id" class="col-sm-3 col-form-label">ID</label>
                            <input type="text" class="col-sm-9 form-control-plaintext" readonly id="id" v-bind:value="petId">
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <input type="text" class="col-sm-9 form-control" id="name" v-model="pet.name">
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-8 col-form-label">f_cost</label>
                            <input type="text" class="col-sm-9 form-control" id="name" v-model="pet.f_cost">
                        </div>
                        <div class="form-group row">
                            <label for="category" class="col-sm-3 col-form-label">Category</label>
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
                            <input type="text" class="col-sm-9 form-control" id="display" v-model="pet.display_flg">
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
             props: {
                 petId: String
             },
             data: function() {
                return {
                    pet: {}
                }
             },
             methods: {
                getPets() {
                    axios.get('/api/pets/' + this.petId).then((res) => {
                        this.pet = res.data;
                    });
                },
                submit() {
                    axios.put('/api/pets/' + this.petId, this.pet).then((res) => {
                        this.$router.push({name: 'pet.list'})
                        console.log('pet data:', this.pet); 
                    });
                }
             },
             mounted() {
                this.getPets();
             }
        }
     </script>
    