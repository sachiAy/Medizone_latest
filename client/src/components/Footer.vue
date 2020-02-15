<template>
  <!-- Footer -->
  <mdb-footer color="info-color-dark" class="page-footer font-small pt-0">
    <div style="backgroundColor: #659EC7">
      <mdb-container class="text-left">
        <mdb-row class="py-4 d-flex align-items-center">
          <mdb-col md="6" lg="5" class="text-center text-md-left mb-4 mb-md-0">
            <h6 class="mb-0 white-text">
              Get connected with Medizone on social networks!
            </h6>
          </mdb-col>
          <mdb-col md="6" lg="7" class="text-center text-md-right">
            <a class="fb-ic ml-0">
             <a href="https://www.facebook.com/?stype=lo&jlou=AfetYqvSMxtxtxKlURoUs_LMkkun3wM1xygnc9WjE0outz7tDBMvqTH25cCnGawKZr28cYElOhBsjk4Y26MBibnpwSfIB22qzgLzEnJ6SQ4FDA&smuh=41861&lh=Ac93t4VRhWztIvZE"> <i class="fab fa-facebook white-text mr-lg-4"></i></a>
            </a>
            <a class="tw-ic">
             <a href="https://twitter.com/login?lang=en"> <i class="fab fa-twitter white-text mr-lg-4"></i></a>
            </a>
            <a class="gplus-ic">
              <i class="fab fa-google-plus white-text mr-lg-4"></i>
            </a>
            <a class="li-ic">
              <i class="fab fa-linkedin-in white-text mr-lg-4"></i>
            </a>
            <a class="ins-ic">
              <i class="fab fa-instagram white-text mr-lg-4"></i>
            </a>
          </mdb-col>
        </mdb-row>
      </mdb-container>
    </div>
     

    <mdb-container class="mt-5 mb-4 text-center text-md-left">
      <mdb-row class="mt-3">
        <mdb-col md="3" lg="4" xl="3" class="mb-4">
          <h6 class="text-uppercase font-weight-bold">
            <strong>Company name</strong>
          </h6>
          <hr
            class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto"
            style="width: 60px"
          />
          <p>
            Medizone is a e-channeling platform to find the best doctor to illness through a recommendation system.
          </p>
        </mdb-col>
        <mdb-col md="2" lg="2" xl="2" class="mb-4">
          <h6 class="text-uppercase font-weight-bold">
            <strong>Useful Links</strong>
          </h6>
          <hr
            class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto"
            style="width: 60px"
          />
          <p>
            <v-list-item
              v-for="link in others"
              :key="link.text"
              router
              :to="link.route"
              >{{ link.text }}</v-list-item
            >
          </p>
        </mdb-col>
        <mdb-col md="4" lg="3" xl="3" class="mb-4">
          <h6 class="text-uppercase font-weight-bold">
            <strong>Contact</strong>
          </h6>
          <hr
            class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto"
            style="width: 60px"
          />
          <p><i class="fas fa-home mr-3"></i> Colombo 8, No:11, Main Street </p>
          <p><i class="fas fa-envelope mr-3"></i> medizone@gamil.com</p>
          <p><i class="fas fa-phone mr-3"></i> + 01 134 567 88</p>
          <p><i class="fas fa-print mr-3"></i> + 01 134 567 89</p>
        </mdb-col>
        <mdb-col>
            <v-avatar size="250">
        <img src="../assets/medizone.png" alt="medizone" />
      </v-avatar>
        </mdb-col>
      </mdb-row>
    </mdb-container>
    <div class="footer-copyright text-center py-3">
      © Medizone Health Pvt Ltd.<br/>ALL RIGHTS RESERVED <br/>
    
        Developed by Team 4
     
    </div>
    
  </mdb-footer>
  <!-- Footer -->
</template>

<style>
body, html {
  height: 100%;



  /* Half height */
  height: 50%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>

<script>
import { mdbFooter, mdbContainer, mdbRow, mdbCol } from "mdbvue";

export default {
  components: {
    mdbFooter,
    mdbContainer,
    mdbRow,
    mdbCol
  },
  data() {
    return {
      others: [
        { text:  "About Us", route: "/Doctor" },
        { text: "Contact Us", route: "/Terms" },
        { text:"Terms & Conditions", route: "/Doctor" },
        { text: "FAQ", route: "/Doctor" }
      ],
      abouts: [
        { text: "About Us", route: "./AboutUs" },
        { text:  "Contact Us", route: "./ContactUs" },
        { text: "Terms & Conditions", route: "./Terms" },
        { text: "FAQ", route: "./FAQ" }
      ]
    };
  }
};
</script>
