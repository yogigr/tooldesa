
$(function() {
   $( "#dari_tanggal" ).datepicker();
   $( "#sampai_tanggal" ).datepicker();
   $('#tanggal_lahir_bayi').datepicker();
   $("#tanggal_catat_kawin").datepicker();
   $("#tanggal_kematian").datepicker();
});

/* berlaku ktp */
$(function(){
   for (var i = 1 ; i <= 10 ; i++) {
      $("#berlaku_ktp" + i) ;
   }
});