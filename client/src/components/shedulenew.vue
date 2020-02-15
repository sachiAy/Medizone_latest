<template>
<div class="shedule">
   

    <v-card>
        <v-toolbar-title>Weekly shedule {{items.clinic_id}}</v-toolbar-title>
        
     
      <v-banner single-line>weekly shedule</v-banner>
      <v-card-text class="light-blue darken-3"></v-card-text>
    </v-card>
     <v-parallax src="../assets/backgroundA.jpg" max-height="1000" height='100%'>
     
      <v-container >
        <v-spacer></v-spacer>
      <v-card class="container" elevation="12" max-width="1500" max-height="800" outlined>
      <v-flex justify-top>
           <table style="width:100%">
  <tr>
    <th>clinic name</th>
          <th>
            
        <v-menu
        v-model="menu1"
        :close-on-content-click="false"
        :nudge-right="40"
        transition="scale-transition"
        offset-y
        min-width="290px"
      >
        <template v-slot:activator="{ on }">
          <v-text-field
            v-model="date1"
            label="Monday"
            prepend-icon="event"
            readonly
            v-on="on"
          ></v-text-field>
        </template>
        <v-date-picker v-model="date1" @input="menu1 = false"></v-date-picker>
        </v-menu>
  

          </th>
          <th>
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
            v-model="date2"
            label="Tuesday"
            prepend-icon="event"
            readonly
            v-on="on"
          ></v-text-field>
        </template>
        <v-date-picker v-model="date2" @input="menu2 = false"></v-date-picker>
        </v-menu>
          </th>
          <th>
            <v-menu
        v-model="menu3"
        :close-on-content-click="false"
        :nudge-right="40"
        transition="scale-transition"
        offset-y
        min-width="290px"
      >
        <template v-slot:activator="{ on }">
          <v-text-field
            v-model="date3"
            label="Wednesday"
            prepend-icon="event"
            readonly
            v-on="on"
          ></v-text-field>
        </template>
        <v-date-picker v-model="date3" @input="menu3 = false"></v-date-picker>
        </v-menu>
          </th>
          <th>
            <v-menu
        v-model="menu4"
        :close-on-content-click="false"
        :nudge-right="40"
        transition="scale-transition"
        offset-y
        min-width="290px"
      >
        <template v-slot:activator="{ on }">
          <v-text-field
            v-model="date4"
            label="Thursday"
            prepend-icon="event"
            readonly
            v-on="on"
          ></v-text-field>
        </template>
        <v-date-picker v-model="date4" @input="menu4 = false"></v-date-picker>
        </v-menu>
          </th>
          <th>
            <v-menu
        v-model="menu5"
        :close-on-content-click="false"
        :nudge-right="40"
        transition="scale-transition"
        offset-y
        min-width="290px"
      >
        <template v-slot:activator="{ on }">
          <v-text-field
            v-model="date5"
            label="Friday"
            prepend-icon="event"
            readonly
            v-on="on"
          ></v-text-field>
        </template>
        <v-date-picker v-model="date5" @input="menu5 = false"></v-date-picker>
        </v-menu>
          </th>
          <th>
            <v-menu
        v-model="menu6"
        :close-on-content-click="false"
        :nudge-right="40"
        transition="scale-transition"
        offset-y
        min-width="290px"
      >
        <template v-slot:activator="{ on }">
          <v-text-field
            v-model="date6"
            label="Saturday"
            prepend-icon="event"
            readonly
            v-on="on"
          ></v-text-field>
        </template>
        <v-date-picker v-model="date6" @input="menu6 = false"></v-date-picker>
        </v-menu>
          </th>
          <th>
            <v-menu
        v-model="menu7"
        :close-on-content-click="false"
        :nudge-right="40"
        transition="scale-transition"
        offset-y
        min-width="290px"
      >
        <template v-slot:activator="{ on }">
          <v-text-field
            v-model="date7"
            label="Sunday"
            prepend-icon="event"
            readonly
            v-on="on"
          ></v-text-field>
        </template>
        <v-date-picker v-model="date7" @input="menu7 = false"></v-date-picker>
        </v-menu>
          </th>
      
  </tr>
 
</table>
 <v-btn color="primary" class="mr-4" @click="showclinic()">showclinic</v-btn>
           </v-flex>
        </v-card>
         </v-container>
         </v-parallax>
        
    
  </div>
</template>
<script>
import Datepicker from 'vuejs-datepicker';
  export default {
     data: () => (
       {
          items:'',
       },
       {
      date1: new Date().toISOString().substr(0, 10),
      menu1: false,
    },
    {
      date2: new Date().toISOString().substr(0, 10),
      menu2: false,
    },
    {
      date3: new Date().toISOString().substr(0, 10),
      menu3: false,
    },
    {
      date4: new Date().toISOString().substr(0, 10),
      menu4: false,
    },
    {
      date5: new Date().toISOString().substr(0, 10),
      menu5: false,
    },
    {
      date6: new Date().toISOString().substr(0, 10),
      menu6: false,
    },
    {
      date7: new Date().toISOString().substr(0, 10),
      menu7: false,
    }
   
),
methods: {
   showclinic(){
        // this.$id = this.$route.params.id
        console.log(this.$route.params.id);
       axios.get("http://localhost:8000/api/showclinics/"+this.$route.params.id)
       .then(response=>{
         console.log(response);
        this.items=response.data.clinics;
        //console.log(this.clinics)

       })
       }
}
  }
  
</script>