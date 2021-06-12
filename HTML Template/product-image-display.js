var bigImg = document.getElementById("big-img");
var smallImg = document.getElementsByClassName("small-img");
smallImg[0].addEventListener("click",function(){
	bigImg.src = smallImg[0].src;
})
smallImg[1].addEventListener("click",function(){
	bigImg.src = smallImg[1].src;
})
smallImg[2].addEventListener("click",function(){
	bigImg.src = smallImg[2].src;
})
smallImg[3].addEventListener("click",function(){
	bigImg.src = smallImg[3].src;
})