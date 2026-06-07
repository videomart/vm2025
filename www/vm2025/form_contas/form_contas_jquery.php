
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
  scEventControl_data["id_empresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["data" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["referencia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_ordem" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_subconta" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["moeda" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["debito" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["credito" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sld_real" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sld_dolar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_empresa" + iSeqRow] && scEventControl_data["id_empresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_empresa" + iSeqRow] && scEventControl_data["id_empresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["data" + iSeqRow] && scEventControl_data["data" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["data" + iSeqRow] && scEventControl_data["data" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["referencia" + iSeqRow] && scEventControl_data["referencia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["referencia" + iSeqRow] && scEventControl_data["referencia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_ordem" + iSeqRow] && scEventControl_data["id_ordem" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_ordem" + iSeqRow] && scEventControl_data["id_ordem" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_subconta" + iSeqRow] && scEventControl_data["id_subconta" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_subconta" + iSeqRow] && scEventControl_data["id_subconta" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["moeda" + iSeqRow] && scEventControl_data["moeda" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["moeda" + iSeqRow] && scEventControl_data["moeda" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["debito" + iSeqRow] && scEventControl_data["debito" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["debito" + iSeqRow] && scEventControl_data["debito" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["credito" + iSeqRow] && scEventControl_data["credito" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["credito" + iSeqRow] && scEventControl_data["credito" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sld_real" + iSeqRow] && scEventControl_data["sld_real" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sld_real" + iSeqRow] && scEventControl_data["sld_real" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sld_dolar" + iSeqRow] && scEventControl_data["sld_dolar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sld_dolar" + iSeqRow] && scEventControl_data["sld_dolar" + iSeqRow]["change"]) {
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
  if ("id_subconta" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_empresa" + iSeq == fieldName) {
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
  $('#id_sc_field_id' + iSeqRow).bind('change', function() { sc_form_contas_id_onchange(this, iSeqRow, event) });
  $('#id_sc_field_id_empresa' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_contas_id_empresa_onblur('#id_sc_field_id_empresa' + iSeqRow, iSeqRow, event);}, 300) })
                                        .bind('change', function() { sc_form_contas_id_empresa_onchange(this, iSeqRow, event) })
                                        .bind('focus', function() { sc_form_contas_id_empresa_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_data' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_contas_data_onblur('#id_sc_field_data' + iSeqRow, iSeqRow, event);}, 300) })
                                  .bind('change', function() { sc_form_contas_data_onchange(this, iSeqRow, event) })
                                  .bind('focus', function() { sc_form_contas_data_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_credito' + iSeqRow).bind('blur', function() { sc_form_contas_credito_onblur('#id_sc_field_credito' + iSeqRow, iSeqRow, event) })
                                     .bind('change', function() { sc_form_contas_credito_onchange(this, iSeqRow, event) })
                                     .bind('focus', function() { sc_form_contas_credito_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_debito' + iSeqRow).bind('blur', function() { sc_form_contas_debito_onblur('#id_sc_field_debito' + iSeqRow, iSeqRow, event) })
                                    .bind('change', function() { sc_form_contas_debito_onchange(this, iSeqRow, event) })
                                    .bind('focus', function() { sc_form_contas_debito_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_id_subconta' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_contas_id_subconta_onblur('#id_sc_field_id_subconta' + iSeqRow, iSeqRow, event);}, 300) })
                                         .bind('change', function() { sc_form_contas_id_subconta_onchange(this, iSeqRow, event) })
                                         .bind('focus', function() { sc_form_contas_id_subconta_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_id_ordem' + iSeqRow).bind('blur', function() { sc_form_contas_id_ordem_onblur('#id_sc_field_id_ordem' + iSeqRow, iSeqRow, event) })
                                      .bind('change', function() { sc_form_contas_id_ordem_onchange(this, iSeqRow, event) })
                                      .bind('focus', function() { sc_form_contas_id_ordem_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_referencia' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_contas_referencia_onblur('#id_sc_field_referencia' + iSeqRow, iSeqRow, event);}, 300) })
                                        .bind('change', function() { sc_form_contas_referencia_onchange(this, iSeqRow, event) })
                                        .bind('focus', function() { sc_form_contas_referencia_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_moeda' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_contas_moeda_onblur('#id_sc_field_moeda' + iSeqRow, iSeqRow, event);}, 300) })
                                   .bind('change', function() { sc_form_contas_moeda_onchange(this, iSeqRow, event) })
                                   .bind('focus', function() { sc_form_contas_moeda_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_sld_real' + iSeqRow).bind('blur', function() { sc_form_contas_sld_real_onblur('#id_sc_field_sld_real' + iSeqRow, iSeqRow, event) })
                                      .bind('change', function() { sc_form_contas_sld_real_onchange(this, iSeqRow, event) })
                                      .bind('focus', function() { sc_form_contas_sld_real_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_sld_dolar' + iSeqRow).bind('blur', function() { sc_form_contas_sld_dolar_onblur('#id_sc_field_sld_dolar' + iSeqRow, iSeqRow, event) })
                                       .bind('change', function() { sc_form_contas_sld_dolar_onchange(this, iSeqRow, event) })
                                       .bind('focus', function() { sc_form_contas_sld_dolar_onfocus(this, iSeqRow, event) });
  $('.sc-ui-radio-moeda' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

Upload_Cancel = false;
function sc_form_contas_id_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_contas_id_empresa_onblur(oThis, iSeqRow, event) {
  do_ajax_form_contas_validate_id_empresa();
  scCssBlur(oThis);
}

function sc_form_contas_id_empresa_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
  do_ajax_form_contas_event_id_empresa_onchange();
}

function sc_form_contas_id_empresa_onfocus(oThis, iSeqRow, event) {
  scCssFocus(oThis);
}

function sc_form_contas_data_onblur(oThis, iSeqRow, event) {
  do_ajax_form_contas_validate_data();
  scCssBlur(oThis);
}

function sc_form_contas_data_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_contas_data_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_contas_credito_onblur(oThis, iSeqRow, event) {
  do_ajax_form_contas_validate_credito();
  scCssBlur(oThis);
}

function sc_form_contas_credito_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_contas_credito_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_contas_debito_onblur(oThis, iSeqRow, event) {
  do_ajax_form_contas_validate_debito();
  scCssBlur(oThis);
}

function sc_form_contas_debito_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_contas_debito_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_contas_id_subconta_onblur(oThis, iSeqRow, event) {
  do_ajax_form_contas_validate_id_subconta();
  scCssBlur(oThis);
  do_ajax_form_contas_event_id_subconta_onblur();
}

function sc_form_contas_id_subconta_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_contas_id_subconta_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_contas_id_ordem_onblur(oThis, iSeqRow, event) {
  do_ajax_form_contas_validate_id_ordem();
  scCssBlur(oThis);
}

function sc_form_contas_id_ordem_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_contas_id_ordem_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_contas_referencia_onblur(oThis, iSeqRow, event) {
  do_ajax_form_contas_validate_referencia();
  scCssBlur(oThis);
}

function sc_form_contas_referencia_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_contas_referencia_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_contas_moeda_onblur(oThis, iSeqRow, event) {
  do_ajax_form_contas_validate_moeda();
  scCssBlur(oThis);
}

function sc_form_contas_moeda_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_contas_moeda_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_contas_sld_real_onblur(oThis, iSeqRow, event) {
  do_ajax_form_contas_validate_sld_real();
  scCssBlur(oThis);
}

function sc_form_contas_sld_real_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_contas_sld_real_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_contas_sld_dolar_onblur(oThis, iSeqRow, event) {
  do_ajax_form_contas_validate_sld_dolar();
  scCssBlur(oThis);
}

function sc_form_contas_sld_dolar_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_contas_sld_dolar_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
        if ("0" == block) {
                displayChange_block_0(status);
        }
}

function displayChange_block_0(status) {
        displayChange_field("id_empresa", "", status);
        displayChange_field("data", "", status);
        displayChange_field("referencia", "", status);
        displayChange_field("id_ordem", "", status);
        displayChange_field("id_subconta", "", status);
        displayChange_field("moeda", "", status);
        displayChange_field("debito", "", status);
        displayChange_field("credito", "", status);
        displayChange_field("sld_real", "", status);
        displayChange_field("sld_dolar", "", status);
}

function displayChange_row(row, status) {
        displayChange_field_id_empresa(row, status);
        displayChange_field_data(row, status);
        displayChange_field_referencia(row, status);
        displayChange_field_id_ordem(row, status);
        displayChange_field_id_subconta(row, status);
        displayChange_field_moeda(row, status);
        displayChange_field_debito(row, status);
        displayChange_field_credito(row, status);
        displayChange_field_sld_real(row, status);
        displayChange_field_sld_dolar(row, status);
}

function displayChange_field(field, row, status) {
        if ("id_empresa" == field) {
                displayChange_field_id_empresa(row, status);
        }
        if ("data" == field) {
                displayChange_field_data(row, status);
        }
        if ("referencia" == field) {
                displayChange_field_referencia(row, status);
        }
        if ("id_ordem" == field) {
                displayChange_field_id_ordem(row, status);
        }
        if ("id_subconta" == field) {
                displayChange_field_id_subconta(row, status);
        }
        if ("moeda" == field) {
                displayChange_field_moeda(row, status);
        }
        if ("debito" == field) {
                displayChange_field_debito(row, status);
        }
        if ("credito" == field) {
                displayChange_field_credito(row, status);
        }
        if ("sld_real" == field) {
                displayChange_field_sld_real(row, status);
        }
        if ("sld_dolar" == field) {
                displayChange_field_sld_dolar(row, status);
        }
}

function displayChange_field_id_empresa(row, status) {
    var fieldId;
}

function displayChange_field_data(row, status) {
    var fieldId;
}

function displayChange_field_referencia(row, status) {
    var fieldId;
}

function displayChange_field_id_ordem(row, status) {
    var fieldId;
}

function displayChange_field_id_subconta(row, status) {
    var fieldId;
}

function displayChange_field_moeda(row, status) {
    var fieldId;
}

function displayChange_field_debito(row, status) {
    var fieldId;
}

function displayChange_field_credito(row, status) {
    var fieldId;
}

function displayChange_field_sld_real(row, status) {
    var fieldId;
}

function displayChange_field_sld_dolar(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
        $(".sc-form-page").show();
}

function scHidePage(pageNo) {
        $("#id_form_contas_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
        if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
                var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
                if (inactiveTabs.length) {
                        var tabNo = $(inactiveTabs[0]).attr("id").substr(22);
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_contas')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

