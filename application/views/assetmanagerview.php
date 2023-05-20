<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Welcome to Integrated Assest Managament System</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style type="text/css">

  ::selection { background-color: #E13300; color: white; }
  ::-moz-selection { background-color: #E13300; color: white; }

  body {
    background-color: #fff;
    margin: 40px;
    font: 13px/20px normal Helvetica, Arial, sans-serif;
    color: #4F5155;
  }

  a {
    color: #003399;
    background-color: transparent;
    font-weight: normal;
    text-decoration: none;
  }

  a:hover {
    color: #97310e;
  }

  #body {
    margin: 0 15px 0 15px;
    min-height: 96px;
  }

  .required:after {
    content:" *";
    color: red;
  }

  #container {
    margin: 10px;
    border: 1px solid #D0D0D0;
    box-shadow: 0 0 8px #D0D0D0;
    padding: 10px;
  }

  .loader-img-login {
    background: url('../asset-demo/images/loader.svg');
    background-position: 50% 50%;
    background-repeat: no-repeat;
    background-size: 60px;
    background-color: #FFF;
    box-shadow: 0px 2px 8px #AAA;
    border-radius: 50%;
    width: 54px;
    height: 54px;
    top: 20%;
    left: 0;
    right: 0;
    margin: 0 auto;
    position: absolute;
    z-index: 9999;
    display : none;
    
}
.error-div {
    display: none;
    border-radius: 5px;
    opacity: 0.9;
    position: absolute;
    background-color: #444;
    bottom: 30%;
    width: 73%;
    left: 0;
    right: 0;
    margin: 0 auto;
    color: #FFF;
    font: 14px 'Roboto';
    padding: 5px 10px;
    z-index: 999;
}
.error {
    background-color: #F2DEDE;
    border: 1px solid rgb(229, 74, 74);
    color: rgb(229, 74, 74);
    font: 15px 'Roboto';
    padding: 15px;
    border-radius: 2px;
}
.gridPanelTitle {
    background-color: #ecf0f5;
    font-family:Verdana, Arial, Helvetica, sans-serif;
    font-size: 12px;
    color:#2e5b87;
    font-weight:bold;   

}
  </style>

  </head>
<body>
<div id="headerDiv" style="float:right;"><input class="btn btn-primary btn-block mb-4" type="button" onclick="logout();" name="Logout" value="Logout"></div>
<div id="container">
  <table id="table_grid" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
    <?php echo $html; ?>
</table>

