// Default js file
/* Enable styleswitcher */Drupal.behaviors.styleSwitcher=function(e){$("#text_size").styleSwitcher("small-text","fontSize",365)};Drupal.behaviors.adminDrag=function(e){function n(){var e=menuYloc.top+$(this).scrollTop()+"px";t.animate({top:e},{duration:500,queue:!1})}var t=$("#block-menu-menu-authenticated");t.css("height","30px");t.find("h3").toggle(function(){t.animate({right:"-5px",height:"230px"})},function(){t.animate({right:"-164px",height:"30px"})});menuYloc=t.offset();$(window).scroll(n);n()};Drupal.behaviors.loginShow=function(e){alert("1");var t=$("#block-user-login");$(".login").click(function(e){alert("2");t.slideToggle("200");return!1});$(document).keydown(function(e){e.which==27&&t.slideToggle("200")});$(document).click(function(e){var n=$(e.target);!n.parents().hasClass("block-user")&&n.attr("id")!=="block-user-login"&&t.css("display")=="block"&&t.slideToggle("200")})};Drupal.behaviors.resourceFilter=function(e){$(location).attr("search").search(new RegExp(/organization/i))>0&&$(".view-resources .view-filters").slideToggle("400");$("<li />").addClass("btn").appendTo("ul.tabs");$("#views-exposed-form-resources-page-1 label").appendTo("li.btn");$("li.btn label").click(function(e){$(".view-resources .view-filters").slideToggle("400")})};Drupal.behaviors.exposedFilters=function(e){$("#edit-submit-contacts").length>0&&$("#edit-submit-contacts").val("Search")};Drupal.behaviors.registerForm=function(e){$("#user-register").length>0&&$("#user-register #edit-name-wrapper .description").append("<br />Please enter a username in the format first initial-hypen-last name.<br />For example if your name is <em>John Smith</em>, your username should be <em>j-smith</em>.")};