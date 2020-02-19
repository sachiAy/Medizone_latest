<template>
<section class="our-webcoderskull padding-lg">
    <div class="container">
          <div class="row heading heading-icon">
        <h2>Clinics</h2>
      </div>
          <div>
        <ul class="row">
          <li class="col-sm-4" v-for="items in result" :key="items.clinic_id">
            <!-- <router-link :to="{ name: 'ClinicProfile', params: { c_id:items.clinic_id}}"> -->
            <div class="cnt-block equal-hight" style="height: 349px;" >
              <figure>
                <img
                  src="../assets/doctors.jpg"
                  class="img-responsive"
                  alt=""
                />
              </figure>
              <h3>{{ items.name }}</h3>
              <v-rating :value=3 color="amber" dense half-increments readonly size="14"></v-rating>
              <!-- <p>{{ items.username }}</p> -->
              <ul class="follow-us clearfix"></ul>
            </div>
            <!-- </router-link> -->
          </li>
        </ul>
      </div>
    </div>
</section>
</template>

<script>
export default {
    data(){
        return{
            result:{}
        }
    },

    mounted(){
        axios
        .get("http://localhost:8000/api/getallclinics",this.doctors)
        .then(response => {
          this.result = response.data.allclinics;
            console.log(response)
        });

    }
}
</script>