!function($){$(document).ready(function(){$(".wpcf7-submit").click(function(){$(".error").remove();var e=$('<span class="error wpcf7-not-valid-tip">Die eingegebenen E-Mail-Adressen stimmen nicht überein.</span>');return $(".your-email").find("input").val()!==$(".your-email-confirm").find("input").val()?(e.insertAfter($(".your-email-confirm").find("input")),!1):($(".error").remove(),!0)})})}(jQuery);