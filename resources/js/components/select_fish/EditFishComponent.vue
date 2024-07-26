 <template>
         <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <form v-on:submit.prevent="submit">
                        <div class="form-group row">
                            <label for="id" class="col-sm-3 col-form-label">ID</label>
                            <input type="text" class="col-sm-9 form-control-plaintext" readonly id="id" v-bind:value="fishId">
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <input type="text" class="col-sm-9 form-control" id="name" v-model="fish.name">
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-8 col-form-label">f_cost</label>
                            <input type="text" class="col-sm-9 form-control" id="name" v-model="fish.f_cost">
                        </div>
                        <div class="form-group row">
                            <label for="category" class="col-sm-3 col-form-label">Category</label>
                            <input type="text" class="col-sm-9 form-control" id="category" v-model="fish.category">
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Description</label>
                            <input type="text" class="col-sm-9 form-control" id="description" v-model="fish.description">
                        </div>
                        <div class="form-group row">
                            <label for="size" class="col-sm-3 col-form-label">Size</label>
                            <input type="text" class="col-sm-9 form-control" id="size" v-model="fish.size">
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-8 col-form-label">caution_flg</label>
                            <input type="text" class="col-sm-9 form-control" id="caution_flg" v-model="fish.caution_flg">
                        </div>
                        <div class="form-group row">
                            <label for="size" class="col-sm-8 col-form-label">np_flg</label>
                            <input type="text" class="col-sm-9 form-control" id="np_flg" v-model = "fish.np_flg">
                        </div>
                        <div class="form-group row">
                            <label for="size" class="col-sm-8 col-form-label">Display_flg</label>
                            <input type="text" class="col-sm-9 form-control" id="display" v-model = "fish.display">
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
                 fishId: String
             },
             data: function(){
                return {
                    fish: {}
                }
             },
             methods: {
                getFish() {
                    axios.get('/api/select_mode/' + this.fishId).then((res) =>{
                        this.fish = res.data;
                    });
                },
                submit(){
                    console.log('fish data:', this.fish);
                    axios.put('/api/select_mode/' + this.fishId, this.fish).then((res) => {
                            console.log('fish data:', this.fish);    
                            this.$router.push({name: 'select_top'})
                        })
                        .catch((error) => {
                        if (error.response && error.response.status === 422) {
                            console.error('Validation errors:', error.response.data);
                        } else {
                            console.error('Error submitting fish:', error);
                        }
                    });
                }
            },
            mounted(){
                this.getFish();
            }
             
        }
     </script>
    