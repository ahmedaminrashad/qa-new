$(document).ready(function() {
    $('select').formSelect();
});

$(document).ready(function() {
    $('.tabs').tabs({ 'swipeable': true });
});

$(document).ready(function() {
    $('.modal').modal();
});

$('.dropdown-trigger').dropdown();


$("#register").click(function() {
    $("#StLoginForm").hide();
    $("#StRegForm").show();
});

$("#login").click(function() {
    $("#StRegForm").hide();
    $("#StLoginForm").show();
});

$(document).ready(function() {
    $('input#input_text, textarea#ct_msg').characterCounter();
  });