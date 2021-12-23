<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ slug }}</div>

                    <div class="card-body">
                        <img v-bind:src="avatar" width="50" />
                        {{ name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["name", "slug", "avatar"],
};
</script>
