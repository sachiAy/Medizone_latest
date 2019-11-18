<template>
  <v-app>
    
    <HeaderFile/>
    
    <router-view></router-view>
   
    <Footer/>
  </v-app>
</template>

<script>
import Footer from "./components/Footer.vue";
import HeaderFile from "./components/HeaderFile.vue";

export default {
  

  components: {
    HeaderFile,
    Footer,
  },
  
};
</script>

<style>
.bg{
  background-image: url(https://image.freepik.com/free-vector/health-care-icon-pattern-medical-innovation-concept-background-design_115579-303.jpg);
  background-size: cover;
}
#inspire {
  background: none;
}
</style>