<!-- This is the add window that opens up -->  
<div id="addModal" style="display:none; width:860px;"> 
<table width="100%" cellspacing=0 cellpadding=0 border=0>
    <tr>
    <td width=10 height=10 ></td>
    <td >
    <div style="background-color:#ffffff; position:relative">
            <div id="addLoading" style="text-align:center; padding:10px">
            <img src="<?php echo base_url().'images/loader.svg';?>"  /> 
            </div>
            <!-- here goes the content of the div -->
            <div id="addContent" style="display:none">
            <form name="addForm" id="addForm" method="post"  enctype="multipart/form-data"
            action="#" style="margin:0px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td colspan="3">         
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="modal_top_extra_wide">
                        <tr>
                            <td align="left" width="25" height="16" class="gridPanelTitle">
                            </td>
                            <td align="left" class="gridPanelTitle">&nbsp;<b>Add Asset</b>
                            </td>
                            <td align="left" width="25" height="16" class="gridPanelTitle">
                            </td>   
                        </tr>   
                    </table>
                    
                </td>
            </tr> 
            <tr>
            <td id="formContainer2">
            <div style="padding-left:5px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="modal_content">
            <tr>
            <td>    
             
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td colspan="2">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    
                    <tr><td height="15"></td></tr>
                     

                    <tr>
                        <td ><strong class="required">Name</strong></td>
                        <td >
                            <input type="text" name="a_name" id="a_name" class="textVerdana11 textbox_medium" maxlength="100" />
                        </td>
                    </tr>
                                             
                    
                    
                        <tr><td height="10"></td></tr>

                    <tr>
                        <td ><strong>Description</strong></td>
                        <td >
                            <input type="text" name="a_description" id="a_description" class="textVerdana11 textbox_medium" maxlength="100" />
                        </td>
                    </tr>
                                             
                    
                    
                        <tr><td height="10"></td></tr>

                    <tr>
                        <td ><strong>Year Constructed</strong></td>
                        <td >
                            <input type="text" name="a_installationyear" id="a_installationyear" class="textVerdana11 textbox_medium" maxlength="100" />
                        </td>
                    </tr>
                                             
                    
                    
                        <tr><td height="10"></td></tr>

                    <tr>
                        <td ><strong>Life</strong></td>
                        <td >
                            <input type="text" name="a_expectedusefullife" id="a_expectedusefullife" class="textVerdana11 textbox_medium" maxlength="100" />
                        </td>
                    </tr>
                                             
                    
                    
                        <tr><td height="10"></td></tr>

                    <tr>
                        <td ><strong>Renewal Year</strong></td>
                        <td >
                            <input type="text" name="a_renewalyear" id="a_renewalyear" class="textVerdana11 textbox_medium" maxlength="100" />
                        </td>
                    </tr>
                                             
                    
                    
                        <tr><td height="10"></td></tr>

                    <tr>
                        <td ><strong>Condition</strong></td>
                        <td >
                            <input type="text" name="a_condition" id="a_condition" class="textVerdana11 textbox_medium" maxlength="100" />
                        </td>
                    </tr>
                                             
                    
                    
                        <tr><td height="10"></td></tr>

                    <tr>
                        <td ><strong>Quantity</strong></td>
                        <td >
                            <input type="text" name="a_quantity" id="a_quantity" class="textVerdana11 textbox_medium" maxlength="100" />
                        </td>
                    </tr>
                                             
                    
                    
                        <tr><td height="10"></td></tr>

                    <tr>
                        <td ><strong>Unit Cost</strong></td>
                        <td >
                            <input type="text" name="a_unitcost" id="a_unitcost" class="textVerdana11 textbox_medium" maxlength="100" />
                        </td>
                    </tr>
                                             
                    
                    
                        <tr><td height="10"></td></tr>

                    <tr>
                        <td ><strong>Estimated Cost</strong></td>
                        <td >
                            <input type="text" name="a_estimatedcost" id="a_estimatedcost" class="textVerdana11 textbox_medium" maxlength="100" />
                        </td>
                    </tr>
                                             
                    
                    
                        <tr><td height="10"></td></tr>

                        
                    </table>
                </td>
            </tr>
        </table> 
        </td>
        </tr>
        </table>
        </div>          
                   
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="modal_bottom">                
                        <tr>

                            <td colspan="4" align="right"> 
                                <span id="submitDiv" style="display:inline-block;text-align:center;width:410px;">
                                    <span id="submitSpanAdd">
                                        <input id="close" class="btn btn-primary btn-block mb-4" type="button" name="submitClose" value="Save and close" onClick="$('#submitSpan').hide();$('#submitLoader').show();submitAddRequest();" />&nbsp;
                
                                        <input id="exit" onClick="hideModal('addModal');" class="btn btn-primary btn-block mb-4" type="button" name="Close" value="Close" />
                                    </span>
                                    <span id="submitLoaderAdd" style="display:none;padding-right:350px">
                                        <img src="<?php echo base_url(); ?>images/loader.svg" />
                                    </span>
                                </span> 
                            </td>
                        </tr>
            
        </table>
    
    </td>
    <tr>
    </table>    
   
    </form>
    </div>
    <!-- Div content ends -->
    </div>
    
    </td>
    <td width=10 height=10 ></td>
    </tr>
    <tr>
    <td width=10 height=10 ></td>
    <td ></td>
    <td width=10 height=10 ></td>
    </tr>
    </table>
    <div id="errorDiv"></div>
