const addressbtn = document.querySelector('#address-from')
const addressclose = document.querySelector('#address-close')
addressbtn.addEventListener("click",function(){
    document.querySelector('.address-from').style.display ="flex"
})
addressclose.addEventListener("click",function(){
    document.querySelector('.address-from').style.display ="none"
})
const rightbtn = document.querySelector('.fa-chevron-right')
const leftbtn = document.querySelector('.fa-chevron-left')
const img = document.querySelectorAll(".slider-content-top img")
console.log(img.length)
let index = 0
 rightbtn.addEventListener("click", function(){
    index = index+1
    if(index>img.length-1){
        index = 0
    }
    document.querySelector(".slider-content-top").style.right = index *100+"%"
 })
 leftbtn.addEventListener("click", function(){
    index = index-1
    if(index<=0){
        index = img.length-1
    }
    document.querySelector(".slider-content-top").style.right =index *100+"%"
 })

 const imgli = document.querySelectorAll('.slider-content-bottom li')
 let imgactive = document.querySelector('.active')
 imgli.forEach(function(image,index){
    image.addEventListener("click",function(){
        removeactive()
        document.querySelector(".slider-content-top").style.right =index *100+"%"
       
        image.classList.add("active")
    })
 })
 function removeactive (){
    let imgactive = document.querySelector('.active')
    imgactive.classList.remove("active")
 }
 function imageauto (){
    index = index +1
    if(index >img.length-1){
        index=0
    }
    removeactive()
    document.querySelector(".slider-content-top").style.right =index *100+"%"
    imgli[index].classList.add("active")
 }
 setInterval(imageauto,5000)
 /*---------------------*/
 $(document).ready(function() {
 
    $('.color-choose input').on('click', function() {
        var headphonesColor = $(this).attr('data-image');
   
        $('.active').removeClass('active');
        $('.left-column img[data-image = ' + headphonesColor + ']').addClass('active');
        $(this).addClass('active');
    });
   
  });