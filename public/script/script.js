//button scroll to top
const btn_top=document.getElementById("scroll_top");
                  
window.addEventListener("scroll",function(){
    if(window.scrollY > 25){
        btn_top.style.display="block";
    }
    else{
        btn_top.style.display="none";
    }
})
            
btn_top.addEventListener("click",animationScroll);
            
function animationScroll(){
                                
    let progress=window.scrollY - 50;
    window.scrollTo(0,progress);
                
    if(window.scrollY != 0){
        requestAnimationFrame(animationScroll);
    }  
}


function hide(){
    
    const panel=this.nextElementSibling;
    const chevron=this.querySelector('i');

    if(panel.style.display === "none"){
        panel.style.display="block";
        chevron.className="fas fa-chevron-up";
    }else{
        panel.style.display="none";
        chevron.className="fas fa-chevron-down";
    }
}

const adminAccordionElts=document.getElementsByClassName("admin_accordion");

for(i=0; i < adminAccordionElts.length;i++){
    adminAccordionElts[i].addEventListener("click",hide);
}