</div>
<!-- add info window ends --> 
<!-- This is the edit window that opens up -->  
<div id="editModal" style="display:none; width:860px;"> 
<table width="100%" cellspacing=0 cellpadding=0 border=0>
    <tr>
    <td width=10 height=10 ></td>
    <td >
    <div style="background-color:#ffffff; position:relative">
            <div id="editLoading" style="text-align:center; padding:10px">
            <img src="<?php echo base_url().'images/loader.svg';?>"  /> 
            </div>
            <!-- here goes the content of the div -->
            <div id="editContent" style="display:none">
            <form name="editForm" id="editForm" method="post"  enctype="multipart/form-data"
            action="#" style="margin:0px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td colspan="3">         
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="modal_top_extra_wide">
                        <tr>
                            <td align="left" width="25" height="16" class="gridPanelTitle">
                            </td>
                            <td align="left" id="editTitle" class="gridPanelTitle">&nbsp;<b>Edit Asset</b>
                            </td>
                            <td align="left" width="25" height="16" class="gridPanelTitle">
                            </td>   
                        </tr>   
                    </table>
                    
                </td>
            </tr> 
            <tr>
            <td id="formContainer2">
            <div style="padding-left:5px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="modal_content">
            <tr>
            <td>    
             
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td colspan="2">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    
                    <tr><td height="15"></td></tr>
                     

                    <tr>
                        <td ><strong class="required">Name</strong></td>
                        <td >
                            <input type="text" name="e_name" id="e_name" class="textVerdana11 textbox_medium" maxlength="100" />
                        </td>
                    </tr>
                                             
                    
                    
                        <tr><td height="10"></td></tr>

                    <tr>
                        <td ><strong>Description</strong></td>
                        <td >
                            <input type="text" name="e_description" id="e_description" class="textVerdana11 textbox_medium" maxlength="100" />
                        </td>
                    </tr>
                                             
                    
                    
                        <tr><td height="10"></td></tr>

                    <tr>
                        <td ><strong>Year Constructed</strong></td>
                        <td >
                            <input type="text" name="e_installationyear" id="e_installationyear" class="textVerdana11 textbox_medium" maxlength="100" />
                        </td>
                    </tr>
                                             
                    
                    
                        <tr><td height="10"></td></tr>

                    <tr>
                        <td ><strong>Life</strong></td>
                        <td >
                            <input type="text" name="e_expectedusefullife" id="e_expectedusefullife" class="textVerdana11 textbox_medium" maxlength="100" />
                        </td>
                    </tr>
                                             
                    
                    
                        <tr><td height="10"></td></tr>

                    <tr>
                        <td ><strong>Renewal Year</strong></td>
                        <td >
                            <input type="text" name="e_renewalyear" id="e_renewalyear" class="textVerdana11 textbox_medium" maxlength="100" />
                        </td>
                    </tr>
                                             
                    
                    
                        <tr><td height="10"></td></tr>

                    <tr>
                        <td ><strong>Condition</strong></td>
                        <td >
                            <input type="text" name="e_condition" id="e_condition" class="textVerdana11 textbox_medium" maxlength="100" />
                        </td>
                    </tr>
                                             
                    
                    
                        <tr><td height="10"></td></tr>

                    <tr>
                        <td ><strong>Quantity</strong></td>
                        <td >
                            <input type="text" name="e_quantity" id="e_quantity" class="textVerdana11 textbox_medium" maxlength="100" />
                        </td>
                    </tr>
                                             
                    
                    
                        <tr><td height="10"></td></tr>

                    <tr>
                        <td ><strong>Unit Cost</strong></td>
                        <td >
                            <input type="text" name="e_unitcost" id="e_unitcost" class="textVerdana11 textbox_medium" maxlength="100" />
                        </td>
                    </tr>
                                             
                    
                    
                        <tr><td height="10"></td></tr>

                    <tr>
                        <td ><strong>Estimated Cost</strong></td>
                        <td >
                            <input type="text" name="e_estimatedcost" id="e_estimatedcost" class="textVerdana11 textbox_medium" maxlength="100" />
                        </td>
                    </tr>
                                             
                    
                    
                        <tr><td height="10"></td></tr>

                        
                    </table>
                </td>
            </tr>
        </table> 
        </td>
        </tr>
        </table>
        </div>          
                   
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="modal_bottom">                
                        <tr>

                            <td colspan="4" align="right"> 
                                <span id="submitDivEdit" style="display:inline-block;text-align:center;width:410px;">
                                    <span id="submitSpanEdit">
                                      <input type="hidden" id="e_assetId" value="">
                                        <input id="close" class="btn btn-primary btn-block mb-4" type="button" name="submitClose" value="Save and close" onClick="$('#submitSpanEdit').hide();$('#submitLoaderEdit').show();submitEditRequest();" />&nbsp;
                
                                        <input id="exit" onClick="hideModal('editModal');" class="btn btn-primary btn-block mb-4" type="button" name="Close" value="Close" />
                                    </span>
                                    <span id="submitLoaderEdit" style="display:none;padding-right:350px">
                                        <img src="<?php echo base_url(); ?>images/loader.svg" />
                                    </span>
                                </span> 
                            </td>
                        </tr>
            
        </table>
    
    </td>
    <tr>
    </table>    
   
    </form>
    </div>
    <!-- Div content ends -->
    </div>
    
    </td>
    <td width=10 height=10 ></td>
    </tr>
    <tr>
    <td width=10 height=10 ></td>
    <td ></td>
    <td width=10 height=10 ></td>
    </tr>
    </table>
    <div id="errorDivEdit"></div>
