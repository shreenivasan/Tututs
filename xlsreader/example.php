<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head> 
<?php
require_once 'excel_reader2.php';
$data = new Spreadsheet_Excel_Reader("example.xls");
$conn=mysql_connect("localhost","root","");
mysql_select_db("test");

$parent_id=0;

$sql="select * from category where parent_cat='0' ";
$res=  mysql_query($sql);
?>
<select id="sel-0" onchange="getChilds(this)" >
    <option value="">Select Value</option>
<?php
while($row=  mysql_fetch_object($res))
{   
?>
    <option value="<?=$row->id?>"><?=$row->cat_name?></option>
<?php
}
?>
<script>
    function getChilds(obj)
    {
        var _val= obj.value;
        var _id= obj.id;
      
        $.ajax
            ({
                url: "one.php?action=getChild&value1="+_val,
                type: "POST",             // Type of request to be send, called as method
                data: {action:"getChild","value1":_val}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                success: function(data)   // A function to be called if request succeeds
                {
                   $("#"+obj.id).nextAll().css('display','none')
                    $("#"+obj.id).after(data);
                },
                error:function()
                {
                    alert("Some error occured ! 2");
                    //document.getElementById('frm').reset(); 
                },
            });
        
    }
    $(document).ready(function(){
        
    });
</script>


