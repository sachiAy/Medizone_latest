<template>
    <div>
        <v-card class="container">
            <v-card-title>
                Appointment Details
            </v-card-title>
            <v-card-body>
                 <v-simple-table height="300px">
        <template v-slot:default>
          <thead>
            <tr>
              <th class="text-left">Appointment ID</th>
              <th class="text-left">Clinic ID</th>
              <th class="text-left">Patient ID</th>
              <th class="text-left">NIC</th>
              <th class="text-left">Available Date</th>
              <th class="text-left">Available Time</th>      
              <th class="text-left">Add/Update Patient Schedule</th>           

            </tr>
          </thead>
          <tbody >
           
            <tr v-for="item in details" :key="item.dr_id"> 
              <td>{{ item.appointment_id }}</td>
              <td>{{ item.clinic_id }}</td>
              <td>{{ item.patient_id }}</td>
              <td>{{ item.NIC}}</td>
              <td>{{ item.appointment_date}}</td>
              <td>{{ item.appointment_time}}</td>

              <td>
                <v-btn color="deep-purple lighten-2" text>
                  <!-- <router-link :to="{ name: 'Channel', params: {sid:item.she_id}}"> -->
                     Add
                      <!-- </router-link> -->
                </v-btn>
               <v-btn color="deep-purple lighten-2" text>
                  <!-- <router-link :to="{ name: 'Channel', params: {sid:item.she_id}}"> -->
                      Update
                      <!-- </router-link> -->
                </v-btn>
              </td>
            </tr>
          
          </tbody>
        </template>
      </v-simple-table>

            </v-card-body>
        </v-card>
        
    </div>
</template>
<script>
export default {
    data(){
        return{
            doctor:{
                dr_id:""
            },
            details:"",

        }
    },

    mounted(){
    
       let token = localStorage.getItem('token');
       axios.get("http://localhost:8000/api/getDoctorID/"+token)
       .then(response=>{
        let dr_id=response.data.doctors.dr_id;
        localStorage.setItem("dr_id",dr_id)
     
        
       })

       let dr_id=localStorage.getItem("dr_id")
        axios
      .get("http://localhost:8000/api/viewDoctorAppointmentDetails/" + dr_id)
      .then(response => {
        this.details = response.data.dr_details;
      
      });
    
    }
    
}
</script>