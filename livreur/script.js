new Vue({
  el: ".nav",
  data: {
    isActive: false
  },
  el: ".toggle",
  data: {
    isActive: false
  }
});

$(".toggle").on("click", function() {
  $(".menu").animate({ width: "toggle" }, "fast");
  $(".wrapper").toggleClass("menuHide");
  $(".content").toggleClass("menuHide");
  // if ($(this).hasClass("active")) {
  // }
});