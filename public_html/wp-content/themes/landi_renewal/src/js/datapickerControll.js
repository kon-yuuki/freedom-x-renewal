jQuery(function ($) {
  // 直接入力させないように制御
  $(function () {
    // inputにフォーカス時、readonlyに変更
    $(".selectObj")
      .focusin(function (e) {
        $(this).attr("readOnly", "tlue");
      })
      .focusout(function (e) {
        $(this).removeAttr("readOnly");
      });
  });

  // 指定する日付は選択できないように制御
  let dateFormat = "yy/mm/dd";
  let disableDates = [
    "2023/04/29",
    "2023/04/30",
    "2023/05/01",
    "2023/05/02",
    "2023/05/03",
    "2023/05/04",
  ];

  $(".hasDatepicker").datepicker("option", "beforeShowDay", function (date) {
    // 定休日の設定　水曜日
    // 0	日曜日
    // 1	月曜日
    // 2	火曜日
    // 3	水曜日
    // 4	木曜日
    // 5	金曜日
    // 6	土曜日
    let isDisabledDay = date.getDay() === 0 || date.getDay() === 3;
    let disableDate = $.datepicker.formatDate(dateFormat, date);
    let isDisabledDate = disableDates.indexOf(disableDate) !== -1;
    return [!isDisabledDay && !isDisabledDate, "", "非営業日"];
  });
});
