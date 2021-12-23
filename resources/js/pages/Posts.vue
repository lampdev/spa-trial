<template>
    <div>Posts:</div>
    <div class="search-bar">
        <form>
            <input
                @input="searchText()"
                v-model="search.text"
                type="text"
                placeholder="Search"
            />
        </form>
    </div>

    <one-post
        v-for="post in posts"
        :title="post.title"
        :slug="post.slug"
        :emoji="post.emoji"
        :categories="post.category"
        :medias="post.media"
        :contents="post.content"
    >
    </one-post>
</template>

<script>
import OnePost from "../components/OnePost.vue";

export default {
    components: { OnePost },
    name: "Posts",
    data() {
        return {
            posts: null,
            search: { filter: null, text: "" },
        };
    },
    mounted() {
        this.getPosts();
    },
    methods: {
        getPosts() {
            axios
                .get("/api/posts")
                .then(({ data }) => {
                    this.posts = data.posts;
                })
                .catch((error) => {
                    console.log("error: ", error);
                });
        },
        searchText() {
            var inside = this;
            this.posts = this.posts.filter(function (post) {
                if (
                    post.title
                        .toLowerCase()
                        .indexOf(inside.search.text.toLowerCase()) != "-1"
                ) {
                    return post;
                }
            });
            if (this.search.text === "") {
                this.getPosts();
            }
        },
    },
};
</script>
