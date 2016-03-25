$(function () {
   var lim = document.querySelectorAll('.js-floatl').length;
   for (var i=0;i<lim;i++){
      new Floatl(document.querySelectorAll('.js-floatl')[i])
   }
});
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
