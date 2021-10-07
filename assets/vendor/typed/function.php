<?php
/**
*
* @wordpress-plugin
* Plugin Name: Auto Links Tagging
* Description: This plugin Generates Links to your Posts/Articles Automatically Once you have added your links/product into backend & add same Tag in Post tags
* Author: Sajid Hunxai
* Author URI: https://github.com/Sajidhunxai/
* Version: 1.0.0
* Requires PHP: 7.2
*/

// define absolute ath to void direct access

if(!defined ('ABSPATH')){

  define('ABSPATH', dir(__FILE__). '/');
}

// define absolute ath to void direct access
define('autolinkstag_dir', dirname(__FILE__));
define('autolinkstag_url', plugins_url('',__FILE__));
//include database file

include_once("backend/autolinkstag_db_file.php");

//register hook
register_activation_hook(__FILE__,"autolinkstag_tb_create");



add_action('admin_enqueue_scripts','autolinkstag__admin_styles');
// add_action('admin_enqueue_scripts','autolinkstag__admin_scripts');

// function autolinkstag__admin_scripts(){

//   wp_enqueue_script('ajax-js', autolinkstag_url. '/ajax.js','jQuery', '1.0.1', true);
//   wp_enqueue_script('ajax-ss', autolinkstag_url. 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js','jQuery', '1.0.1', true);
//   wp_enqueue_script('ajax-ds', autolinkstag_url. 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js','jQuery', '1.0.1', true);

//   wp_localize_script( 'ajax-js', 'ajax_js_url',
//         array( 
//             'ajaxurl' => admin_url( 'admin-ajax.php' ),
           
//         )
//     );


