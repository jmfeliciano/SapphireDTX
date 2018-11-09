//MINE.JS //
$(document).ready(function(){

  $('.regular').slick({
    dots: true,
    //variableWidth: true,
    centerPadding: '0px',
    slidesToShow: 5,
    slidesToScroll: 5,
    speed: 500,
    infinite:true,

        responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 5,
        infinite: true,
        dots: true,
        arrows: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 4,
        infinite: true,
        dots: true,
        arrows: false
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true,
        arrows : false
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
  });
});
    

function goDoSomething(identifier){     
       var dataid = $(identifier).data('id');
       
       window.location.href = "movies-modal.php?id=" + dataid;
           
       } 
function goDoSomethingSeries(identifier){     
       var dataid = $(identifier).data('id');
       
       window.location.href = "series-modal.php?id=" + dataid+"&season=1";
           
       }
function goDoSomethingMusicModal(identifier) {
var dataid = $(identifier).data('id');

window.location.href = 'music-modal.php?id=' + dataid;
}

$('#season-number').on('change', function(){
var season_number = $(this).val();
var series_id = getUrlParameter('id');
console.log(season_number+series_id);

window.location.href = "series-modal.php?id=" + series_id+"&season="+season_number;

});

$(document).ready(function(){
var season = getUrlParameter('season');
$('#season-number').val(season)
});

var getUrlParameter = function getUrlParameter(sParam) {
  var sPageURL = decodeURIComponent(window.location.search.substring(1)),
      sURLVariables = sPageURL.split('&'),
      sParameterName,
      i;

  for (i = 0; i < sURLVariables.length; i++) {
      sParameterName = sURLVariables[i].split('=');

      if (sParameterName[0] === sParam) {
          return sParameterName[1] === undefined ? true : sParameterName[1];
      }
  }
};

$('#maingenre').on('change', function () {
var main_genre = $(this).val();
var genre_id = getUrlParameter('id');
console.log(main_genre + genre_id);

window.location.href = "series-genre.php?genre=" + main_genre;
});

$(document).ready(function () {
var genre = getUrlParameter('genre');
$('#maingenre').val(genre)
});


$('#moviesgenre').on('change', function () {
var movies_genre = $(this).val();
var moviesgenre_id = getUrlParameter('id');
console.log(movies_genre + moviesgenre_id);

window.location.href = "movies-genre.php?genre=" + movies_genre;
});

$(document).ready(function () {
var moviesgenre = getUrlParameter('moviesgenre');
$('#moviesgenre').val(moviesgenre)
});

function introLoader(element,delay) {
this.open = function(callback) {
  setTimeout(function() {
    $(element).fadeIn(500, function() {
      if(callback !== undefined) callback();
    });
  }, delay);  
};

this.close = function(callback) {
  setTimeout(function() {
    $(element).fadeOut(500, function() {
      if(callback !== undefined) callback();
    });
  }, delay);
};
}

$('video#player').bind('webkitfullscreenchange mozfullscreenchange fullscreenchange', function(e) {
  var state = document.fullScreen || document.mozFullScreen || document.webkitIsFullScreen;
  var event = state ? 'FullscreenOn' : 'FullscreenOff';

  // Now do something interesting
  document.getElementById('player').pause();
});
$('video#noads').bind('webkitfullscreenchange mozfullscreenchange fullscreenchange', function(e) {
var state = document.fullScreen || document.mozFullScreen || document.webkitIsFullScreen;
var event = state ? 'FullscreenOn' : 'FullscreenOff';

// Now do something interesting
document.getElementById('noads').pause();
});
$('video#trailer').bind('webkitfullscreenchange mozfullscreenchange fullscreenchange', function(e) {
var state = document.fullScreen || document.mozFullScreen || document.webkitIsFullScreen;
var event = state ? 'FullscreenOn' : 'FullscreenOff';

// Now do something interesting
document.getElementById('trailer').pause();
});
$(window).keypress(function(e) {
var player = document.getElementById("player");
if (e.which == 32) {
  if (player.paused == true) {
    player.play();
  }
  else {
    player.pause();
  }
}
});
$(window).keypress(function(e) {
var noads = document.getElementById("noads");
if (e.which == 32) {
  if (noads.paused == true) {
    noads.play();
  }
  else {
    noads.pause();
  }
}
});

