<template>
  <section class="our-webcoderskull padding-lg">
    <div class="container">
      <div class="cnt-block equal-hight">
        <h1>{{patients.patient_id}}</h1> 
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
             
                <h2>{{patients.first_name}}</h2>
         
           
             
              <p>{{patients.username}}</p>
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
            </ul>
                
      </div>
    </div>
  </section>
</template>
   

<script>
export default {
    data(){
        return{
         
           patients:"",
            headerLinks: [
                { text: "Channel", route: "Channel" },
            ]
        }
    },
  
   
    mounted(){
       let token = localStorage.getItem('token');
       axios.get("http://localhost:8000/api/showPatient/"+token)
       .then(response=>{
        this.patients=response.data.patients;
       })
   
      
    },
    

}
</script>