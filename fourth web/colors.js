var Body = {
  setColor : function(backgroundcolor, color){
    $('body').css('backgroundColor',backgroundcolor);
    $('body').css('color',color);
  }
}
var Links = {
  setColor : function(color){
    $('a').css('color',color);
  //   var a_list = document.querySelectorAll('a');
  //   for(var i=0; i<a_list.length;i++){
  //     a_list[i].style.color = color;
  //   }
  }
}
function nightDayHandler(self){
  if(self.value == 'night'){
    Body.setColor('black','white');
    Links.setColor('white');
    self.value='day';
  }
  else{
    Body.setColor('white','black');
    Links.setColor('black');
    self.value='night';
  }
}
