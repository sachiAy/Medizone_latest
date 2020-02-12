<template>
  <section class="our-webcoderskull padding-lg">
    <div class="container">
      <div class="row heading heading-icon">
        <h1>{{$route.params.dr_id}}</h1> 
      </div>
      <div>
      
         
            <div class="cnt-block equal-hight" style="height: 349px;"
             v-for="doctor in doctors"
              :key="doctor.id"
            >
              <figure>
                <img
                  src="../assets/doctors.jpg"
                  class="img-responsive"
                  alt=""
                />
              </figure>
           <h2>{{doctor.dr_id}}</h2>
             
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
         
           doctors:[
            { id:"13"}
           ],
            headerLinks: [
                { text: "Channel", route: "Channel" },
            ]
        }
    },
  
   
    mounted(){
       let token = localStorage.getItem('token');
       //console.log(token);
       axios.get("http://localhost:8000/api/showDoctor/"+token)
       .then(response=>{
        response.data.doctors.dr_id;
        // console.log(response.data.doctors.dr_id);
       })
      if(!token){
        this.$router.push('/SignIn');
      }
      
    },
    

}
</script>