$(document).ready(function(){
    $(".wallet").hide();
    $(".credit").hide();
    $(".token").hide();
    $("#credit").click(function(){
                $(".credit").show();
                $(".wallet").hide();
                $(".token").hide();
    }).change();
});

$(document).ready(function(){
  $(".scratchcard").hide();
  $("#scratchcard").click(function(){
              $(".scratchcard").show();

  }).change();
});
$('.box').click(function () {
  $(this).toggleClass('selected');

});