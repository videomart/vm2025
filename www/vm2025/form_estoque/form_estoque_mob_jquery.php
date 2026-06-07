
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
  scEventControl_data["id_produto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descricao" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_empresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["obs" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estoque" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["operacao" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["entrada" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["saida" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["data" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_produto" + iSeqRow] && scEventControl_data["id_produto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_produto" + iSeqRow] && scEventControl_data["id_produto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descricao" + iSeqRow] && scEventControl_data["descricao" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descricao" + iSeqRow] && scEventControl_data["descricao" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_empresa" + iSeqRow] && scEventControl_data["id_empresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_empresa" + iSeqRow] && scEventControl_data["id_empresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["obs" + iSeqRow] && scEventControl_data["obs" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["obs" + iSeqRow] && scEventControl_data["obs" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estoque" + iSeqRow] && scEventControl_data["estoque" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estoque" + iSeqRow] && scEventControl_data["estoque" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["operacao" + iSeqRow] && scEventControl_data["operacao" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["operacao" + iSeqRow] && scEventControl_data["operacao" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["entrada" + iSeqRow] && scEventControl_data["entrada" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["entrada" + iSeqRow] && scEventControl_data["entrada" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["saida" + iSeqRow] && scEventControl_data["saida" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["saida" + iSeqRow] && scEventControl_data["saida" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["data" + iSeqRow] && scEventControl_data["data" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["data" + iSeqRow] && scEventControl_data["data" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_produto" + iSeqRow] && scEventControl_data["id_produto" + iSeqRow]["autocomp"]) {
    return true;
  }
  if (scEventControl_data["id_empresa" + iSeqRow] && scEventControl_data["id_empresa" + iSeqRow]["autocomp"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
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
  $('#id_sc_field_id_produto' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_estoque_id_produto_onblur('#id_sc_field_id_produto' + iSeqRow, iSeqRow, event);}, 300) })
                                        .bind('focus', function() { sc_form_estoque_id_produto_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_data' + iSeqRow).bind('blur', function() { sc_form_estoque_data_onblur('#id_sc_field_data' + iSeqRow, iSeqRow, event) })
                                  .bind('focus', function() { sc_form_estoque_data_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_operacao' + iSeqRow).bind('blur', function() { sc_form_estoque_operacao_onblur('#id_sc_field_operacao' + iSeqRow, iSeqRow, event) })
                                      .bind('click', function() { sc_form_estoque_operacao_onclick(this, iSeqRow, event) })
                                      .bind('focus', function() { sc_form_estoque_operacao_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_entrada' + iSeqRow).bind('blur', function() { sc_form_estoque_entrada_onblur('#id_sc_field_entrada' + iSeqRow, iSeqRow, event) })
                                     .bind('focus', function() { sc_form_estoque_entrada_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_saida' + iSeqRow).bind('blur', function() { sc_form_estoque_saida_onblur('#id_sc_field_saida' + iSeqRow, iSeqRow, event) })
                                   .bind('focus', function() { sc_form_estoque_saida_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_id_empresa' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_estoque_id_empresa_onblur('#id_sc_field_id_empresa' + iSeqRow, iSeqRow, event);}, 300) })
                                        .bind('focus', function() { sc_form_estoque_id_empresa_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_obs' + iSeqRow).bind('blur', function() { sc_form_estoque_obs_onblur('#id_sc_field_obs' + iSeqRow, iSeqRow, event) })
                                 .bind('focus', function() { sc_form_estoque_obs_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_estoque' + iSeqRow).bind('blur', function() { sc_form_estoque_estoque_onblur('#id_sc_field_estoque' + iSeqRow, iSeqRow, event) })
                                     .bind('focus', function() { sc_form_estoque_estoque_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_descricao' + iSeqRow).bind('blur', function() { sc_form_estoque_descricao_onblur('#id_sc_field_descricao' + iSeqRow, iSeqRow, event) })
                                       .bind('focus', function() { sc_form_estoque_descricao_onfocus(this, iSeqRow, event) });
  $('.sc-ui-radio-operacao' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

Upload_Cancel = false;
function sc_form_estoque_id_produto_onblur(oThis, iSeqRow, event) {
  do_ajax_form_estoque_mob_validate_id_produto();
  scCssBlur(oThis);
}

function sc_form_estoque_id_produto_onfocus(oThis, iSeqRow, event) {
  scCssFocus(oThis);
}

function sc_form_estoque_data_onblur(oThis, iSeqRow, event) {
  do_ajax_form_estoque_mob_validate_data();
  scCssBlur(oThis);
}

function sc_form_estoque_data_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_estoque_operacao_onblur(oThis, iSeqRow, event) {
  do_ajax_form_estoque_mob_validate_operacao();
  scCssBlur(oThis);
}

function sc_form_estoque_operacao_onclick(oThis, iSeqRow, event) {
  do_ajax_form_estoque_mob_event_operacao_onclick();
}

function sc_form_estoque_operacao_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_estoque_entrada_onblur(oThis, iSeqRow, event) {
  do_ajax_form_estoque_mob_validate_entrada();
  scCssBlur(oThis);
}

function sc_form_estoque_entrada_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_estoque_saida_onblur(oThis, iSeqRow, event) {
  do_ajax_form_estoque_mob_validate_saida();
  scCssBlur(oThis);
}

function sc_form_estoque_saida_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_estoque_id_empresa_onblur(oThis, iSeqRow, event) {
  do_ajax_form_estoque_mob_validate_id_empresa();
  scCssBlur(oThis);
}

function sc_form_estoque_id_empresa_onfocus(oThis, iSeqRow, event) {
  scCssFocus(oThis);
}

function sc_form_estoque_obs_onblur(oThis, iSeqRow, event) {
  do_ajax_form_estoque_mob_validate_obs();
  scCssBlur(oThis);
}

function sc_form_estoque_obs_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_estoque_estoque_onblur(oThis, iSeqRow, event) {
  do_ajax_form_estoque_mob_validate_estoque();
  scCssBlur(oThis);
}

function sc_form_estoque_estoque_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_estoque_descricao_onblur(oThis, iSeqRow, event) {
  do_ajax_form_estoque_mob_validate_descricao();
  scCssBlur(oThis);
}

function sc_form_estoque_descricao_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
        if ("0" == block) {
                displayChange_block_0(status);
        }
        if ("1" == block) {
                displayChange_block_1(status);
        }
}

function displayChange_block_0(status) {
        displayChange_field("id_produto", "", status);
        displayChange_field("descricao", "", status);
        displayChange_field("id_empresa", "", status);
        displayChange_field("obs", "", status);
        displayChange_field("estoque", "", status);
}

function displayChange_block_1(status) {
        displayChange_field("operacao", "", status);
        displayChange_field("entrada", "", status);
        displayChange_field("saida", "", status);
        displayChange_field("data", "", status);
}

function displayChange_row(row, status) {
        displayChange_field_id_produto(row, status);
        displayChange_field_descricao(row, status);
        displayChange_field_id_empresa(row, status);
        displayChange_field_obs(row, status);
        displayChange_field_estoque(row, status);
        displayChange_field_operacao(row, status);
        displayChange_field_entrada(row, status);
        displayChange_field_saida(row, status);
        displayChange_field_data(row, status);
}

function displayChange_field(field, row, status) {
        if ("id_produto" == field) {
                displayChange_field_id_produto(row, status);
        }
        if ("descricao" == field) {
                displayChange_field_descricao(row, status);
        }
        if ("id_empresa" == field) {
                displayChange_field_id_empresa(row, status);
        }
        if ("obs" == field) {
                displayChange_field_obs(row, status);
        }
        if ("estoque" == field) {
                displayChange_field_estoque(row, status);
        }
        if ("operacao" == field) {
                displayChange_field_operacao(row, status);
        }
        if ("entrada" == field) {
                displayChange_field_entrada(row, status);
        }
        if ("saida" == field) {
                displayChange_field_saida(row, status);
        }
        if ("data" == field) {
                displayChange_field_data(row, status);
        }
}

function displayChange_field_id_produto(row, status) {
    var fieldId;
}

function displayChange_field_descricao(row, status) {
    var fieldId;
}

function displayChange_field_id_empresa(row, status) {
    var fieldId;
}

function displayChange_field_obs(row, status) {
    var fieldId;
}

function displayChange_field_estoque(row, status) {
    var fieldId;
}

function displayChange_field_operacao(row, status) {
    var fieldId;
}

function displayChange_field_entrada(row, status) {
    var fieldId;
}

function displayChange_field_saida(row, status) {
    var fieldId;
}

function displayChange_field_data(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
        $(".sc-form-page").show();
}

function scHidePage(pageNo) {
        $("#id_form_estoque_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
        if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
                var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
                if (inactiveTabs.length) {
                        var tabNo = $(inactiveTabs[0]).attr("id").substr(27);
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_estoque_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

