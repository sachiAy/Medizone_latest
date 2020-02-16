
<template>
  
   <div v-if="isDoctor">schedule profile

     <v-card> <v-toolbar-title>Weekly shedule</v-toolbar-title>
        
     
      <v-banner single-line>weekly shedule</v-banner>
      <v-card-text class="light-blue darken-3"></v-card-text>
    </v-card>
     <v-parallax src="../assets/backgroundA.jpg" max-height="1000" height='100%'>
     
      <v-container >
        <v-spacer></v-spacer>
      <v-card class="container" elevation="12" max-width="1500" max-height="800" outlined>
      <v-flex justify-top>

         <v-form  class="my-2 mx-5" ref="form" @submit.prevent="submitForm">
     <v-row>
    <v-col cols="12" sm="4" md="4">
        <v-menu
        v-model="menu2"
        :close-on-content-click="false"
        :nudge-right="40"
        transition="scale-transition"
        offset-y
        min-width="290px"
      >
        <template v-slot:activator="{ on }">
          <v-text-field
            v-model="schedule.date"
            label="Monday"
            prepend-icon="event"
            
            v-on="on"
          ></v-text-field>
        </template>
        <v-date-picker :value="date" v-model="schedule.date" @input="menu2 = false"></v-date-picker>
        </v-menu>
    </v-col>
    <v-col cols="12" sm="4" md="4">
    <v-text-field :value="time" v-model="schedule.time" label="Appointment time"></v-text-field>
   </v-col>
    <v-col cols="12" sm="4" md="4">
   <v-btn  type="submit" color="primary" class="mr-4" v-if="isDoctor">Submit</v-btn>
    </v-col>
     </v-row>
      </v-form>
     </v-flex>
        </v-card>
         </v-container>
     </v-parallax>
    </div>
</template>

<script>

  export default {

    data(){
      return {
        date: new Date().toISOString().substr(0, 10),
        menu2: false,

        schedule:{
            dr_id:"",
            clinic_id:"",
            date: new Date().toISOString().substr(0, 10),
            time:""
        },
         isDoctor: false,
   
      }
    },
    created(){

       Event.$on("isDoctor", () => {
      this.isDoctor = true;
    });

       Event.$on("logout", () => {
       this.isDoctor = false;
     });

    let token = localStorage.getItem("token");
    if (token) {
      axios
        .get("http://localhost:8000/api/isDoctor?api_token=" + token)
        .then(response => {
          if (response.data.status == "true") {
            this.isDoctor = true;
            Event.$emit('isDoctor');
          }
        });
    }
    },
   
mounted(){
       let token = localStorage.getItem('token');
       axios.get("http://localhost:8000/api/showDoctor/"+token)
       .then(response=>{
        // let dr_id=response.data.doctors.dr_id;
        // localStorage.setItem('dr_id',dr_id);
         //console.log(dr_id);
       })
   
      
    },
   methods:{
           
            submitForm(){

              let c_id=this.$route.params.id;
                 localStorage.setItem('c_id',c_id);
               
                let dr_id = localStorage.getItem('dr_id');
                this.schedule.dr_id=dr_id;
                this.schedule.clinic_id=this.$route.params.id;

                //  console.log(this.schedule.dr_id);
                //  console.log(this.schedule.clinic_id);
                //   console.log(this.schedule.date);
                // console.log(this.schedule.time);
               axios.post("http://localhost:8000/api/postshedule",this.schedule)
                  .then(response=>{
                      console.log(response);
                  })
                }
      
                

            
        }
  }
</script>