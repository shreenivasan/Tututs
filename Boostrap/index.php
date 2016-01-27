<!doctype html>
<html>
    <head>       
        <script src="js/bootstrapValidator.js"></script>                
        <script src="js/jquery.min.js"></script>
    </head>
    <body>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <form id="service_path_form" class="form-horizontal">
            <div class="form-group">
            <label class="col-xs-3 control-label">Service Name</label>
            <div class="col-xs-8">
                <input type="text" class="form-control" name="service_path_name" placeholder="Name" />
            </div>
        </div>
            <div class="form-group">
            <label class="col-xs-3 control-label">IP</label>
            <div class="col-xs-5">
                <input type="text" class="form-control" name="service_path_ip" placeholder="IP" />
            </div>
        </div>
            <div class="form-group">
            <label class="col-xs-3 control-label">Description</label>

            <div class="col-xs-8">
                <textarea class="form-control" name="service_path_description" rows="3" placeholder="Write a short Description"></textarea>
            </div>
        </div>
            <div class="form-group">
            <label class="col-xs-3 control-label">Enable</label>
            <div class="col-xs-5">
                <div class="radio">
                    <label>
                        <input type="radio" name="service_path_enabled" value="1" /> Enabled
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="service_path_enabled" value="0" /> Disabled
                    </label>
                </div>
            </div>
        </div>
            <div class="form-group">
            <div class="col-xs-9 col-xs-offset-4">
                <button type="submit" class="btn btn-primary" name="validate" value="Validate and Submit">Validate and Submit</button>
            </div>
        </div>            
        </form>
    </body>            

<script type="text/javascript">
$(document).ready(function() {
$('#service_path_form')
  .formValidation({
    framework: 'bootstrap',
    icon: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
        service_path_name: {
            // The messages for this field are shown as usual
            validators: {
                notEmpty: {
                    message: 'The Service Path Name is required'
                },
            }
        },
        service_path_ip: {
            // Show the message in a tooltip
            err: 'tooltip',
            validators: {
                notEmpty: {
                    message: 'The destination ip address is required'
                },
                ip: {
                    message: 'The ip address is not valid'
                }
            }
        },
        service_path_enabled: {
            // Show the message in a tooltip
            err: 'tooltip',
            validators: {
                notEmpty: {
                    message: 'Do you want this service path to be actively monitored?'
                }
            }
        }
    }
  });
});
</script>
</html>
