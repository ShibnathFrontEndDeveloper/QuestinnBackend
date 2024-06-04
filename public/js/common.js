// let tggoleBar = document.getElementById('tggoleBar');
// let navbarSupportedContent = document.getElementById('navbarSupportedContent');

// tggoleBar.onclick=()=>{
//    //  navbarSupportedContent.classList.toggle('show_box');
//     navbarSupportedContent.remove.toggle('show');
    
// }

// Navbar actice

let activeNav = document.querySelector(".navBar");
let nav_link = activeNav.getElementsByClassName("nav_link");

   for (let i = 0; i < nav_link.length; i++) {
   nav_link[i].addEventListener("click", function() {
      
      let current = document.getElementsByClassName("active");
   current[0].className = current[0].className.replace(" active", "");
   this.className += " active";
   });
   }

// // navbar scrolling


const stop_nav = document.querySelector('#stop_nav')
const nav_ofcanvas = document.querySelector('.navBar')
   const setTop = stop_nav.offsetTop;
   window.addEventListener('scroll', ()=>{
	if(window.pageYOffset>setTop){
		stop_nav.classList.add('bg_navBar');
      nav_ofcanvas.classList.add('bg_navColor');
	}else{
		stop_nav.classList.remove('bg_navBar');
      nav_ofcanvas.classList.remove('bg_navColor');
	}
   });


   const navToggler = document.getElementById('navToggler');
   const navBar = document.querySelector('.navBar');
   navToggler.onclick = ()=>{
      navBar.classList.toggle('nav_ofcanvas')
   }



