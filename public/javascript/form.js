$elementList = ['input','select','textarea'];
/**
 * @param filter parent element, corresponding go button id
 * @return reset all filters of parent element and trigger click to go button
 */

var resetFilter = function($parentElement, $correspondingGoButtonId,$isDateResetRequest){
console.log($parentElement + " " + $correspondingGoButtonId);
    for(var i in $elementList){
        $($parentElement).find($elementList[i]).each(function(){

                idName = $(this).attr("id");
                console.log(idName);
                    $(this).val('');
                    // $('#merchandiser_name').val('').change();
                    // $('#brand_id').val('').change();
                    // $('#merchandiser_name_workforce').val('').change();
                    // $('#report-outlet-type-selector').val('').change();
                    // $('#other-outlet-type-selector').val('').change();

            });
            if($isDateResetRequest){
                if($(this).hasClass('do_not_reset')){
                    var startdate = $.datepicker.formatDate('yy-mm-01', new Date());
                    var lastDate  = $.datepicker.formatDate('yy-mm-dd', new Date());
                    idName = $(this).attr("id");

                    if(idName == 'reportDateFrom' || idName == 'otherDateFrom'){
                        $('#'+idName).val(startdate);
                    }
                    if(idName == 'reportDateTo' || idName == 'otherDateTo'){
                        $('#'+idName).val(lastDate);
                    }

                }
            }
    }
    $($correspondingGoButtonId).trigger("click");
}

var confirmPopupDialoge = function($this,$id){
    $this.preventDefault();
    swal({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false
    }).then(function() {
        console.log($id);
        $('#delete_'+$id).click();
        swal({
            title : 'Deleted!',
            text :'Member deleted.',
            type: 'success'
        });

    }, function(dismiss) {
        // dismiss can be 'cancel', 'overlay', 'close', 'timer'
        if (dismiss === 'cancel') {
            swal(
                'Cancelled',
                'Member detail is safe :)',
                'error'
            );
        }
    })
}
var getGalleryData = function (){

    var value = $('select#category option:selected').val();
    var CSRF_TOKEN = $('input[name="_token"]').val();
    $(document).ready()
    {
        $.ajax({
            url: "gallery/image",
            type: "post",
            data: {_token: CSRF_TOKEN,image_id:value},
            success: function(result){
                $("#loader").show();
                $('#gallery_div').hide();
                setTimeout(function () {
                   $("#gallery_div").html(result);
                   $("#loader").hide();
                   $('#gallery_div').show();
                },1000);

            }
        });
    }
}

var showImageUploader = function () {
    $('#addButton').hide();
    $('#uploadimage').show();
}