$('video.series-video').bind('webkitfullscreenchange mozfullscreenchange fullscreenchange', function (e) {
var state = document.fullScreen || document.mozFullScreen || document.webkitIsFullScreen;
var event = state ? 'FullscreenOn' : 'FullscreenOff';

// Now do something interesting
document.getElementById('title').pause();
});

  
$(window).keypress(function (e) {
var video = document.getElementById("title");
if (e.which == 32) {
  if (video.paused == true)
    video.play();
  else
    video.pause();
}

});

$("#box1").click(function(){
   window.location=$(this).find(".clean-link").attr("href"); 
   return false;
});
//MINE JS END//


//PRELOADER JS //
$(window).on('load', function() {
$(".preloader").fadeOut();
});

$('#controlR').click(function() {
    event.preventDefault();
    $('#content').animate({
      marginLeft: "-=400px"
    }, "fast");
 });

$('#controlL').click(function() {
    event.preventDefault();
    $('#content').animate({
      marginLeft: "+=400px"
    }, "fast");
});

$(document).ready(function(){
  $("#selectme").change(function(){
      $(this).find("option:selected").each(function(){
          var optionValue = $(this).attr("value");
          if(optionValue){
              $(".box").not("." + optionValue).hide();
              $("." + optionValue).show();
          } else{
              $(".box").hide();
          }
      });
  }).change();
});

$(document).ready(function(){
  $(".wallet").hide();
  $(".credit").hide();
  $(".token").hide();
  $("#wallet").click(function(){
              $(".wallet").show();
              $(".credit").hide();
              $(".token").hide();
  }).change();
  $("#credit").click(function(){
              $(".credit").show();
              $(".wallet").hide();
              $(".token").hide();
  }).change();
  $("#token").click(function(){
              $(".token").show();
              $(".credit").hide();
              $(".wallet").hide();
  }).change();
});

$(document).ready(function () {
  $(".scratchcard").hide();
  $(".purchase").hide();
  $("#scratchcard").click(function () {
    $(".scratchcard").show();
    $(".purchase").hide();
    $(this).addClass('bg-info');
    $("#purchase").removeClass('bg-info');
  }).change();
  $("#purchase").click(function () {
    $(".purchase").show();
    $(".scratchcard").hide();
    $(this).addClass('bg-info');
    $("#scratchcard").removeClass('bg-info');
  }).change();
});

// TOP-UP
$(document).ready(function () {
  $('#topupcard1').click(function() {
    $(this).addClass('topup-checked')
    $('#topupcard2').removeClass('topup-checked')
    $('#topupcard3').removeClass('topup-checked')
    $('#topupcard4').removeClass('topup-checked')
  })

  $('#topupcard2').click(function() {
    $(this).addClass('topup-checked')
    $('#topupcard1').removeClass('topup-checked')
    $('#topupcard3').removeClass('topup-checked')
    $('#topupcard4').removeClass('topup-checked')
  })

  $('#topupcard3').click(function() {
    $(this).addClass('topup-checked')
    $('#topupcard1').removeClass('topup-checked')
    $('#topupcard2').removeClass('topup-checked')
    $('#topupcard4').removeClass('topup-checked')
  })

  $('#topupcard4').click(function() {
    $(this).addClass('topup-checked')
    $('#topupcard1').removeClass('topup-checked')
    $('#topupcard2').removeClass('topup-checked')
    $('#topupcard3').removeClass('topup-checked')
  })
})


$('.box').click(function () {
$(this).toggleClass('selected');

});
/*AUDIO FOR MUSIC*/
function audioPlayer() {
var currentSong = 0;
currentSong.autoplay = 0;

$("#audioPlayer")[0].src = $("#playlist li a")[0];
$("#audioPlayer")[0].play();
$("#playlist li a").click(function (e) {
  e.preventDefault();
  $("#audioPlayer")[0].src = this;
  $("#audioPlayer")[0].play();
  $("#playlist li").removeClass("current-song");
  currentSong = $(this).parent().index();
  $(this).parent().addClass("current-song");
});

$("#audioPlayer")[0].addEventListener("ended", function () {
  currentSong++;
  if (currentSong == $("#playlist li a").length)
    currentSong = 0;
  $("#playlist li").removeClass("current-song");
  $("#playlist li:eq(" + currentSong + ")").addClass("current-song");
  $("#audioPlayer")[0].src = $("#playlist li a")[currentSong].href;
  $("#audioPlayer")[0].play();
});
}
$(".play").click(function () {
var audio = $(this).closest('.play-wrap').find('.music')[0];

if (audio.paused) {
  audio.play();
} else {
  audio.pause();
  audio.currentTime = 0
}

$(this).toggleClass('fa-play fa-pause');
});