<template>
    <div>
        <h1>Patient profile</h1>

        <v-btn 
    small 
    @click="logout"
    >logout</v-btn>
    </div>
</template>

<script>
export default {
    data(){
        return{}
    },
    beforeCreate: function() {
        if(!this.$session.exists()){
            this.$router.push('SignIn')
        }
    },

    methods: {
        logout(){
            this.$session.destroy()
            this.$router.push('SignIn')
        }
    }
}
</script>