<link href="{{asset('jquery-file-upload/css/jquery.fileupload-ui.min.css')}}" rel="stylesheet" type="text/css"/>
<script src="{{asset('jquery-file-upload/js/vendor/jquery.ui.widget.js')}}" type="text/javascript"></script>
<script src="{{asset('jquery-file-upload/js/jquery.iframe-transport.js')}}" type="text/javascript"></script>
<script src="{{asset('jquery-file-upload/js/jquery.fileupload.js')}}" type="text/javascript"></script>
<script>
    $('.dropify').dropify();

    function anyFileUploader(id){

        $('input[name$="'+id+'_image"]').fileupload({

            url: '{{ url('save_image') }}' + '/' + id,
            done: function(e, data) {
                $('#'+id+'_img').attr('src', data.result.full_url);
                $('#'+id+'_path').val(data.result.image_name);
                $('#'+ id +'_progress').parent().removeClass('progress-striped');
                $('#'+id+'_help_text').text('Image Upload Successfully');
            },
            error: function(e,data){
                $('#'+id+'_help_text').text(eval('e.responseJSON.'+id+'_image')[0]);
                $('#'+ id +'_progress').css('width','0%');
                console.log(e.responseText);
            },
            progress: function(e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#'+ id +'_progress').css('width', progress + '%');
            }

        });
    }


   function multipleFileUploader(id) {
    var files = document.getElementById(id + '_image').files;

    for (var i = 0; i < files.length; i++) {
        var formData = new FormData();
        formData.append(id + '_image', files[i]);

        $.ajax({
            url: '{{ url('save_image') }}' + '/' + id,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                // Handle the success response for each uploaded file here
                console.log(data);

                // Update your image source, hidden input, or other elements for each file
                $('#'+id+'_img').attr('src', data.full_url);
                $('#'+id+'_path').val(data.image_name);
                $('#'+ id +'_progress').parent().removeClass('progress-striped');
                $('#'+id+'_help_text').text('Image Upload Successfully');
            },
            error: function (data) {
                // Handle errors for each uploaded file here
                console.log(data);

                // Display error messages and reset progress bars for each file
                $('#'+id+'_help_text').text(data.responseJSON[id+'_image'][0]);
                $('#'+ id +'_progress').css('width', '0%');
            },
            xhr: function () {
                var xhr = new XMLHttpRequest();
                xhr.upload.onprogress = function (e) {
                    if (e.lengthComputable) {
                        var percent = (e.loaded / e.total) * 100;
                        // Update progress bars for each file
                        $('#'+ id +'_progress').css('width', percent + '%');
                    }
                };
                return xhr;
            },
        });
    }
}



</script>
