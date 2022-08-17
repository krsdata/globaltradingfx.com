 // multipal select logic

$(document).on('change','.js-checkbox-all',function(){

          var parent = $(this).closest('table');
          if($(this).is(':checked')){


            $('.js-checkbox-single').each(function(){

                 if($(this).is('[disabled]')){
                   $(this).removeClass('js-checkbox-single');
                 }else{
                    $(parent).find('tbody .js-checkbox-single').prop('checked',true);
                    $(parent).find('#action-dropdown').show();
                    $(parent).find('#show_staff').show();
                 }   
                   
                });
 
          }else{
            $(parent).find('tbody .js-checkbox-single').prop('checked',false);
            $(parent).find('#action-dropdown').hide();
            $(parent).find('#show_staff').hide();
          }
        });
      $(document).on('change','#user-dataTable tbody .js-checkbox-single',function(){
          var parent = $(this).closest('table'),
            collections = getSelectedCollectionIds();
          if(collections.length > 0 ){
            $(parent).find('#action-dropdown').show();
            $(parent).find('#show_staff').show();
          }else{
            $(parent).find('#action-dropdown').hide();
            $(parent).find('#show_staff').hide();
          }
        });

      $(document).on('change','.js-checkbox-all',function(){
          var parent = $(this).closest('table'),
              collections = getSelectedCollectionIds();
          if(collections.length > 0 ){
            $(parent).find('#action-dropdown').show();
            $(parent).find('#show_staff').show();
          }else{
            $(parent).find('#action-dropdown').hide();
            $(parent).find('#show_staff').hide();
          }
        });

      