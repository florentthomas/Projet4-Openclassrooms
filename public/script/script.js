
const btn_top=document.getElementById("scroll_top");
                  
window.addEventListener("scroll",function(){
    if(window.scrollY > 25){
        btn_top.style.display="block";
        console.log("test");
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