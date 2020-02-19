<template>
  <v-parallax src="../assets/backgroundA.jpg" max-height="1000" height="100%">
    <v-card :loading="loading" class="mx-auto my-12 container" max-width="1000">
      <v-img
        height="400"
        src="https://image.freepik.com/free-psd/close-up-tablet-held-by-doctor_23-2148316916.jpg"
      ></v-img>

      <v-card-title>{{users.name}} </v-card-title>

      <v-card-text>
        <v-row align="center" class="mx-0">
          <v-rating :value="3" color="amber" dense half-increments readonly size="14"></v-rating>

          <div class="grey--text ml-4"></div>
        </v-row>

        <div class="my-4 subtitle-1"></div>

        <div></div>
      </v-card-text>

      <v-divider class="mx-4"></v-divider>

      <v-card-title>Doctor's availability</v-card-title>
      <v-btn v-if="isAdmin">Admin</v-btn>

      <v-simple-table height="300px">
        <template v-slot:default>
          <thead>
            <tr>
              <th class="text-left">Doctor Name</th>
              <th class="text-left">Available Date</th>
              <th class="text-left">Available Time</th>
              
            </tr>
          </thead>
          <tbody >
           
            <tr v-for="item in details" :key="item.she_id"> 
              <td>{{ item.dr_name }}</td>
              <td>{{ item.date }}</td>
              <td>{{ item.time }}</td>
            </tr>
          
          </tbody>
        </template>
      </v-simple-table>
    </v-card>
  </v-parallax>
</template>

<script>
export default {

}
</script>

<style>

</style>