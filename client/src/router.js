import Vue from "vue";
import Router from "vue-router";
//import Home from './views/Home.vue'
import D_SignUp from "./components/D_SignUp";
import P_SignUp from "./components/P_SignUp";
import ClinicRegister from "./components/ClinicRegister";
import SignIn from "./components/SignIn";
import logout from "./components/logout";
import Home from "./components/Home";
import About from "./views/About";
import Channel from "./components/Channel";
import Clinic_AdminDashboard from "./components/Clinic_AdminDashboard";
import AdminDashboard from "./components/AdminDashboard";
import DoctorProfile from "./components/DoctorProfile";
import PatientProfile from "./components/PatientProfile";
import Appoinment from "./components/Appoinment";
import AllDoctorProfile from "./components/AllDoctorProfile";
import AllDoctorProfile_Admin from "./components/AllDoctorProfile_Admin";
import appoinmentH from "./components/appoinmentH";
import history from "./components/history";
import AllPatientProfile from "./components/AllPatientProfile";
import Terms from "./components/Terms";
import Aboutus from "./components/Aboutus";
 
import shedulenew from "./components/shedulenew";


import DocProfile from "./components/DocProfile";
 

Vue.use(Router);

export default new Router({
  mode: "history",
  base: process.env.BASE_URL,
  routes: [
    {
      path: "/",
      name: "home",
      component: Home
    },
    {
      path: "/about",
      name: "about",
      component: () =>
        import(/* webpackChunkName: "about" */ "./views/About.vue")
    },
    {
      path: "/D_SignUp",
      name: "D_SignUp",
      component: D_SignUp
    },
    {
      path: "/P_SignUp",
      name: "P_SignUp",
      component: P_SignUp
    },
    {
      path: "/ClinicRegister",
      name: "ClinicRegister",
      component: ClinicRegister
    },
    {
      path: "/SignIn",
      name: "SignIn",
      component: SignIn
    },

    {
      path: "/about",
      name: "about",
      component: About
    },
  
    {
      path: "/Channel",
      name: "Channel",
      component: Channel
    },

    {
      path: "/Clinic_AdminDashboard",
      name: "Clinic_AdminDashboard",
      component: Clinic_AdminDashboard
    },

    {
      path: "/AdminDashboard",
      name: "AdminDashboard",
      component: AdminDashboard
    },

    {
      path: "/DoctorProfile",
      name: "DoctorProfile",
      component: DoctorProfile
    },
    {
      path: "/PatientProfile",
      name: "PatientProfile",
      component: PatientProfile
    },

    {
      path: "/Appoinment",
      name: "Appoinment",
      component: Appoinment
    },
    {
      path: "/AllDoctorProfile",
      name: "AllDoctorProfile",
      component: AllDoctorProfile
    },
    {
      path: "/doctors/:id",
      name: "DocProfile",
      component: DocProfile
    },
    {
      path: "/AllDoctorProfile_Admin",
      name: "AllDoctorProfile_Admin",
      component: AllDoctorProfile_Admin
    },
    {
      path: "/appoinmentH",
      name: "appoinmentH",
      component: appoinmentH
    },
    {
      path: "/history",
      name: "history",
      component: history
    },

    {
      path: "/Terms",
      name: "Terms",
      component: Terms
    },

    {
      path: "/Aboutus",
      name: "Aboutus",
      component: Aboutus
    },
    {
      path: "/logout",
      name: "logout",
      component: logout
    },
    {
      path: "/AllPatientProfile",
      name: "AllPatientProfile",
      component: AllPatientProfile
    },
    {
      path: "/shedulenew/:id",
      name: "shedulenew",
      component: shedulenew
    }
  ]
});
