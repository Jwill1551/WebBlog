// Milestone-1 
//   ver. 1 
//   Joshua W., Noah R., Brydon J.

//   scripts.js: 
//       this javascript is used to 

$(document).ready(function(){
  $("#day-btn").hide();
  $("#night-btn").css("background-color", "#4a5667");
  $("#night-btn").css("color", "white");
})

//Night Mode Button
$("#night-btn").click(function(){
    $("body").css("background-color", "#0D1B2A");
    $("header").css("background-color", "#415A77");
    $("header").css("color", "white");
    $("#body-title").css("background-color", "#415A77");
    $(".box").css("background-color", "#415A77");
    $(".box").css("color", "white");
    $("#header-subtitles").css("background-color", "#0D1B2A")
    $(".account-button").css("border", "3px solid #4a5667")
    $("footer").css("background-color", "#415A77");
    $("#night-btn").hide();
    $("#day-btn").show();
})  

//Day Mode Button
$("#day-btn").click(function(){
  $("body").css("background-color", "white");
  $("header").css("background-color", " #48CAE4");
  $("header").css("color", "white");
  $("#body-title").css("background-color", "#f56565");
  $(".box").css("background-color", "white");
  $(".box").css("color", "#4a5667");
  $("#header-subtitles").css("background-color", "#f56565")
  $(".account-button").css("border", "3px solid #f56565")
  $("footer").css("background-color", " #48CAE4");
  $("#day-btn").hide();
  $("#night-btn").show();
})  