<template>
  <section class="our-webcoderskull padding-lg">
    <div class="container">
      <div class="row heading heading-icon">
        <h2>Doctors</h2>
      </div>
      <div>
        <ul class="row">
          <li class="col-sm-4" v-for="item in items">
            <div class="cnt-block equal-hight" style="height: 349px;">
              <figure>
                <img
                  src="../assets/doctors.jpg"
                  class="img-responsive"
                  alt=""
                />
              </figure>
              <h3>{{ item.first_name }} {{ item.last_name }}</h3>
              <p>I am a Patient</p>
              <ul class="follow-us clearfix"></ul>
              <button class="btn btn-lg btn-primary">
                <router-link to="/DoctorProfile"> View Profile</router-link>
              </button>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </section>
</template>

<style>
.row.heading h2 {
  color: #000;
  font-size: 55.52px;
  line-height: 95px;
  font-weight: 500;
  text-align: center;
  margin: 0 0 40px;
  padding-bottom: 20px;
  text-transform: uppercase;
}
ul {
  margin: 0;
  padding: 0;
  list-style: none;
}
.heading.heading-icon {
  display: block;
}
.padding-lg {
  display: block;
  padding-top: 60px;
  padding-bottom: 60px;
}
.practice-area.padding-lg {
  padding-bottom: 55px;
  padding-top: 55px;
}
.practice-area .inner {
  border: 1px solid #999999;
  text-align: center;
  margin-bottom: 28px;
  padding: 40px 25px;
}
.our-webcoderskull .cnt-block:hover {
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
  border: 0;
}
.practice-area .inner h3 {
  color: #3c3c3c;
  font-size: 24px;
  font-weight: 500;
  font-family: "Poppins", sans-serif;
  padding: 10px 0;
  text-transform: capitalize;
}
.practice-area .inner p {
  font-size: 14px;
  line-height: 22px;
  font-weight: 400;
}
.practice-area .inner img {
  display: inline-block;
}

.our-webcoderskull {
  background: url("https://www.xmple.com/wallpaper/purple-gradient-blue-linear-1920x1080-c2-add8e6-ba55d3-a-15-f-14.svg")
    no-repeat center top / cover;
}
.our-webcoderskull .cnt-block {
  float: left;
  width: 100%;
  background: #d8d5dd;
  padding: 30px 20px;
  text-align: center;
  border: 2px solid #d5d5d5;
  margin: 0 0 28px;
}
.our-webcoderskull .cnt-block figure {
  width: 148px;
  height: 148px;
  border-radius: 100%;
  display: inline-block;
  margin-bottom: 15px;
}
.our-webcoderskull .cnt-block img {
  width: 148px;
  height: 148px;
  border-radius: 100%;
}
.our-webcoderskull .cnt-block h3 {
  color: #2a2a2a;
  font-size: 20px;
  font-weight: 500;
  padding: 6px 0;
  text-transform: capitalize;
}
.our-webcoderskull .cnt-block h3 a {
  text-decoration: none;
  color: #2a2a2a;
}
.our-webcoderskull .cnt-block h3 a:hover {
  color: #337ab7;
}
.our-webcoderskull .cnt-block p {
  color: #2a2a2a;
  font-size: 13px;
  line-height: 20px;
  font-weight: 400;
}
.our-webcoderskull .cnt-block .follow-us {
  margin: 20px 0 0;
}
.our-webcoderskull .cnt-block .follow-us li {
  display: inline-block;
  width: auto;
  margin: 0 5px;
}
.our-webcoderskull .cnt-block .follow-us li .fa {
  font-size: 24px;
  color: #767676;
}
.our-webcoderskull .cnt-block .follow-us li .fa:hover {
  color: #025a8e;
}

.container {
  margin-top: 40px;
}
body {
  text-rendering: optimizespeed;
}
.btn:not(a) {
  border: 0;
  border-bottom: 0;
  border-left: 0;
  font-weight: "900";
  font-family: "Ubuntu", sans-serif;
  box-shadow: inset 0 -3.2px rgba(0, 0, 0, 0.12), inset 2px 0 rgba(0, 0, 0, 0.1);
  outline: none;
  -webkit-outline: none;
  -o-outline: none;
  -moz-outline: none;
}
.btn:active:not(a),
.btn.active {
  outline: none;
  -moz-outline: none;
  background-image: none;
  -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125) !important;
  position: relative;
  box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125) !important;
  top: 1px;
  left: -1px;
}
.btn:focus:not(a) {
  outline: none;
  -webkit-outline: none;
  -moz-outline: none;
}
.btn-sm {
  padding-top: 1.5px;
}

.v-application a {
  color: #0e031a;
}
</style>

<script>
export default {
  /*data() {
    return {
      items: []
    };
  }*/

  data() {
    return {
      items: []
    };
  },

  created() {
    this.$http
      .get("http://localhost:8000/api/getPatients")
      .then(function(response) {
        //console.log(response);

        this.items = response.body.allpatients;
      });
  }
};
</script>
