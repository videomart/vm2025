
function scJQGeneralAdd() {
  scLoadScInput('input:text.sc-js-input');
  scLoadScInput('input:password.sc-js-input');
  scLoadScInput('input:checkbox.sc-js-input');
  scLoadScInput('input:radio.sc-js-input');
  scLoadScInput('select.sc-js-input');
  scLoadScInput('textarea.sc-js-input');

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if ($("#id_ac_" + sField).length > 0) {
    if ($oField.hasClass("select2-hidden-accessible")) {
      if (false == scSetFocusOnField($oField, sField)) {
        setTimeout(function() { scSetFocusOnField($oField, sField); }, 500);
      }
    }
    else {
      if (false == scSetFocusOnField($oField, sField)) {
        if (false == scSetFocusOnField($("#id_ac_" + sField, sField))) {
          setTimeout(function() { scSetFocusOnField($("#id_ac_" + sField, sField)); }, 500);
        }
      }
      else {
        setTimeout(function() { scSetFocusOnField($oField, sField); }, 500);
      }
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField, sField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField, sField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["id_modelo_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_empresa_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fob_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["peso_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["moeda_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["data_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["obs_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["minimo_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_modelo_" + iSeqRow] && scEventControl_data["id_modelo_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_modelo_" + iSeqRow] && scEventControl_data["id_modelo_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_empresa_" + iSeqRow] && scEventControl_data["id_empresa_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_empresa_" + iSeqRow] && scEventControl_data["id_empresa_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fob_" + iSeqRow] && scEventControl_data["fob_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fob_" + iSeqRow] && scEventControl_data["fob_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["peso_" + iSeqRow] && scEventControl_data["peso_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["peso_" + iSeqRow] && scEventControl_data["peso_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["moeda_" + iSeqRow] && scEventControl_data["moeda_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["moeda_" + iSeqRow] && scEventControl_data["moeda_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["data_" + iSeqRow] && scEventControl_data["data_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["data_" + iSeqRow] && scEventControl_data["data_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["obs_" + iSeqRow] && scEventControl_data["obs_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["obs_" + iSeqRow] && scEventControl_data["obs_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["minimo_" + iSeqRow] && scEventControl_data["minimo_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["minimo_" + iSeqRow] && scEventControl_data["minimo_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_empresa_" + iSeqRow] && scEventControl_data["id_empresa_" + iSeqRow]["autocomp"]) {
    return true;
  }
  if (scEventControl_data["id_modelo_" + iSeqRow] && scEventControl_data["id_modelo_" + iSeqRow]["autocomp"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_active_all() {
  for (var i = 1; i < iAjaxNewLine; i++) {
    if (scEventControl_active(i)) {
      return true;
    }
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("moeda_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("fob_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("id_empresa_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("id_modelo_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val() || scEventControl_data[sFieldName]["calculated"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_id_' + iSeqRow).bind('change', function() { sc_form_price_id__onchange(this, iSeqRow, event) });
  $('#id_sc_field_id_empresa_' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_price_id_empresa__onblur('#id_sc_field_id_empresa_' + iSeqRow, iSeqRow, event);}, 300) })
                                         .bind('change', function() { sc_form_price_id_empresa__onchange(this, iSeqRow, event) })
                                         .bind('focus', function() { sc_form_price_id_empresa__onfocus(this, iSeqRow, event) });
  $('#id_sc_field_moeda_' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_price_moeda__onblur('#id_sc_field_moeda_' + iSeqRow, iSeqRow, event);}, 300) })
                                    .bind('change', function() { sc_form_price_moeda__onchange(this, iSeqRow, event) })
                                    .bind('focus', function() { sc_form_price_moeda__onfocus(this, iSeqRow, event) });
  $('#id_sc_field_fob_' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_price_fob__onblur('#id_sc_field_fob_' + iSeqRow, iSeqRow, event);}, 300) })
                                  .bind('change', function() { sc_form_price_fob__onchange(this, iSeqRow, event) })
                                  .bind('focus', function() { sc_form_price_fob__onfocus(this, iSeqRow, event) });
  $('#id_sc_field_peso_' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_price_peso__onblur('#id_sc_field_peso_' + iSeqRow, iSeqRow, event);}, 300) })
                                   .bind('change', function() { sc_form_price_peso__onchange(this, iSeqRow, event) })
                                   .bind('focus', function() { sc_form_price_peso__onfocus(this, iSeqRow, event) });
  $('#id_sc_field_data_' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_price_data__onblur('#id_sc_field_data_' + iSeqRow, iSeqRow, event);}, 300) })
                                   .bind('change', function() { sc_form_price_data__onchange(this, iSeqRow, event) })
                                   .bind('focus', function() { sc_form_price_data__onfocus(this, iSeqRow, event) });
  $('#id_sc_field_obs_' + iSeqRow).bind('blur', function() { sc_form_price_obs__onblur('#id_sc_field_obs_' + iSeqRow, iSeqRow, event) })
                                  .bind('change', function() { sc_form_price_obs__onchange(this, iSeqRow, event) })
                                  .bind('focus', function() { sc_form_price_obs__onfocus(this, iSeqRow, event) });
  $('#id_sc_field_id_modelo_' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_price_id_modelo__onblur('#id_sc_field_id_modelo_' + iSeqRow, iSeqRow, event);}, 300) })
                                        .bind('change', function() { sc_form_price_id_modelo__onchange(this, iSeqRow, event) })
                                        .bind('focus', function() { sc_form_price_id_modelo__onfocus(this, iSeqRow, event) });
  $('#id_sc_field_minimo_' + iSeqRow).bind('blur', function() { sc_form_price_minimo__onblur('#id_sc_field_minimo_' + iSeqRow, iSeqRow, event) })
                                     .bind('change', function() { sc_form_price_minimo__onchange(this, iSeqRow, event) })
                                     .bind('focus', function() { sc_form_price_minimo__onfocus(this, iSeqRow, event) });
} // scJQEventsAdd

