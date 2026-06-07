<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

header("X-XSS-Protection: 1; mode=block");

?>
<!DOCTYPE html>

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - empresa"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - empresa"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Pragma" content="no-cache" />
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_userSweetAlertDisplayed = false;
 </SCRIPT>
 <SCRIPT type="text/javascript">
  var sc_blockCol = '<?php echo $this->Ini->Block_img_col; ?>';
  var sc_blockExp = '<?php echo $this->Ini->Block_img_exp; ?>';
  var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax; ?>';
  var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax; ?>';
  var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax; ?>';
  var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax; ?>';
  var sc_ajaxMsgTime = 2;
  var sc_img_status_ok = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_ok; ?>';
  var sc_img_status_err = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_err; ?>';
  var sc_css_status = '<?php echo $this->Ini->Css_status; ?>';
  var sc_css_status_pwd_box = '<?php echo $this->Ini->Css_status_pwd_box; ?>';
  var sc_css_status_pwd_text = '<?php echo $this->Ini->Css_status_pwd_text; ?>';
 </SCRIPT>
        <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_third; ?>jquery/js/jquery.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>frameControl.js"></script>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/viewerjs/viewer.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/viewerjs/viewer.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
    <style type="text/css">
        .sc-form-order-icon {
            padding: 0 2px;
        }
    </style>
<?php
           $formOrderUnusedVisivility = $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'] ? 'visible' : 'visible';
           $formOrderUnusedOpacity = $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'] ? '0.5' : '0.5';
?>
    <style>
        .sc-form-order-icon-unused {
            visibility: <?php echo $formOrderUnusedVisivility ?>;
            opacity: 0.5;
        }
        .scFormLabelOddMult:hover .sc-form-order-icon-unused {
            visibility: visible;
            opacity: <?php echo $formOrderUnusedOpacity ?>;
        }
    </style>
<style type="text/css">
.sc-button-image.disabled {
        opacity: 0.25
}
.sc-button-image.disabled img {
        cursor: default !important
}
</style>
 <style type="text/css">
  .fileinput-button-padding {
   padding: 3px 10px !important;
  }
  .fileinput-button {
   position: relative;
   overflow: hidden;
   float: left;
   margin-right: 4px;
  }
  .fileinput-button input {
   position: absolute;
   top: 0;
   right: 0;
   margin: 0;
   border: solid transparent;
   border-width: 0 0 100px 200px;
   opacity: 0;
   filter: alpha(opacity=0);
   -moz-transform: translate(-300px, 0) scale(4);
   direction: ltr;
   cursor: pointer;
  }
 </style>
<?php

if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['link_info']['margin_top']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['link_info']['margin_top']) {
?>
<style>
.scFormBorder {
    padding-top: 0 !important;
}
.scBlockRowFirst .scFormTable {
    margin-top: <?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['link_info']['margin_top'] ?>;
}
</style>
<?php
}

?>

 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
  <?php 
  if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
  { 
  ?> 
  <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
  <?php 
  } 
  ?> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/6/css/all.min.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_empresa_SemChave/form_empresa_SemChave_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php if (isset($this->scFormFocusErrorName)) {echo $this->scFormFocusErrorName;} ?>";
</script>

