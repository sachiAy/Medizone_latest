<template>
     <div class="container" width="500">
            <center><h2>Doctors Table</h2></center>
            <div class="row">
              <div class="col-12">
                <table class="table table-bordered">
                  <thead>
                    <tr width="20">
                      <th scope="col">Dr_id</th>
                      <th scope="col">Reg_no</th>
                      <th scope="col">Name of the doctor</th>
                      <th scope="col">Mobile No</th>
                      <th scope="col">E-mail address</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody width="400">
                    <tr
                      class="doctor col-xs-4 col-lg-4"
                      v-for="doctor in doctors"
                      :key="doctor.dr_id"
                      width="20"
                    >
                      <td width="10">{{ doctor.dr_id }}</td>
                      <td width="10">{{ doctor.reg_no }}</td>
                      <td>{{ doctor.first_name }} {{ doctor.last_name }}</td>
                      <td width="10">{{ doctor.contact_no }}</td>
                      <td width="10">{{ doctor.email }}</td>
                      <v-btn
                        small
                        color="red accent-1"
                        @click="deletedoctor($event)"
                        v-bind:id="doctor.dr_id"
                        >Delete</v-btn
                      >
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
      doctors: [],
     

     
    };
  },
  computed: {
  
  },

  created() {
   
  },
  mounted(){
       axios.get("http://localhost:8000/api/getallDoc/")
    .then(response => {
      console.log(response);
      this.doctors = response.data.alldoctors;
      console.log(this.doctors);
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