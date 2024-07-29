<template>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <form>
                        <div class="form-group row border-bottom">
                            <label for="id" class="col-sm-3 col-form-label">No</label>
                            <input type="text" class="col-sm-9 form-control-plaintext" readonly id="id"v-bind:value="fishId">
                        </div>
                        <div class="form-group row border-bottom">
                            <label for="title" class="col-sm-3 col-form-label">Name</label>
                            <input type="text" class="col-sm-9 form-control-plaintext" readonly id="name" value="name name">
                        </div>
                        <div class="form-group row border-bottom">
                            <label for="content" class="col-sm-3 col-form-label">Size</label>
                            <input type="text" class="col-sm-9 form-control-plaintext" readonly id="size"value="size size">
                        </div>
                        <div class="form-group row border-bottom">
                            <label for="person-in-charge" class="col-sm-3 col-form-label">description</label>
                            <input type="text" class="col-sm-9 form-control-plaintext" readonly id="person-in-charge" value="description">
                        </div>
                        <div class="form-group row border-bottom">
                            <label for="person-in-charge" class="col-sm-3 col-form-label">category</label>
                            <input type="text" class="col-sm-9 form-control-plaintext" readonly id="person-in-charge" value="category">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </template>
    
    <script>
        export default {
            props: {
                fishId: String
            },
            data(){
                return{
                    fish:{}
                };
            },
            mounted(){
                this.fetchfishData();
            },
            methods: {
                fetchfishData(){
                    axios.get('api/select_mode/$(this.fishId})').then(response =>{
                        this.fish = response.data;
                    })
                    .catch(error => {
                        console.error('Error fetching fish data:', error);
                    });
                }
            }
        }
    </script>