</div>
<!-- edit info window ends --> 
<!-- This is the map window that opens up -->  
<div id="mapModal" style="display:none; width:860px;"> 
<table width="100%" cellspacing=0 cellpadding=0 border=0>
    <tr>
    <td width=10 height=10 ></td>
    <td >
    <div style="background-color:#ffffff; position:relative">
            <div id="mapLoading" style="text-align:center; padding:10px">
            <img src="<?php echo base_url().'images/loader.svg';?>"  /> 
            </div>
            <!-- here goes the content of the div -->
            <div id="mapContent" style="display:none">
            <form name="mapForm" id="mapForm" method="post"  enctype="multipart/form-data"
            action="#" style="margin:0px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td colspan="3">         
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="modal_top_extra_wide">
                        <tr>
                            <td align="left" width="25" height="16" class="gridPanelTitle">
                            </td>
                            <td align="left" class="gridPanelTitle">&nbsp;<b>Map Asset</b>
                            </td>
                            <td align="left" width="25" height="16" class="gridPanelTitle">
                            </td>   
                        </tr>   
                    </table>
                    
                </td>
            </tr> 
            <tr>
            <td id="formContainer2">
            <div style="padding-left:5px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
            <td>    
             
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td colspan="2">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    
                    <tr><td height="15"></td></tr>
                     

                    <tr>
                        <td ><strong class="required">Name</strong></td>
                        <td >
                            <input type="text" name="assetName" id="assetName" maxlength="100" disabled />
                        </td>
                    </tr>
                                             
                    
                    
                        <tr><td height="10"></td></tr>

                    <tr>
                        <td ><strong>User</strong></td>
                        <td>
                          <select  name="assetUser" id="assetUser" > </select>
                        </td>
                    </tr>
                                             
                    
                    
                        <tr><td height="10"></td></tr>

                        
                    </table>
                </td>
            </tr>
        </table> 
        </td>
        </tr>
        </table>
        </div>          
                   
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="modal_bottom">                
                        <tr>

                            <td colspan="4" align="right"> 
                                <span id="submitDiv" style="display:inline-block;text-align:center;width:410px;">
                                    <span id="submitSpanMap">
                                      <input type="hidden" id="m_assetId" value="">
                                        <input id="close" class="btn btn-primary btn-block mb-4" type="button" name="submitClose" value="Save and close" onClick="$('#submitSpan').hide();$('#submitLoader').show();mapuser();" />&nbsp;
                
                                        <input id="exit" onClick="hideModal('mapModal');" class="btn btn-primary btn-block mb-4" type="button" name="Close" value="Close" />
                                    </span>
                                    <span id="submitLoaderMap" style="display:none;padding-right:350px">
                                        <img src="<?php echo base_url(); ?>images/loader.svg" />
                                    </span>
                                </span> 
                            </td>
                        </tr>
            
        </table>
    
    </td>
    <tr>
    </table>    
   
    </form>
    </div>
    <!-- Div content ends -->
    </div>
    
    </td>
    <td width=10 height=10 ></td>
    </tr>
    <tr>
    <td width=10 height=10 ></td>
    <td ></td>
    <td width=10 height=10 ></td>
    </tr>
    </table>
    <div id="errorDiv"></div>
