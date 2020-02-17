<template>
    <div>
        <v-card>
          <v-simple-table>
                  <template v-slot:default>
                    <tbody>
                      <tr>
                        <th class="text-center">Doctor Name</th>
                        <th class="text-center">{{guest.dr_name}}</th>
                      </tr>
                      <tr>
                        <th class="text-center">Clinic Name</th>
                        <th class="text-center">{{guest.clinic_name}}</th>
                      </tr>
                      <tr>
                        <th class="text-center">Appointment Date</th>
                        <th class="text-center">{{guest.appointment_date}}</th>
                      </tr>
                       <tr>
                        <th class="text-center">Appointment time</th>
                        <th class="text-center">{{guest.appointment_time}}</th>
                      </tr>
                      <tr>
                        <th class="text-center">Patient's First Name</th>
                        <th class="text-center">{{guest.first_name}}</th>
                      </tr>
                      <tr>
                        <th class="text-center">Patient's Last Name</th>
                        <th class="text-center">{{guest.last_name}}</th>
                      </tr>
                      <tr>
                        <th class="text-center">Patient's Mobile No</th>
                        <th class="text-center">{{guest.mobile_no}}</th>
                      </tr>
                      <tr>
                        <th class="text-center">Patient's Email Address</th>
                        <th class="text-center">{{guest.email}}</th>
                      </tr>
                      <tr>
                        <th class="text-center">Patient's NIC</th>
                        <th class="text-center">{{guest.NIC}}</th>
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
    return{
      guest:{
        clinic_name:"",
        dr_name:"",

      }
    }
  },

  mounted(){
     axios
      .get("http://localhost:8000/api/viewAppointmentDetails/"+this.$route.params.a_id)  //display dr_name
      .then(response => {
        this.guest=response.data.A_details;
        console.log(response)

      });

       let id=localStorage.getItem("d_id");
     axios
      .get("http://localhost:8000/api/viewDoctorDetails/"+id)  //display dr_name
      .then(response => {
        this.guest.dr_name=response.data.doctors.first_name;
        console.log(response)

      });
      let c_id=localStorage.getItem("c_id");
      axios
      .get("http://localhost:8000/api/getClinicDetails/"+c_id)  //display dr_name
      .then(response => {
        this.guest.clinic_name=response.data.clinic.name;
        console.log(response)

      });
  }
}
</script>