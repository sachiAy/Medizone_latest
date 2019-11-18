<template>
    <div>
        <v-btn
        rounded
        color="primary"
        dark
        v-for="link in links"
        :key="link.text"
        route
        :to="link.route"
        >{{ link.text }}</v-btn>
    </div>
</template>

<script>
export default {
    data() {
        return {
            links: [
                { text: "Add a Doctor", route: "SignIn" },

            ]
           
        }
    },

}
</script>