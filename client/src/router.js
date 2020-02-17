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
import SignAppoinment from "./components/SignAppoinment";
import AllDoctorProfile from "./components/AllDoctorProfile";
import appoinmentH from "./components/appoinmentH";
import history from "./components/history";
import AllPatientProfile from "./components/AllPatientProfile";
import Terms from "./components/Terms";
import Aboutus from "./components/Aboutus";
import select from "./components/select";
import shedulenew from "./components/shedulenew";
import DocProfile from "./components/DocProfile";
import scheduleProfile from "./components/scheduleProfile";
import retrivePatients from "./components/retrivePatients";
import FinalPage from "./components/FinalPage";
import AppointmentSchedule from "./components/AppointmentSchedule";
import AdminViewOfDoctors from "./components/AdminViewOfDoctors";
import AdminViewOfClinics from "./components/AdminViewOfClinics";


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
      path: "/select",
      name: "select",
      component: select
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
      path: "/AdminDashboard",
      name: "AdminDashboard",
      component: AdminDashboard
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
      path: "/Channel/:sid",
      name: "Channel",
      component: Channel
    },
   
    {
      path: "/Clinic_AdminDashboard",
      name: "Clinic_AdminDashboard",
      component: Clinic_AdminDashboard
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
      path: "/Appoinment/:sid",
      name: "Appoinment",
      component: Appoinment
    },
    {
      path: "/SignAppoinment/:sid",
      name: "SignAppoinment",
      component: SignAppoinment
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
    },
    {
      path: "/scheduleProfile/:id",
      name: "scheduleProfile",
      component: scheduleProfile
    },
    {
      path: "/retrivePatients",
      name: "retrivePatients",
      component: retrivePatients
    },
    {
      path: "/FinalPage/:a_id",
      name: "FinalPage",
      component: FinalPage
    },
    {
      path: "/AppointmentSchedule",
      name: "AppointmentSchedule",
      component: AppointmentSchedule
    },
    {
      path: "/AdminViewOfDoctors",
      name: "AdminViewOfDoctors",
      component: AdminViewOfDoctors
    },
    {
      path: "/AdminViewOfClinics",
      name: "AdminViewOfClinics",
      component: AdminViewOfClinics
    }
  ]
});
