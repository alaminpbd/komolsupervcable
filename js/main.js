// Zone Select Then show subzone Jquery Function

$("#zone-name").on("change", function(e){
   var zone_id = e.target.value;
   $.get("/komolnetwork/ajax-subzone?zone_id="+ zone_id, function(data){
      //success data
      $('#subzone-name').empty();
      $.each(data, function(index, subzoneObj){
         $("#subzone-name").append('<option value="'+subzoneObj.id+'">' +subzoneObj.subzone_name+'</option>');

         if (subzoneObj.subzone_name != null) {
               var selectSubzone = $('select.select-subzone').children("option:selected").text();
               $("#value-subzone-name").val(selectSubzone);
         }

      });

     if (data == "") {
      $("#value-subzone-name").val("");
     }

   });
});

//Previous Zone Selection then subzone show

$("#prev-zone-name").on("change", function(e){
   var zone_id = e.target.value;
   $.get("/komolnetwork/ajax-subzone?zone_id="+ zone_id, function(data){
      //success data
      $('#prev-subzone-name').empty();
      $.each(data, function(index, subzoneObj){
         $("#prev-subzone-name").append('<option value="'+subzoneObj.id+'">' +subzoneObj.subzone_name+'</option>');

         if (subzoneObj.subzone_name != null) {
               var selectSubzone = $('select.prev-select-subzone').children("option:selected").text();
               $("#prev-value-subzone-name").val(selectSubzone);
         }

      });

     if (data == "") {
      $("#prev-value-subzone-name").val("");
     }

   });
});

//zone subzone select then there name into input field

$("select.select-zone").change(function(){
   var selectedZone = $(this).children("option:selected").text();
   $(".value-zone-name").val(selectedZone);
});

$("select.select-subzone").change(function(){
   var selectedSubZone = $(this).children("option:selected").text();
   $("#value-subzone-name").val(selectedSubZone);
});

//Prev zone subzone select then there name into input field

$("select.prev-select-zone").change(function(){
   var selectedZone = $(this).children("option:selected").text();
   $(".prev-value-zone-name").val(selectedZone);
});

$("select.prev-select-subzone").change(function(){
   var selectedSubZone = $(this).children("option:selected").text();
   $("#prev-value-subzone-name").val(selectedSubZone);
});


//Connect section
$(function() {
   $('#connection-id').on('input',function() {
     var opt = $('option[value="'+$(this).val()+'"]');
     var opt_id = opt.attr('id');
     $.get("/komolnetwork/ajax-all-connection?id="+ opt_id, function(data){
      //success data
      $.each(data, function(index, allcon){
         if (allcon.user_name != null) {
            $("#user-id").val(allcon.id);
            $("#zone-name").val(allcon.zone_name);
            $("#zone-id").val(allcon.zone_id);
            $("#subzone-name").val(allcon.subzone_name);
            $("#subzone-id").val(allcon.subzone_id);
            $("#connection-type").val(allcon.connection_type);
            $("#ip-address").val(allcon.ip_address);
            $("#status-field").val(allcon.status);
         }

      });

      if (data == "") {
         $("#user-id").val("");
         $("#zone-id").val("");
         $("#subzone-id").val("");
         $("#zone-name").val("");
         $("#subzone-name").val("");
         $("#status-field").val("")
      }

     });

   });

 });
 
