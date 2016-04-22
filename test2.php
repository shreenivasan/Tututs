<?php
$string1='"fsdfdsfs"';
$string2="'shree'";
?>
<input type="text" value=<?=htmlentities($string1)?> /> 
<input type="text" value=<?=htmlentities($string2)?> /> 
<?php

$data['platform']='android,desktop';
if(strpos($data['platform'],'android'))
{
    echo '1';
}
else 
{
    echo '0';
}

die;
if( strpos(strtolower ($data['platform']),'android')==FALSE && strpos(strtolower ($data['platform']),'desktop')==FALSE && strpos(strtolower ($data['platform']),'wap')==FALSE && strpos(strtolower ($data['platform']),'ios')==FALSE )
{
    echo 'YY';
}
 else {
    echo 'N';
}
die;
    echo substr("Hello world",0,2); die;
    session_start();    
    include_once "../../../cons/connection.php";
    include_once "../../../cons/cons.php";
    include_once 'common_functions.php';
?>
<learnconsole mode='write'> 
    <form id="frm" method="POST" enctype="multipart/form-data" onsubmit="return false;">
        <input type="hidden" name="action" id="action" value="addAssetDetails" />
    <div class="row">
        <div class="col-sm-12">
            <div class="panel form-horizontal">
                <div class="panel-heading">
                    <span class="panel-title">Land/Property Details</span>
                </div>
                <div class="panel-body">
                    <div class="row form-group">
                        <label class="col-sm-4 ">Asset Type:</label>
                        <div class="col-sm-8">
                            <select id="sel_asset_type" name="sel_asset_type" class="form-control">
                                <option value=""> -- Asset Type -- </option>
                                <option value="P">Property</option>
                                <option value="L">Land</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group" id="prop_sub_type" name="prop_sub_type" style="display: none;">
                        <label class="col-sm-4 ">Property Type:</label>
                        <div class="col-sm-8">
                            <select id="prop_type" name="prop_type" class="form-control">
                                <option value=""> -- Property Type -- </option>
                                <option value="C">Commercial</option>
                                <option value="R">Residential</option>
                                <option value="P">Pagadi</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-4">City : </label>
                        <div class="col-sm-8">
                            <?=getAllCities()?>
                        </div>
                    </div>
                    <div class="row form-group" id="location_div">
                        <label class="col-sm-4">Location : </label>
                        <div class="col-sm-8">
                            <select id="sel_location" name="sel_location" class="form-control"></select>
                        </div>
                    </div>          
                    <div id="serv_div"></div>
                    <div class="row form-group" id="div_building_name" style="display: none;">
                        <label class="col-sm-4">Society/Building Name: </label>
                        <div class="col-sm-8">
                            <input type="text" id="building_name" name="building_name" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-12"><h4>Agreement Type Details</h4></div>
                    </div>
                    <div id="aggr_container" class="row form-group">                        
                        <div id="aggr_dtl-1" class="aggr_dtl_name">
                            <label class="col-sm-4">Date </label>
                            <div class="input-group date col-sm-3" id="bs-datepicker-component">
                                <input type="text" class="form-control" name="date[]" id="date-1"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>                             
                            <div class="col-sm-5">&nbsp;</div>
                            <div class="col-sm-12"><h5>Type of Agreements</h5></div>
                            <table id="agree_dtl-1" class="table">
                                <thead>
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>Agreement Name</th>
                                        <th>Action</th>
                                    </tr>                                    
                                </thead>
                                <tbody>
                                    <tr id="agg-1-1">
                                        <th>1</th>                                        
                                        <td>
                                            <?=getAllAgreeTypes("aggr_type_1-1","aggr_type_1[]")?>
                                        </td>
                                        <td><button class="btn btn-info btn-sm add_more_aggrType" id="agree_add-1-1">Add</button></td>
                                    </tr>
                                </tbody>
                            </table>      
                            <table id="sell_dtl-1" class="table">
                                <thead>
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>Seller Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="sell-1-1">
                                        <th>1</th>
                                        <td><input type="text" id="sell_name-1-1" name="sell_name_1[]" class="form-control" value="" /></td>
                                        <td><button class="btn btn-info btn-sm add_more_sellName" id="sell_name_add-1-1">Add</button></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table id="purchaser_dtl-1" class="table">
                                <thead>
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>Purchaser Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="purchaser-1-1">
                                        <th>1</th>
                                        <td><input type="text" id="purchaser_name-1-1" name="purchaser_name_1[]" class="form-control" value="" /></td>
                                        <td><button class="btn btn-info btn-sm add_more_purchaserName" id="purchaser_name_add-1-1">Add</button></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row form-group" id="add-more-1">		  
                                <div class="col-sm-12 text-center">
                                    <button class="btn btn-primary add_more_tbl" id="add-more-btn-1">Add More</button>
                                </div>
                            </div>
                        </div>
                        </div>
                    <div class="row form-group">
                        <label class="col-sm-4">Area: </label>
                        <div class="col-sm-8">
                            <input type="text" id="area" name="area" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-4">Market Value: </label>
                        <div class="col-sm-3">
                            <input type="text" id="market_value" name="market_value" class="num_only form-control" value="0" />
                            <div class="col-sm-5">&nbsp;</div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-4">Cost of Asset: </label>
                        <div class="col-sm-3">
                            <input type="text" id="asset_cost" name="asset_cost" class="num_only form-control" value="0" />
                            <div class="col-sm-5">&nbsp;</div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-4">Stamp Duty Charges: </label>
                        <div class="col-sm-3">
                            <input type="text" id="stamp_duty_chr" name="stamp_duty_chr" class="num_only form-control" value="0" />
                            <div class="col-sm-5">&nbsp;</div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-4">Registration Fees: </label>
                        <div class="col-sm-3">
                            <input type="text" id="reg_fees" name="reg_fees" class="num_only form-control" value="0" />
                            <div class="col-sm-5">&nbsp;</div>
                        </div>
                    </div>
                    <div class="row form-group" id="bond_fees_div" style="display: none">
                        <label class="col-sm-4">Afft & Bond Fees: </label>
                        <div class="col-sm-3">
                            <input type="text" id="bond_fees" name="bond_fees" class="num_only form-control" value="0" />
                            <div class="col-sm-5">&nbsp;</div>
                        </div>
                    </div>                    
                    <div class="row form-group">
                        <label class="col-sm-4">Total: </label>
                        <div class="col-sm-3">
                            <input type="text" id="total" name="total" class="form-control" value="0" readonly=""/>
                        </div>
                        <div class="col-sm-5">&nbsp;</div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-4"><label class="control-label">Original of Sale deed : </label> </label>
                        <div class="col-sm-3">
                            <select id="orginal_sell_deed" name="orginal_sell_deed" class="form-control">
                                <option value="">Select Option</option>
                                <option value="Y">YES</option>
                                <option value="N">NO</option>
                            </select>
                        </div>
                        <div class="col-sm-5">&nbsp;</div>
                    </div>                    
                    <div class="row form-group" id="org_sell_deed_div" style="display: none;">
                        <label class="col-sm-4">Where is original </label>
                        <div class="col-sm-8">
                            <input type="text" id="org_sale_deed_loc" name="org_sale_deed_loc" class="form-control"/>
                        </div>
                        <label class="col-sm-4">MORTGAGE ? </label>
                        <div class="col-sm-8">
                            <select id="mortgage_sel" name="mortgage_sel" class="form-control">
                                <option value="">Select Option</option>
                                <option value="Y">YES</option>
                                <option value="N">NO</option>
                            </select>
                        </div>
                        <div class="col-sm-12" id="mor_details_tbl" style="display: none;">
                            <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Bank Name</th>
                                            <th>Bank Branch</th>
                                            <th>Loan Type</th>
                                            <th>Rate of Interest</th>
                                            <th>Loan Term/Period</th>
                                            <th>EMI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" id="bank_name" name="bank_name" class="form-control" placeholder="Bank Name"/></td>
                                            <td><input type="text" id="bank_branch" name="bank_branch" class="form-control" placeholder="Branch"/></td>
                                            <td><input type="text" id="loan_type" name="loan_type" class="form-control" placeholder="Loan Type" /></td>
                                            <td><input type="text" id="roi" name="roi" class="num_only form-control" placeholder=" Rate of interest" /></td>
                                            <td><input type="text" id="period" name="period" class="form-control" placeholder="Period" /></td>
                                            <td><input type="text" id="emi" name="emi" class="num_only form-control" placeholder="EMI" /></td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                    </div>
