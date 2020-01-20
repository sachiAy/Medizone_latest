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
              <h3>{{username}}</h3>
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
               <v-btn 
                   rounded
                  color="primary"
                  dark
                  @click="hello"
                  >logout</v-btn>
            
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
  
   
    mounted(){
       if(!token) {
				  this.$router.push('/SignIn');
			  }
     
      
    },
    

}
</script>