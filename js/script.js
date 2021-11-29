const tabsContainer=document.querySelector(".second-col");
/*aboutSection=document.querySelector(".about-section");*/

tabsContainer.addEventListener("click", (e)=>{

    if(e.target.classList.contains("link") && !e.target.classList.contains("active")){
    	tabsContainer.querySelector(".active").classList.remove("active");
    	e.target.classList.add("active");


    	/*const target=e.target.getAttribute("data-target");
    	aboutSection.querySelector(".tab-content.active").classList.remove("active");
    	aboutSection.querySelector(target).classList.add("active");*/
    }

});