<!--                    <div class="row form-group">
                        <label class="col-sm-4"><label class="control-label">Original Sell deed : </label> </label>
                        <div class="col-sm-3">
                            <select id="orginal_sell_deed" name="orginal_sell_deed" class="form-control">
                                <option value="">Select Option</option>
                                <option value="Y">YES</option>
                                <option value="N">NO</option>
                            </select>
                        </div>
                        <div class="col-sm-5">&nbsp;</div>
                    </div>-->
                    <div class="row form-group" id="latest_712_div" style="display:none">
                        <label class="col-sm-4"><label class="control-label">Have Latest 7/12 : </label> </label>
                        <div class="col-sm-3">
                            <select id="latest_712" name="latest_712" class="form-control">
                                <option value="">Select Option</option>
                                <option value="Y">YES</option>
                                <option value="N">NO</option>
                            </select>
                        </div>
                        <div class="col-sm-5">
                            <select id="latest_712_type" name="latest_712_type" class="form-control" style="display: none;">
                                <option value="">Select Option</option>
                                <option value="O">Original</option>
                                <option value="X">Xerox</option>
                            </select>
                        </div>
                    </div>                    
                    <div class="row form-group" style="display: none;">
                        <div class="col-sm-12">
                            <table class="table" id="docDetailsDiv">
                                <tr>
                                    <th colspan="3">Legal Document Name</th>
                                </tr>
                                <tr>
                                    <th>Document Name</th>
                                    <th>File</th>
                                    <th>Action</th>
                                </tr>
                                <tr id="doc_name-tr-1">
                                    <td><input type="text" name="doc_name[]" id="doc_name-1" class="form-control" /></td>
                                    <td><input type="file" name="doc_files[]" id="doc_files-1"/></td>
                                    <td>
                                        <button id="doc_name_add-1-2" class="btn btn-info btn-sm add_more_doc_name">Add</button> 
                                        <button id="doc_name_remove-1-2" class="btn btn-info btn-sm remove_doc_name">Remove</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row form-group" id="share_cer_div" style="display: none;" >
                        <label class="control-label col-sm-3">Share Certificate ?</label>
                        <div class="col-sm-4">
                            <select id="share_cer" name="share_cer" class="form-control">
                                <option value="">Select Option</option>
                                <option value="Y">YES</option>
                                <option value="N">NO</option>
                            </select>
                        </div>
                        <div class="col-sm-5">&nbsp;</div>
                    </div>
                    <div id="share_cer_details1" style="display: none">
                        <label class="control-label">Original/Xerox : </label>
                        <select id="share_cer_type" name="share_cer_type" class="form-control">
                            <option value="">Select Option</option>
                            <option value="O">Original</option>
                            <option value="X">Xerox</option>
                        </select>
                    </div>
                    <div class="row form-group" id="share_cer_details2" style="display:none;">
                        <div class="col-sm-12">
                            <table class="table">
                                    <thead>
                                        <tr>                                            
                                            <th>Shares Certificate No.</th>
                                            <th>No. of Shares</th>
                                            <th>Sr.No. Shares</th>
                                            <th>Issued Date</th>
                                            <th>Issued By</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>                                            
                                            <td><input type="text" id="share_certiNo" name="share_certiNo" class="form-control"/></td>
                                            <td><input type="text" id="share_no" name="share_no" class="form-control"/></td>
                                            <td><input type="text" id="share_srno" name="share_srno" class="form-control"/></td>
                                            <td><input type="text" id="issued_dt" name="issued_dt" class="input-group form-control"/></td>
                                            <td><input type="text" id="issued_by" name="issued_by" class="form-control"/></td>                                            
                                        </tr>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-12">Amount Details</div>
                        <div class="col-sm-12">
                            <table class="table" id="amtDetailsTbl">
                                    <thead>
                                        <tr>                                            
                                            <th>Amount</th>
                                            <th>Mode</th>
                                            <th>Cheque No</th>
                                            <th>Date(DD-MM-YYYY)</th>
                                            <th>Bank</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr id="payment_tr-1">                                            
                                            <td><input type="text" id="payment_amt-1" name="payment_amt[]" class="num_only form-control"/></td>
                                                <td>
                                                    <select name="payment_mode" id="payment_mode-1" class="form-control">
                                                        <option value="">Payment Mode</option>
                                                        <option value="C">Cash</option>
                                                        <option value="CH">Cheque</option>
                                                    </select>
                                            </td>
                                            <td><input type="text" id="payment_cheque-no-1"  name="payment_cheque-no[]" class="form-control"/></td>
                                            <td><input type="text" id="payment_date-1"  name="payment_date[]" class="input-group form-control"/></td>                                            
                                            <td><input type="text" id="payment_bank-1" name="payment_bank[]" class="form-control"/></td>                                            
                                            <td>
                                                <button id="payment_add-1" class="btn btn-info btn-sm add_more_payment">Add</button>                                                 
                                            </td>
                                        </tr>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row form-group" id="rent_details1" style="display: none;">
                        <div class="col-sm-3">
                                <label class="control-label">Given To Rent ? </label>
                        </div>
                        <div class="col-sm-4">
                            <select name="rent_status" class="form-control" id="rent_status">
                                    <option value="">Select Status</option>
                                    <option value="Y">Yes</option>
                                    <option value="N">No</option>
                            </select>
                        </div>
                        <div class="col-sm-5">&nbsp;</div>
                    </div>
                    <div class="row form-group" id="rent_details2" style="display: none;">
                        <table class="table">
                            <tr>
                                <th><label class="control-label">Name</label></th>
                                <td><input type="text" id="renter_name" name="renter_name"  class="form-control" /></td>
                            </tr>
                            <tr>
                                <th><label class="control-label">Term/Period</label></th>
                                <td><input type="text" id="term" name="term"  class="form-control" /></td>
                            </tr>
                            <tr>
                                <th><label class="control-label">Deposit Amount</label></th>
                                <td><input type="text" id="deposit_amt" name="deposit_amt"  class="num_only form-control" /></td>
                            </tr>
                            <tr>
                                <th><label class="control-label">Rent Amount</label></th>
                                <td><input type="text" id="rent_amt" name="rent_amt"  class="num_only form-control" /></td>
                            </tr>
                            <tr>
                                <th><label class="control-label">ROI Inc/Yr </label></th>
                                <td><input type="text" id="roi_yr" name="roi_yr"  class="form-control" /></td>
                            </tr>
                            <tr>
                                <th><label class="control-label">Taxing status</label></th>
                                <td>
                                    <select name="tax_status" class="form-control" id="tax_status">
                                        <option value="">Select Status</option>
                                        <option value="I">Including Tax</option>
                                        <option value="E">Excluding Tax</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th><label class="control-label">Other Conditions/Description</label></th>
                                <td>
                                    <textarea class="form-control" id="othr_cond_desc" name="othr_cond_desc" rows="3" cols="40"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th><label class="control-label">Rent Agreement Copy</label></th>
                                <td>
                                    <input type="file" id="rent_aggr_copy" name="rent_aggr_copy" />
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="row form-group" id="elcMtr_details1" style="display: none;">
                        <div class="col-sm-3">
                                <label class="control-label">Electric Meter ? </label>
                        </div>
                        <div class="col-sm-4">
                            <select name="eMtr_status" class="form-control" id="eMtr_status">
                                    <option value="">Select Status</option>
                                    <option value="Y">Yes</option>
                                    <option value="N">No</option>
                            </select>
                        </div>
                        <div class="col-sm-5">&nbsp;</div>
                    </div>
                    <div class="row form-group" id="elcMtr_details2" style="display: none;">
                        <table class="table">
                            <tr>
                                <th><label class="control-label">Name</label></th>
                                <td><input type="text" id="elec_own_name" name="elec_own_name"  class="form-control" /></td>
                            </tr>
                            <tr>
                                <th><label class="control-label">Location</label></th>
                                <td><input type="text" id="elec_loc" name="elec_loc"  class="form-control" /></td>
                            </tr>
                            <tr>
                                <th><label class="control-label">Old Consumer No.</label></th>
                                <td><input type="text" id="old_cons_no" name="old_cons_no"  class="form-control" /></td>
                            </tr>
                            <tr>
                                <th><label class="control-label">New Consumer No.</label></th>
                                <td><input type="text" id="new_cons_no" name="new_cons_no"  class="form-control" /></td>
                            </tr>
                            <tr>
                                <th><label class="control-label">Meter Type</label></th>
                                <td>
                                    <select name="elect_meter_type" class="form-control" id="elect_meter_type">
                                        <option value="">Select Status</option>
                                        <option value="C">Commercial</option>
                                        <option value="R">Residential</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th><label class="control-label">Meter Number </label></th>
                                <td>
                                    <input type="text" id="meter_number" name="meter_number"  class="form-control" />
                                </td>
                            </tr>
                            <tr>
                                <th><label class="control-label">Zonal Area/Sub Area</label></th>
                                <td>
                                    <input type="text" class="form-control" id="zonal_area" name="zonal_area"/>
                                </td>
                            </tr>
                           <tr>
                                <th><label class="control-label">Area Code</label></th>
                                <td>
                                    <input type="text" class="form-control" id="area_code" name="area_code"/>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-12 text-center">
                            <button id="submit" class="btn btn-primary submit" >Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    </form>
    <script>    
    var selVar=[];
    $(document).ready(function()
    {
        $("#agg-1-1 ").after("");
        $("#sell_name-1-1 ").after("");
        $("#purchaser_name-1-1 ").after("");
        
        $('.input-group').datepicker( {format: 'yyyy-mm-dd'});
        
        $("#sel_asset_type").change(function()
        {
            var sel_asset_type= $("#sel_asset_type").val();
            if(sel_asset_type=="P")
            {
                
                $("#prop_sub_type").css("display","block");                
                $("#div_building_name").css("display","block");                
                $("#serv_div").css("display","none");
                $("#latest_712_div").css("display","none");
                $("#rent_details1").css("display","block");
                $("#elcMtr_details1").css("display","block");
                $("#bond_fees_div").css("display","none");
                $("#share_cer_div").css("display","block");
            }
            else
            {   
                $("#prop_sub_type").css("display","none");                
                $("#div_building_name").css("display","none");
                $("#serv_div").css("display","block");
                $("#latest_712_div").css("display","block");
                $("#rent_details1").css("display","none");
                $("#rent_details2").css("display","none");
                $("#elcMtr_details1").css("display","none");
                $("#elcMtr_details2").css("display","none");
                $("#bond_fees_div").css("display","block");
                $("#share_cer_div").css("display","none");
            }
        
        }); 
        
        $("#sel_city").change(function()
        {            
            var cid=$("#sel_city").val();
            if(cid!='')
            {
                
                var url  = 'pages/Setting/Assets%20Management/common_api.php';	
                var data = { cid:cid,action:"getLocationsByCity"};		
                $.ajax({
                        type: "POST",
                        url: url,
                        data: data,
                        dataType: "html",
                        cache: false,
                        crossDomain: true,
                        success: function(data){
                                $('#sel_location').html(data);                                
                                return false;
                        },
                        error: function(data)
                        {
                                
                        }
                });
            }
            
            var asset_type=$("#sel_asset_type").val();
            if(asset_type=="")
            {
                alert("Please select property type");
                $("#sel_asset_type").focus();
            }
            else if(asset_type=="P")
            {
                $("#serv_div").html("");
            }
            else if(asset_type=="L")
            {
                var url  = 'pages/Setting/Assets%20Management/land_property_api.php';	
                var data = { cid:cid,action:"getCTServeyDtl","PType":asset_type};		
                $.ajax({
                        type: "POST",
                        url: url,
                        data: data,
                        dataType: "html",
                        cache: false,
                        crossDomain: true,
                        success: function(data)
                        {
                            $("#serv_div").html(data);
                            return false;
                        },
                        error: function(data)
                        {
                                
                        }
                });
            }
        });
        
        var add_more_tbl=1;
        
        $(document).on("click",".add_more_tbl", function(e)
        {
            var current_id=add_more_tbl;
            nxt_tbl_id=current_id+1;            
            
            str="";
            str+="<div id='aggr_dtl-"+nxt_tbl_id+"' name='aggr_dtl_name'>";
             str+="<label class='col-sm-4'>Date</label>";
                str+="<div id='bs-datepicker-component' class='input-group date col-sm-3'>";
                    str+="<input type='text' id='date-"+nxt_tbl_id+"' name='date[]' class='form-control'>";
                    str+="<span class='input-group-addon'><i class='fa fa-calendar'></i></span>";
                str+="</div>";
            str+="<div class='col-sm-5'>&nbsp;</div>";
            str+="<div class='col-sm-12'><h5>Type of Agreements</h5></div>";
            
            str+="<table class='table' id='agree_dtl-"+nxt_tbl_id+"'>";
            str+="<thead><tr><th>Sr.No.</th><th>AgreementName</th><th>Action</th></tr></thead>";
            str+="<tbody>";
            str+="<tr id='agg-"+nxt_tbl_id+"-1'>";
            str+="<th>1</th>";
            
            var url  = 'pages/Setting/Assets%20Management/land_property_api.php';	
            var data = {action:"getAggrTypeSel","id":"aggr_type_"+nxt_tbl_id+'-'+"1","name":"aggr_type_"+nxt_tbl_id+"[]"};		
            var res="";
            res=$.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    dataType: "html",
                    cache: false,
                    crossDomain: true,
                    global: false,
                    async:false,
                    success: function(data){
                            selVar.push(data);                             
                             $('.input-group').datepicker( {format: 'yyyy-mm-dd'});
                            return data;
                    }
            }).responseText;
            
            str+="<td>"+res+"</td>";
            selVar=[];
            str+="<td>"+"<button id='agree_add-"+nxt_tbl_id+"-1' class='btn btn-info btn-sm add_more_aggrType'>Add</button>"+"</td>";
            str+="</tr>";
            str+="</tbody>";
            str+="</table>";
            
            str+="<table id='sell_dtl-1' class='table'>";
            str+="<thead><tr><th>Sr.No.</th><th>Seller Name</th><th>Action</th></tr></thead>";
            str+="<tbody>";
            str+="<tr id='sell-"+nxt_tbl_id+"-1'>";
            str+="<th>1</th>";
            str+="<td>"+"<input type='text' id='sell_name-"+nxt_tbl_id+"-1' name='sell_name_"+nxt_tbl_id+"[]' class='form-control' value='' /></td>"+"</td>";
            str+="<td>"+"<button class='btn btn-info btn-sm add_more_sellName' id='sell_name_add-"+nxt_tbl_id+"-1'>Add</button>"+"</td>";
            str+="</tr>";
            str+="</tbody>";
            str+="</table>";
            
            str+="<table id='purchaser_dtl-1' class='table'>";
            str+="<thead>";
            str+="<tr><th>Sr.No.</th><th>Purchaser Name</th><th>Action</th></tr>";
            str+="</thead>";            
            str+="<tbody>";
            str+="<tr id='purchaser-"+nxt_tbl_id+"-1'>";
            str+="<th>1</th>";
            str+="<td><input type='text' id='purchaser_name-"+nxt_tbl_id+"-1' name='purchaser_name_"+nxt_tbl_id+"[]' class='form-control' value='' /></td>";
            str+="<td><button class='btn btn-info btn-sm add_more_purchaserName' id='purchaser_name_add-"+nxt_tbl_id+"-1'>Add</button></td>";
            str+="</tr>";            
            str+="</tbody>";            
            str+="</table>";
            
            
            str+="<div id='add-more-"+nxt_tbl_id+"' class='row form-group'>";
                str+="<div class='col-sm-12 text-center'>";
                    str+="<button id='add-more-btn-"+nxt_tbl_id+"' class='btn btn-primary add_more_tbl'>Add More</button>&nbsp;<button id='remove-btn-"+nxt_tbl_id+"' class='btn btn-primary remove_tbl'>Remove</button>";
                str+="</div>";
            str+="</div>";
            
            str+="</div>";
            
            var myElem=document.getElementById("aggr_dtl-"+(add_more_tbl+1));
            
            if(myElem==null)
            $("#aggr_dtl-"+add_more_tbl).after(str);
            
            add_more_tbl++;
            return false;
        });
        
        $(document).on("click",".remove_tbl", function(e){
            
            var btn_id=$(this).attr("id");
            arr=btn_id.split("-");
            current_tbl_index=arr[2];
            
            $("#aggr_dtl-"+current_tbl_index).remove();
            
        });
        
        $(document).on("click",".add_more_aggrType", function(e)
        {
            //alert($(this).attr('id'));
            var cur_id=$(this).attr('id');
            arr=cur_id.split("-");
            main_tbl_id=parseInt(arr[1]);
            
            child_id=parseInt(arr[2]);
            
            str='<tr id="agg-'+main_tbl_id+'-'+(child_id+1)+'">';
            str+='<td><b>'+(child_id+1)+'</b></td>';
            
            
            var url  = 'pages/Setting/Assets%20Management/land_property_api.php';	
            var data = {action:"getAggrTypeSel","id":"aggr_type_"+main_tbl_id+'-'+(child_id+1),"name":"aggr_type_"+main_tbl_id+"[]"};		
            var res="";
            res=$.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    dataType: "html",
                    global: false,
                    async:false,
                    cache: false,
                    crossDomain: true,
                    success: function(response){
                           return res=response;
                           
                    }
            }).responseText;
            //alert(res+" ==> baher")
            str+="<td>"+res+"</td>";
            selVar=[];
            str+='<td><button class="btn btn-info btn-sm add_more_aggrType" id="agree_add-'+main_tbl_id+'-'+(child_id+1)+'">Add</button> <button class="btn btn-info btn-sm remove_aggrType" id="agree_remove-'+main_tbl_id +'-'+(child_id+1)+'">Remove</button></td>';            
            str+='</tr>';
            
            var myElem=document.getElementById("agg-"+main_tbl_id+"-"+(child_id+1));
            if(myElem==null)
            $("#agg-"+main_tbl_id+"-"+(child_id)).after(str);
            return false;
        });
        
        $(document).on("click",".add_more_sellName", function(e)
        {
            var cur_id=$(this).attr('id');
            arr=cur_id.split("-");
            main_tbl_id=parseInt(arr[1]);
            
            child_id=parseInt(arr[2]);
            
            str='<tr id="sell-'+main_tbl_id+'-'+(child_id+1)+'">';
            str+='<td><b>'+(child_id+1)+'</b></td>';            
            str+="<td>"+"<input type='text' id='sell_name-"+main_tbl_id+"-"+(child_id+1)+"' name='sell_name_"+main_tbl_id+"[]' class='form-control' value='' />"+"</td>";
            str+='<td><button class="btn btn-info btn-sm add_more_sellName" id="agree_add-'+main_tbl_id+'-'+(child_id+1)+'">Add</button> <button class="btn btn-info btn-sm remove_sellName" id="agree_remove-'+main_tbl_id +'-'+(child_id+1)+'">Remove</button></td>';            
            str+='</tr>';            
            
            var myElem = document.getElementById("sell-"+main_tbl_id+'-'+(child_id+1));
            if(myElem==null)
            $("#sell-"+main_tbl_id+"-"+(child_id)).after(str);
            
            return false;
        });
        
        $(document).on("click",".add_more_purchaserName", function(e)
        {
           // alert($(this).attr('id'));
            var cur_id=$(this).attr('id');
            arr=cur_id.split("-");
            main_tbl_id=parseInt(arr[1]);
            
            child_id=parseInt(arr[2]);
            
            str='<tr id="purchaser-'+main_tbl_id+'-'+(child_id+1)+'">';
            str+='<td><b>'+(child_id+1)+'</b></td>';            
            str+="<td>"+"<input type='text' id='purchaser_name-"+main_tbl_id+"-"+(child_id+1)+"' name='purchaser_name_"+main_tbl_id+"[]' class='form-control' value='' />"+"</td>";
            str+='<td><button class="btn btn-info btn-sm add_more_purchaserName" id="agree_add-'+main_tbl_id+'-'+(child_id+1)+'">Add</button> <button class="btn btn-info btn-sm remove_purchaserName" id="agree_remove-'+main_tbl_id +'-'+(child_id+1)+'">Remove</button></td>';            
            str+='</tr>';
            //alert("#agg-"+main_tbl_id+"-"+(child_id+1));
            var myElem = document.getElementById("purchaser-"+main_tbl_id+'-'+(child_id+1));
            if(myElem==null)
            $("#purchaser-"+main_tbl_id+"-"+(child_id)).after(str);
        
            return false;
            
        });
        
        $(document).on("click",".add_more_doc_name", function(e)
        {
//            var cur_id=$(this).attr('id');
//            arr=cur_id.split("-");
//            main_tbl_id=parseInt(arr[1]);
//            
//            child_id=parseInt(arr[2]);
//            
//            str='<tr id="doc_name-tr-'+(main_tbl_id+1)+'">';                     
//            str+="<td>"+"<input type='text' id='doc_name-"+(main_tbl_id+1)+"' name='doc_name[]' class='form-control' value='' />"+"</td>";
//            str+="<td>"+"<input type='file' id='doc_files"+(main_tbl_id+1)+"' name='doc_files[]'  />"+"</td>";
//            str+='<td><button class="btn btn-info btn-sm add_more_doc_name" id="agree_add-'+(main_tbl_id+1)+'">Add</button> <button class="btn btn-info btn-sm remove_doc_name" id="doc_name_remove-'+(main_tbl_id+1)+'">Remove</button></td>';            
//            str+='</tr>';
//            var myElem = document.getElementById("doc_name-tr-"+(main_tbl_id+1));
//            
//            if(myElem==null)
//            $("#doc_name-tr-"+main_tbl_id).after(str);
//        
//            return false;
            
        });
        
        $(document).on("click",".add_more_payment", function(e)
        {
            var cur_id=$(this).attr('id');
            arr=cur_id.split("-");
            cur_id=parseInt(arr[1]);
           
            str="";
            
            str+="<tr id='payment_tr-"+(cur_id+1)+"'>";
            str+="<td>"+"<input type='text' id='payment_amt-"+(cur_id+1)+"' name='payment_amt[]' class='form-control'/>"+"</td>";
            str+="<td>"+"<select name='payment_mode[]' id='payment_mode-"+(cur_id+1)+"'  class='form-control'><option value=''>Payment Mode</option><option value='C'>Cash</option><option value='CH'>Cheque</option></select>"+"</td>";
            str+="<td><input type='text' id='payment_cheque-no-1'  name='payment_cheque-no[]' class='form-control'/></td>";
            str+="<td>"+"<input type='text' id='payment_date-"+(cur_id+1)+"'  name='payment_date[]' class='input-group form-control'/>"+"</td>";
            str+="<td>"+"<input type='text' id='payment_bank-"+(cur_id+1)+"' name='payment_bank[]' class='form-control'/>"+"</td>";
            str+="<td>"+"<button id='payment_add-"+(cur_id+1)+"' class='btn btn-info btn-sm add_more_payment'>Add</button>"+" <button id='payment_remove-"+(cur_id+1)+"' class='btn btn-info btn-sm remove_payment'>Remove</button>"+"</td>";
            str+="</tr>";
            
            var myElem = document.getElementById("payment_tr-"+(cur_id+1));
            
            if(myElem==null)
            $("#payment_tr-"+cur_id).after(str);
        	
           $('.input-group').datepicker( {format: 'yyyy-mm-dd'});	
            return false;
        });
        
        $(document).on("click",".remove_aggrType", function(e)
        {
            e.preventDefault();
            $(this).parent('td').parent('tr').remove(); 
        });
        
        $(document).on("click",".remove_sellName", function(e)
        {
            e.preventDefault();
            $(this).parent('td').parent('tr').remove(); 
        });
        
        $(document).on("click",".remove_purchaserName", function(e)
        {
            e.preventDefault();
            $(this).parent('td').parent('tr').remove(); 
        });
        
        $(document).on("click",".remove_doc_name", function(e)
        {
//            e.preventDefault();
//            $(this).parent('td').parent('tr').remove(); 
        });
        
        $(document).on("click",".remove_payment", function(e)
        {
            e.preventDefault();
            $(this).parent('td').parent('tr').remove(); 
        });
        
        $("#orginal_sell_deed").change(function()
        {
            var exe_sell_deed=$("#orginal_sell_deed").val();
            if(exe_sell_deed=="N")
            {
                $("#org_sell_deed_div").css("display","block");                
            }
            else
            {
                $("#org_sell_deed_div").css("display","none");
            }
        });
        
        $("#mortgage_sel").change(function()
        {
            var mortgage_sel=$("#mortgage_sel").val();
            if(mortgage_sel=="Y")
            {
                $("#mor_details_tbl").css("display","block");                
            }
            else
            {
                $("#mor_details_tbl").css("display","none");
            }
        });
        
        $("#latest_712").change(function()
        {
            var latest_712=$("#latest_712").val();
            if(latest_712=="Y")
            {
                $("#latest_712_type").css("display","block");                
            }
            else
            {
                $("#latest_712_type").css("display","none");
            }
        });
        
        $("#share_cer").change(function()
        {
            var sc=$("#share_cer").val();            
            if(sc=="Y")
            {
                $("#share_cer_details1").css("display","block");
                $("#share_cer_details2").css("display","block");
            }
            else
            {
                $("#share_cer_details1").css("display","none");
                $("#share_cer_details2").css("display","none");
            }
        });
        
        $("#rent_status").change(function(){
            var rs=$("#rent_status").val();
            if(rs=="Y")
            {
                $("#rent_details2").css("display","block");
            }
            else
            {
                $("#rent_details2").css("display","none");
            }
        });
        
        $("#eMtr_status").change(function(){
            var rs=$("#eMtr_status").val();
            if(rs=="Y")
            {
                $("#elcMtr_details2").css("display","block");
            }
            else
            {
                $("#elcMtr_details2").css("display","none");
            }
        });
        
        $("#market_value,#asset_cost,#stamp_duty_chr,#reg_fees,#bond_fees").on('change',function(e)
        {        
            var mv=0;
            var cost=0;
            var rf=0;
            var bf=0;
            var sdc=0;
            
            
            mv=$("#market_value").val();
            if(isNaN(mv))
            {
                mv=0;
            }
            else
            {
                mv=parseInt(mv);
            }
            
            cost=$("#asset_cost").val();
            if(isNaN(cost))
            {
                cost=0;
            }
            else
            {
                cost=parseInt(cost);
            }
            
            sdc=$("#stamp_duty_chr").val();
            if(isNaN(sdc))
            {
                sdc=0;
            }
            else
            {
                sdc=parseInt(sdc);
            }
            rf=$("#reg_fees").val();
            if(isNaN(sdc))
            {
                rf=0;
            }
            else
            {
                rf=parseInt(rf);
            }
            bf=$("#bond_fees").val();
            
            if(isNaN(bf) || bf==null || bf=="")
            {
                bf=0;
            }
            else
            {
                bf=parseInt(bf);
            }
            var total=0;
            //total+=parseInt(mv);
            total+=cost+sdc+rf+bf
           //console.log(bf+'='+rf+'='+sdc+'='+mv+'='+cost)
            
            $("#total").val(total);
            
        })
    });
    </script>
    <script src="js/asset_mgmt/asset_mgmt.js"></script>
</learnconsole>