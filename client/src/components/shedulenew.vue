<template>
<div class="shedule">
   

    <v-card> <v-toolbar-title>Weekly shedule</v-toolbar-title>
        
     
      <v-banner single-line>weekly shedule</v-banner>
      <v-card-text class="light-blue darken-3"></v-card-text>
    </v-card>
     <v-parallax src="../assets/backgroundA.jpg" max-height="1000" height='100%'>
     
      <v-container >
        <v-spacer></v-spacer>
         </v-container>
      <section class="our-webcoderskull padding-lg">
          <div>
        <ul class="row">
          <li class="col-sm-4" v-for="item in items" :key="item.clinic_id">
            <router-link :to="{ name: 'scheduleProfile', params: { id:item.clinic_id}}">
            <div class="cnt-block equal-hight" style="height: 349px;" >
             
              <h3>{{ item.dr_id }} {{ item.clinic_id }}</h3>
              <p>{{ item.name}}</p>
              <ul class="follow-us clearfix"></ul>
            </div>
            </router-link>
          </li>
        </ul>
      </div>
    </section>
  </v-parallax>
        
    
  </div>
</template>
<script>
import Datepicker from 'vuejs-datepicker';
  export default {
     data(){
       return {
        items:{},

     }
    } ,
 
// methods: {
//    showclinic(){
//         // this.$id = this.$route.params.id
//         //console.log(this.$route.params.id);
//        axios.get("http://localhost:8000/api/showclinics/"+this.$route.params.id)
//        .then(response=>{
//          console.log(response);
//         this.items=response.data.clinics;
//         //console.log(this.items)

//        })
//        }
// },

mounted(){

   axios.get("http://localhost:8000/api/showclinics/"+this.$route.params.id)
       .then(response=>{
         console.log(response.data.clinics);
        this.items=response.data.clinics;
        //console.log(this.items)

       })

         axios.get("http://localhost:8000/api/viewDoctorDetails/"+this.$route.params.id)
      .then(response=> {
        //console.log(response);
        this.users=response.data.doctors;
      })

}
  }
  
</script>