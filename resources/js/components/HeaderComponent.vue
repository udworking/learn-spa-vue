<template>
    <div class="container-fluid bg-dark mb-3">
        <div class="container">
            <nav class="navbar navbar-dark">
                <span class="navbar-brand mb-0 h1">Vue laravel SPA</span>
                <div>
                    <!-- <router-link v-bind:to="{name: 'task.list'}">
                        <button class="btn btn-success">List</button>
                    </router-link>
                    <router-link v-bind:to="{name: 'task.insert'}">
                        <button class="btn btn-success">ADD</button>
                    </router-link> -->
                    <router-link v-bind:to="{name: 'pet.list'}">
                        <button class="btn btn-success">Pets</button>
                    </router-link>
                    <router-link v-bind:to="{name: 'pet.insert'}">
                        <button class="btn btn-success">Add</button>
                    </router-link>
                    <router-link v-bind:to="{name: 'select_top'}">
                        <button class="btn btn-success">Select_Top</button>
                    </router-link>
                    <router-link v-bind:to="{name: 'select.add_f'}">
                        <button class="btn btn-success">Add New F</button>
                    </router-link>
                </div>
            </nav>
        </div>
    </div>
</template>

<script>
    export default {}
</script>