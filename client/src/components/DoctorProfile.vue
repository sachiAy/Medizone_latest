<template>
  <section class="our-webcoderskull padding-lg">
    <div class="container">
      <div class="cnt-block equal-hight">
        <h1>{{doctors.reg_no}}</h1> 
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
             
                <h2>{{doctors.first_name}}</h2>
         
           
             
              <p>{{doctors.specialty}}</p>
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
         
           doctors:"",
            headerLinks: [
                { text: "Channel", route: "Channel" },
            ]
        }
    },
  
   
    mounted(){
       let token = localStorage.getItem('token');
          if(!token){
        this.$router.push('/SignIn');
      }
       axios.get("http://localhost:8000/api/showDoctor/"+token)
       .then(response=>{
        this.doctors=response.data.doctors;
       })
   
      
    },
    

}
</script>