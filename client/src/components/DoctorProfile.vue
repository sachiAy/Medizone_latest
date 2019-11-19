<template>
  <section class="our-webcoderskull padding-lg">
    <div class="container">
      <div class="row heading heading-icon">
        <h2>Profile</h2>
      </div>
      <div>
      
         
            <div class="cnt-block equal-hight" style="height: 349px;">
              <figure>
                <img
                  src="../assets/doctors.jpg"
                  class="img-responsive"
                  alt=""
                />
              </figure>
              <h3>Doctor Name</h3>
              <p>Nawaloka Hospital Colombo</p>
            </div>
            <ul class="row">
              <li class="col">
                 <v-btn
              rounded
              color="primary"
              dark
              v-for="link in headerLinks"
              :key="link.text"
              router
              :to="link.route"
            >{{link.text}}</v-btn>
              </li>
              <li class="col">
                <v-btn 
                   rounded
                  color="primary"
                  dark
                  @click="logout"
                  >logout</v-btn>
              </li>
            </ul>
                
      </div>
    </div>
  </section>
</template>
   

<script>
export default {
    data(){
        return{
            items: [
                
            ],
            headerLinks: [
                { text: "Channel", route: "Channel" },
            ]
        }
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