<?php
include_once("form_empresa_SemChave_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
var scFormCtrlChanged = true;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_binicio     = "<?php echo $this->arr_buttons['binicio']['type']; ?>";
var Nav_bavanca     = "<?php echo $this->arr_buttons['bavanca']['type']; ?>";
var Nav_bretorna    = "<?php echo $this->arr_buttons['bretorna']['type']; ?>";
var Nav_bfinal      = "<?php echo $this->arr_buttons['bfinal']['type']; ?>";
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_disabled']['last'] : 'off'); ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
<?php
 if (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)
 {
     echo " return;";
 }
 else
 {
?>
 if ('S' == str_ret)
 {
<?php
    if (isset($this->nmgp_botoes['first']) && $this->nmgp_botoes['first'] == "on")
    {
?>
       if ("off" == Nav_binicio_macro_disabled) { $("#sc_b_ini_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
    if (isset($this->nmgp_botoes['back']) && $this->nmgp_botoes['back'] == "on")
    {
?>
       if ("off" == Nav_bretorna_macro_disabled) { $("#sc_b_ret_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
?>
 }
 else
 {
<?php
    if (isset($this->nmgp_botoes['first']) && $this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if (isset($this->nmgp_botoes['back']) && $this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
 if ('S' == str_ava)
 {
<?php
    if (isset($this->nmgp_botoes['last']) && $this->nmgp_botoes['last'] == "on")
    {
?>
       if ("off" == Nav_bfinal_macro_disabled) { $("#sc_b_fim_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
    if (isset($this->nmgp_botoes['forward']) && $this->nmgp_botoes['forward'] == "on")
    {
?>
       if ("off" == Nav_bavanca_macro_disabled) { $("#sc_b_avc_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
?>
 }
 else
 {
<?php
    if (isset($this->nmgp_botoes['last']) && $this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if (isset($this->nmgp_botoes['forward']) && $this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
<?php
  }
?>
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}
<?php

include_once('form_empresa_SemChave_jquery.php');

?>
var applicationKeys = "";
applicationKeys += "ctrl+shift+right";
applicationKeys += ",";
applicationKeys += "ctrl+shift+left";
applicationKeys += ",";
applicationKeys += "ctrl+right";
applicationKeys += ",";
applicationKeys += "ctrl+left";
applicationKeys += ",";
applicationKeys += "alt+q";
applicationKeys += ",";
applicationKeys += "escape";
applicationKeys += ",";
applicationKeys += "ctrl+enter";
applicationKeys += ",";
applicationKeys += "ctrl+s";
applicationKeys += ",";
applicationKeys += "ctrl+delete";
applicationKeys += ",";
applicationKeys += "f1";
applicationKeys += ",";
applicationKeys += "ctrl+shift+c";

var hotkeyList = "";

function execHotKey(e, h) {
    var hotkey_fired = false;
  switch (true) {
    case (["ctrl+shift+right"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_fim");
      break;
    case (["ctrl+shift+left"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ini");
      break;
    case (["ctrl+right"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ava");
      break;
    case (["ctrl+left"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ret");
      break;
    case (["alt+q"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_sai");
      break;
    case (["escape"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_cnl");
      break;
    case (["ctrl+enter"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_inc");
      break;
    case (["ctrl+s"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_alt");
      break;
    case (["ctrl+delete"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_exc");
      break;
    case (["f1"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_webh");
      break;
    case (["ctrl+shift+c"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_copy");
      break;
    default:
      return true;
  }
  if (hotkey_fired) {
        e.preventDefault();
        return false;
    } else {
        return true;
    }
}
</script>

<script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>hotkeys.inc.js"></script>
<script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>hotkeys_setup.js"></script>
<script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>frameControl.js"></script>
<script type="text/javascript">

function process_hotkeys(hotkey)
{
  if (hotkey == "sys_format_fim") {
    if (typeof scBtnFn_sys_format_fim !== "undefined" && typeof scBtnFn_sys_format_fim === "function") {
      scBtnFn_sys_format_fim();
        return true;
    }
  }
  if (hotkey == "sys_format_ini") {
    if (typeof scBtnFn_sys_format_ini !== "undefined" && typeof scBtnFn_sys_format_ini === "function") {
      scBtnFn_sys_format_ini();
        return true;
    }
  }
  if (hotkey == "sys_format_ava") {
    if (typeof scBtnFn_sys_format_ava !== "undefined" && typeof scBtnFn_sys_format_ava === "function") {
      scBtnFn_sys_format_ava();
        return true;
    }
  }
  if (hotkey == "sys_format_ret") {
    if (typeof scBtnFn_sys_format_ret !== "undefined" && typeof scBtnFn_sys_format_ret === "function") {
      scBtnFn_sys_format_ret();
        return true;
    }
  }
  if (hotkey == "sys_format_sai") {
    if (typeof scBtnFn_sys_format_sai !== "undefined" && typeof scBtnFn_sys_format_sai === "function") {
      scBtnFn_sys_format_sai();
        return true;
    }
  }
  if (hotkey == "sys_format_cnl") {
    if (typeof scBtnFn_sys_format_cnl !== "undefined" && typeof scBtnFn_sys_format_cnl === "function") {
      scBtnFn_sys_format_cnl();
        return true;
    }
  }
  if (hotkey == "sys_format_inc") {
    if (typeof scBtnFn_sys_format_inc !== "undefined" && typeof scBtnFn_sys_format_inc === "function") {
      scBtnFn_sys_format_inc();
        return true;
    }
  }
  if (hotkey == "sys_format_alt") {
    if (typeof scBtnFn_sys_format_alt !== "undefined" && typeof scBtnFn_sys_format_alt === "function") {
      scBtnFn_sys_format_alt();
        return true;
    }
  }
  if (hotkey == "sys_format_exc") {
    if (typeof scBtnFn_sys_format_exc !== "undefined" && typeof scBtnFn_sys_format_exc === "function") {
      scBtnFn_sys_format_exc();
        return true;
    }
  }
  if (hotkey == "sys_format_webh") {
    if (typeof scBtnFn_sys_format_webh !== "undefined" && typeof scBtnFn_sys_format_webh === "function") {
      scBtnFn_sys_format_webh();
        return true;
    }
  }
  if (hotkey == "sys_format_copy") {
    if (typeof scBtnFn_sys_format_copy !== "undefined" && typeof scBtnFn_sys_format_copy === "function") {
      scBtnFn_sys_format_copy();
        return true;
    }
  }
    return false;
}

 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

<?php
if (!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName)
{
?>
  scFocusField('tipo');

<?php
}
?>
  addAutocomplete(this);

  $("#hidden_bloco_3").each(function() {
   $(this.rows[0]).bind("click", {block: this}, toggleBlock)
                  .mouseover(function() { $(this).css("cursor", "pointer"); })
                  .mouseout(function() { $(this).css("cursor", ""); });
  });

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

  var i, iTestWidth, iMaxLabelWidth = 0, $labelList = $(".scUiLabelWidthFix");
  for (i = 0; i < $labelList.length; i++) {
    iTestWidth = $($labelList[i]).width();
    sTestWidth = iTestWidth + "";
    if ("" == iTestWidth) {
      iTestWidth = 0;
    }
    else if ("px" == sTestWidth.substr(sTestWidth.length - 2)) {
      iTestWidth = parseInt(sTestWidth.substr(0, sTestWidth.length - 2));
    }
    iMaxLabelWidth = Math.max(iMaxLabelWidth, iTestWidth);
  }
  if (0 < iMaxLabelWidth) {
    $(".scUiLabelWidthFix").css("width", iMaxLabelWidth + "px");
  }
<?php
if (!$this->NM_ajax_flag && isset($this->NM_non_ajax_info['ajaxJavascript']) && !empty($this->NM_non_ajax_info['ajaxJavascript']))
{
    foreach ($this->NM_non_ajax_info['ajaxJavascript'] as $aFnData)
    {
?>
  <?php echo $aFnData[0]; ?>(<?php echo implode(', ', $aFnData[1]); ?>);

<?php
    }
}
?>
 });

   $(window).on('load', function() {
   });
 if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
    "hidden_bloco_3": true
 };

 function toggleBlock(e) {
  var block = e.data.block,
      block_id = $(block).attr("id");
      block_img = $("#" + block_id + " .sc-ui-block-control");

  if (1 >= block.rows.length) {
   return;
  }

  show_block[block_id] = !show_block[block_id];

  if (show_block[block_id]) {
    $(block).css("height", "100%");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockCol));
  }
  else {
    $(block).css("height", "");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockExp));
  }

  for (var i = 1; i < block.rows.length; i++) {
   if (show_block[block_id])
    $(block.rows[i]).show();
   else
    $(block.rows[i]).hide();
  }

  if (show_block[block_id]) {
    if ("hidden_bloco_3" == block_id) {
      scAjaxDetailHeight("form_contato", $($("#nmsc_iframe_liga_form_contato")[0].contentWindow.document).innerHeight());
    }
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

function addAutocomplete(elem) {
 $(".sc-ui-autocomp-id_cidade", elem).each(function() {

  $(this).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "id_cidade" != sId ? sId.substr(9) : "";
   if ("" == $(this).val()) {
    var hasChanged = "" != $("#id_sc_field_" + sId).val();
    $("#id_sc_field_" + sId).val("");
    if (hasChanged) {
     if ('function' == typeof do_ajax_form_empresa_SemChave_event_id_cidade_onchange) { do_ajax_form_empresa_SemChave_event_id_cidade_onchange(sRow); }
    }
   }
   scEventControl_data[sId]["autocomp"] = false;
  }).on("keydown", function(e) {
   if(e.keyCode == $.ui.keyCode.TAB && $(".ui-autocomplete").filter(":visible").length) {
    e.keyCode = $.ui.keyCode.DOWN;
    $(this).trigger(e);
    e.keyCode = $.ui.keyCode.ENTER;
    $(this).trigger(e);
   }
  }).autocomplete({
   minLength: 1,
   source: function (request, response) {
    $.ajax({
     url: "form_empresa_SemChave.php",
     dataType: "json",
     data: {
      term: request.term,
      nmgp_opcao: "ajax_autocomp",
      nmgp_parms: "NM_ajax_opcao?#?autocomp_id_cidade",
      script_case_init: document.F2.script_case_init.value
     },
     success: function (data) {
      if (data == "ss_time_out") {
          nm_move('novo');
      }
      response(data);
     }
    });
   },
   change: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'id_cidade' != sId ? sId.substr(9) : '';
    if ("" == $(this).val()) {
     do_ajax_form_empresa_SemChave_event_id_cidade_onchange(sRow);
    }
   },
   focus: function (event, ui) {
    event.preventDefault();
   },
   select: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'id_cidade' != sId ? sId.substr(9) : '';
    ui.item.value = ui.item.value.toUpperCase();
    ui.item.label = ui.item.label.toUpperCase();
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    do_ajax_form_empresa_SemChave_event_id_cidade_onchange(sRow);
    event.preventDefault();
    $("#id_sc_field_" + sId).trigger("focus");
   }
  });
  $("#id_ac_id_cidade", elem).on("focus", function() {
    $("#id_sc_field_id_cidade").trigger("focus");
  }).on("blur", function() {
    $("#id_sc_field_id_cidade").trigger("blur");
  });
 });
}
</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    $remove_background = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['dashboard_info']['remove_background']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['dashboard_info']['remove_background'] ? 'background-color: transparent; background-image: none; ' : '';
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['link_info']['remove_margin']) {
        $remove_margin = 'margin: 0; ';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['link_info']['remove_background']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['link_info']['remove_background']) {
        $remove_background = 'background-color: transparent; background-image: none; ';
    }
    if ('' != $remove_margin && isset($str_iframe_body) && '' != $str_iframe_body) {
        $str_iframe_body = '';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['link_info']['remove_border']) {
        $remove_border = 'border-width: 0; ';
    }
    if ('' != $remove_background) {
?>
<style>
.scFormBorder { <?php echo $remove_background ?> }
.scFormToolbar { <?php echo $remove_background ?> }
</style>
<?php
    }
    $vertical_center = '';
?>
<body class="scFormPage sc-app-form" style="<?php echo $remove_margin . $remove_background . $str_iframe_body . $vertical_center; ?>">
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
<script type="text/javascript" src="<?php  echo $this->Ini->path_js . "/jsrsClient.js" ?>"> 
</script> 
<div id="idJSSpecChar" style="display: none;"></div>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("form_empresa_SemChave_js0.php");
?>
<script type="text/javascript" src="<?php  echo $this->Ini->path_js . "/jsrsClient.js" ?>"> 
</script> 
<script type="text/javascript"> 
 function setLocale(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_idioma_novo.value = sLocale;
 }
 function setSchema(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_schema_f.value = sLocale;
 }
var scInsertFieldWithErrors = new Array();
<?php
foreach ($this->NM_ajax_info['fieldsWithErrors'] as $insertFieldName) {
?>
scInsertFieldWithErrors.push("<?php echo $insertFieldName; ?>");
<?php
}
?>
$(function() {
        scAjaxError_markFieldList(scInsertFieldWithErrors);
});
 </script>
<form  name="F1" method="post" 
               action="./" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['insert_validation']; ?>">
<?php
}
?>
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>">
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>">
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_empresa_SemChave'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_empresa_SemChave'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable scFormToastTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle scFormToastTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?>ERRO</td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
</td></tr></table></td></tr>
<tr><td class="scFormErrorMessage scFormToastMessage"><span id="id_error_display_table_text"></span></td></tr>
</table>
</div>
<div style="display: none; position: absolute; z-index: 1000" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><?php
if ('' != $this->Ini->Msg_ico_title) {
?>
<img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_title; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmessageclose", "_scAjaxMessageBtnClose()", "_scAjaxMessageBtnClose()", "id_message_display_close_icon", "", "", "float: right", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><?php
if ('' != $this->Ini->Msg_ico_body) {
?>
<img id="id_message_display_body_icon" src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_body; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br /><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onClick="_scAjaxMessageBtnClick()" ></div></td>
  </tr>
 </table>
</div>
<?php
$msgDefClose = isset($this->arr_buttons['bmessageclose']) ? $this->arr_buttons['bmessageclose']['value'] : 'Ok';
?>
<script type="text/javascript">
var scMsgDefTitle = "<?php if (isset($this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl'])) {echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl'];} ?>";
var scMsgDefButton = "Ok";
var scMsgDefClose = "<?php echo $msgDefClose; ?>";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->sc_page; ?>";
</script>
<?php
if ($this->record_insert_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmi']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
if ($this->record_delete_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmd']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
?>
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0 >
 <tr>
  <td>
  <div class="scFormBorder" style="<?php echo (isset($remove_border) ? $remove_border : ''); ?>">
   <table width='100%' cellspacing=0 cellpadding=0>
<tr><td>
<?php
$this->displayTopToolbar();
?>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
    $NM_btn = false;
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['run_iframe'] != "R")
{
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-1';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_label']['new'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-2';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_label']['insert'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-3';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_label']['update'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + S)", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-4';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_label']['delete'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Delete)", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-5';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_disabled']['']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_disabled']['']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_label']['']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_label']['']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_label'][''];
        }
?>
<?php
if (is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Img_sep_form))
{
    if (isset($NM_btn) && $NM_btn)
    {
        $NM_btn = false;
        $NM_ult_sep = "NM_sep_1";
        echo "<img id=\"NM_sep_1\" class=\"NM_toolbar_sep\" style=\"vertical-align: middle\" src=\"" . $this->Ini->path_botoes . $this->Ini->Img_sep_form . "\" />";
    }
}
?>
 
<?php
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (F1)", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call || $this->form_3versions_single) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
        $sCondStyle = ($this->nmgp_botoes['Etiqueta'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_disabled']['etiqueta']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_disabled']['etiqueta']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_label']['etiqueta']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_label']['etiqueta']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['btn_label']['etiqueta'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "etiqueta", "scBtnFn_Etiqueta()", "scBtnFn_Etiqueta()", "sc_Etiqueta_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');</script><?php } ?>
</td></tr> 
<tr><td>
<?php
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['empty_filter'] = true;
       }
  }
?>
<style>
.scTabInactive {
    cursor: pointer;
}
</style>
<script type="text/javascript">
var pag_ativa = "form_empresa_SemChave_form0";
</script>
<ul class="scTabLine sc-ui-page-tab-line">
<?php
    $this->tabCssClass = array(
        'form_empresa_SemChave_form0' => array(
            'title' => "Empresa",
            'class' => empty($nmgp_num_form) || $nmgp_num_form == "form_empresa_SemChave_form0" ? "scTabActive" : "scTabInactive",
        ),
        'form_empresa_SemChave_form1' => array(
            'title' => "Extrato",
            'class' => $nmgp_num_form == "form_empresa_SemChave_form1" ? "scTabActive" : "scTabInactive",
        ),
    );
    if (!empty($this->Ini->nm_hidden_pages)) {
        foreach ($this->Ini->nm_hidden_pages as $pageName => $pageStatus) {
            if ('Empresa' == $pageName && 'off' == $pageStatus) {
                $this->tabCssClass['form_empresa_SemChave_form0']['class'] = 'scTabInactive';
            }
            if ('Extrato' == $pageName && 'off' == $pageStatus) {
                $this->tabCssClass['form_empresa_SemChave_form1']['class'] = 'scTabInactive';
            }
        }
        $displayingPage = false;
        foreach ($this->tabCssClass as $pageInfo) {
            if ('scTabActive' == $pageInfo['class']) {
                $displayingPage = true;
                break;
            }
        }
        if (!$displayingPage) {
            foreach ($this->tabCssClass as $pageForm => $pageInfo) {
                if (!isset($this->Ini->nm_hidden_pages[ $pageInfo['title'] ]) || 'off' != $this->Ini->nm_hidden_pages[ $pageInfo['title'] ]) {
                    $this->tabCssClass[$pageForm]['class'] = 'scTabActive';
                    break;
                }
            }
        }
    }
?>
<?php
    $css_celula = $this->tabCssClass["form_empresa_SemChave_form0"]['class'];
?>
   <li id="id_form_empresa_SemChave_form0" class="sc-form-page sc-tab-click <?php echo $css_celula; ?>" data-tab-name="form_empresa_SemChave_form0">
     Empresa
   </li>
<?php
    $css_celula = $this->tabCssClass["form_empresa_SemChave_form1"]['class'];
?>
   <li id="id_form_empresa_SemChave_form1" class="sc-form-page sc-tab-click <?php echo $css_celula; ?>" data-tab-name="form_empresa_SemChave_form1">
     Extrato
   </li>
</ul>
<div style='clear:both'></div>
</td></tr> 
<tr><td style="padding: 0px">
<div id="form_empresa_SemChave_form0" style='display: none; width: 1px; height: 0px; overflow: scroll'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow scBlockRowFirst"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0" class="scBlockFrame"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="6" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Dados do cliente</TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['empresa']))
    {
        $this->nm_new_label['empresa'] = "Empresa";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $empresa = $this->empresa;
   $sStyleHidden_empresa = '';
   if (isset($this->nmgp_cmp_hidden['empresa']) && $this->nmgp_cmp_hidden['empresa'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['empresa']);
       $sStyleHidden_empresa = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_empresa = 'display: none;';
   $sStyleReadInp_empresa = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['empresa']) && $this->nmgp_cmp_readonly['empresa'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['empresa']);
       $sStyleReadLab_empresa = '';
       $sStyleReadInp_empresa = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['empresa']) && $this->nmgp_cmp_hidden['empresa'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="empresa" value="<?php echo $this->form_encode_input($empresa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_empresa_label" id="hidden_field_label_empresa" style="<?php echo $sStyleHidden_empresa; ?>"><span id="id_label_empresa"><?php echo $this->nm_new_label['empresa']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['php_cmp_required']['empresa']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['php_cmp_required']['empresa'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_empresa_line" id="hidden_field_data_empresa" style="<?php echo $sStyleHidden_empresa; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_empresa_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["empresa"]) &&  $this->nmgp_cmp_readonly["empresa"] == "on") { 

 ?>
<input type="hidden" name="empresa" value="<?php echo $this->form_encode_input($empresa) . "\">" . $empresa . ""; ?>
<?php } else { ?>
<span id="id_read_on_empresa" class="sc-ui-readonly-empresa css_empresa_line" style="<?php echo $sStyleReadLab_empresa; ?>"><?php echo $this->form_format_readonly("empresa", $this->form_encode_input($this->empresa)); ?></span><span id="id_read_off_empresa" class="css_read_off_empresa<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_empresa; ?>">
 <input class="sc-js-input scFormObjectOdd css_empresa_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_empresa" type=text name="empresa" value="<?php echo $this->form_encode_input($empresa) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=65"; } ?> maxlength=65 alt="{datatype: 'text', maxLength: 65, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_empresa_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_empresa_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['tipo']))
   {
       $this->nm_new_label['tipo'] = "Tipo";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo = $this->tipo;
   $sStyleHidden_tipo = '';
   if (isset($this->nmgp_cmp_hidden['tipo']) && $this->nmgp_cmp_hidden['tipo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo']);
       $sStyleHidden_tipo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo = 'display: none;';
   $sStyleReadInp_tipo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo']) && $this->nmgp_cmp_readonly['tipo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo']);
       $sStyleReadLab_tipo = '';
       $sStyleReadInp_tipo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo']) && $this->nmgp_cmp_hidden['tipo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo" value="<?php echo $this->form_encode_input($this->tipo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tipo_label" id="hidden_field_label_tipo" style="<?php echo $sStyleHidden_tipo; ?>"><span id="id_label_tipo"><?php echo $this->nm_new_label['tipo']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['php_cmp_required']['tipo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['php_cmp_required']['tipo'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_tipo_line" id="hidden_field_data_tipo" style="<?php echo $sStyleHidden_tipo; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo"]) &&  $this->nmgp_cmp_readonly["tipo"] == "on") { 

$tipo_look = "";
 if ($this->tipo == "F") { $tipo_look .= "Física" ;} 
 if ($this->tipo == "J") { $tipo_look .= "Jurídica" ;} 
 if (empty($tipo_look)) { $tipo_look = $this->tipo; }
?>
<input type="hidden" name="tipo" value="<?php echo $this->form_encode_input($tipo) . "\">" . $tipo_look . ""; ?>
<?php } else { ?>
<?php

$tipo_look = "";
 if ($this->tipo == "F") { $tipo_look .= "Física" ;} 
 if ($this->tipo == "J") { $tipo_look .= "Jurídica" ;} 
 if (empty($tipo_look)) { $tipo_look = $this->tipo; }
?>
<span id="id_read_on_tipo" class="css_tipo_line"  style="<?php echo $sStyleReadLab_tipo; ?>"><?php echo $this->form_format_readonly("tipo", $this->form_encode_input($tipo_look)); ?></span><span id="id_read_off_tipo" class="css_read_off_tipo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_tipo; ?>">
 <span id="idAjaxSelect_tipo" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_tipo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipo" name="tipo" size="2" alt="{type: 'select', enterTab: false}">
 <option  value="F" <?php  if ($this->tipo == "F") { echo " selected" ;} ?>>Física</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_tipo'][] = 'F'; ?>
 <option  value="J" <?php  if ($this->tipo == "J") { echo " selected" ;} ?>>Jurídica</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_tipo'][] = 'J'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['id_cidade']))
    {
        $this->nm_new_label['id_cidade'] = "Cidade";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_cidade = $this->id_cidade;
   $sStyleHidden_id_cidade = '';
   if (isset($this->nmgp_cmp_hidden['id_cidade']) && $this->nmgp_cmp_hidden['id_cidade'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_cidade']);
       $sStyleHidden_id_cidade = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_cidade = 'display: none;';
   $sStyleReadInp_id_cidade = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_cidade']) && $this->nmgp_cmp_readonly['id_cidade'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_cidade']);
       $sStyleReadLab_id_cidade = '';
       $sStyleReadInp_id_cidade = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_cidade']) && $this->nmgp_cmp_hidden['id_cidade'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_cidade" value="<?php echo $this->form_encode_input($id_cidade) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_id_cidade_label" id="hidden_field_label_id_cidade" style="<?php echo $sStyleHidden_id_cidade; ?>"><span id="id_label_id_cidade"><?php echo $this->nm_new_label['id_cidade']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['php_cmp_required']['id_cidade']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['php_cmp_required']['id_cidade'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_id_cidade_line" id="hidden_field_data_id_cidade" style="<?php echo $sStyleHidden_id_cidade; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_cidade_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_cidade"]) &&  $this->nmgp_cmp_readonly["id_cidade"] == "on") { 

 ?>
<input type="hidden" name="id_cidade" value="<?php echo $this->form_encode_input($id_cidade) . "\">" . $id_cidade . ""; ?>
<?php } else { ?>

<?php
$aRecData['id_cidade'] = $this->id_cidade;
$aLookup = array();
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_id_cidade']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_id_cidade'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_id_cidade']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_id_cidade'] = array(); 
    }

   $old_value_cep = $this->cep;
   $old_value_cgc = $this->cgc;
   $old_value_saldo_real = $this->saldo_real;
   $old_value_cpf = $this->cpf;
   $old_value_dat_ult_mov = $this->dat_ult_mov;
   $old_value_saldo_dolar = $this->saldo_dolar;
   $old_value_data = $this->data;
   $old_value_celular = $this->celular;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_cep = $this->cep;
   $unformatted_value_cgc = $this->cgc;
   $unformatted_value_saldo_real = $this->saldo_real;
   $unformatted_value_cpf = $this->cpf;
   $unformatted_value_dat_ult_mov = $this->dat_ult_mov;
   $unformatted_value_saldo_dolar = $this->saldo_dolar;
   $unformatted_value_data = $this->data;
   $unformatted_value_celular = $this->celular;

   $nm_comando = "SELECT ID, cidade FROM cidade WHERE ID = " . substr($this->Db->qstr($this->id_cidade), 1, -1) . " ORDER BY cidade";
   if ($this->NM_case_insensitive)
   {
       $nm_comando = str_replace("#upperI#", "Upper(", $nm_comando);
       $nm_comando = str_replace("#upperF#", ")", $nm_comando);
   }
   else
   {
       $nm_comando = str_replace("#upperI#", "", $nm_comando);
       $nm_comando = str_replace("#upperF#", "", $nm_comando);
   }

   $this->cep = $old_value_cep;
   $this->cgc = $old_value_cgc;
   $this->saldo_real = $old_value_saldo_real;
   $this->cpf = $old_value_cpf;
   $this->dat_ult_mov = $old_value_dat_ult_mov;
   $this->saldo_dolar = $old_value_saldo_dolar;
   $this->data = $old_value_data;
   $this->celular = $old_value_celular;

   if ('' != $this->id_cidade)
   {
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_id_cidade'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   }
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$sAutocompValue = (isset($aLookup[0][$this->id_cidade])) ? $aLookup[0][$this->id_cidade] : $this->id_cidade;
$id_cidade_look = (isset($aLookup[0][$this->id_cidade])) ? $aLookup[0][$this->id_cidade] : $this->id_cidade;
?>
<span id="id_read_on_id_cidade" class="sc-ui-readonly-id_cidade css_id_cidade_line" style="<?php echo $sStyleReadLab_id_cidade; ?>"><?php echo $this->form_format_readonly("id_cidade", str_replace("<", "&lt;", $id_cidade_look)); ?></span><span id="id_read_off_id_cidade" class="css_read_off_id_cidade<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_id_cidade; ?>">
 <input class="sc-js-input scFormObjectOdd css_id_cidade_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="display: none;" id="id_sc_field_id_cidade" type=text name="id_cidade" value="<?php echo $this->form_encode_input($id_cidade) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=6"; } ?> maxlength=6 style="display: none" alt="{datatype: 'text', maxLength: 6, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['id_cidade'] = $this->id_cidade;
$aLookup = array();
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_id_cidade']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_id_cidade'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_id_cidade']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_id_cidade'] = array(); 
    }

   $old_value_cep = $this->cep;
   $old_value_cgc = $this->cgc;
   $old_value_saldo_real = $this->saldo_real;
   $old_value_cpf = $this->cpf;
   $old_value_dat_ult_mov = $this->dat_ult_mov;
   $old_value_saldo_dolar = $this->saldo_dolar;
   $old_value_data = $this->data;
   $old_value_celular = $this->celular;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_cep = $this->cep;
   $unformatted_value_cgc = $this->cgc;
   $unformatted_value_saldo_real = $this->saldo_real;
   $unformatted_value_cpf = $this->cpf;
   $unformatted_value_dat_ult_mov = $this->dat_ult_mov;
   $unformatted_value_saldo_dolar = $this->saldo_dolar;
   $unformatted_value_data = $this->data;
   $unformatted_value_celular = $this->celular;

   $nm_comando = "SELECT ID, cidade FROM cidade WHERE ID = " . substr($this->Db->qstr($this->id_cidade), 1, -1) . " ORDER BY cidade";
   if ($this->NM_case_insensitive)
   {
       $nm_comando = str_replace("#upperI#", "Upper(", $nm_comando);
       $nm_comando = str_replace("#upperF#", ")", $nm_comando);
   }
   else
   {
       $nm_comando = str_replace("#upperI#", "", $nm_comando);
       $nm_comando = str_replace("#upperF#", "", $nm_comando);
   }

   $this->cep = $old_value_cep;
   $this->cgc = $old_value_cgc;
   $this->saldo_real = $old_value_saldo_real;
   $this->cpf = $old_value_cpf;
   $this->dat_ult_mov = $old_value_dat_ult_mov;
   $this->saldo_dolar = $old_value_saldo_dolar;
   $this->data = $old_value_data;
   $this->celular = $old_value_celular;

   if ('' != $this->id_cidade)
   {
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_id_cidade'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   }
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$sAutocompValue = (isset($aLookup[0][$this->id_cidade])) ? $aLookup[0][$this->id_cidade] : '';
$id_cidade_look = (isset($aLookup[0][$this->id_cidade])) ? $aLookup[0][$this->id_cidade] : '';
?>
<input type="text" id="id_ac_id_cidade" name="id_cidade_autocomp" class="scFormObjectOdd sc-ui-autocomp-id_cidade css_id_cidade_obj<?php echo $this->classes_100perc_fields['input'] ?>" size="30" value="<?php echo $sAutocompValue; ?>" alt="{datatype: 'text', maxLength: 6, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"  /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_cidade_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_cidade_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['razao_social']))
    {
        $this->nm_new_label['razao_social'] = "Razão social";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $razao_social = $this->razao_social;
   $sStyleHidden_razao_social = '';
   if (isset($this->nmgp_cmp_hidden['razao_social']) && $this->nmgp_cmp_hidden['razao_social'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['razao_social']);
       $sStyleHidden_razao_social = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_razao_social = 'display: none;';
   $sStyleReadInp_razao_social = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['razao_social']) && $this->nmgp_cmp_readonly['razao_social'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['razao_social']);
       $sStyleReadLab_razao_social = '';
       $sStyleReadInp_razao_social = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['razao_social']) && $this->nmgp_cmp_hidden['razao_social'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="razao_social" value="<?php echo $this->form_encode_input($razao_social) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_razao_social_label" id="hidden_field_label_razao_social" style="<?php echo $sStyleHidden_razao_social; ?>"><span id="id_label_razao_social"><?php echo $this->nm_new_label['razao_social']; ?></span></TD>
    <TD class="scFormDataOdd css_razao_social_line" id="hidden_field_data_razao_social" style="<?php echo $sStyleHidden_razao_social; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_razao_social_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["razao_social"]) &&  $this->nmgp_cmp_readonly["razao_social"] == "on") { 

 ?>
<input type="hidden" name="razao_social" value="<?php echo $this->form_encode_input($razao_social) . "\">" . $razao_social . ""; ?>
<?php } else { ?>
<span id="id_read_on_razao_social" class="sc-ui-readonly-razao_social css_razao_social_line" style="<?php echo $sStyleReadLab_razao_social; ?>"><?php echo $this->form_format_readonly("razao_social", $this->form_encode_input($this->razao_social)); ?></span><span id="id_read_off_razao_social" class="css_read_off_razao_social<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_razao_social; ?>">
 <input class="sc-js-input scFormObjectOdd css_razao_social_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_razao_social" type=text name="razao_social" value="<?php echo $this->form_encode_input($razao_social) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=65"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_razao_social_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_razao_social_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['rede']))
   {
       $this->nm_new_label['rede'] = "Rede";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rede = $this->rede;
   $sStyleHidden_rede = '';
   if (isset($this->nmgp_cmp_hidden['rede']) && $this->nmgp_cmp_hidden['rede'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rede']);
       $sStyleHidden_rede = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rede = 'display: none;';
   $sStyleReadInp_rede = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rede']) && $this->nmgp_cmp_readonly['rede'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rede']);
       $sStyleReadLab_rede = '';
       $sStyleReadInp_rede = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rede']) && $this->nmgp_cmp_hidden['rede'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="rede" value="<?php echo $this->form_encode_input($this->rede) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rede_label" id="hidden_field_label_rede" style="<?php echo $sStyleHidden_rede; ?>"><span id="id_label_rede"><?php echo $this->nm_new_label['rede']; ?></span></TD>
    <TD class="scFormDataOdd css_rede_line" id="hidden_field_data_rede" style="<?php echo $sStyleHidden_rede; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rede_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rede"]) &&  $this->nmgp_cmp_readonly["rede"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_rede']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_rede'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_rede']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_rede'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_rede']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_rede'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_rede']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_rede'] = array(); 
    }

   $old_value_cep = $this->cep;
   $old_value_cgc = $this->cgc;
   $old_value_saldo_real = $this->saldo_real;
   $old_value_cpf = $this->cpf;
   $old_value_dat_ult_mov = $this->dat_ult_mov;
   $old_value_saldo_dolar = $this->saldo_dolar;
   $old_value_data = $this->data;
   $old_value_celular = $this->celular;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_cep = $this->cep;
   $unformatted_value_cgc = $this->cgc;
   $unformatted_value_saldo_real = $this->saldo_real;
   $unformatted_value_cpf = $this->cpf;
   $unformatted_value_dat_ult_mov = $this->dat_ult_mov;
   $unformatted_value_saldo_dolar = $this->saldo_dolar;
   $unformatted_value_data = $this->data;
   $unformatted_value_celular = $this->celular;

   $nm_comando = "SELECT Rede, Rede  FROM rede  ORDER BY Rede";

   $this->cep = $old_value_cep;
   $this->cgc = $old_value_cgc;
   $this->saldo_real = $old_value_saldo_real;
   $this->cpf = $old_value_cpf;
   $this->dat_ult_mov = $old_value_dat_ult_mov;
   $this->saldo_dolar = $old_value_saldo_dolar;
   $this->data = $old_value_data;
   $this->celular = $old_value_celular;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_rede'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $rede_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->rede_1))
          {
              foreach ($this->rede_1 as $tmp_rede)
              {
                  if (trim($tmp_rede) === trim($cadaselect[1])) {$rede_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->rede) && trim($this->rede) === trim($cadaselect[1])) {$rede_look .= $cadaselect[0];} 
          $x++; 
   }

?>
<input type="hidden" name="rede" value="<?php echo $this->form_encode_input($rede) . "\">" . $rede_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_rede();
   $x = 0 ; 
   $rede_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->rede_1))
          {
              foreach ($this->rede_1 as $tmp_rede)
              {
                  if (trim($tmp_rede) === trim($cadaselect[1])) {$rede_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->rede)) {
                 if (trim($this->rede) == trim($cadaselect[1])) { $rede_look .= $cadaselect[0]; } 
          }
          elseif (isset($cadaselect[1]) && $this->rede == $cadaselect[1]) { $rede_look .= $cadaselect[0]; 
          }
          $x++; 
   }
          if (empty($rede_look))
          {
              $rede_look = $this->rede;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_rede\" class=\"css_rede_line\" style=\"" .  $sStyleReadLab_rede . "\">" . $this->form_format_readonly("rede", $this->form_encode_input($rede_look)) . "</span><span id=\"id_read_off_rede\" class=\"css_read_off_rede" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_rede . "\">";
   echo " <span id=\"idAjaxSelect_rede\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_rede_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_rede\" name=\"rede\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_rede'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Informe a rede") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->rede) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->rede)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rede_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rede_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['cep']))
    {
        $this->nm_new_label['cep'] = "Cep";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cep = $this->cep;
   $sStyleHidden_cep = '';
   if (isset($this->nmgp_cmp_hidden['cep']) && $this->nmgp_cmp_hidden['cep'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cep']);
       $sStyleHidden_cep = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cep = 'display: none;';
   $sStyleReadInp_cep = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cep']) && $this->nmgp_cmp_readonly['cep'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cep']);
       $sStyleReadLab_cep = '';
       $sStyleReadInp_cep = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cep']) && $this->nmgp_cmp_hidden['cep'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cep" value="<?php echo $this->form_encode_input($cep) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cep_label" id="hidden_field_label_cep" style="<?php echo $sStyleHidden_cep; ?>"><span id="id_label_cep"><?php echo $this->nm_new_label['cep']; ?></span></TD>
    <TD class="scFormDataOdd css_cep_line" id="hidden_field_data_cep" style="<?php echo $sStyleHidden_cep; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cep_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cep"]) &&  $this->nmgp_cmp_readonly["cep"] == "on") { 

 ?>
<input type="hidden" name="cep" value="<?php echo $this->form_encode_input($cep) . "\">" . $cep . ""; ?>
<?php } else { ?>
<span id="id_read_on_cep" class="sc-ui-readonly-cep css_cep_line" style="<?php echo $sStyleReadLab_cep; ?>"><?php echo $this->form_format_readonly("cep", $this->form_encode_input($this->cep)); ?></span><span id="id_read_off_cep" class="css_read_off_cep<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cep; ?>">
 <input class="sc-js-input scFormObjectOdd css_cep_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cep" type=text name="cep" value="<?php echo $this->form_encode_input($cep) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'cep', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<?php echo nmButtonOutput($this->arr_buttons, "bzipcode", "tb_show('', '" . $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . SC_dir_app_name('form_empresa_SemChave'). "/form_empresa_SemChave_cep.php?cep=&form_origem=F1;CEP,cep;RUA,endereco&TB_iframe=true&height=350&width=420&modal=true', '')", "tb_show('', '" . $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . SC_dir_app_name('form_empresa_SemChave'). "/form_empresa_SemChave_cep.php?cep=&form_origem=F1;CEP,cep;RUA,endereco&TB_iframe=true&height=350&width=420&modal=true', '')", "cep_cep", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>

</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cep_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cep_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['categoria']))
   {
       $this->nm_new_label['categoria'] = "Categoria";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $categoria = $this->categoria;
   $sStyleHidden_categoria = '';
   if (isset($this->nmgp_cmp_hidden['categoria']) && $this->nmgp_cmp_hidden['categoria'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['categoria']);
       $sStyleHidden_categoria = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_categoria = 'display: none;';
   $sStyleReadInp_categoria = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['categoria']) && $this->nmgp_cmp_readonly['categoria'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['categoria']);
       $sStyleReadLab_categoria = '';
       $sStyleReadInp_categoria = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['categoria']) && $this->nmgp_cmp_hidden['categoria'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="categoria" value="<?php echo $this->form_encode_input($this->categoria) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_categoria_label" id="hidden_field_label_categoria" style="<?php echo $sStyleHidden_categoria; ?>"><span id="id_label_categoria"><?php echo $this->nm_new_label['categoria']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['php_cmp_required']['categoria']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['php_cmp_required']['categoria'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_categoria_line" id="hidden_field_data_categoria" style="<?php echo $sStyleHidden_categoria; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_categoria_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["categoria"]) &&  $this->nmgp_cmp_readonly["categoria"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_categoria']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_categoria'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_categoria']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_categoria'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_categoria']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_categoria'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_categoria']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_categoria'] = array(); 
    }

   $old_value_cep = $this->cep;
   $old_value_cgc = $this->cgc;
   $old_value_saldo_real = $this->saldo_real;
   $old_value_cpf = $this->cpf;
   $old_value_dat_ult_mov = $this->dat_ult_mov;
   $old_value_saldo_dolar = $this->saldo_dolar;
   $old_value_data = $this->data;
   $old_value_celular = $this->celular;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_cep = $this->cep;
   $unformatted_value_cgc = $this->cgc;
   $unformatted_value_saldo_real = $this->saldo_real;
   $unformatted_value_cpf = $this->cpf;
   $unformatted_value_dat_ult_mov = $this->dat_ult_mov;
   $unformatted_value_saldo_dolar = $this->saldo_dolar;
   $unformatted_value_data = $this->data;
   $unformatted_value_celular = $this->celular;

   $nm_comando = "SELECT CATEGORIA, CATEGORIA  FROM categoria  ORDER BY CATEGORIA";

   $this->cep = $old_value_cep;
   $this->cgc = $old_value_cgc;
   $this->saldo_real = $old_value_saldo_real;
   $this->cpf = $old_value_cpf;
   $this->dat_ult_mov = $old_value_dat_ult_mov;
   $this->saldo_dolar = $old_value_saldo_dolar;
   $this->data = $old_value_data;
   $this->celular = $old_value_celular;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_categoria'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $categoria_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->categoria_1))
          {
              foreach ($this->categoria_1 as $tmp_categoria)
              {
                  if (trim($tmp_categoria) === trim($cadaselect[1])) {$categoria_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->categoria) && trim($this->categoria) === trim($cadaselect[1])) {$categoria_look .= $cadaselect[0];} 
          $x++; 
   }

?>
<input type="hidden" name="categoria" value="<?php echo $this->form_encode_input($categoria) . "\">" . $categoria_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_categoria();
   $x = 0 ; 
   $categoria_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->categoria_1))
          {
              foreach ($this->categoria_1 as $tmp_categoria)
              {
                  if (trim($tmp_categoria) === trim($cadaselect[1])) {$categoria_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->categoria)) {
                 if (trim($this->categoria) == trim($cadaselect[1])) { $categoria_look .= $cadaselect[0]; } 
          }
          elseif (isset($cadaselect[1]) && $this->categoria == $cadaselect[1]) { $categoria_look .= $cadaselect[0]; 
          }
          $x++; 
   }
          if (empty($categoria_look))
          {
              $categoria_look = $this->categoria;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_categoria\" class=\"css_categoria_line\" style=\"" .  $sStyleReadLab_categoria . "\">" . $this->form_format_readonly("categoria", $this->form_encode_input($categoria_look)) . "</span><span id=\"id_read_off_categoria\" class=\"css_read_off_categoria" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_categoria . "\">";
   echo " <span id=\"idAjaxSelect_categoria\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_categoria_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_categoria\" name=\"categoria\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_categoria'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Informe a categoria") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->categoria) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->categoria)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_categoria_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_categoria_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['endereco']))
    {
        $this->nm_new_label['endereco'] = "Endereço";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $endereco = $this->endereco;
   $sStyleHidden_endereco = '';
   if (isset($this->nmgp_cmp_hidden['endereco']) && $this->nmgp_cmp_hidden['endereco'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['endereco']);
       $sStyleHidden_endereco = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_endereco = 'display: none;';
   $sStyleReadInp_endereco = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['endereco']) && $this->nmgp_cmp_readonly['endereco'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['endereco']);
       $sStyleReadLab_endereco = '';
       $sStyleReadInp_endereco = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['endereco']) && $this->nmgp_cmp_hidden['endereco'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="endereco" value="<?php echo $this->form_encode_input($endereco) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_endereco_label" id="hidden_field_label_endereco" style="<?php echo $sStyleHidden_endereco; ?>"><span id="id_label_endereco"><?php echo $this->nm_new_label['endereco']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['php_cmp_required']['endereco']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['php_cmp_required']['endereco'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_endereco_line" id="hidden_field_data_endereco" style="<?php echo $sStyleHidden_endereco; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_endereco_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["endereco"]) &&  $this->nmgp_cmp_readonly["endereco"] == "on") { 

 ?>
<input type="hidden" name="endereco" value="<?php echo $this->form_encode_input($endereco) . "\">" . $endereco . ""; ?>
<?php } else { ?>
<span id="id_read_on_endereco" class="sc-ui-readonly-endereco css_endereco_line" style="<?php echo $sStyleReadLab_endereco; ?>"><?php echo $this->form_format_readonly("endereco", $this->form_encode_input($this->endereco)); ?></span><span id="id_read_off_endereco" class="css_read_off_endereco<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_endereco; ?>">
 <input class="sc-js-input scFormObjectOdd css_endereco_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_endereco" type=text name="endereco" value="<?php echo $this->form_encode_input($endereco) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=65"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_endereco_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_endereco_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['local']))
   {
       $this->nm_new_label['local'] = "Local ";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $local = $this->local;
   $sStyleHidden_local = '';
   if (isset($this->nmgp_cmp_hidden['local']) && $this->nmgp_cmp_hidden['local'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['local']);
       $sStyleHidden_local = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_local = 'display: none;';
   $sStyleReadInp_local = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['local']) && $this->nmgp_cmp_readonly['local'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['local']);
       $sStyleReadLab_local = '';
       $sStyleReadInp_local = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['local']) && $this->nmgp_cmp_hidden['local'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="local" value="<?php echo $this->form_encode_input($this->local) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_local_label" id="hidden_field_label_local" style="<?php echo $sStyleHidden_local; ?>"><span id="id_label_local"><?php echo $this->nm_new_label['local']; ?></span></TD>
    <TD class="scFormDataOdd css_local_line" id="hidden_field_data_local" style="<?php echo $sStyleHidden_local; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_local_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["local"]) &&  $this->nmgp_cmp_readonly["local"] == "on") { 

$local_look = "";
 if ($this->local == "1") { $local_look .= "Matriz" ;} 
 if ($this->local == "2") { $local_look .= "Filial-1" ;} 
 if ($this->local == "3") { $local_look .= "Filial-2" ;} 
 if ($this->local == "5") { $local_look .= "Filial-4" ;} 
 if ($this->local == "6") { $local_look .= "Filial-5" ;} 
 if ($this->local == "6") { $local_look .= "Filial-5" ;} 
 if ($this->local == "7") { $local_look .= "Filial-6" ;} 
 if (empty($local_look)) { $local_look = $this->local; }
?>
<input type="hidden" name="local" value="<?php echo $this->form_encode_input($local) . "\">" . $local_look . ""; ?>
<?php } else { ?>
<?php

$local_look = "";
 if ($this->local == "1") { $local_look .= "Matriz" ;} 
 if ($this->local == "2") { $local_look .= "Filial-1" ;} 
 if ($this->local == "3") { $local_look .= "Filial-2" ;} 
 if ($this->local == "5") { $local_look .= "Filial-4" ;} 
 if ($this->local == "6") { $local_look .= "Filial-5" ;} 
 if ($this->local == "6") { $local_look .= "Filial-5" ;} 
 if ($this->local == "7") { $local_look .= "Filial-6" ;} 
 if (empty($local_look)) { $local_look = $this->local; }
?>
<span id="id_read_on_local" class="css_local_line"  style="<?php echo $sStyleReadLab_local; ?>"><?php echo $this->form_format_readonly("local", $this->form_encode_input($local_look)); ?></span><span id="id_read_off_local" class="css_read_off_local<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_local; ?>">
 <span id="idAjaxSelect_local" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_local_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_local" name="local" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="1" <?php  if ($this->local == "1") { echo " selected" ;} ?><?php  if (empty($this->local)) { echo " selected" ;} ?>>Matriz</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_local'][] = '1'; ?>
 <option  value="2" <?php  if ($this->local == "2") { echo " selected" ;} ?>>Filial-1</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_local'][] = '2'; ?>
 <option  value="3" <?php  if ($this->local == "3") { echo " selected" ;} ?>>Filial-2</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_local'][] = '3'; ?>
 <option  value="5" <?php  if ($this->local == "5") { echo " selected" ;} ?>>Filial-4</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_local'][] = '5'; ?>
 <option  value="6" <?php  if ($this->local == "6") { echo " selected" ;} ?>>Filial-5</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_local'][] = '6'; ?>
 <option  value="6" <?php  if ($this->local == "6") { echo " selected" ;} ?>>Filial-5</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_local'][] = '6'; ?>
 <option  value="7" <?php  if ($this->local == "7") { echo " selected" ;} ?>>Filial-6</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_local'][] = '7'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_local_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_local_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1" class="scBlockFrame"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="8" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Complementos</TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cgc']))
    {
        $this->nm_new_label['cgc'] = "CNPJ";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cgc = $this->cgc;
   $sStyleHidden_cgc = '';
   if (isset($this->nmgp_cmp_hidden['cgc']) && $this->nmgp_cmp_hidden['cgc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cgc']);
       $sStyleHidden_cgc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cgc = 'display: none;';
   $sStyleReadInp_cgc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cgc']) && $this->nmgp_cmp_readonly['cgc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cgc']);
       $sStyleReadLab_cgc = '';
       $sStyleReadInp_cgc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cgc']) && $this->nmgp_cmp_hidden['cgc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cgc" value="<?php echo $this->form_encode_input($cgc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cgc_label" id="hidden_field_label_cgc" style="<?php echo $sStyleHidden_cgc; ?>"><span id="id_label_cgc"><?php echo $this->nm_new_label['cgc']; ?></span></TD>
    <TD class="scFormDataOdd css_cgc_line" id="hidden_field_data_cgc" style="<?php echo $sStyleHidden_cgc; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cgc_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cgc"]) &&  $this->nmgp_cmp_readonly["cgc"] == "on") { 

 ?>
<input type="hidden" name="cgc" value="<?php echo $this->form_encode_input($cgc) . "\">" . $cgc . ""; ?>
<?php } else { ?>
<span id="id_read_on_cgc" class="sc-ui-readonly-cgc css_cgc_line" style="<?php echo $sStyleReadLab_cgc; ?>"><?php echo $this->form_format_readonly("cgc", $this->form_encode_input($this->cgc)); ?></span><span id="id_read_off_cgc" class="css_read_off_cgc<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cgc; ?>">
 <input class="sc-js-input scFormObjectOdd css_cgc_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cgc" type=text name="cgc" value="<?php echo $this->form_encode_input($cgc) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> alt="{datatype: 'cnpj', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cgc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cgc_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['inscmun']))
    {
        $this->nm_new_label['inscmun'] = "Insc. mun.";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $inscmun = $this->inscmun;
   $sStyleHidden_inscmun = '';
   if (isset($this->nmgp_cmp_hidden['inscmun']) && $this->nmgp_cmp_hidden['inscmun'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['inscmun']);
       $sStyleHidden_inscmun = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_inscmun = 'display: none;';
   $sStyleReadInp_inscmun = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['inscmun']) && $this->nmgp_cmp_readonly['inscmun'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['inscmun']);
       $sStyleReadLab_inscmun = '';
       $sStyleReadInp_inscmun = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['inscmun']) && $this->nmgp_cmp_hidden['inscmun'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="inscmun" value="<?php echo $this->form_encode_input($inscmun) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_inscmun_label" id="hidden_field_label_inscmun" style="<?php echo $sStyleHidden_inscmun; ?>"><span id="id_label_inscmun"><?php echo $this->nm_new_label['inscmun']; ?></span></TD>
    <TD class="scFormDataOdd css_inscmun_line" id="hidden_field_data_inscmun" style="<?php echo $sStyleHidden_inscmun; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_inscmun_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["inscmun"]) &&  $this->nmgp_cmp_readonly["inscmun"] == "on") { 

 ?>
<input type="hidden" name="inscmun" value="<?php echo $this->form_encode_input($inscmun) . "\">" . $inscmun . ""; ?>
<?php } else { ?>
<span id="id_read_on_inscmun" class="sc-ui-readonly-inscmun css_inscmun_line" style="<?php echo $sStyleReadLab_inscmun; ?>"><?php echo $this->form_format_readonly("inscmun", $this->form_encode_input($this->inscmun)); ?></span><span id="id_read_off_inscmun" class="css_read_off_inscmun<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_inscmun; ?>">
 <input class="sc-js-input scFormObjectOdd css_inscmun_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_inscmun" type=text name="inscmun" value="<?php echo $this->form_encode_input($inscmun) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=15"; } ?> maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_inscmun_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_inscmun_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['cadastrante']))
    {
        $this->nm_new_label['cadastrante'] = "Cadastrante";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cadastrante = $this->cadastrante;
   $sStyleHidden_cadastrante = '';
   if (isset($this->nmgp_cmp_hidden['cadastrante']) && $this->nmgp_cmp_hidden['cadastrante'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cadastrante']);
       $sStyleHidden_cadastrante = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cadastrante = 'display: none;';
   $sStyleReadInp_cadastrante = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cadastrante']) && $this->nmgp_cmp_readonly['cadastrante'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cadastrante']);
       $sStyleReadLab_cadastrante = '';
       $sStyleReadInp_cadastrante = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cadastrante']) && $this->nmgp_cmp_hidden['cadastrante'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cadastrante" value="<?php echo $this->form_encode_input($cadastrante) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cadastrante_label" id="hidden_field_label_cadastrante" style="<?php echo $sStyleHidden_cadastrante; ?>"><span id="id_label_cadastrante"><?php echo $this->nm_new_label['cadastrante']; ?></span></TD>
    <TD class="scFormDataOdd css_cadastrante_line" id="hidden_field_data_cadastrante" style="<?php echo $sStyleHidden_cadastrante; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cadastrante_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="cadastrante" value="<?php echo $this->form_encode_input($cadastrante); ?>"><span id="id_ajax_label_cadastrante"><?php echo nl2br($cadastrante); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cadastrante_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cadastrante_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['saldo_real']))
    {
        $this->nm_new_label['saldo_real'] = "Saldo Real";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $saldo_real = $this->saldo_real;
   $sStyleHidden_saldo_real = '';
   if (isset($this->nmgp_cmp_hidden['saldo_real']) && $this->nmgp_cmp_hidden['saldo_real'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['saldo_real']);
       $sStyleHidden_saldo_real = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_saldo_real = 'display: none;';
   $sStyleReadInp_saldo_real = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['saldo_real']) && $this->nmgp_cmp_readonly['saldo_real'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['saldo_real']);
       $sStyleReadLab_saldo_real = '';
       $sStyleReadInp_saldo_real = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['saldo_real']) && $this->nmgp_cmp_hidden['saldo_real'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="saldo_real" value="<?php echo $this->form_encode_input($saldo_real) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_saldo_real_label" id="hidden_field_label_saldo_real" style="<?php echo $sStyleHidden_saldo_real; ?>"><span id="id_label_saldo_real"><?php echo $this->nm_new_label['saldo_real']; ?></span></TD>
    <TD class="scFormDataOdd css_saldo_real_line" id="hidden_field_data_saldo_real" style="<?php echo $sStyleHidden_saldo_real; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_saldo_real_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="saldo_real" value="<?php echo $this->form_encode_input($saldo_real); ?>"><span id="id_ajax_label_saldo_real"><?php echo nl2br($saldo_real); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_saldo_real_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_saldo_real_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cpf']))
    {
        $this->nm_new_label['cpf'] = "Cpf";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cpf = $this->cpf;
   $sStyleHidden_cpf = '';
   if (isset($this->nmgp_cmp_hidden['cpf']) && $this->nmgp_cmp_hidden['cpf'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cpf']);
       $sStyleHidden_cpf = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cpf = 'display: none;';
   $sStyleReadInp_cpf = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cpf']) && $this->nmgp_cmp_readonly['cpf'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cpf']);
       $sStyleReadLab_cpf = '';
       $sStyleReadInp_cpf = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cpf']) && $this->nmgp_cmp_hidden['cpf'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cpf" value="<?php echo $this->form_encode_input($cpf) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cpf_label" id="hidden_field_label_cpf" style="<?php echo $sStyleHidden_cpf; ?>"><span id="id_label_cpf"><?php echo $this->nm_new_label['cpf']; ?></span></TD>
    <TD class="scFormDataOdd css_cpf_line" id="hidden_field_data_cpf" style="<?php echo $sStyleHidden_cpf; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cpf_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cpf"]) &&  $this->nmgp_cmp_readonly["cpf"] == "on") { 

 ?>
<input type="hidden" name="cpf" value="<?php echo $this->form_encode_input($cpf) . "\">" . $cpf . ""; ?>
<?php } else { ?>
<span id="id_read_on_cpf" class="sc-ui-readonly-cpf css_cpf_line" style="<?php echo $sStyleReadLab_cpf; ?>"><?php echo $this->form_format_readonly("cpf", $this->form_encode_input($this->cpf)); ?></span><span id="id_read_off_cpf" class="css_read_off_cpf<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cpf; ?>">
 <input class="sc-js-input scFormObjectOdd css_cpf_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cpf" type=text name="cpf" value="<?php echo $this->form_encode_input($cpf) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'cpf', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cpf_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cpf_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['inscest']))
    {
        $this->nm_new_label['inscest'] = "Insc. Est.";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $inscest = $this->inscest;
   $sStyleHidden_inscest = '';
   if (isset($this->nmgp_cmp_hidden['inscest']) && $this->nmgp_cmp_hidden['inscest'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['inscest']);
       $sStyleHidden_inscest = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_inscest = 'display: none;';
   $sStyleReadInp_inscest = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['inscest']) && $this->nmgp_cmp_readonly['inscest'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['inscest']);
       $sStyleReadLab_inscest = '';
       $sStyleReadInp_inscest = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['inscest']) && $this->nmgp_cmp_hidden['inscest'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="inscest" value="<?php echo $this->form_encode_input($inscest) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_inscest_label" id="hidden_field_label_inscest" style="<?php echo $sStyleHidden_inscest; ?>"><span id="id_label_inscest"><?php echo $this->nm_new_label['inscest']; ?></span></TD>
    <TD class="scFormDataOdd css_inscest_line" id="hidden_field_data_inscest" style="<?php echo $sStyleHidden_inscest; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_inscest_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["inscest"]) &&  $this->nmgp_cmp_readonly["inscest"] == "on") { 

 ?>
<input type="hidden" name="inscest" value="<?php echo $this->form_encode_input($inscest) . "\">" . $inscest . ""; ?>
<?php } else { ?>
<span id="id_read_on_inscest" class="sc-ui-readonly-inscest css_inscest_line" style="<?php echo $sStyleReadLab_inscest; ?>"><?php echo $this->form_format_readonly("inscest", $this->form_encode_input($this->inscest)); ?></span><span id="id_read_off_inscest" class="css_read_off_inscest<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_inscest; ?>">
 <input class="sc-js-input scFormObjectOdd css_inscest_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_inscest" type=text name="inscest" value="<?php echo $this->form_encode_input($inscest) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=15"; } ?> maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_inscest_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_inscest_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['dat_ult_mov']))
    {
        $this->nm_new_label['dat_ult_mov'] = "Última mov.";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dat_ult_mov = $this->dat_ult_mov;
   $sStyleHidden_dat_ult_mov = '';
   if (isset($this->nmgp_cmp_hidden['dat_ult_mov']) && $this->nmgp_cmp_hidden['dat_ult_mov'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dat_ult_mov']);
       $sStyleHidden_dat_ult_mov = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dat_ult_mov = 'display: none;';
   $sStyleReadInp_dat_ult_mov = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dat_ult_mov']) && $this->nmgp_cmp_readonly['dat_ult_mov'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dat_ult_mov']);
       $sStyleReadLab_dat_ult_mov = '';
       $sStyleReadInp_dat_ult_mov = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dat_ult_mov']) && $this->nmgp_cmp_hidden['dat_ult_mov'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dat_ult_mov" value="<?php echo $this->form_encode_input($dat_ult_mov) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_dat_ult_mov_label" id="hidden_field_label_dat_ult_mov" style="<?php echo $sStyleHidden_dat_ult_mov; ?>"><span id="id_label_dat_ult_mov"><?php echo $this->nm_new_label['dat_ult_mov']; ?></span></TD>
    <TD class="scFormDataOdd css_dat_ult_mov_line" id="hidden_field_data_dat_ult_mov" style="<?php echo $sStyleHidden_dat_ult_mov; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dat_ult_mov_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dat_ult_mov"]) &&  $this->nmgp_cmp_readonly["dat_ult_mov"] == "on") { 

 ?>
<input type="hidden" name="dat_ult_mov" value="<?php echo $this->form_encode_input($dat_ult_mov) . "\">" . $dat_ult_mov . ""; ?>
<?php } else { ?>
<span id="id_read_on_dat_ult_mov" class="sc-ui-readonly-dat_ult_mov css_dat_ult_mov_line" style="<?php echo $sStyleReadLab_dat_ult_mov; ?>"><?php echo $this->form_format_readonly("dat_ult_mov", $this->form_encode_input($dat_ult_mov)); ?></span><span id="id_read_off_dat_ult_mov" class="css_read_off_dat_ult_mov<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dat_ult_mov; ?>"><?php
$tmp_form_data = $this->field_config['dat_ult_mov']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_dat_ult_mov_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_dat_ult_mov" type=text name="dat_ult_mov" value="<?php echo $this->form_encode_input($dat_ult_mov) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['dat_ult_mov']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['dat_ult_mov']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dat_ult_mov_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dat_ult_mov_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['saldo_dolar']))
    {
        $this->nm_new_label['saldo_dolar'] = "Saldo Dolar";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $saldo_dolar = $this->saldo_dolar;
   $sStyleHidden_saldo_dolar = '';
   if (isset($this->nmgp_cmp_hidden['saldo_dolar']) && $this->nmgp_cmp_hidden['saldo_dolar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['saldo_dolar']);
       $sStyleHidden_saldo_dolar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_saldo_dolar = 'display: none;';
   $sStyleReadInp_saldo_dolar = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['saldo_dolar']) && $this->nmgp_cmp_readonly['saldo_dolar'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['saldo_dolar']);
       $sStyleReadLab_saldo_dolar = '';
       $sStyleReadInp_saldo_dolar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['saldo_dolar']) && $this->nmgp_cmp_hidden['saldo_dolar'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="saldo_dolar" value="<?php echo $this->form_encode_input($saldo_dolar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_saldo_dolar_label" id="hidden_field_label_saldo_dolar" style="<?php echo $sStyleHidden_saldo_dolar; ?>"><span id="id_label_saldo_dolar"><?php echo $this->nm_new_label['saldo_dolar']; ?></span></TD>
    <TD class="scFormDataOdd css_saldo_dolar_line" id="hidden_field_data_saldo_dolar" style="<?php echo $sStyleHidden_saldo_dolar; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_saldo_dolar_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="saldo_dolar" value="<?php echo $this->form_encode_input($saldo_dolar); ?>"><span id="id_ajax_label_saldo_dolar"><?php echo nl2br($saldo_dolar); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_saldo_dolar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_saldo_dolar_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['homepage']))
    {
        $this->nm_new_label['homepage'] = "URL";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $homepage = $this->homepage;
   $sStyleHidden_homepage = '';
   if (isset($this->nmgp_cmp_hidden['homepage']) && $this->nmgp_cmp_hidden['homepage'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['homepage']);
       $sStyleHidden_homepage = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_homepage = 'display: none;';
   $sStyleReadInp_homepage = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['homepage']) && $this->nmgp_cmp_readonly['homepage'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['homepage']);
       $sStyleReadLab_homepage = '';
       $sStyleReadInp_homepage = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['homepage']) && $this->nmgp_cmp_hidden['homepage'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="homepage" value="<?php echo $this->form_encode_input($homepage) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_homepage_label" id="hidden_field_label_homepage" style="<?php echo $sStyleHidden_homepage; ?>"><span id="id_label_homepage"><?php echo $this->nm_new_label['homepage']; ?></span></TD>
    <TD class="scFormDataOdd css_homepage_line" id="hidden_field_data_homepage" style="<?php echo $sStyleHidden_homepage; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_homepage_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["homepage"]) &&  $this->nmgp_cmp_readonly["homepage"] == "on") { 

 ?>
<input type="hidden" name="homepage" value="<?php echo $this->form_encode_input($homepage) . "\">" . $homepage . ""; ?>
<?php } else { ?>
<span id="id_read_on_homepage" class="sc-ui-readonly-homepage css_homepage_line" style="<?php echo $sStyleReadLab_homepage; ?>"><?php echo $this->form_format_readonly("homepage", $this->form_encode_input($this->homepage)); ?></span><span id="id_read_off_homepage" class="css_read_off_homepage<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_homepage; ?>">
 <input class="sc-js-input scFormObjectOdd css_homepage_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_homepage" type=text name="homepage" value="<?php echo $this->form_encode_input($homepage) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=30"; } ?> maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'lower', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_homepage_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_homepage_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['dealer']))
   {
       $this->nm_new_label['dealer'] = "Dealer";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dealer = $this->dealer;
   $sStyleHidden_dealer = '';
   if (isset($this->nmgp_cmp_hidden['dealer']) && $this->nmgp_cmp_hidden['dealer'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dealer']);
       $sStyleHidden_dealer = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dealer = 'display: none;';
   $sStyleReadInp_dealer = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dealer']) && $this->nmgp_cmp_readonly['dealer'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dealer']);
       $sStyleReadLab_dealer = '';
       $sStyleReadInp_dealer = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dealer']) && $this->nmgp_cmp_hidden['dealer'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="dealer" value="<?php echo $this->form_encode_input($this->dealer) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_dealer_label" id="hidden_field_label_dealer" style="<?php echo $sStyleHidden_dealer; ?>"><span id="id_label_dealer"><?php echo $this->nm_new_label['dealer']; ?></span></TD>
    <TD class="scFormDataOdd css_dealer_line" id="hidden_field_data_dealer" style="<?php echo $sStyleHidden_dealer; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dealer_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dealer"]) &&  $this->nmgp_cmp_readonly["dealer"] == "on") { 

$dealer_look = "";
 if ($this->dealer == "1") { $dealer_look .= "Sim" ;} 
 if ($this->dealer == "0") { $dealer_look .= "Não" ;} 
 if (empty($dealer_look)) { $dealer_look = $this->dealer; }
?>
<input type="hidden" name="dealer" value="<?php echo $this->form_encode_input($dealer) . "\">" . $dealer_look . ""; ?>
<?php } else { ?>
<?php

$dealer_look = "";
 if ($this->dealer == "1") { $dealer_look .= "Sim" ;} 
 if ($this->dealer == "0") { $dealer_look .= "Não" ;} 
 if (empty($dealer_look)) { $dealer_look = $this->dealer; }
?>
<span id="id_read_on_dealer" class="css_dealer_line"  style="<?php echo $sStyleReadLab_dealer; ?>"><?php echo $this->form_format_readonly("dealer", $this->form_encode_input($dealer_look)); ?></span><span id="id_read_off_dealer" class="css_read_off_dealer<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_dealer; ?>">
 <span id="idAjaxSelect_dealer" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_dealer_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_dealer" name="dealer" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="1" <?php  if ($this->dealer == "1") { echo " selected" ;} ?>>Sim</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_dealer'][] = '1'; ?>
 <option  value="0" <?php  if ($this->dealer == "0") { echo " selected" ;} ?><?php  if (empty($this->dealer)) { echo " selected" ;} ?>>Não</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_dealer'][] = '0'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dealer_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dealer_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['data']))
    {
        $this->nm_new_label['data'] = "Data";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $data = $this->data;
   $sStyleHidden_data = '';
   if (isset($this->nmgp_cmp_hidden['data']) && $this->nmgp_cmp_hidden['data'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['data']);
       $sStyleHidden_data = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_data = 'display: none;';
   $sStyleReadInp_data = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['data']) && $this->nmgp_cmp_readonly['data'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['data']);
       $sStyleReadLab_data = '';
       $sStyleReadInp_data = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['data']) && $this->nmgp_cmp_hidden['data'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="data" value="<?php echo $this->form_encode_input($data) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_data_label" id="hidden_field_label_data" style="<?php echo $sStyleHidden_data; ?>"><span id="id_label_data"><?php echo $this->nm_new_label['data']; ?></span></TD>
    <TD class="scFormDataOdd css_data_line" id="hidden_field_data_data" style="<?php echo $sStyleHidden_data; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_data_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["data"]) &&  $this->nmgp_cmp_readonly["data"] == "on") { 

 ?>
<input type="hidden" name="data" value="<?php echo $this->form_encode_input($data) . "\">" . $data . ""; ?>
<?php } else { ?>
<span id="id_read_on_data" class="sc-ui-readonly-data css_data_line" style="<?php echo $sStyleReadLab_data; ?>"><?php echo $this->form_format_readonly("data", $this->form_encode_input($data)); ?></span><span id="id_read_off_data" class="css_read_off_data<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_data; ?>"><?php
$tmp_form_data = $this->field_config['data']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_data_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_data" type=text name="data" value="<?php echo $this->form_encode_input($data) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['data']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['data']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_data_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_data_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['id_nextel']))
    {
        $this->nm_new_label['id_nextel'] = "ID Nextel";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_nextel = $this->id_nextel;
   $sStyleHidden_id_nextel = '';
   if (isset($this->nmgp_cmp_hidden['id_nextel']) && $this->nmgp_cmp_hidden['id_nextel'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_nextel']);
       $sStyleHidden_id_nextel = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_nextel = 'display: none;';
   $sStyleReadInp_id_nextel = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_nextel']) && $this->nmgp_cmp_readonly['id_nextel'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_nextel']);
       $sStyleReadLab_id_nextel = '';
       $sStyleReadInp_id_nextel = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_nextel']) && $this->nmgp_cmp_hidden['id_nextel'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_nextel" value="<?php echo $this->form_encode_input($id_nextel) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_id_nextel_label" id="hidden_field_label_id_nextel" style="<?php echo $sStyleHidden_id_nextel; ?>"><span id="id_label_id_nextel"><?php echo $this->nm_new_label['id_nextel']; ?></span></TD>
    <TD class="scFormDataOdd css_id_nextel_line" id="hidden_field_data_id_nextel" style="<?php echo $sStyleHidden_id_nextel; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_nextel_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_nextel"]) &&  $this->nmgp_cmp_readonly["id_nextel"] == "on") { 

 ?>
<input type="hidden" name="id_nextel" value="<?php echo $this->form_encode_input($id_nextel) . "\">" . $id_nextel . ""; ?>
<?php } else { ?>
<span id="id_read_on_id_nextel" class="sc-ui-readonly-id_nextel css_id_nextel_line" style="<?php echo $sStyleReadLab_id_nextel; ?>"><?php echo $this->form_format_readonly("id_nextel", $this->form_encode_input($this->id_nextel)); ?></span><span id="id_read_off_id_nextel" class="css_read_off_id_nextel<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_id_nextel; ?>">
 <input class="sc-js-input scFormObjectOdd css_id_nextel_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_id_nextel" type=text name="id_nextel" value="<?php echo $this->form_encode_input($id_nextel) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=15"; } ?> maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_nextel_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_nextel_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_2"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2" class="scBlockFrame"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="8" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Informações do contato</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['contato']))
    {
        $this->nm_new_label['contato'] = "Contato";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $contato = $this->contato;
   $sStyleHidden_contato = '';
   if (isset($this->nmgp_cmp_hidden['contato']) && $this->nmgp_cmp_hidden['contato'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['contato']);
       $sStyleHidden_contato = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_contato = 'display: none;';
   $sStyleReadInp_contato = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['contato']) && $this->nmgp_cmp_readonly['contato'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['contato']);
       $sStyleReadLab_contato = '';
       $sStyleReadInp_contato = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['contato']) && $this->nmgp_cmp_hidden['contato'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="contato" value="<?php echo $this->form_encode_input($contato) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_contato" style="<?php echo $sStyleHidden_contato; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_contato_line" style="vertical-align: top;padding: 0px"><table style="border-spacing: 0px; border-width: 0px; border-collapse: collapse; width: 100%" cellspacing=0 cellpadding=0><tr><td class="scFormLabelOddFormat scFormLabelAboveOddFormat css_contato_label" style=" padding: 0px; width: 100%;"><span id="id_label_contato"><?php echo $this->nm_new_label['contato']; ?></span></td></tr><tr><td class="css_contato_line" style="padding: 0px; width: 100%;"><input type="hidden" name="contato" value="<?php echo $this->form_encode_input($contato); ?>"><span id="id_ajax_label_contato"><?php echo nl2br($contato); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_contato_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_contato_text"></span></td></tr></table></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['ddd']))
    {
        $this->nm_new_label['ddd'] = "Ddd";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ddd = $this->ddd;
   $sStyleHidden_ddd = '';
   if (isset($this->nmgp_cmp_hidden['ddd']) && $this->nmgp_cmp_hidden['ddd'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ddd']);
       $sStyleHidden_ddd = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ddd = 'display: none;';
   $sStyleReadInp_ddd = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ddd']) && $this->nmgp_cmp_readonly['ddd'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ddd']);
       $sStyleReadLab_ddd = '';
       $sStyleReadInp_ddd = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ddd']) && $this->nmgp_cmp_hidden['ddd'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ddd" value="<?php echo $this->form_encode_input($ddd) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_ddd" style="<?php echo $sStyleHidden_ddd; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ddd_line" style="vertical-align: top;padding: 0px"><table style="border-spacing: 0px; border-width: 0px; border-collapse: collapse; width: 100%" cellspacing=0 cellpadding=0><tr><td class="scFormLabelOddFormat scFormLabelAboveOddFormat css_ddd_label" style=" padding: 0px; width: 100%;"><span id="id_label_ddd"><?php echo $this->nm_new_label['ddd']; ?></span></td></tr><tr><td class="css_ddd_line" style="padding: 0px; width: 100%;"><input type="hidden" name="ddd" value="<?php echo $this->form_encode_input($ddd); ?>"><span id="id_ajax_label_ddd"><?php echo nl2br($ddd); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ddd_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ddd_text"></span></td></tr></table></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['telefone']))
    {
        $this->nm_new_label['telefone'] = "Telefone fixo";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $telefone = $this->telefone;
   $sStyleHidden_telefone = '';
   if (isset($this->nmgp_cmp_hidden['telefone']) && $this->nmgp_cmp_hidden['telefone'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['telefone']);
       $sStyleHidden_telefone = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_telefone = 'display: none;';
   $sStyleReadInp_telefone = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['telefone']) && $this->nmgp_cmp_readonly['telefone'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['telefone']);
       $sStyleReadLab_telefone = '';
       $sStyleReadInp_telefone = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['telefone']) && $this->nmgp_cmp_hidden['telefone'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="telefone" value="<?php echo $this->form_encode_input($telefone) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_telefone" style="<?php echo $sStyleHidden_telefone; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_telefone_line" style="vertical-align: top;padding: 0px"><table style="border-spacing: 0px; border-width: 0px; border-collapse: collapse; width: 100%" cellspacing=0 cellpadding=0><tr><td class="scFormLabelOddFormat scFormLabelAboveOddFormat css_telefone_label" style=" padding: 0px; width: 100%;"><span id="id_label_telefone"><?php echo $this->nm_new_label['telefone']; ?></span></td></tr><tr><td class="css_telefone_line" style="padding: 0px; width: 100%;"><input type="hidden" name="telefone" value="<?php echo $this->form_encode_input($telefone); ?>"><span id="id_ajax_label_telefone"><?php echo nl2br($telefone); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_telefone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_telefone_text"></span></td></tr></table></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['email']))
    {
        $this->nm_new_label['email'] = "Email";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $email = $this->email;
   $sStyleHidden_email = '';
   if (isset($this->nmgp_cmp_hidden['email']) && $this->nmgp_cmp_hidden['email'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['email']);
       $sStyleHidden_email = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_email = 'display: none;';
   $sStyleReadInp_email = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['email']) && $this->nmgp_cmp_readonly['email'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['email']);
       $sStyleReadLab_email = '';
       $sStyleReadInp_email = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['email']) && $this->nmgp_cmp_hidden['email'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="email" value="<?php echo $this->form_encode_input($email) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_email" style="<?php echo $sStyleHidden_email; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_email_line" style="vertical-align: top;padding: 0px"><table style="border-spacing: 0px; border-width: 0px; border-collapse: collapse; width: 100%" cellspacing=0 cellpadding=0><tr><td class="scFormLabelOddFormat scFormLabelAboveOddFormat css_email_label" style=" padding: 0px; width: 100%;"><span id="id_label_email"><?php echo $this->nm_new_label['email']; ?></span></td></tr><tr><td class="css_email_line" style="padding: 0px; width: 100%;"><input type="hidden" name="email" value="<?php echo $this->form_encode_input($email); ?>"><span id="id_ajax_label_email"><?php echo nl2br($email); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_email_text"></span></td></tr></table></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['celular']))
    {
        $this->nm_new_label['celular'] = "Celular";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $celular = $this->celular;
   $sStyleHidden_celular = '';
   if (isset($this->nmgp_cmp_hidden['celular']) && $this->nmgp_cmp_hidden['celular'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['celular']);
       $sStyleHidden_celular = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_celular = 'display: none;';
   $sStyleReadInp_celular = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['celular']) && $this->nmgp_cmp_readonly['celular'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['celular']);
       $sStyleReadLab_celular = '';
       $sStyleReadInp_celular = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['celular']) && $this->nmgp_cmp_hidden['celular'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="celular" value="<?php echo $this->form_encode_input($celular) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_celular" style="<?php echo $sStyleHidden_celular; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_celular_line" style="vertical-align: top;padding: 0px"><table style="border-spacing: 0px; border-width: 0px; border-collapse: collapse; width: 100%" cellspacing=0 cellpadding=0><tr><td class="scFormLabelOddFormat scFormLabelAboveOddFormat css_celular_label" style=" padding: 0px; width: 100%;"><span id="id_label_celular"><?php echo $this->nm_new_label['celular']; ?></span></td></tr><tr><td class="css_celular_line" style="padding: 0px; width: 100%;">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["celular"]) &&  $this->nmgp_cmp_readonly["celular"] == "on") { 

 ?>
<input type="hidden" name="celular" value="<?php echo $this->form_encode_input($celular) . "\">" . $celular . ""; ?>
<?php } else { ?>
<span id="id_read_on_celular" class="sc-ui-readonly-celular css_celular_line" style="<?php echo $sStyleReadLab_celular; ?>"><?php echo $this->form_format_readonly("celular", $this->form_encode_input($this->celular)); ?></span><span id="id_read_off_celular" class="css_read_off_celular<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_celular; ?>">
 <input class="sc-js-input scFormObjectOdd css_celular_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_celular" type=text name="celular" value="<?php echo $this->form_encode_input($celular) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=29 alt="{datatype: 'mask', maxLength: 9, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', maskList: '9999-9999;99999-9999', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_celular_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_celular_text"></span></td></tr></table></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['operadora']))
   {
       $this->nm_new_label['operadora'] = "Operadora";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $operadora = $this->operadora;
   $sStyleHidden_operadora = '';
   if (isset($this->nmgp_cmp_hidden['operadora']) && $this->nmgp_cmp_hidden['operadora'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['operadora']);
       $sStyleHidden_operadora = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_operadora = 'display: none;';
   $sStyleReadInp_operadora = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['operadora']) && $this->nmgp_cmp_readonly['operadora'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['operadora']);
       $sStyleReadLab_operadora = '';
       $sStyleReadInp_operadora = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['operadora']) && $this->nmgp_cmp_hidden['operadora'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="operadora" value="<?php echo $this->form_encode_input($this->operadora) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_operadora" style="<?php echo $sStyleHidden_operadora; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_operadora_line" style="vertical-align: top;padding: 0px"><table style="border-spacing: 0px; border-width: 0px; border-collapse: collapse; width: 100%" cellspacing=0 cellpadding=0><tr><td class="scFormLabelOddFormat scFormLabelAboveOddFormat css_operadora_label" style=" padding: 0px; width: 100%;"><span id="id_label_operadora"><?php echo $this->nm_new_label['operadora']; ?></span></td></tr><tr><td class="css_operadora_line" style="padding: 0px; width: 100%;">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["operadora"]) &&  $this->nmgp_cmp_readonly["operadora"] == "on") { 

$operadora_look = "";
 if ($this->operadora == "CLARO") { $operadora_look .= "CLARO" ;} 
 if ($this->operadora == "TIM") { $operadora_look .= "TIM" ;} 
 if ($this->operadora == "VIVO") { $operadora_look .= "VIVO" ;} 
 if ($this->operadora == "OI") { $operadora_look .= "OI" ;} 
 if ($this->operadora == "NEXTEL") { $operadora_look .= "NEXTEL" ;} 
 if (empty($operadora_look)) { $operadora_look = $this->operadora; }
?>
<input type="hidden" name="operadora" value="<?php echo $this->form_encode_input($operadora) . "\">" . $operadora_look . ""; ?>
<?php } else { ?>
<?php

$operadora_look = "";
 if ($this->operadora == "CLARO") { $operadora_look .= "CLARO" ;} 
 if ($this->operadora == "TIM") { $operadora_look .= "TIM" ;} 
 if ($this->operadora == "VIVO") { $operadora_look .= "VIVO" ;} 
 if ($this->operadora == "OI") { $operadora_look .= "OI" ;} 
 if ($this->operadora == "NEXTEL") { $operadora_look .= "NEXTEL" ;} 
 if (empty($operadora_look)) { $operadora_look = $this->operadora; }
?>
<span id="id_read_on_operadora" class="css_operadora_line"  style="<?php echo $sStyleReadLab_operadora; ?>"><?php echo $this->form_format_readonly("operadora", $this->form_encode_input($operadora_look)); ?></span><span id="id_read_off_operadora" class="css_read_off_operadora<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_operadora; ?>">
 <span id="idAjaxSelect_operadora" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_operadora_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_operadora" name="operadora" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_operadora'][] = 'Ignorada'; ?>
 <option value="Ignorada">---------</option>
 <option  value="CLARO" <?php  if ($this->operadora == "CLARO") { echo " selected" ;} ?>>CLARO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_operadora'][] = 'CLARO'; ?>
 <option  value="TIM" <?php  if ($this->operadora == "TIM") { echo " selected" ;} ?>>TIM</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_operadora'][] = 'TIM'; ?>
 <option  value="VIVO" <?php  if ($this->operadora == "VIVO") { echo " selected" ;} ?>>VIVO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_operadora'][] = 'VIVO'; ?>
 <option  value="OI" <?php  if ($this->operadora == "OI") { echo " selected" ;} ?>>OI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_operadora'][] = 'OI'; ?>
 <option  value="NEXTEL" <?php  if ($this->operadora == "NEXTEL") { echo " selected" ;} ?>>NEXTEL</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['Lookup_operadora'][] = 'NEXTEL'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_operadora_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_operadora_text"></span></td></tr></table></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['fax']))
    {
        $this->nm_new_label['fax'] = "Fax";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fax = $this->fax;
   $sStyleHidden_fax = '';
   if (isset($this->nmgp_cmp_hidden['fax']) && $this->nmgp_cmp_hidden['fax'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fax']);
       $sStyleHidden_fax = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fax = 'display: none;';
   $sStyleReadInp_fax = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fax']) && $this->nmgp_cmp_readonly['fax'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fax']);
       $sStyleReadLab_fax = '';
       $sStyleReadInp_fax = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fax']) && $this->nmgp_cmp_hidden['fax'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fax" value="<?php echo $this->form_encode_input($fax) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_fax" style="<?php echo $sStyleHidden_fax; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fax_line" style="vertical-align: top;padding: 0px"><table style="border-spacing: 0px; border-width: 0px; border-collapse: collapse; width: 100%" cellspacing=0 cellpadding=0><tr><td class="scFormLabelOddFormat scFormLabelAboveOddFormat css_fax_label" style=" padding: 0px; width: 100%;"><span id="id_label_fax"><?php echo $this->nm_new_label['fax']; ?></span></td></tr><tr><td class="css_fax_line" style="padding: 0px; width: 100%;">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fax"]) &&  $this->nmgp_cmp_readonly["fax"] == "on") { 

 ?>
<input type="hidden" name="fax" value="<?php echo $this->form_encode_input($fax) . "\">" . $fax . ""; ?>
<?php } else { ?>
<span id="id_read_on_fax" class="sc-ui-readonly-fax css_fax_line" style="<?php echo $sStyleReadLab_fax; ?>"><?php echo $this->form_format_readonly("fax", $this->form_encode_input($this->fax)); ?></span><span id="id_read_off_fax" class="css_read_off_fax<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fax; ?>">
 <input class="sc-js-input scFormObjectOdd css_fax_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fax" type=text name="fax" value="<?php echo $this->form_encode_input($fax) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fax_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fax_text"></span></td></tr></table></td></tr></table></td></tr></table> </TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="1" >&nbsp;</TD>




<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
<?php $sStyleHidden_contato_dumb = ('' == $sStyleHidden_contato) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_contato_dumb" style="<?php echo $sStyleHidden_contato_dumb; ?>"></TD>
<?php $sStyleHidden_ddd_dumb = ('' == $sStyleHidden_ddd) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_ddd_dumb" style="<?php echo $sStyleHidden_ddd_dumb; ?>"></TD>
<?php $sStyleHidden_telefone_dumb = ('' == $sStyleHidden_telefone) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_telefone_dumb" style="<?php echo $sStyleHidden_telefone_dumb; ?>"></TD>
<?php $sStyleHidden_email_dumb = ('' == $sStyleHidden_email) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_email_dumb" style="<?php echo $sStyleHidden_email_dumb; ?>"></TD>
<?php $sStyleHidden_celular_dumb = ('' == $sStyleHidden_celular) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_celular_dumb" style="<?php echo $sStyleHidden_celular_dumb; ?>"></TD>
<?php $sStyleHidden_operadora_dumb = ('' == $sStyleHidden_operadora) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_operadora_dumb" style="<?php echo $sStyleHidden_operadora_dumb; ?>"></TD>
<?php $sStyleHidden_fax_dumb = ('' == $sStyleHidden_fax) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fax_dumb" style="<?php echo $sStyleHidden_fax_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_3"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_3" class="scBlockFrame"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_3" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf3\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Relação de contatos<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['contatorelacao']))
    {
        $this->nm_new_label['contatorelacao'] = "Contatos";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $contatorelacao = $this->contatorelacao;
   $sStyleHidden_contatorelacao = '';
   if (isset($this->nmgp_cmp_hidden['contatorelacao']) && $this->nmgp_cmp_hidden['contatorelacao'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['contatorelacao']);
       $sStyleHidden_contatorelacao = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_contatorelacao = 'display: none;';
   $sStyleReadInp_contatorelacao = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['contatorelacao']) && $this->nmgp_cmp_readonly['contatorelacao'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['contatorelacao']);
       $sStyleReadLab_contatorelacao = '';
       $sStyleReadInp_contatorelacao = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['contatorelacao']) && $this->nmgp_cmp_hidden['contatorelacao'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="contatorelacao" value="<?php echo $this->form_encode_input($contatorelacao) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_contatorelacao" style="<?php echo $sStyleHidden_contatorelacao; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_contatorelacao_line" style="vertical-align: top;padding: 0px"><table style="border-spacing: 0px; border-width: 0px; border-collapse: collapse; width: 100%" cellspacing=0 cellpadding=0><tr><td class="scFormLabelOddFormat scFormLabelAboveOddFormat css_contatorelacao_label" style=" padding: 0px; width: 100%;"><span id="id_label_contatorelacao"><?php echo $this->nm_new_label['contatorelacao']; ?></span></td></tr><tr><td class="css_contatorelacao_line" style="padding: 0px; width: 100%;">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_ContatoRelacao'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_ContatoRelacao'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['form_contato_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_ContatoRelacao'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['form_contato_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['form_contato_script_case_init'] ]['form_contato']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['form_contato_script_case_init'] ]['form_contato']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['form_contato_script_case_init'] ]['form_contato']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['form_contato_script_case_init'] ]['form_contato']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['form_contato_script_case_init'] ]['form_contato']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['form_contato_script_case_init'] ]['form_contato']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['form_contato_script_case_init'] ]['form_contato']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['form_contato_script_case_init'] ]['form_contato']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['form_contato_script_case_init'] ]['form_contato']['embutida_liga_grid_edit'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['form_contato_script_case_init'] ]['form_contato']['embutida_liga_grid_edit_link'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['form_contato_script_case_init'] ]['form_contato']['embutida_liga_qtd_reg'] = '15';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['form_contato_script_case_init'] ]['form_contato']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['form_contato_script_case_init'] ]['form_contato']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['form_contato_script_case_init'] ]['form_contato']['foreign_key']['id_empresa'] = $this->nmgp_dados_form['id'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['form_contato_script_case_init'] ]['form_contato']['where_filter'] = "ID_EMPRESA = " . $this->nmgp_dados_form['id'] . "";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['form_contato_script_case_init'] ]['form_contato']['where_detal']  = "ID_EMPRESA = " . $this->nmgp_dados_form['id'] . "";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['form_contato_script_case_init'] ]['form_empresa_SemChave']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['form_contato_script_case_init'] ]['form_contato']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_empresa_SemChave_empty.htm' : $this->Ini->link_form_contato_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y';
if (isset($this->Ini->sc_lig_target['C_@scinf_ContatoRelacao']) && 'nmsc_iframe_liga_form_contato' != $this->Ini->sc_lig_target['C_@scinf_ContatoRelacao'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_ContatoRelacao'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_SemChave']['form_contato_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_ContatoRelacao'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_contato"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_contato"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_contatorelacao_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_contatorelacao_text"></span></td></tr></table></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_contatorelacao_dumb = ('' == $sStyleHidden_contatorelacao) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_contatorelacao_dumb" style="<?php echo $sStyleHidden_contatorelacao_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_4"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_4" class="scBlockFrame"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_4" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="3" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Detalhes</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['telefones']))
    {
        $this->nm_new_label['telefones'] = "Outros Telefones";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $telefones = $this->telefones;
   $sStyleHidden_telefones = '';
   if (isset($this->nmgp_cmp_hidden['telefones']) && $this->nmgp_cmp_hidden['telefones'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['telefones']);
       $sStyleHidden_telefones = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_telefones = 'display: none;';
   $sStyleReadInp_telefones = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['telefones']) && $this->nmgp_cmp_readonly['telefones'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['telefones']);
       $sStyleReadLab_telefones = '';
       $sStyleReadInp_telefones = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['telefones']) && $this->nmgp_cmp_hidden['telefones'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="telefones" value="<?php echo $this->form_encode_input($telefones) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_telefones" style="<?php echo $sStyleHidden_telefones; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_telefones_line" style="vertical-align: top;padding: 0px"><table style="border-spacing: 0px; border-width: 0px; border-collapse: collapse; width: 100%" cellspacing=0 cellpadding=0><tr><td class="scFormLabelOddFormat scFormLabelAboveOddFormat css_telefones_label" style=" padding: 0px; width: 100%;"><span id="id_label_telefones"><?php echo $this->nm_new_label['telefones']; ?></span></td></tr><tr><td class="css_telefones_line" style="padding: 0px; width: 100%;">
<?php
$telefones_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($telefones));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["telefones"]) &&  $this->nmgp_cmp_readonly["telefones"] == "on") { 

 ?>
<input type="hidden" name="telefones" value="<?php echo $this->form_encode_input($telefones) . "\">" . $telefones_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_telefones" class="sc-ui-readonly-telefones css_telefones_line" style="<?php echo $sStyleReadLab_telefones; ?>"><?php echo $this->form_format_readonly("telefones", $this->form_encode_input($telefones_val)); ?></span><span id="id_read_off_telefones" class="css_read_off_telefones<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_telefones; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_telefones_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="telefones" id="id_sc_field_telefones" rows="5" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $telefones; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_telefones_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_telefones_text"></span></td></tr></table></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['contatos']))
    {
        $this->nm_new_label['contatos'] = "Contatos";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $contatos = $this->contatos;
   $sStyleHidden_contatos = '';
   if (isset($this->nmgp_cmp_hidden['contatos']) && $this->nmgp_cmp_hidden['contatos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['contatos']);
       $sStyleHidden_contatos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_contatos = 'display: none;';
   $sStyleReadInp_contatos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['contatos']) && $this->nmgp_cmp_readonly['contatos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['contatos']);
       $sStyleReadLab_contatos = '';
       $sStyleReadInp_contatos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['contatos']) && $this->nmgp_cmp_hidden['contatos'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="contatos" value="<?php echo $this->form_encode_input($contatos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_contatos" style="<?php echo $sStyleHidden_contatos; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_contatos_line" style="vertical-align: top;padding: 0px"><table style="border-spacing: 0px; border-width: 0px; border-collapse: collapse; width: 100%" cellspacing=0 cellpadding=0><tr><td class="scFormLabelOddFormat scFormLabelAboveOddFormat css_contatos_label" style=" padding: 0px; width: 100%;"><span id="id_label_contatos"><?php echo $this->nm_new_label['contatos']; ?></span></td></tr><tr><td class="css_contatos_line" style="padding: 0px; width: 100%;">
<?php
$contatos_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($contatos));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["contatos"]) &&  $this->nmgp_cmp_readonly["contatos"] == "on") { 

 ?>
<input type="hidden" name="contatos" value="<?php echo $this->form_encode_input($contatos) . "\">" . $contatos_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_contatos" class="sc-ui-readonly-contatos css_contatos_line" style="<?php echo $sStyleReadLab_contatos; ?>"><?php echo $this->form_format_readonly("contatos", $this->form_encode_input($contatos_val)); ?></span><span id="id_read_off_contatos" class="css_read_off_contatos<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_contatos; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_contatos_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="contatos" id="id_sc_field_contatos" rows="5" cols="100"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $contatos; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_contatos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_contatos_text"></span></td></tr></table></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['obs']))
    {
        $this->nm_new_label['obs'] = "Obs";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $obs = $this->obs;
   $sStyleHidden_obs = '';
   if (isset($this->nmgp_cmp_hidden['obs']) && $this->nmgp_cmp_hidden['obs'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['obs']);
       $sStyleHidden_obs = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_obs = 'display: none;';
   $sStyleReadInp_obs = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['obs']) && $this->nmgp_cmp_readonly['obs'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['obs']);
       $sStyleReadLab_obs = '';
       $sStyleReadInp_obs = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['obs']) && $this->nmgp_cmp_hidden['obs'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="obs" value="<?php echo $this->form_encode_input($obs) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_obs" style="<?php echo $sStyleHidden_obs; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_obs_line" style="vertical-align: top;padding: 0px"><table style="border-spacing: 0px; border-width: 0px; border-collapse: collapse; width: 100%" cellspacing=0 cellpadding=0><tr><td class="scFormLabelOddFormat scFormLabelAboveOddFormat css_obs_label" style=" padding: 0px; width: 100%;"><span id="id_label_obs"><?php echo $this->nm_new_label['obs']; ?></span></td></tr><tr><td class="css_obs_line" style="padding: 0px; width: 100%;">
<?php
$obs_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($obs));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["obs"]) &&  $this->nmgp_cmp_readonly["obs"] == "on") { 

 ?>
<input type="hidden" name="obs" value="<?php echo $this->form_encode_input($obs) . "\">" . $obs_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_obs" class="sc-ui-readonly-obs css_obs_line" style="<?php echo $sStyleReadLab_obs; ?>"><?php echo $this->form_format_readonly("obs", $this->form_encode_input($obs_val)); ?></span><span id="id_read_off_obs" class="css_read_off_obs<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_obs; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_obs_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="obs" id="id_sc_field_obs" rows="5" cols="70"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $obs; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_obs_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_obs_text"></span></td></tr></table></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
