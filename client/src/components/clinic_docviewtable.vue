<template>
  <v-simple-table height="300px">
    <template v-slot:default>
      <thead>
        <tr>
          <th class="text-left">Patient name</th>
          <th class="text-left">Mobile number</th>
          <th class="text-left">NIC</th>
          <th class="text-left">E-mail</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in items" :key="item.nicValue">
          <td>{{ item.name }}</td>
          <td>{{ item.tel }}</td>
          <td>{{ item.nicValue }}</td>
          <td>{{ item.email }}</td>
        </tr>
      </tbody>
    </template>
  </v-simple-table>
</template>


<script>
export default {
    data() {
    return {
      items: []
    };
  },

  created() {
    this.$http
      .get("http://localhost:8000/api/getPatients")
      .then(function(response) {
        this.items = response.body.allpatients;
      });
  }
};
</script>

