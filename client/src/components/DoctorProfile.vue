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
              <li>
                <router-link :to="{name:'shedulenew',params:{id:doctors.dr_id}}">
                <v-btn rounded color="primary" class="mr-4">
                  shedule
                </v-btn>
                </router-link>
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

  <v-parallax src="../assets/backgroundA.jpg" max-height="1000" height="100%">
    <v-card :loading="loading" class="mx-auto my-12 container" max-width="1000">
      <v-img
        height="400"
        src="https://image.freepik.com/free-psd/close-up-tablet-held-by-doctor_23-2148316916.jpg"
      ></v-img>

      <v-card-title>{{users.first_name}} {{users.last_name}}</v-card-title>

      <v-card-text>
        <v-row align="center" class="mx-0">
          <v-rating :value="4.5" color="amber" dense half-increments readonly size="14"></v-rating>

          <div class="grey--text ml-4">4.5 (413)</div>
        </v-row>

        <div>Small plates, salads & sandwiches - an intimate setting with 12 indoor seats plus patio seating.</div>
      </v-card-text>

      <v-divider class="mx-4"></v-divider>

      <v-card-title>
        <v-card-actions>
          <ul>
            <li>
              <v-btn color="blue lighten-2">Update Details</v-btn>
              <v-btn color="blue lighten-2">Appointment Schedule</v-btn>
              <v-btn color="blue lighten-2">Add Experiments</v-btn>
            </li>
          </ul>
        </v-card-actions>
      </v-card-title>
    </v-card>
  </v-parallax>

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
       axios.get("http://localhost:8000/api/showDoctor/"+token)
       .then(response=>{
        this.doctors=response.data.doctors;
       })
   
      
    },
    methods: {
    getdrID(){
       let token = localStorage.getItem('token');
       axios.get("http://localhost:8000/api/getDoctorID/"+token)
       .then(response=>{
        this.doctorsid=response.data.doctors.dr_id;
        console.log(this.doctorsid)
       })
    }

    }, 
    

  data() {
    return {
      users: "",
      headerLinks: [{ text: "Channel", route: "Channel" }]
    };
  },


  mounted() {
    let token = localStorage.getItem("token");
    if (!token) {
      this.$router.push("/SignIn");
    } else {
      axios
        .get("http://localhost:8000/api/showDoctor/" + token)
        .then(response => {
          this.users = response.data.doctors;
          Event.$emit("userLoaded", this.users);
        });
    }
  }
};
</script>