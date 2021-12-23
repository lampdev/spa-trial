<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <!-- for non-logged user-->
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link">
                        Posts
                    </router-link>
                    <router-link to="/authors" class="nav-item nav-link">
                        Authors
                    </router-link>
                </div>
            </div>
        </nav>
        <br />
        <router-view />
    </div>
</template>

<script>
export default {
    name: "App",
    data() {
        return {};
    },
    created() {},
    methods: {},
};
</script>
