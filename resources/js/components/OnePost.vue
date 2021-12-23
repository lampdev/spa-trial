<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ emoji }}{{ title }}</div>

                    <div class="card-body">
                        <div v-for="media in medias">
                            <img v-bind:src="media.url" width="300" />
                        </div>
                        <div v-for="content in contents">
                            {{ content.content }}
                        </div>
                    </div>
                    <div class="card-footer">
                        <div v-for="category in categories">
                            {{ category.name }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["title", "slug", "emoji", "categories", "medias", "contents"],
};
</script>
