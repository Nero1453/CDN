// Call the dataTables jQuery plugin
$(document).ready(function() {
  $("#display").DataTable();
});

$('#display').dataTable({
  pageLength: 10,
  bLengthChange: false,
  bInfo : false,
  language: {
    "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
  }
});


