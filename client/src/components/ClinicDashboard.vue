<template>
  <section class="our-webcoderskull padding-lg">
    <div class="container">
      <div class="row heading heading-icon">
        <h2>Clinic Dashboard</h2>
        <ul class="row">
              <li class="col">
                         <v-btn
                            rounded
                            color="primary"
                            dark
                            v-for="link in links"
                            :key="link.text"
                            route
                            :to="link.route"
                            >{{ link.text }}</v-btn>
                    </li>
        </ul>
      
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
            </div>
            <div>
                <ul class="row">
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
    </div>
  </section>
</template>
   

<script>
export default {
    data(){
        return{
            items: [
                
            ],
            links: [
                { text: "Add a Doctor", route: "SignIn" },

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

