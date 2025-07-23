$(function () {
  // モーダルウィンドウ
  $('.edit-modal-open').on('click', function () {
    $('.js-modal').fadeIn();
    var reserve_date = $(this).attr('reserve_date');
    var reserve_time = $(this).attr('reserve_time');
    var data_reserve_time = $(this).attr('data_reserve_time');


    $('.modal-inner-title p').text("予約日：" + reserve_date);
    $('.modal-inner-title input').val(reserve_date);

    $('.modal-inner-body p').text("時間：" + reserve_time);
    $('.modal-inner-body input').val(data_reserve_time);

    return false;
  });
  // クリックしたらモーダルを閉じる
  $('.js-modal-close').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });
});
