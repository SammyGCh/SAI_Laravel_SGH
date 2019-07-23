$(document).ready(function(){

    $('.filter_query_field').change(function(){
     if($(this).val() != '')
     {
      var select = $(this).attr("id");
      var value = $(this).val();
      var dependent = $(this).data('dependent');
      var _token = $('input[name="_token"]').val();
      $.ajax({
       url:"{{ route('consultaReporte.fetch') }}",
       method:"POST",
       data:{select:select, value:value, _token:_token, dependent:dependent},
       success:function(result)
       {
        $('#'+dependent).html(result);
       }

      })
     }
    });

    $('#tipoReporte').change(function(){
     $('#areas').val('');
    });

    $('#areas').change(function(){
     $('#tipoReporte').val('');
    });


   });
