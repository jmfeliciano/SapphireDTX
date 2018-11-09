/**
 *
 * HTML5 Audio player with playlist
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2018
 * https://foreigncodes.com/how-to-build-a-html-css-jquery-music-player-with-playlist/
 */
jQuery(document).ready(function () {
    // inner variables
    var song;
    var tracker = $('.tracker').uniqueId();
    var volume = $('.volume').uniqueId();
    var artist = $('.artist').uniqueId();
    var cover = $('.cover').uniqueId();
    var title = $('.title').uniqueId();
    $('.volume-button').click(function () {
        $('.sq-player.clearfix .the-volume-ctr').toggle();
    });

    function initAudio(elem) {
        var url = elem.attr('audiourl');
        var title = elem.text();
        var cover = elem.attr('cover');
        var artist = elem.attr('artist');
        $('.sq-player .title').text(title);
        $('.sq-player .artist').text(artist);
        song = new Audio(url);
        $(".download").prop("href", url);
        $('.image-thumb img').attr("src", cover);
        // timeupdate event listener
        song.addEventListener('timeupdate', function () {
            var curtime = parseInt(song.currentTime, 10);
            tracker.slider('value', curtime);
        });
    }

    function playAudio() {
        song.play();
        tracker.slider("option", "max", song.duration);
        $('.play').addClass('hidden');
        $('.pause').addClass('visible');
    }

    function stopAudio() {
        song.pause();
        $('.play').removeClass('hidden');
        $('.pause').removeClass('visible');
    }
    // play click
    $('.play').click(function (e) {
        e.preventDefault();
        playAudio();
    });
    // pause click
    $('.pause').click(function (e) {
        e.preventDefault();
        stopAudio();
    });
    // forward click
    $('.fwd').click(function (e) {
        e.preventDefault();
        stopAudio();
        var next = $('#myAudio.active').next();
        if (next.length == 0) {
            next = $('#myAudio:first child');
        }
        initAudio(next);
    });
    // rewind click
    $('.rew').click(function (e) {
        e.preventDefault();
        stopAudio();
        var prev = $('#myAudio').prev();
        if (prev.length == 0) {
            prev = $('#myAudio');
        }
        initAudio(prev);
    });
    // show playlist
    $('.pl').click(function (e) {
        e.preventDefault();
        $('.playlist').fadeIn(300);
    });
    // playlist elements - click
    $('#myAudio').click(function () {
        stopAudio();
        initAudio($(this));
    });
    // initialization - first element in playlist
    initAudio($('.'));
    // set volume
    song.volume = 0.8;
    // initialize the volume slider
    volume.slider({
        range: 'min'
        , min: 0
        , max: 100
        , value: 100
        , start: function (event, ui) {}
        , slide: function (event, ui) {
            song.volume = ui.value / 100;
        }
        , stop: function (event, ui) {}
    , });
  
    
    
    // empty tracker slider
    tracker.slider({
        range: 'min'
        , min: 0
        , max: 10
        , start: function (event, ui) {}
        , slide: function (event, ui) {
            song.currentTime = ui.value;
        }
        , stop: function (event, ui) {}
    });
});