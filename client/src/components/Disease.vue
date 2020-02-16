<template>
  <div>
    <v-parallax src="../assets/backgroundA.jpg" max-height="1000" height="100%">
      <v-hover>
        <template v-slot="{ hover }">
          <div class="mx-auto container">
            <div class="mx-auto bg-info" style="width: 600px; height: 450px">
              <v-form v-model="valid" ref="form" @submit.prevent="SubmitDetails">
              <v-card
                :elevation="hover ? 24 : 6"
                class="container"
                color="indigo lighten-4"
                style="width: 600px; height: 450px"
              >
                <v-card-title class="headline indigo lighten-3"
                  >Search for Doctor</v-card-title
                >
                <v-card-text>
                  <v-expand-transition>
                    <v-row>
                      <v-col cols="12">
                         <v-select
                            :items="specialty"
                            label="Specialized Field For Your Health Problem"
                            name="specialty"
                            v-model="item.specialty"
                          ></v-select>
                        <!-- <v-combobox
                          v-model="model"
                          :items="search"
                          label="Specialized Field For Your Health Problem"
                        ></v-combobox> -->
                      </v-col>
                    </v-row>
                  </v-expand-transition>
                </v-card-text>

                <v-card-text>
                  <v-expand-transition>
                    <v-auto>
                      <v-row>
                        <v-col cols="12">
                          <v-select
                            :items="doctors"
                            label="Doctor"
                            name="doctor"
                            v-model="item.doctor"
                  
                          ></v-select>
                          <!-- <v-combobox
                            v-model="model1"
                            :items="doctor"
                            label="Doctor"
                          ></v-combobox> -->
                        </v-col>
                      </v-row>
                    </v-auto>
                  </v-expand-transition>
                </v-card-text>

                <!-- <v-card-text>
                  <v-expand-transition>
                    <v-auto>
                      <v-row>
                        <v-col cols="12">
                          <v-select
                            :items="clinic"
                            label="Clinic"
                            name="clinic"
                            v-model="item.clinic"
                          
                          ></v-select>
                           <v-combobox
                            v-model="model2"
                            :items="clinic"
                            label="Clinic"
                          ></v-combobox> 
                        </v-col>
                      </v-row>
                    </v-auto>
                  </v-expand-transition>
                </v-card-text> -->

                <v-card-actions>
                  <v-btn
                    @click="reset"
                  >
                    Clear
                    <v-icon right>mdi-close-circle</v-icon>
                  </v-btn>
                  <v-spacer></v-spacer>
                  <v-btn type="submit" >
                   Search
                    <v-icon right>mdi-magnify</v-icon>
                  </v-btn>
                </v-card-actions>
              </v-card>
              </v-form>
            </div>
          </div>
        </template>
      </v-hover>
    </v-parallax>
  </div>
</template>

<script>
import Axios from 'axios';
import SearchResultVue from './SearchResult.vue';
//import axios from 'axios';

export default {
  data() {
    return {
      //searchSet:[],
      descriptionLimit: 60,
      entries: [],
      item:{
        specialty:"",
        doctor:"",
        //clinic:"",

      },

      result:{},

      model: null,
      search: null,

      specialty: [
        //"Allergy Specialist ඇලර්ජි (අසාත්මිකතා ) විශේෂඥ",
        "Anaesthetists නිර්වින්දන විශේෂඥ",
        "Arthritis",
        "Cardiologist හෘද රෝග වෛද්‍ය",
        "Chest Specialist පපු විශේෂඥ ",
        "Children Dentist ළමා දන්ත  වෛද්‍ය",
        "Dental Surgeon දන්ත ශල්‍ය වෛද්‍ය",
        "ENT and Neck උගුර කන නාසය හිස සහ බෙල්ල පිලිබඳ වෛද්‍ය",
        "ENT Surgeon උගුර කන නාසය පිලිබඳ ශල්‍ය වෛද්‍ය",
        "Facial Surgeon රුපලාවන්‍ය චර්ම රෝග",
        "GENERAL PHYSICIAN",
        "NEURO PHYSICIAN",
        "NEURO SURGEON",
        "PAEDIATRICIAN  ළමා වෛද්‍ය"
      ],
      doctors:["doc01","doc02","doc03"],
      //clinic:[],
    };
  },

  methods:{

    reset() {
      this.$refs.form.reset();
    },

    SubmitDetails(){
      let specialty=this.item.specialty;
      localStorage.setItem("Specialty",specialty);
      axios
        .post("http://localhost:8000/api/SubmitDetails", this.item)
        .then(response => {
          let result=response.data;
          localStorage.setItem("searchResult",result);
         this.$router.push('/AllDoctorProfile')
          //console.log(searchResult);

        });
    },

    
  },

  mounted() {}
};
</script>

<style>
.v-card__text {
  font-size: 0.875rem;
  line-height: 1.375rem;
  letter-spacing: 0.0071428571em;
  padding: 0.5px;
  width: 100%;
  margin: 0.5;
}

.v-parallax__content {
  color: #ffffff;
  height: 20%;
  z-index: 2;
  position: relative;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  padding: 0 1rem;
}

.auto {
  position: relative;
  width: 10%;
  padding-right: 30px;
  padding-left: 30px;
}
</style>
