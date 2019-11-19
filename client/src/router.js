import Vue from "vue";
import Router from "vue-router";
//import Home from './views/Home.vue'
import D_SignUp from "./components/D_SignUp";
import P_SignUp from "./components/P_SignUp";
import ClinicRegister from "./components/ClinicRegister";
import SignIn from "./components/SignIn";
import Home from "./components/Home";
import About from "./views/About";
import SearchResult from "./components/SearchResult";
import Channel from "./components/Channel";
import ClinicDashboard from "./components/ClinicDashboard";
import AdminDashboard from "./components/AdminDashboard";
import DoctorProfile from "./components/DoctorProfile";
import PatientProfile from "./components/PatientProfile";
import Appoinment from "./components/Appoinment";
import AllDoctorProfile from "./components/AllDoctorProfile";
import AllDoctorProfile_Admin from "./components/AllDoctorProfile_Admin";
import appoinmentH from "./components/appoinmentH";
import history from "./components/history";
import AllPatientProfile from "./components/AllPatientProfile";


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
      path: "/P_SignUp",
      name: "P_SignUp",
      component: P_SignUp
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
      path: "/SearchResult",
      name: "SearchResult",
      component: SearchResult
    },
    {
      path: "/Channel",
      name: "Channel",
      component: Channel
    },

    {
      path: "/ClinicDashboard",
      name: "ClinicDashboard",
      component: ClinicDashboard
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
      component: Appoinment,
    },
    {
      path: "/AllDoctorProfile",
      name: "AllDoctorProfile",
      component: AllDoctorProfile
  
    },
    {
      path: "/AllDoctorProfile_Admin",
      name: "AllDoctorProfile_Admin",
      component: AllDoctorProfile_Admin
  
    },
    {
      path: "/appoinmentH",
      name: "appoinmentH",
      component: appoinmentH,
      

    },
    {
      path: "/history",
      name: "history",
      component: history,
      

    },{
      path: "/AllPatientProfile",
      name: "AllPatientProfile",
      component: AllPatientProfile,

    }

  ]
});
