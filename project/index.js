var navLinks=document.getElementById("navLinks");
function showMenu()
{
    navLinks.style.right="0";
}
function hideMenu()
{
    navLinks.style.right="-200px";
}


// let preScrollPos=window.scrollY;
// window.onscroll=()=>{
//     let curScrollPos=window.screenY;
//     if(preScrollPos> curScrollPos)
//     {
//         document.querySelectorAll('nav').style.top="0";
//     }
//     else{
//         document.querySelector('nav').style.top="-100px";
//     }
//     preScrollPos=curScrollPos;
// }