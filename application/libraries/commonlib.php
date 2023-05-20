<?php   if (!defined('BASEPATH')) exit('No direct script access allowed');

class Commonlib
{
  function Commonlib()
    {
      $CI =& get_instance();
      $CI->load->library('session');
      $CI->load->library('pagination');
      $CI->load->library('encrypt');
    }
    function cleanData($str)
    {
        $CI =& get_instance();
        $db = $CI->db->conn_id;
        $cleanstr =mysqli_real_escape_string($db,$str);
        return trim($cleanstr);

    }
    function checkLoggedIn()
    {
        
        $CI=& get_instance();
        if(isset($_SESSION['userId']) && $_SESSION['userId']!=0 && $_SESSION['userId']!=NULL && $_SESSION['userId']!="undefined"){
          return $_SESSION['userId'];
        } else {
          return 0;
        }
    }
    function tablegrid($headers,$resultSet){
      $var="";

      if(!empty($headers)){

      $_SESSION['pageLimit']=0;

      $var.=" <tr>
           <td width='100%' >

          <table width='100%' cellspacing='0' cellpadding='0' border='0'>
          <tr>
          <td align='left' class='textVerdana11' >
             <span> <input placeholder='Search Asset Name...' id='searchasset' type='text'  ><input type='button' id='clearSearch' value='Clear Search' onclick='window.location.reload();' style='display:none;'></span>
          </td>
          <td align='center' class='textVerdana11'>
          <a onClick='showHistory()' href=#>Show History</a>&nbsp;
          </td>
          <td align='right' class='textVerdana11' >
          <a onClick='addRecord()' href=#>Add New Record</a>&nbsp;
          </td>
          </tr>
          </table>
          </td>
         </tr>";
         $var.="<tr>
            <td style='padding:5px' colspan='2'>
             <table id='masterGridTable' width='100%' cellspacing='0' cellpadding='0' border='0' style='border:1px solid #CCCCCC;'>";
             $queryGridRowCount=count($resultSet);  //Getting the number of rows

           } else {
             $_SESSION['pageLimit']+=1;
           }

      if($queryGridRowCount==0)
      {
           $var.="<tr><td align='center' class='textVerdana11' style='font-size:14px;padding:10px 0px 10px 0px;'><b>No Records Found</b></td></tr></table><br/><br/><br/><br/></td></tr>";
      }
      else
     {
      $var.="<tr><td align='center' width='2%' class='grid-header' height='26px'><strong>#</strong></td>";

      foreach($headers as $columns => $values)
      {
        $var.="<td class='th-sm' style='padding:3px 5px 3px 5px'><nobr>";
        $var.=ucfirst($values);
        $var.="</nobr></td>";

      }
      $var.="</tr>";
      $i=0;
      foreach ($resultSet as $result)
      {
        $var.="<tr align='center' width='2%' class='grid-header' height='26px' id='gridRow".($i+1)."'><td>". ++$i."</td>"; 
        foreach($headers as $columns => $values)
        {
          $var.="<td class='th-sm' style='padding:3px 5px 3px 5px'><nobr>";
          $var.=$result[$columns];
          $var.="</nobr></td>";
        }
        $var.="</tr>";
      }

      // $var.="<tr><td align='right' width='2%' class='grid-header' height='26px'>";
      // $var.="<div onclick=loadmore(".$_SESSION['pageLimit'].");>Load More</div>";
      // $var.="</td></tr>";

    }

    if(!empty($headers)){

$var.="</table></td></tr>";
}
return $var;
}

}