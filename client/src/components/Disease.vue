<template>
  <div>
    <v-parallax src="../assets/image1.jpg" max-height="1000" height="100%">
      <v-hover>
        <template v-slot="{ hover }">
          <div class="mx-auto">
            <div class="mx-auto bg-info" style="width: 600px; height: 450px">
              <v-card
                :elevation="hover ? 24 : 6"
                class="container"
                color="indigo lighten-4"
                style="width: 600px; height: 450px"
              >
                <v-card-title class="headline blue lighten-3"
                  >Search for Doctor</v-card-title
                >
                <v-card-text>
                  <v-expand-transition>
                    <v-row>
                      <v-col cols="12">
                        <v-combobox
                          v-model="model"
                          :items="search"
                          label="Specialized Field For Your Health Problem"
                        ></v-combobox>
                      </v-col>
                    </v-row>
                  </v-expand-transition>
                </v-card-text>

                <v-card-text>
                  <v-expand-transition>
                    <v-auto>
                      <v-row>
                        <v-col cols="12">
                          <v-combobox
                            v-model="model1"
                            :items="doctor"
                            label="Doctor"
                          ></v-combobox>
                        </v-col>
                      </v-row>
                    </v-auto>
                  </v-expand-transition>
                </v-card-text>

                <v-card-text>
                  <v-expand-transition>
                    <v-auto>
                      <v-row>
                        <v-col cols="12">
                          <v-combobox
                            v-model="model2"
                            :items="clinic"
                            label="Clinic"
                          ></v-combobox>
                        </v-col>
                      </v-row>
                    </v-auto>
                  </v-expand-transition>
                </v-card-text>

                <v-card-actions>
                  <v-btn
                    :disabled="!model"
                    color="grey darken-3"
                    @click="model = null"
                  >
                    Clear
                    <v-icon right>mdi-close-circle</v-icon>
                  </v-btn>
                  <v-spacer></v-spacer>
                  <v-btn :disabled="!model">
                    <router-link to="/AllDoctorProfile">Search</router-link>
                    <v-icon right>mdi-magnify</v-icon>
                  </v-btn>
                </v-card-actions>
              </v-card>
            </div>
          </div>
        </template>
      </v-hover>
    </v-parallax>
  </div>
</template>

<script>
//import axios from 'axios';

export default {
  data() {
    return {
      //searchSet:[],
      descriptionLimit: 60,
      entries: [],

      model: null,
      search: null,

      search: [
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
      ]
    };
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