</div>
<!-- map info window ends --> 
<!-- This is the history window that opens up -->  
<div id="historyModal" style="display:none; width:860px;"> 
<table width="100%" cellspacing=0 cellpadding=0 border=0>
    <tr>
    <td width=10 height=10 ></td>
    <td >
    <div style="background-color:#ffffff; position:relative">
            <div id="historyLoading" style="text-align:center; padding:10px">
            <img src="<?php echo base_url().'images/loader.svg';?>"  /> 
            </div>
            <!-- here goes the content of the div -->
            <div id="historyContent" style="display:none">
            <form name="mapForm" id="historyForm" method="post"  enctype="multipart/form-data"
            action="#" style="margin:0px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td colspan="3">         
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="modal_top_extra_wide">
                        <tr>
                            <td align="left" width="25" height="16" class="gridPanelTitle">
                            </td>
                            <td align="left" class="gridPanelTitle">&nbsp;<b>Asset History</b>
                            </td>
                            <td align="left" width="25" height="16" class="gridPanelTitle">
                            </td>   
                        </tr>   
                    </table>
                    
                </td>
            </tr> 
            <tr>
            <td id="formContainer2">
            <div style="padding-left:5px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
            <td>    
             
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td colspan="2">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    
                    <tr><td height="15"></td></tr>
                     

                    <tr>
                        <td id="historyTxt"></td>
                      
                    </tr>
                                             
                    
                    
                        <tr><td height="10"></td></tr>

                  

                        
                    </table>
                </td>
            </tr>
        </table> 
        </td>
        </tr>
        </table>
        </div>          
                   
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="modal_bottom">                
                        <tr>

                            <td colspan="4" align="right"> 
                                <span id="submitDiv" style="display:inline-block;text-align:center;width:410px;">
                                    <span id="submitSpanHistory">
                                    
            
                                        <input id="exit" onClick="hideModal('historyModal');" class="btn btn-primary btn-block mb-4" type="button" name="Close" value="Close" />
                                    </span>
                                   
                                </span> 
                            </td>
                        </tr>
            
        </table>
    
    </td>
    <tr>
    </table>    
   
    </form>
    </div>
    <!-- Div content ends -->
    </div>
    
    </td>
    <td width=10 height=10 ></td>
    </tr>
    <tr>
    <td width=10 height=10 ></td>
    <td ></td>
    <td width=10 height=10 ></td>
    </tr>
    </table>
