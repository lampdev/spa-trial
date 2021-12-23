<template>
    <div>Authors:</div>
    <one-author
        v-for="author in authors"
        :name="author.name"
        :slug="author.slug"
        :avatar="author.avatar"
    >
    </one-author>
</template>

<script>
import OneAuthor from "../components/OneAuthor.vue";

export default {
    components: { OneAuthor },
    name: "Authors",
    data() {
        return {
            authors: null,
        };
    },
    mounted() {
        this.getPosts();
    },
    methods: {
        getPosts() {
            axios
                .get("/api/author")
                .then(({ data }) => {
                    this.authors = data.authors;
                })
                .catch((error) => {
                    console.log("error: ", error);
                });
        },
    },
};
</script>