Upload_Cancel = false;
function sc_form_price_id__onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_price_id_empresa__onblur(oThis, iSeqRow, event) {
  do_ajax_form_price_validate_id_empresa_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_price_id_empresa__onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
  do_ajax_form_price_event_id_empresa__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_price_id_empresa__onfocus(oThis, iSeqRow, event) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_price_moeda__onblur(oThis, iSeqRow, event) {
  do_ajax_form_price_validate_moeda_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_price_moeda__onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_price_moeda__onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_price_fob__onblur(oThis, iSeqRow, event) {
  do_ajax_form_price_validate_fob_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_price_fob__onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
  do_ajax_form_price_event_fob__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_price_fob__onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_price_peso__onblur(oThis, iSeqRow, event) {
  do_ajax_form_price_validate_peso_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_price_peso__onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_price_peso__onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_price_data__onblur(oThis, iSeqRow, event) {
  do_ajax_form_price_validate_data_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_price_data__onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_price_data__onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_price_obs__onblur(oThis, iSeqRow, event) {
  do_ajax_form_price_validate_obs_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_price_obs__onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_price_obs__onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_price_id_modelo__onblur(oThis, iSeqRow, event) {
  do_ajax_form_price_validate_id_modelo_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_price_id_modelo__onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
  do_ajax_form_price_event_id_modelo__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_price_id_modelo__onfocus(oThis, iSeqRow, event) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_price_minimo__onblur(oThis, iSeqRow, event) {
  do_ajax_form_price_validate_minimo_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_price_minimo__onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_price_minimo__onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
        if ("0" == block) {
                displayChange_block_0(status);
        }
}

function displayChange_block_0(status) {
        displayChange_field("id_modelo_", "", status);
        displayChange_field("id_empresa_", "", status);
        displayChange_field("fob_", "", status);
        displayChange_field("peso_", "", status);
        displayChange_field("moeda_", "", status);
        displayChange_field("data_", "", status);
        displayChange_field("obs_", "", status);
        displayChange_field("minimo_", "", status);
}

function displayChange_row(row, status) {
        displayChange_field_id_modelo_(row, status);
        displayChange_field_id_empresa_(row, status);
        displayChange_field_fob_(row, status);
        displayChange_field_peso_(row, status);
        displayChange_field_moeda_(row, status);
        displayChange_field_data_(row, status);
        displayChange_field_obs_(row, status);
        displayChange_field_minimo_(row, status);
}

function displayChange_field(field, row, status) {
        if ("id_modelo_" == field) {
                displayChange_field_id_modelo_(row, status);
        }
        if ("id_empresa_" == field) {
                displayChange_field_id_empresa_(row, status);
        }
        if ("fob_" == field) {
                displayChange_field_fob_(row, status);
        }
        if ("peso_" == field) {
                displayChange_field_peso_(row, status);
        }
        if ("moeda_" == field) {
                displayChange_field_moeda_(row, status);
        }
        if ("data_" == field) {
                displayChange_field_data_(row, status);
        }
        if ("obs_" == field) {
                displayChange_field_obs_(row, status);
        }
        if ("minimo_" == field) {
                displayChange_field_minimo_(row, status);
        }
}

function displayChange_field_id_modelo_(row, status) {
    var fieldId;
}

function displayChange_field_id_empresa_(row, status) {
    var fieldId;
}

function displayChange_field_fob_(row, status) {
    var fieldId;
}

function displayChange_field_peso_(row, status) {
    var fieldId;
}

function displayChange_field_moeda_(row, status) {
    var fieldId;
}

function displayChange_field_data_(row, status) {
    var fieldId;
}

function displayChange_field_obs_(row, status) {
    var fieldId;
}

function displayChange_field_minimo_(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
        $(".sc-form-page").show();
}

function scHidePage(pageNo) {
        $("#id_form_price_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
        if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
                var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
                if (inactiveTabs.length) {
                        var tabNo = $(inactiveTabs[0]).attr("id").substr(21);
                }
        }
}
function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

var api_cache_requests = [];
function ajax_check_file(img_name, field  ,t, p, p_cache, iSeqRow, hasRun, img_before){
    setTimeout(function(){
        if(img_name == '') return;
        iSeqRow= iSeqRow !== undefined && iSeqRow !== null ? iSeqRow : '';
        var hasVar = p.indexOf('_@NM@_') > -1 || p_cache.indexOf('_@NM@_') > -1 ? true : false;

        p = p.split('_@NM@_');
        $.each(p, function(i,v){
            try{
                p[i] = $('[name='+v+iSeqRow+']').val();
            }
            catch(err){
                p[i] = v;
            }
        });
        p = p.join('');

        p_cache = p_cache.split('_@NM@_');
        $.each(p_cache, function(i,v){
            try{
                p_cache[i] = $('[name='+v+iSeqRow+']').val();
            }
            catch(err){
                p_cache[i] = v;
            }
        });
        p_cache = p_cache.join('');

        img_before = img_before !== undefined ? img_before : $(t).attr('src');
        var str_key_cache = '<?php echo $this->Ini->sc_page; ?>' + img_name+field+p+p_cache;
        if(api_cache_requests[ str_key_cache ] !== undefined && api_cache_requests[ str_key_cache ] !== null){
            if(api_cache_requests[ str_key_cache ] != false){
                do_ajax_check_file(api_cache_requests[ str_key_cache ], field  ,t, iSeqRow);
            }
            return;
        }
        //scAjaxProcOn();
        $(t).attr('src', '<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif');
        api_cache_requests[ str_key_cache ] = false;
        var rs =$.ajax({
                    type: "POST",
                    url: 'index.php?script_case_init=<?php echo $this->Ini->sc_page; ?>',
                    async: true,
                    data:'nmgp_opcao=ajax_check_file&AjaxCheckImg=' + encodeURI(img_name) +'&rsargs='+ field + '&p=' + p + '&p_cache=' + p_cache,
                    success: function (rs) {
                        if(rs.indexOf('</span>') != -1){
                            rs = rs.substr(rs.indexOf('</span>') + 7);
                        }
                        if(rs.indexOf('/') != -1 && rs.indexOf('/') != 0){
                            rs = rs.substr(rs.indexOf('/'));
                        }
                        rs = sc_trim(rs);

                        // if(rs == 0 && hasVar && hasRun === undefined){
                        //     delete window.api_cache_requests[ str_key_cache ];
                        //     ajax_check_file(img_name, field  ,t, p, p_cache, iSeqRow, 1, img_before);
                        //     return;
                        // }
                        window.api_cache_requests[ str_key_cache ] = rs;
                        do_ajax_check_file(rs, field  ,t, iSeqRow)
                        if(rs == 0){
                            delete window.api_cache_requests[ str_key_cache ];

                           // $(t).attr('src',img_before);
                            do_ajax_check_file(img_before+'_@@NM@@_' + img_before, field  ,t, iSeqRow)

                        }


                    }
        });
    },100);
}

function do_ajax_check_file(rs, field  ,t, iSeqRow){
    if (rs != 0) {
        rs_split = rs.split('_@@NM@@_');
        rs_orig = rs_split[0];
        rs2 = rs_split[1];
        try{
            if(!$(t).is('img')){

                if($('#id_read_on_'+field+iSeqRow).length > 0 ){
                                    var usa_read_only = false;

                switch(field){

                }
                     if(usa_read_only && $('a',$('#id_read_on_'+field+iSeqRow)).length == 0){
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_price')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
                     }
                }
                if($('#id_ajax_doc_'+field+iSeqRow+' a').length > 0){
                    var target = $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href').split(',');
                    target[1] = "'"+rs2+"'";
                    $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href', target.join(','));
                }else{
                    var target = $(t).attr('href').split(',');
                     target[1] = "'"+rs2+"'";
                     $(t).attr('href', target.join(','));
                }
            }else{
                $(t).attr('src', rs2);
                $(t).css('display', '');
                if($('#id_ajax_doc_'+field+iSeqRow+' a').length > 0){
                    var target = $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href').split(',');
                    target[1] = "'"+rs2+"'";
                    $(t).attr('href', target.join(','));
                }else{
                     var t_link = $(t).parent('a');
                     var target = $(t_link).attr('href').split(',');
                     target[0] = "javascript:nm_mostra_img('"+rs_orig+"'";
                     $(t_link).attr('href', target.join(','));
                }

            }
            eval("window.var_ajax_img_"+field+iSeqRow+" = '"+rs_orig+"';");

        } catch(err){
                        eval("window.var_ajax_img_"+field+iSeqRow+" = '"+rs_orig+"';");

        }
    }
   /* hasFalseCacheRequest = false;
    $.each(api_cache_requests, function(i,v){
        if(v == false){
            hasFalseCacheRequest = true;
        }
    });
    if(hasFalseCacheRequest == false){
        scAjaxProcOff();
    }*/
}

$(document).ready(function(){
});


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

function scGetFileExtension(fileName)
{
    fileNameParts = fileName.split(".");

    if (1 === fileNameParts.length || (2 === fileNameParts.length && "" == fileNameParts[0])) {
        return "";
    }

    return fileNameParts.pop().toLowerCase();
}

function scFormatExtensionSizeErrorMsg(errorMsg)
{
    var msgInfo = errorMsg.split("||"), returnMsg = "";

    if ("err_size" == msgInfo[0]) {
        returnMsg = "<?php echo $this->Ini->Nm_lang['lang_errm_file_size'] ?>. <?php echo $this->Ini->Nm_lang['lang_errm_file_size_extension'] ?>".replace("{SC_EXTENSION}", msgInfo[1]).replace("{SC_LIMIT}", msgInfo[2]);
    } else if ("err_extension" == msgInfo[0]) {
        returnMsg = "<?php echo $this->Ini->Nm_lang['lang_errm_file_invl'] ?>";
    }

    return returnMsg;
}