// }
function autolinkstag__admin_styles(){

    wp_enqueue_style('autolinkstag_styles', autolinkstag_url. 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');
    wp_enqueue_style('autolinkstag_styles1', autolinkstag_url. '/assets/css/mainauto.css');
  }



function autolinkstag_add_menu_function(){
  add_menu_page(
    'AutoTag', //page title
    'AutoTag', //menu Title
    'manage_options', //capability
    'autotag-main', //menu slug
    'autotag_list',  //callable function
    autolinkstag_url.'assets/images/icon.png', // icon url
    10

  );
}
add_action('admin_menu','autolinkstag_add_menu_function');


function wporg_options_page()
{
    add_submenu_page(
        'autotag-main',
        'AutoTag Insert',
        'AutoTag Insert',
        'manage_options',
        'autotag-insert',
        'autotag_insert'
    );
}
add_action('admin_menu', 'wporg_options_page');



function autotag_insert(){

  //include Insertion Code
  include_once("backend/autolinkstag_insert_file.php");

}
function cron_admin_option()
{
    global $wpdb; ?>
<div class="wrap">
  <div class="form-wrap">
    <div id="icon-edit" class="icon32 icon32-posts-post">
      <br>
    </div>
    <?php
    $cron_title = get_option('cron_title');
    $cron_dir = get_option('cron_dir');
    $cron_dir1 = get_option('cron_dir1');
    if (isset($_POST['cron_form_submit']) && $_POST['cron_form_submit'] == 'yes')
    {
        //  Just security thingy that wordpress offers us
        check_admin_referer('cron_form_setting');
        $cron_title = stripslashes(sanitize_text_field($_POST['cron_title']));
        $cron_dir = stripslashes(sanitize_text_field($_POST['cron_dir']));
        $cron_dir1 = stripslashes(sanitize_text_field($_POST['cron_dir1']));
        update_option('cron_title', $cron_title);
        update_option('cron_dir', $cron_dir);
        update_option('cron_dir1', $cron_dir1); ?>
    <div class="updated fade">
      <p>
        <strong>
          <?php _e('Details successfully updated.', 'cron'); ?>
        </strong>
      </p>
    </div>
    <?php
    }
?>
    <style>
      @import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css);
      @import url('https://fonts.googleapis.com/css?family=Roboto');
      .lbe {
        border: 1px solid black;
        background-color: #666;
        cursor: pointer;
        font-size: 15px;
        margin: 0px;
        width: 60px;
        height: 21px;
        margin-top: 12px;
      }
      .hidden {
        display: none;
      }
      .active, .lbe:hover {
        background-color: #0693e3;
        color: white;
      }
      .add,.remove{
        border: 1px solid black;
        padding: 0px 7px;
      }
      .add:hover,.remove:hover{
        cursor: pointer;
      }
      .upload {
        /* border: 0; */
        padding: 0 !important;
        margin: 0 !important;
        width: 22% !important;
        border-style: dashed !important;
      }
      label{
        display: block;
        margin-bottom: 10px;
      }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js">
    </script>
    <script>
    </script>
    </head>
  <body>
    <?php
    /****************POST DATA*********************/
    if ($_POST['action'] == 'cron_details')
    {
        $folderpath = plugin_dir_path(__FILE__);
        $file_name = $folderpath . 'results.json';
        function get_data()
        {
            $tag = $_POST['tag'];
            $link = $_POST['link'];
            $btnYes = $_POST['btnYes'];
            $btnNo = $_POST['btnNo'];
            $minute = $_POST['minute'];
            $day = $_POST['day'];
            $date = $_POST['date'];
            $datae = array();
            $datae[] = array(
                'tag' => $_POST['tag'],
                'link' => $_POST['link'],
                'btnYes' => $_POST['btnYes'],
                'btnNo' => $_POST['btnNo'],
                'minute' => $_POST['minute'],
                'date' => $_POST['date'],
                'day' => $_POST['day']
            );
            if (file_exists("$file_name"))
            {
                //echo "printing array data";
                $current_data = file_get_contents("$file_name");
                $array_data = json_decode($current_data, true);
                return json_encode($datae);
            }
            return json_encode($datae);
        }
        if (file_put_contents($file_name, get_data()))
        {
            //  echo 'success';
            
        }
        else
        {
            // echo 'There is some error';
            
        }
        ////////////////////////
        /////////////////////////////
        $day = $_POST['day'];
        $current_schedules;
        switch ($day)
        {
            case '15 Minute':
                $current_schedules = 'auto_link_15_minute_scheduler';
            break;
            case '30 Minute':
                $current_schedules = 'auto_link_30_minute_scheduler';
            break;
            case 'Once Hourly':
                $current_schedules = 'auto_link_Once_hourly_scheduler';
            break;
            case 'Once Daily':
                $current_schedules = 'auto_link_Once_daily_scheduler';
            break;
            case 'Once Weekly':
                $current_schedules = 'auto_link_Once_weekly_scheduler';
            break;
            case 'Once Biweekly':
                $current_schedules = 'auto_link_Once_biweekly_scheduler';
            break;
            default:
        }
        if (wp_next_scheduled(''))
        {
            wp_clear_scheduled_hook("");
        }
        if (!empty($current_schedules))
        {
            if (!wp_next_scheduled(''))
            {
                wp_schedule_event(time() , $current_schedules, '');
            }
        }
         echo "<meta http-equiv='refresh' content='0'>";
         return;
}

// $file_name = $_FILES["file"]["name"];
    // $target_path = plugin_dir_path( __FILE__ )."upload/". $file_name;
    // echo $target_path;
    // move_uploaded_file($_FILES["file"]["tmp_name"],$target_path. $file_name);
    if (!empty($_FILES["csvfile"]["name"]))
    {
        $folderpath = plugin_dir_path(__FILE__);
        // Get file info
        $fileName = basename($_FILES["csvfile"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        // Allow certain file formats
        $allowTypes = array(
            'csv'
        );
        if (in_array($fileType, $allowTypes))
        {
            $image = $_FILES['csvfile']['tmp_name'];
            $content = (file_get_contents($image));
            $fileName1 = 'upload_' . $fileName;
            file_put_contents($folderpath . '////' . $fileName1, $content);
            // Insert image content into database
            // $insert = mysqli_query($db,"INSERT INTO images(category, image_source_type,url,image_content) VALUES ('$category','image','$fileName1','')");
            $insert = true;
            if ($insert)
            {
                $status = 'success';
                $statusMsg = "File uploaded successfully.";
            }
            else
            {
                $statusMsg = "File upload failed, please try again.";
            }
        }
        else
        {
            $statusMsg = 'Sorry, only csv files are allowed to upload.';
        }
        echo $statusMsg . ' ' . $_FILES["csvfile"]["name"];
    }
    else
    {
        $statusMsg = 'Please select an image file to upload.';
    }

?>
    <script >
        <?php
        $folderpath = plugin_dir_path(__FILE__);
        $jsonFilePath = $folderpath . 'results.json';
        $myfile = fopen($jsonFilePath, "r") or die("Unable to open file!");
        $fileContent = fread($myfile, filesize($jsonFilePath));
    //echo (" var jsondata =".$fileContent.";");
        fclose($myfile);
        ?>
        var filedata =<?php echo json_encode($fileContent);

    ?>;
    var fileObj = JSON.parse(filedata);
    var tagLimitValue = fileObj[0].tag;
    </script>
    <div id="myDIV">
      <!-- <form action=""  id=" myDIV" onsubmit="return false"> --> 
      <form   id=" myDIV"   class="tagForm" method="post" enctype="multipart/form-data" >
        <label class="hidden">
          <input id="action" class="hidden" type="text" name="action" value="cron_details">
        </label> 
        <label>Tag Limit  
          <input id="tagValue" type="text" name="tag" value="">
        </label>
        <br>
        <div id="myDIV" style="display: flex; margin-top: -16px;">
          <h4>Enable affiliate link
          </h4>
          <div style="display: flex; margin-left: 6px;" id="lbe" name="lbe" > 
            <label class="lbe active" name="lblYes" id="lblYes" value="yes" onclick="btnYesClicked
                                                                                     ()" style="text-align: center; margin-left: 14px; color: white;">Yes
            </label>
            <input type="hidden" name="btnYes" value="yes" id="btnYes" >
            <label class="lbe" name="lblNo" id="lblNo" style="text-align: center; color: white;" value="no" onclick="btnNoClicked()">No
            </label>
            <input type="hidden" name="btnNo" id = "btnNo" value="no">
          </div>
        </div>
        <script type="text/javascript">
          var header = document.getElementById("myDIV");
          var btns = header.getElementsByClassName("lbe");
          var btnValue = 0;
          function btnYesClicked() {
            var yesBtn = document.getElementById("btnYes");
            yesBtn.value = "yes";
            var noBtn = document.getElementById("btnNo");
            noBtn.value = "no";
          }
          function btnNoClicked() {
            var yesBtn = document.getElementById("btnYes");
            yesBtn.value = "no";
            var noBtn = document.getElementById("btnNo");
            noBtn.value = "yes";
          }
          for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
              var current = document.getElementsByClassName("active");
              current[0].className = current[0].className.replace(" active", "");
              this.className += " active";
            }
                                    );
          }
        </script>
        <div  id='div_add'>
          <label>Import Your Link   
            <input type='text'  style="height: 25px; font-size: 14px"; onfocus="this.value=''" placeholder='Enter your Link' id='txt_input'>&nbsp;
            <span class='add' id="addSpanId" onclick()>+
            </span>
          </label>
        </div>
        <div class="container" id="linkContainer">
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
        </script>
        <script type="text/javascript">
          var linkElementValue = "Enter your Link...";
          $(document).ready(function(){
            $('[id^="pop-up"]:gt(0)').remove();
            // Add new element
            $(".add").on('click',function(){
              var total_element = $(".element").length;
              // last <div> with element class id
              var nextindex =0;
              if(total_element>0){
                var lastid = $(".element:last").attr("id");
                var split_id = lastid.split("_");
                var nextindex = Number(split_id[1]) + 1;
              }
              var value=document.getElementById("txt_input").value;
              var max = 20;
              // Check total number elements
              if(total_element < max ){
                if(total_element>0){
                  // Adding new div container after last occurance of element class
                  $(".element:last").after("<div class='element' id='div_"+ nextindex +"'></div>");
                  // Adding element to <div>
                  $("#div_" + nextindex).append("<input type='text' name= 'link[]'style='height:25px; font-size:14px; padding:10px; width: 16%; margin:8px; margin-left: 90px' placeholder='Enter your Link' id='txt_"+ nextindex +"' value = "+value +">&nbsp;<span id='remove_" + nextindex + "' class='remove'>X</span>");
                }
                else{
                  $("#linkContainer").append("<div class='element' id='div_"+ nextindex +"'></div>");
                  // Adding element to <div>
                  $("#div_" + nextindex).append("<input type='text' name= 'link[]'style='height:25px; font-size:14px; padding:10px; width: 16%; margin:8px; margin-left: 90px' placeholder='Enter your Link' id='txt_"+ nextindex +"' value = "+value +">&nbsp;<span id='remove_" + nextindex + "' class='remove'>X</span>");
                }
              }
                  document.getElementById("txt_input").setAttribute("value");
            }
                        );
            $('.container').on('click','.remove',function(){
              var id = this.id;
              var split_id = id.split("_");
              var deleteindex = split_id[1];
              // Remove <div> with id
              $("#div_" + deleteindex).remove();
            }
                              );
          }
                           );
        </script>
        <div style="border-style: groove;
                    width: 40%;
                    padding: 12px;">
          <label for="minute" style="padding-right:10px">First Event:
          </label>
          <input type="date" id="date" name="date">
          <input type="time" id="minute" name="minute" >
          <br>
          <br>
          <label for="day" style="padding-right:26px">Recurrence:
          </label>
          <select name="day" id="day">
            <option value="None">None
            </option>
            <option value="15 Minute">15 Minute
            </option>
            <option value="30 Minute">30 Minute
            </option>
            <option value="Once Hourly">Once Hourly
            </option>
            <option value="Once Daily"> Once Daily
            </option>
            <option value="Once Weekly">Once Weekly
            </option>
            <option value="Once BiWeekly">Once BiWeekly
            </option>
          </select>
        </div>
        <section class="row" >
          <div class="col-xs-12">
            <h2 id="introHeader">Upload your CSV File
            </h2>
            <label class="upload">
              <input type="file" name="csvfile" id="csvfile" style=" margin: 20px;" accept=".csv" />
            </label>
          </div>
        </section>
        <!-- <input name="cron_details"  style="margin: 14px 0px" type="submit" value="save" class="wpcf7-form-control wpcf7-submit btn"> -->
        <!-- <label name="cron_details"  style="margin: 14px 0px; border:1px solid; width: fit-content;padding: 4px 12px; border-radius: 2px;" type="submit" id="submit" value="save" class="wpcf7-form-control wpcf7-submit btn" >Save</label>  -->
        <button name="cron_details"  style="margin: 14px 0px" type="submit" id="saveBtn" value="save" class="wpcf7-form-control wpcf7-submit btn">Save
        </button>
      </form>    
      <div id="result">
      </div>
      <?php $folderpath = plugin_dir_path(__DIR__); ?> 
      <script>
        var jsonFilePath ="<?php $folderpath . 'results.json'; ?>"
      </script>

          <script>
      var recurrenceArray = {
        'None':0,
        '15 Minute':1,
        '30 Minute':2,
        'Once Hourly':3,
        'Once Daily':4,
        'Once Weekly':5,
        'Once BiWeekly':6
      };
      if(fileObj||fileObj.length > 0){
        document.getElementById("tagValue").setAttribute("value" , fileObj[0].tag);
        document.getElementById("txt_input").setAttribute("value" , "");
        for(var linkIndex = 0; linkIndex < fileObj[0].link.length; linkIndex++){
          var childNodes = document.getElementById("linkContainer").childNodes;
          linkElementValue = fileObj[0].link[linkIndex];
          var total_element = $(".element").length;
          // last <div> with element class id
          var nextindex =0;
          if(total_element>0){
            var lastid = $(".element:last").attr("id");
            var split_id = lastid.split("_");
            var nextindex = Number(split_id[1]) + 1;
          }
          var value=linkElementValue;
          var max = 20;
          // Check total number elements
          if(total_element < max ){
            if(total_element>0){
              // Adding new div container after last occurance of element class
              $(".element:last").after("<div class='element' id='div_"+ nextindex +"'></div>");
              // Adding element to <div>
              $("#div_" + nextindex).append("<input type='text' name= 'link[]'style='height:25px; font-size:14px; padding:10px; width: 16%; margin:8px; margin-left: 90px' placeholder='Enter your Link' id='txt_"+ nextindex +"' value = "+value +">&nbsp;<span id='remove_" + nextindex + "' class='remove'>X</span>");
            }
            else{
              $("#linkContainer").append("<div class='element' id='div_"+ nextindex +"'></div>");
              // Adding element to <div>
              $("#div_" + nextindex).append("<input type='text' name= 'link[]'style='height:25px; font-size:14px; padding:10px; width: 16%; margin:8px; margin-left: 90px' placeholder='Enter your Link' id='txt_"+ nextindex +"' value = "+value +">&nbsp;<span id='remove_" + nextindex + "' class='remove'>X</span>");
            }
          }
        }
        document.getElementById('minute').setAttribute('value',fileObj[0].minute)
        document.getElementById('day').selectedIndex = recurrenceArray[fileObj[0].day];
        document.getElementById('date').setAttribute('value',fileObj[0].date);
        document.getElementById('btnYes').setAttribute('value',fileObj[0].btnYes);
        document.getElementById('btnNo').setAttribute('value',fileObj[0].btnNo);
        var yesLabel = document.getElementById('lblYes');
        if(fileObj[0].btnYes == 'yes'){
          yesLabel.className = "lbe active";
        }
        else
          yesLabel.className = "lbe";
        var noLabel = document.getElementById('lblNo');
        if(fileObj[0].btnNo == 'yes'){
          noLabel.className = "lbe active";
        }
        else
          noLabel.className = "lbe";
      }
    </script>
    </div>
  </body>
</html>
<?php
}
function autotag_list(){

  //include Insertion Code
  include_once("backend/autotag_list.php");

}
add_action('wp_ajax_autolinkstag_add_front_page','autolinkstag_add_front_page');

function cron_add_to_menu()
{
    add_options_page(__('cron', 'cron') , __('cron', 'cron') , 'manage_options', 'cron', 'cron_admin_option');
}
if (is_admin())
{
    add_action('admin_menu', 'cron_add_to_menu');
}
function cron_textdomain()
{
    load_plugin_textdomain('cron', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}
function cron_widget_init()
{
    if (function_exists('wp_register_sidebar_widget'))
    {
        wp_register_sidebar_widget('cron', __('Cron', 'cron') , 'cron_widget');
    }
}
add_action('plugins_loaded', 'cron_textdomain');
add_action("plugins_loaded", "cron_widget_init");

?>

<?php
include 'autolinktags.php';


?>
