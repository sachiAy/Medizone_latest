<template>
 <v-spacer>
  <v-row justify="space-around">

   <v-menu
      transition="slide-x-transition"
      bottom
      right
    >
    <template v-slot:activator="{ on }">
    
        <v-btn
          class="font-weight-medium"
          color="primary"
          dark
          v-on="on"

        >
         login here
        </v-btn>
      </template>

      <v-list>
        <v-list-item
          v-for="(item, i) in items"
          :key="i"
          @click=""
        >
          <v-list-item-title>{{ item.title }}</v-list-item-title>
        </v-list-item>
      </v-list>
    </v-menu>

    </v-row>
    </v-spacer>
  </template>


  <script>
  export default {
    data: () => ({
      items: [
        { title: 'Are you a Patient' },
        { title: 'Are you a Doctor' },
        { title: 'Are you a Clinic admin' },
        { title: 'Are you a Main admin' },
      ],
    }),
  }
</script>