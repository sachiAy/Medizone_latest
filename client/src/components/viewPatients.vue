<template>
    <div>
        <v-card>
               <v-simple-table height="300px">
        <template v-slot:default>
          <thead>
            <tr>
              <th class="text-left">Patient ID</th>
              <th class="text-left">Patient Name</th>
              <th class="text-left">Doctor Name</th>
              <th class="text-left">Appointment Date</th>
              <th class="text-left">Appointment Time</th>
            </tr>
          </thead>
          <tbody >
           
            <tr v-for="item in details" :key="item.she_id"> 
              <td>{{ item.patient_id}}</td>
              <td>{{ item.first_name }}</td>
              <td>{{ item.dr_id }}</td>
              <td>{{ item.date }}</td>
              <td>{{ item.time }}</td>
            </tr>
          
          </tbody>
        </template>
      </v-simple-table>
        </v-card>
    </div>
</template>

<script>
export default {

  data(){
    return {
      users:""
    }
  },

  mounted(){
    let token = localStorage.getItem("token")
    axios.get("http://localhost:8000/api/showCAdmin/"+token)
    .then(response=>{
     
      let ca_id=response.data.clinic_admins.ca_id;
      localStorage.setItem("ca_id",ca_id)
       console.log(ca_id)
    })


    let ca_id=localStorage.getItem("ca_id")
    axios.get("http://localhost:8000/api/getAllPatients/"+ca_id)
    .then(response=>{
      console.log(response)
    })

  },

  
}
</script>
