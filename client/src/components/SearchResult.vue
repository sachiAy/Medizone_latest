<template>
    <div>
        <h1>Search Results</h1>
       <v-btn
              rounded
              color="primary"
              dark
              v-for="link in headerLinks"
              :key="link.text"
              router
              :to="link.route"
            >Channel</v-btn>
    </div>
</template>

<script>
export default {
    data(){
        return {
            flat: true,
            bg: true,
            drawer: null,
            model: null,
            
            headerLinks: [
                { text: "Channel", route: "Channel" },
            ]
        }
    }
    
}
</script>