</div>
<!-- history info window ends --> 
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
function showModal(divId,topMargin)
{
    $('#'+divId).modal({position:[topMargin]});
    document.getElementById(divId).style.display='';
}
function hideModal(divId)
{
    document.getElementById(divId).style.display='none';
    $('#errorDiv').hide();
    $('#errorDiv').html('');
}
function addRecord() {

    hideModal('editModal');
    showModal("addModal", 70);    
    document.getElementById("addLoading").style.display = "none";
    $("#addContent").fadeIn(0);
    
}
function submitAddRequest(){ 
  
  $('#submitSpanAdd').hide();
  $('#submitLoaderAdd').show(); 
      
  $("#submitButton").attr("disabled");
  var a_name = $('#a_name').val();
  var a_description = $('#a_description').val();
  var a_installationyear = $('#a_installationyear').val();
  var a_expectedusefullife = $('#a_expectedusefullife').val();
  var a_renewalyear = $('#a_renewalyear').val();
  var a_condition = $('#a_condition').val();
  var a_quantity = $('#a_quantity').val();
  var a_unitcost = $('#a_unitcost').val();
  var a_estimatedcost = $('#a_estimatedcost').val();
  if(a_name != '' ) {

  
  $.post("<?php echo base_url().'assetmanager/add_asset';?>", {a_name:a_name,a_description:a_description,a_installationyear:a_installationyear,a_expectedusefullife:a_expectedusefullife,a_renewalyear:a_renewalyear,a_condition:a_condition,a_quantity:a_quantity,a_unitcost:a_unitcost,a_estimatedcost:a_estimatedcost}, function(msg) { 
    showAddResponse(msg);

    });
  } else {

        $('#errorDiv').show();

        $('#errorDiv').html('<div class="error">Name cannot be left blank.</div>');

        $('#submitSpanAdd').show();

        $('#submitLoaderAdd').hide();
          
      }
}
function showAddResponse(responseMsg) {

  var obj=JSON.parse(responseMsg);
  
  if(obj.status=="Success"){
    
    window.location.reload();
   
   } else {

    totalData = obj.errorMsg.split(".");

      str = "<ul style='list-style:none;margin:0px;text-align:left;padding-left:0px;'>";
      for (i = 0; i < totalData.length; i++) {
        if(totalData[i]!=""){
        errorData = totalData[i].split("-", 3);

        str += "<li style='padding-left:3px'>" + errorData[1] + "</li>";
        $("#" + errorData[0]).css({
          "border": "1px solid #D87676",
          "box-shadow": "0 0px 1px #BB7878 inset, 0 0 8px #D87676"
        });
      }
      }
      str+="</ul>"


      $('#errorDiv').show();

        $('#errorDiv').html('<div class="error">'+str+'</div>');

        $('#submitSpanAdd').show();

        $('#submitLoaderAdd').hide();

   }
}
function editRecord(id) {

  hideModal('addModal');
  hideModal('historyModal');
  hideModal('mapModal');
  showModal("editModal", 70);    
  document.getElementById("editLoading").style.display = "none";
  $("#editContent").fadeIn(0);
  $('#submitSpanEdit').show();
  $('#editTitle').html("Edit Asset");

  $.post("<?php echo base_url().'assetmanager/view_asset';?>", {assetId:id}, function(msg) { 

    obj = $.parseJSON(msg);

    for (i = 0; i < obj.length; i++) {

      document.getElementById("e_name").disabled = false;
      document.getElementById("e_description").disabled = false;
      document.getElementById("e_installationyear").disabled = false;
      document.getElementById("e_expectedusefullife").disabled = false;
      document.getElementById("e_renewalyear").disabled = false;
      document.getElementById("e_condition").disabled = false;
      document.getElementById("e_quantity").disabled = false;
      document.getElementById("e_unitcost").disabled = false;
      document.getElementById("e_estimatedcost").disabled = false;
    
      document.getElementById("e_name").value = obj[i].assetName;
      document.getElementById("e_description").value = obj[i].description;
      document.getElementById("e_installationyear").value = obj[i].installationYear;
      document.getElementById("e_expectedusefullife").value = obj[i].expectedUsefulLife;
      document.getElementById("e_renewalyear").value = obj[i].renewalYear;
      document.getElementById("e_condition").value = obj[i].assetCondition;
      document.getElementById("e_quantity").value = obj[i].quantity;
      document.getElementById("e_unitcost").value = obj[i].unitCost;
      document.getElementById("e_estimatedcost").value = obj[i].estimatedCost;

    }
          document.getElementById("e_assetId").value = id;
          document.getElementById("loading").style.display = "none";
          document.getElementById("content").style.display = "";

    });

  }

  function viewRecord(id) {

  hideModal('addModal');
  hideModal('historyModal');
  hideModal('mapModal');
  showModal("editModal", 70);    
  document.getElementById("editLoading").style.display = "none";
  $("#editContent").fadeIn(0);
  $('#submitSpanEdit').hide();
  $('#editTitle').html("View Asset");
  

  $.post("<?php echo base_url().'assetmanager/view_asset';?>", {assetId:id}, function(msg) { 

    obj = $.parseJSON(msg);

    for (i = 0; i < obj.length; i++) {
    
      document.getElementById("e_name").value = obj[i].assetName;
      document.getElementById("e_description").value = obj[i].description;
      document.getElementById("e_installationyear").value = obj[i].installationYear;
      document.getElementById("e_expectedusefullife").value = obj[i].expectedUsefulLife;
      document.getElementById("e_renewalyear").value = obj[i].renewalYear;
      document.getElementById("e_condition").value = obj[i].assetCondition;
      document.getElementById("e_quantity").value = obj[i].quantity;
      document.getElementById("e_unitcost").value = obj[i].unitCost;
      document.getElementById("e_estimatedcost").value = obj[i].estimatedCost;

      document.getElementById("e_name").disabled = true;
      document.getElementById("e_description").disabled = true;
      document.getElementById("e_installationyear").disabled = true;
      document.getElementById("e_expectedusefullife").disabled = true;
      document.getElementById("e_renewalyear").disabled = true;
      document.getElementById("e_condition").disabled = true;
      document.getElementById("e_quantity").disabled = true;
      document.getElementById("e_unitcost").disabled = true;
      document.getElementById("e_estimatedcost").disabled = true;

    }
          document.getElementById("loading").style.display = "none";
          document.getElementById("content").style.display = "";

    });

  }
  function submitEditRequest(){ 
  
  $('#submitSpanEdit').hide();
  $('#submitLoaderEdit').show(); 
      
  $("#submitButton").attr("disabled");
  var e_assetId = $('#e_assetId').val();
  var e_name = $('#e_name').val();
  var e_description = $('#e_description').val();
  var e_installationyear = $('#e_installationyear').val();
  var e_expectedusefullife = $('#e_expectedusefullife').val();
  var e_renewalyear = $('#e_renewalyear').val();
  var e_condition = $('#e_condition').val();
  var e_quantity = $('#e_quantity').val();
  var e_unitcost = $('#e_unitcost').val();
  var e_estimatedcost = $('#e_estimatedcost').val();
  if(e_name != '' ) {

  
  $.post("<?php echo base_url().'assetmanager/edit_asset';?>", {e_assetId:e_assetId,e_name:e_name,e_description:e_description,e_installationyear:e_installationyear,e_expectedusefullife:e_expectedusefullife,e_renewalyear:e_renewalyear,e_condition:e_condition,e_quantity:e_quantity,e_unitcost:e_unitcost,e_estimatedcost:e_estimatedcost}, function(msg) { 
    showEditResponse(msg);

    });
  } else {

        $('#errorDivEdit').show();

        $('#errorDivEdit').html('<div class="error">Name cannot be left blank.</div>');

        $('#submitSpanEdit').show();

        $('#submitLoaderEdit').hide();
          
      }
}
function showEditResponse(responseMsg) {

  var obj=JSON.parse(responseMsg);
  
  if(obj.status=="Success"){
    
    window.location.reload();
   
   } else {

    totalData = obj.errorMsg.split(".");

      str = "<ul style='list-style:none;margin:0px;text-align:left;padding-left:0px;'>";
      for (i = 0; i < totalData.length; i++) {
        if(totalData[i]!=""){
        errorData = totalData[i].split("-", 3);

        str += "<li style='padding-left:3px'>" + errorData[1] + "</li>";
        $("#" + errorData[0]).css({
          "border": "1px solid #D87676",
          "box-shadow": "0 0px 1px #BB7878 inset, 0 0 8px #D87676"
        });
      }
      }
      str+="</ul>"


      $('#errorDivEdit').show();

        $('#errorDivEdit').html('<div class="error">'+str+'</div>');

        $('#submitSpanEdit').show();

        $('#submitLoaderEdit').hide();

   }
}
function deleteRecord(id) {
    if (false === confirm("Do you want to delete this record?")) {
      return false;
    } else {
      $.post("<?php echo base_url().'assetmanager/delete_asset';?>", {d_assetId:id}, function(responseMsg) { 

        var obj=JSON.parse(responseMsg);
  
        if(obj.status=="Success"){
          
          window.location.reload();
         
         } else {
          // if any pop up msg
         }

      });
    }
  }
  function logout(){
    if (false === confirm("Do you want to logout?")) {
      return false;
    } else {
      $.post("<?php echo base_url().'loginmanager/logout';?>", {}, function() { 
          
          window.location.reload();

      });
    }
  }
  $("#searchasset").on('keydown', function (e) {
    if (e.key === 'Enter' || e.keyCode === 13) {
        
        if(document.getElementById('searchasset')){

          var searchbox=document.getElementById('searchasset').value;
          if(searchbox!=""){

              $.post("<?php echo base_url().'assetmanager/display_grid';?>", {searchbox:searchbox}, function(msg) { 
                $('#table_grid').html(msg);
                document.getElementById('searchasset').value=searchbox;
                document.getElementById("clearSearch").style.display = "";


              });

          }

    }
    }
});
  function mapRecord(id){
    hideModal('editModal');
    hideModal('addModal');
    hideModal('historyModal');
    showModal("mapModal", 70);    
    document.getElementById("mapLoading").style.display = "none";
    $("#mapContent").fadeIn(0);
    $.post("<?php echo base_url().'assetmanager/fetchuser';?>", {assetId:id}, function(msg) { 
      var obj=JSON.parse(msg);

      $("#assetUser").html(obj.str);
      $("#assetName").val(obj.assetName);
      $("#m_assetId").val(id);
      

              });

  }
  function mapuser(){
    var id = $('#m_assetId').val();
    var userId = $('#assetUser').val();
    $.post("<?php echo base_url().'assetmanager/mapuser';?>", {assetId:id,userId:userId}, function() { 
      hideModal('mapModal');

              });
  }
  function showHistory(){
    hideModal('editModal');
    hideModal('addModal');
    hideModal('mapModal');
    showModal("historyModal", 70);    
    document.getElementById("historyLoading").style.display = "none";
    $("#historyContent").fadeIn(0);
    $.post("<?php echo base_url().'assetmanager/showhistory';?>", {}, function(msg) { 
      var obj=JSON.parse(msg);

      $("#historyTxt").html(obj.str);
      

              });

  }
  function loadmore(pageNo){

    $.post("<?php echo base_url().'assetmanager/displaymore';?>", {pageNo:pageNo}, function(msg) { 
      var obj=JSON.parse(msg);

      $('#scrollDiv'+tab).append(obj['convList']);
      

              });
    }
</script>
</body>
</html>