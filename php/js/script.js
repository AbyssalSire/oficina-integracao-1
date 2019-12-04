$(document).ready(function() {
  $('#input-celular').mask('(00) 0000-0000');
});

$(document).ready(function() {
  $('.calendario_data').datetimepicker({
    format: 'dd/mm/yyyy',
    weekStart: 1,
    todayBtn: true,
    autoclose: true,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    language: "pt-BR",
    forceParse: 0
    //startDate: '+0d'
  });
});

$(document).ready(function() {
  $('.calendario_data_hora').datetimepicker({
    format: "dd/MM/yyyy - hh:ii",
    autoclose: true,
    todayBtn: false,
    language: "pt-BR",
    pickerPosition: "bottom-left"

  });
});

$(document).ready(function() {
  $('.timepicker').timepicker({
    timeFormat: 'h:mm p',
    interval: 5,
    minTime: '5:00',
    maxTime: '23:59',
    defaultTime: '5',
    startTime: '05:00',
    dynamic: true,
    dropdown: true,
    scrollbar: true
  });
});
