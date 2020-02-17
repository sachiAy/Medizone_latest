<template>
     <div class="container" width="500">
            <center><h2>Clnics Table</h2></center>
            <div class="row">
              <div class="col-12">
                <table class="table table-bordered">
                  <thead>
                    <tr width="20">
                      <th scope="col">clinic_id</th>
                      <th scope="col">Dr_id</th>
                      <th scope="col">ca_id</th>
                      <th scope="col">Name of the clinic</th>
                      <th scope="col">registration_no</th>
                      
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      class="doctor col-xs-4 col-lg-4"
                      v-for="clinic in clinics"
                      :key="clinic.clinic_id"
                      width="20"
                    >
                      <td width="10">{{ clinic.clinic_id }}</td>

                      <td width="10">{{ clinic.dr_id }}</td>
                      <td width="10">{{ clinic.ca_id }}</td>
                
                      <td width="10">{{ clinic.name }}</td>
                      <td width="10">{{ clinic.registration_no }}</td>
                      <td>
                         <v-btn
                        small
                        color="red accent-1"
                        @click="deletedoctor($event)"
                        v-bind:id="clinic.clinic_id"
                        >Delete</v-btn
                      >
                      </td>
                     
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
</template>

<script>
export default {
  data() {
    return {
      clinics: [],
     

     
    };
  },
  computed: {
  
  },

  created() {
   
  },
  mounted(){
       axios.get("http://localhost:8000/api/getallclinics")
    .then(response => {
      console.log(response);
      this.clinics = response.data.allclinics;
      console.log(this.clinics);
    });

  },

  methods: {
    deletedoctor(event) {
        console.log(this.data.$attrs.id)
      axios
        .delete("http://localhost:8000/api/deletedoctor/" + event.target.dr_id)
        .then(response => {
          var position = this.doctors.findIndex(function(element) {
            return element.id == event.target.id;
          });
          this.doctors.splice(position);
        });
    }
  }
};
</script>