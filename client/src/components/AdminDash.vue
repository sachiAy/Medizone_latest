<template>
  <div>
    <v-parallax
      img
      src="data:image/jpeg;base64,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"
      max-height="1000"
      height="100%"
    >
      <v-container>
        <center><h2>Admin Dashboard</h2></center>
        <v-switch v-model="expandOnHover" class="ma-2"></v-switch>

        <v-card height="1000" width="4000" class="overflow-hidden">
          <v-navigation-drawer
            v-model="drawer"
            :color="color"
            :expand-on-hover="expandOnHover"
            :mini-variant="miniVariant"
            :right="right"
            :src="bg"
            absolute
            dark
          >
            <v-list dense nav class="py-0">
              <v-list-item two-line :class="miniVariant && 'px-0'">
                <v-list-item-avatar>
                  <img src="https://randomuser.me/api/portraits/men/81.jpg" />
                </v-list-item-avatar>

                <v-list-item-content>
                  <v-list-item-title>Admin</v-list-item-title>
                </v-list-item-content>
              </v-list-item>

              <v-divider> </v-divider>

              <v-list-item
                v-for="item in items"
                :key="item.title"
                route
                :to="item.route"
              >
                <v-list-item-icon>
                  <v-icon>{{ item.icon }}</v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                  <v-list-item-title>{{ item.title }}</v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </v-list>
          </v-navigation-drawer>
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
        </v-card>
      </v-container>
    </v-parallax>
  </div>
</template>

<script>
export default {
  data() {
    return {
      doctors: [],
      drawer: true,
      items: [
        { title: "Dashboard", icon: "mdi-view-dashboard" },
        {
          title: "Doctors",
          icon: "mdi-account-multiple",
          route: "./AdminDash"
        },
        {
          title: "Clinics",
          icon: "mdi-hospital-building",
          route: "./Clinic_table"
        }
        /*{ title: "Rating details", icon: "mdi-thumbs-up-down" }*/
      ],

      color: "primary",
      colors: ["primary", "blue", "success", "red", "teal"],
      right: true,
      miniVariant: false,
      expandOnHover: false,
      background: false
    };
  },
  computed: {
    bg() {
      return this.background
        ? "https://cdn.vuetifyjs.com/images/backgrounds/bg-2.jpg"
        : undefined;
    }
  },

  created() {
    axios.get("http://localhost:8000/api/getallDoc/")
    .then(response => {
      console.log(response);
      this.doctors = response.data.alldoctors;
      console.log(this.doctors);
    });
  },

  methods: {
    deletedoctor(event) {
      axios
        .delete("http://localhost:8000/api/deletedoctor/" + event.target.id)
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

<style>
.our-webcoderskull {
  background: url("https://www.xmple.com/wallpaper/blue-gradient-white-linear--c2-87cefa-ffffff-a-105-f-14-image/")
    no-repeat center top / cover;
}
</style>
