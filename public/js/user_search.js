$(function () {
  $('.search_conditions').click(function () {
    $('.search_conditions_triangle').toggleClass('active');
    $('.search_conditions_inner').slideToggle();
  });

  $('.subject_edit_btn').click(function () {
    $('.triangle').toggleClass('active');
    $('.subject_inner').slideToggle();
  });
});
