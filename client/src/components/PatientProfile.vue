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
              <h3>Patient Name</h3>
              <p>Address</p>
            </div>
        <v-btn 
            small 
            @click="logout"
            >logout</v-btn>
      </div>
    </div>
  </section>
</template>
   

<script>
export default {
    data(){
        return{
            items: [
                
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