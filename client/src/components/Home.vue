<template>
  <div>
   
    <Disease />
    <slidingimage/>
    
  </div>
</template>

<script>


import Disease from "./Disease.vue";
import slidingimage from"./slidingimage.vue";

export default {
  components: {
    Disease,
    slidingimage,
   
  }
};
</script>