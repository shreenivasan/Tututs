<?php
phpinfo();
?>
<style type="text/css">
    .inputWrapper {
    overflow: hidden;
    position: relative;
    cursor: pointer;
    /*Using a background color, but you can use a background image to represent a button*/
    background-color: #DDF;
}

.fileInput {
    cursor: pointer;
    height: 100%;
    position:absolute;
    top: 0;
    right: 0;
    /*This makes the button huge so that it can be clicked on*/
    font-size:50px;
}
.hidden {
    /*Opacity settings for all browsers*/
    opacity: 0;
    -moz-opacity: 0;
    filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0)
}


/*Dynamic styles*/
.inputWrapper:hover {
    background-color: #FDD;
}
.inputWrapper.clicked {
    background-color: #A66;
}


body {
    font-family:Helvetica;
}
</style>
<script src="jquery/parse_xml/jquery.min.js"></script>
<script>
    $(document).ready(function()
    {
    
        $("#add_image").on('click',function(){
            
        });
        
        $(".inputWrapper").mousedown(function() 
        {
            var button = $(this);
            button.addClass('clicked');
            setTimeout(function()
            {
                button.removeClass('clicked');
            },50);
        });
    });
</script>
<form action="" method="post" enctype="multipart/form-data" id="file_uploader">
    <table>
        <tr>
            <td>Select Image</td>
            <td>
                <div id="image_container">
                    <div class="inputWrapper">
                        <input  class="fileInput" type="file" name="add_image" id="add_image" multiple="true" value="" />
                           <div id="image-container-1" style="display: none"></div>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</form>