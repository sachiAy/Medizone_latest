<template>
  <div>
   <v-btn
              rounded
              color="primary"
              dark
              v-for="link in links"
              :key="link.text"
              router
              :to="link.route"
            >{{link.text}}</v-btn>
    </div>
</template>

<script>
//import NavBar from "./NavBar"

export default {

    data(){
        return{
            links: [
                { text: "SignIn", route: "SignIn" },
                { text: "Guest", route: "Appoinment" },
                
            ]
        }
    }
}
</script>