$(document).ready(function(){
    //number of tv
    $(".number-of-tv").hide();
    $(".number-of-mbps").hide();

    //Edit zone subzone auto name into input field
   var editSelectedZone = $('select.select-zone').children("option:selected").text();
   $(".value-zone-name").val(editSelectedZone);

   var editSelectedSubZone = $('select.select-subzone').children("option:selected").text();
   $("#value-subzone-name").val(editSelectedSubZone);

   //For Edit connection Previous zone subzone name auto fill in the input feild
   var editSelectedPrevZone = $('select.prev-select-zone').children("option:selected").text();
   $(".prev-value-zone-name").val(editSelectedPrevZone);

   var editSelectedSubZone = $('select.prev-select-subzone').children("option:selected").text();
   $("#prev-value-subzone-name").val(editSelectedSubZone);


   //for edit connection auto select zone subzone
   var editConZoneId = $('select.select-zone').children("option:selected").val();
   $.get("/komolnetwork/ajax-subzone?zone_id="+ editConZoneId, function(data){
      //success data
      $('#subzone-name').empty();
      $.each(data, function(index, subzoneObj){
         $("#subzone-name").append('<option class="select-option" value="'+subzoneObj.id+'">' +subzoneObj.subzone_name+'</option>');

         if (subzoneObj.subzone_name != null) {
               var selectSubzone = $('select.select-subzone').children("option:selected").text();
               $("#value-subzone-name").val(selectSubzone);
         }

      });

      var optionLength = $("#subzone-name").children('option').length;

      for(i=0; i <= optionLength; i++){
         if($('#subzone-data-id').val() == $("#subzone-name").children('option').eq(i).val()){
            $(".select-option").eq(i).prop('selected', true);
            $("#value-subzone-name").val($(".select-option").eq(i).text());
         }
      }

   });

   //For Edit Connection Auto Select Previous zone Subzone
   var editConPrevZoneId = $('select.prev-select-zone').children("option:selected").val();
   $.get("/komolnetwork/ajax-subzone?zone_id="+ editConPrevZoneId, function(data){
      //success data
      $('#prev-subzone-name').empty();
      $.each(data, function(index, subzoneObj){
         $("#prev-subzone-name").append('<option class="select-option" value="'+subzoneObj.id+'">' +subzoneObj.subzone_name+'</option>');

         if (subzoneObj.subzone_name != null) {
               var selectSubzone = $('select.prev-select-subzone').children("option:selected").text();
               $("#prev-value-subzone-name").val(selectSubzone);
         }

      });

      var optionLength = $("#prev-subzone-name").children('option').length;

      for(i=0; i <= optionLength; i++){
         if($('#prev-subzone-data-id').val() == $("#prev-subzone-name").children('option').eq(i).val()){
            $(".select-option").eq(i).prop('selected', true);
            $("#prev-value-subzone-name").val($(".select-option").eq(i).text());
         }
      }

   }); 

   //for edit bill
   var billId = $("#connection-data-id").val();
      $.get("/komolnetwork/ajax-all-edit-bill?id="+ billId, function(data){
         $.each(data, function(index, allbill){
            if (allbill.connection_name != '') {
               $("#user-id").val(allbill.connection_id);
               $("#zone-name").val(allbill.zone_name);
               $("#zone-id").val(allbill.zone_id);
               $("#subzone-name").val(allbill.subzone_name);
               $("#subzone-id").val(allbill.subzone_id);
               $("#connection-type").val(allbill.connection_type);
               $("#ip-address").val(allbill.ip_address);
               $("#status-field").val(allbill.status);
            }
   
         });
   
      });

   //for edit connection
   var editSelectCon = $('select.select-connection').children("option:selected").val();
   if (editSelectCon == 'Dish Bill') {
         $(".number-of-tv").show();
         $(".number-of-mbps").hide();
   }
   else if(editSelectCon == 'Net Bill'){
         $(".number-of-mbps").show();
         $(".number-of-tv").hide();
   }

   $("select.select-connection").change(function(){
     var selectedZone = $(this).children("option:selected").val();
     if (selectedZone == 'Dish Bill') {
         $(".number-of-tv").show();
         $(".number-of-mbps").hide();
     }
     else if(selectedZone == 'Net Bill'){
         $(".number-of-mbps").show();
         $(".number-of-tv").hide();
     }
  });

   $('.edit-table-connection tr td:not(:last-child)').click(function ()    {
      window.location = $(this).closest("tr").data("href");
   });

   $('.edit-table-bill tr td:not(:last-child)').click(function ()    {
         window.location = $(this).closest("tr").data("href");
   });

});


$(function() {
   $("#datepicker").datepicker({
      dateFormat: "yy-mm-dd"
   });
});

//Year Month Dropdown
var minOffset = 0, maxOffset = 100; // Change to whatever you want // minOffset = 0 for current year 
var thisYear = (new Date()).getFullYear();
var m_names = ['January', 'February', 'March','April', 'May', 'June', 'July','August', 'September', 'October','November', 'December'];
var month = 0   // month = (new Date()).getMonth(); // for current month

for (var j = month; j <= 11; j++){
   var months = m_names[ 0 + j]; 
   $('<option>', {value: months, text: months}).appendTo(".month");
}

for (var i = minOffset; i <= maxOffset; i++){
   var year = thisYear + i; $('<option>', {value: year, text: year}).appendTo(".year");
}



///Js PDF 

$("body").on("click", "#btnExport", function () {
   html2canvas($('#tblCustomers')[0], {
       onrendered: function (canvas) {
           var data = canvas.toDataURL();
           var docDefinition = {
               content: [{
                   image: data,
                   width: 500
               }]
           };
           pdfMake.createPdf(docDefinition).download("AllBill-details.pdf");
       }
   });
});
