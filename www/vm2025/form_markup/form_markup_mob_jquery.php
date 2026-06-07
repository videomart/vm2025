
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
  scEventControl_data["titulo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["aliquota" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["markup" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["markupitems" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["titulo" + iSeqRow] && scEventControl_data["titulo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["titulo" + iSeqRow] && scEventControl_data["titulo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["aliquota" + iSeqRow] && scEventControl_data["aliquota" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["aliquota" + iSeqRow] && scEventControl_data["aliquota" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["markup" + iSeqRow] && scEventControl_data["markup" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["markup" + iSeqRow] && scEventControl_data["markup" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["markupitems" + iSeqRow] && scEventControl_data["markupitems" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["markupitems" + iSeqRow] && scEventControl_data["markupitems" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  if ("aliquota" + iSeq == fieldName) {
    _scCalculatorBlurOk[fieldId] = false;
  }
  scEventControl_data[fieldName]["blur"] = true;
  if ("aliquota" + iSeq == fieldName) {
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

function scEventControl_onCalculator_aliquota() {
  if (!_scCalculatorControl["id_sc_field_aliquota"]) {
    _scCalculatorBlurOk["id_sc_field_aliquota"] = true;
    do_ajax_form_markup_mob_event_aliquota_onblur();
  }
} // scEventControl_onCalculator_aliquota

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_titulo' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_markup_titulo_onblur('#id_sc_field_titulo' + iSeqRow, iSeqRow);}, 300) })
                                    .bind('focus', function() { sc_form_markup_titulo_onfocus(this, iSeqRow) });
  $('#id_sc_field_aliquota' + iSeqRow).bind('blur', function() { sc_form_markup_aliquota_onblur('#id_sc_field_aliquota' + iSeqRow, iSeqRow) })
                                      .bind('change', function() { sc_form_markup_aliquota_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_markup_aliquota_onfocus(this, iSeqRow) });
  $('#id_sc_field_markup' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_markup_markup_onblur('#id_sc_field_markup' + iSeqRow, iSeqRow);}, 300) })
                                    .bind('focus', function() { sc_form_markup_markup_onfocus(this, iSeqRow) });
  $('#id_sc_field_markupitems' + iSeqRow).bind('blur', function() { sc_form_markup_markupitems_onblur('#id_sc_field_markupitems' + iSeqRow, iSeqRow) })
                                         .bind('focus', function() { sc_form_markup_markupitems_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_markup_titulo_onblur(oThis, iSeqRow) {
  do_ajax_form_markup_mob_validate_titulo();
  scCssBlur(oThis);
}

function sc_form_markup_titulo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_markup_aliquota_onblur(oThis, iSeqRow) {
  do_ajax_form_markup_mob_validate_aliquota();
  scCssBlur(oThis);
}

function sc_form_markup_aliquota_onchange(oThis, iSeqRow) {
  do_ajax_form_markup_mob_event_aliquota_onchange();
}

function sc_form_markup_aliquota_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_markup_markup_onblur(oThis, iSeqRow) {
  do_ajax_form_markup_mob_validate_markup();
  scCssBlur(oThis);
}

function sc_form_markup_markup_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_markup_markupitems_onblur(oThis, iSeqRow) {
  do_ajax_form_markup_mob_validate_markupitems();
  scCssBlur(oThis);
}

function sc_form_markup_markupitems_onfocus(oThis, iSeqRow) {
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
        displayChange_field("titulo", "", status);
        displayChange_field("aliquota", "", status);
        displayChange_field("markup", "", status);
}

function displayChange_block_1(status) {
        displayChange_field("markupitems", "", status);
}

function displayChange_row(row, status) {
        displayChange_field_titulo(row, status);
        displayChange_field_aliquota(row, status);
        displayChange_field_markup(row, status);
        displayChange_field_markupitems(row, status);
}

function displayChange_field(field, row, status) {
        if ("titulo" == field) {
                displayChange_field_titulo(row, status);
        }
        if ("aliquota" == field) {
                displayChange_field_aliquota(row, status);
        }
        if ("markup" == field) {
                displayChange_field_markup(row, status);
        }
        if ("markupitems" == field) {
                displayChange_field_markupitems(row, status);
        }
}

function displayChange_field_titulo(row, status) {
    var fieldId;
}

function displayChange_field_aliquota(row, status) {
    var fieldId;
}

function displayChange_field_markup(row, status) {
    var fieldId;
}

function displayChange_field_markupitems(row, status) {
    var fieldId;
        if ("on" == status && typeof $("#nmsc_iframe_liga_form_markup_items_mob")[0].contentWindow.scRecreateSelect2 === "function") {
                $("#nmsc_iframe_liga_form_markup_items_mob")[0].contentWindow.scRecreateSelect2();
        }
        $("#nmsc_iframe_liga_form_markup_items_mob")[0].contentWindow.specificStyle();
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
        $(".sc-form-page").show();
}

function scHidePage(pageNo) {
        $("#id_form_markup_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
        if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
                var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
                if (inactiveTabs.length) {
                        var tabNo = $(inactiveTabs[0]).attr("id").substr(23);
                }
        }
}
var jqCalcMonetPos = {};
var _scCalculatorBlurOk = {};

function scJQCalculatorAdd(iSeqRow) {
  _scCalculatorBlurOk["id_sc_field_markupitems" + iSeqRow] = true;
  $("#id_sc_field_aliquota" + iSeqRow).calculator({
    onOpen: function(value, inst) {
      if (typeof _scCalculatorControl !== "undefined") {
        if (!_scCalculatorControl["id_sc_field_aliquota" + iSeqRow]) {
          _scCalculatorControl["id_sc_field_aliquota" + iSeqRow] = true;
        }
      }
      value = scJQCalculatorUnformat(value, "#id_sc_field_aliquota" + iSeqRow, '<?php echo str_replace("'", "\'", $this->field_config['aliquota']['symbol_grp']); ?>', <?php echo $this->field_config['aliquota']['symbol_fmt']; ?>, '<?php echo str_replace("'", "\'", $this->field_config['aliquota']['symbol_dec']); ?>', '');
      $(this).val(value);
      $(".calculator-popup").css("min-width", "200px");
    },
    onClose: function(value, inst) {
      var oldValue = $(this.val);
      if (typeof _scCalculatorControl !== "undefined") {
        if (_scCalculatorControl["id_sc_field_aliquota" + iSeqRow]) {
          _scCalculatorControl["id_sc_field_aliquota" + iSeqRow] = null;
        }
      }
      value = scJQCalculatorFormat(value, "#id_sc_field_aliquota" + iSeqRow, '<?php echo str_replace("'", "\'", $this->field_config['aliquota']['symbol_grp']); ?>', <?php echo $this->field_config['aliquota']['symbol_fmt']; ?>, '<?php echo str_replace("'", "\'", $this->field_config['aliquota']['symbol_dec']); ?>', 2, '');
      $(this).val(value);
      if (oldValue != value) {
        $(this).trigger('change');
      }
    },
    precision: 2,
    showOn: "button",
<?php
$miniCalculatorIcon = $this->jqueryIconFile('calculator');
$miniCalculatorFA   = $this->jqueryFAFile('calculator');
if ('' != $miniCalculatorIcon) {
?>
    buttonImage: "<?php echo $miniCalculatorIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalculatorFA) {
?>
    buttonText: "",
<?php
}
?>
  })
<?php
if ('' != $miniCalculatorFA) {
?>
    .next('button').append("<?php echo $miniCalculatorFA; ?>")
<?php
}
?>
;

} // scJQCalculatorAdd

function scJQCalculatorUnformat(fValue, sField, sThousands, sFormat, sDecimals, sMonetary) {
  fValue = scJQCalculatorCurrency(fValue, sField, sMonetary);
  if ("" != sThousands) {
    if ("." == sThousands) {
      sThousands = "\\.";
    }
    sRegEx = eval("/" + sThousands + "/g");
    fValue = fValue.replace(sRegEx, "");
  }
  if ("." != sDecimals) {
    sRegEx = eval("/" + sDecimals + "/g");
    fValue = fValue.replace(sRegEx, ".");
  }
  if ("." == fValue.substr(0, 1) || "," == fValue.substr(0, 1)) {
    fValue = "0" + fValue;
  }
  return fValue;
} // scJQCalculatorUnformat

function scJQCalculatorFormat(fValue, sField, sThousands, sFormat, sDecimals, iPrecision, sMonetary) {
  fValue = scJQCalculatorCurrency(fValue.toString(), sField, sMonetary);
  if (-1 < fValue.indexOf('.')) {
    var parts = fValue.split('.'),
        pref = parts[0],
        suf = parts[1];
  }
  else {
    var pref = fValue,
        suf = '';
  }
  if ('' != sThousands) {
    if (3 == sFormat) {
      if (4 <= pref.length) {
        pref_rest = pref.substr(0, pref.length - 3);
        pref = sThousands + pref.substr(pref.length - 3);
        while (2 < pref_rest.length) {
          pref = sThousands + pref_rest.substr(pref_rest.length - 2) + pref;
          pref_rest = pref_rest.substr(0, pref_rest.length - 2);
        }
        if ('' != pref_rest) {
          pref = pref_rest + pref;
        }
      }
    }
    else if (2 == sFormat) {
      if (4 <= pref.length) {
        pref = pref.substr(0, pref.length - 3) + sThousands + pref.substr(pref.length - 3);
      }
    }
    else {
      pref_rest = pref;
      pref = '';
      while (3 < pref_rest.length) {
        pref = sThousands + pref_rest.substr(pref_rest.length - 3) + pref;
        pref_rest = pref_rest.substr(0, pref_rest.length - 3);
      }
      if ('' != pref_rest) {
        pref = pref_rest + pref;
      }
    }
  }
  if ('' != iPrecision) {
    if (suf.length > iPrecision) {
      suf = '1' + suf.substr(0, iPrecision) + '.' + suf.substr(iPrecision);
      suf = Math.round(parseFloat(suf)).toString().substr(1);
    }
    else {
      while (suf.length < iPrecision) {
        suf += '0';
      }
    }
  }
  if ('' != sDecimals && '' != suf) {
    fValue = pref + sDecimals + suf;
  }
  else {
    fValue = pref;
  }
  if ('' != sMonetary) {
    fValue = 'left' == jqCalcMonetPos[sField] ? sMonetary + ' ' + fValue : fValue + ' ' + sMonetary;
  }
  return fValue;
} // scJQCalculatorFormat

function scJQCalculatorCurrency(fValue, sField, sMonetary) {
  if ("" != sMonetary) {
    if (sMonetary + ' ' == fValue.substr(0, sMonetary.length + 1)) {
        fValue = fValue.substr(sMonetary.length + 1);
        jqCalcMonetPos[sField] = 'left';
    }
    else if (sMonetary == fValue.substr(0, sMonetary.length)) {
        fValue = fValue.substr(sMonetary.length + 1);
        jqCalcMonetPos[sField] = 'left';
    }
    else if (' ' + sMonetary == fValue.substr(fValue.length - sMonetary.length - 1)) {
        fValue = fValue.substr(0, fValue.length - sMonetary.length - 1);
        jqCalcMonetPos[sField] = 'right';
    }
    else if (sMonetary == fValue.substr(fValue.length - sMonetary.length)) {
        fValue = fValue.substr(0, fValue.length - sMonetary.length);
        jqCalcMonetPos[sField] = 'right';
    }
  }
  if ("" == fValue) {
    fValue = "0";
  }
  return fValue;
} // scJQCalculatorCurrency

function scJQPopupAdd(iSeqRow) {
  $('.scFormPopupBubble' + iSeqRow).each(function() {
    var distance = 10;
    var time = 250;
    var hideDelay = 500;
    var hideDelayTimer = null;
    var beingShown = false;
    var shown = false;
    var trigger = $('.scFormPopupTrigger', this);
    var info = $('.scFormPopup', this).css('opacity', 0);
    $([trigger.get(0), info.get(0)]).mouseover(function() {
      if (hideDelayTimer) clearTimeout(hideDelayTimer);
      if (beingShown || shown) {
        // don't trigger the animation again
        return;
      } else {
        // reset position of info box
        beingShown = true;
        var left_pos = trigger.offset().left - ((info.width() - trigger.width()) / 2);
        if (left_pos < 10) {
            left_pos = 10;
        }
        info.css({
          top: trigger.offset().top - (info.height() - trigger.height()),
          left: left_pos,
          display: 'block'
        }).animate({
          top: '-=' + distance + 'px',
          opacity: 1
        }, time, 'swing', function() {
          beingShown = false;
          shown = true;
        });
      }
      return false;
      }).mouseout(function() {
      if (hideDelayTimer) clearTimeout(hideDelayTimer);
      hideDelayTimer = setTimeout(function() {
        hideDelayTimer = null;
        info.animate({
          top: '-=' + distance + 'px',
          opacity: 0
        }, time, 'swing', function() {
          shown = false;
          info.css('display', 'none');
        });
      }, hideDelay);
      return false;
    });
  });
} // scJQPopupAdd

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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_markup_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

function scJQSlideAdd(seqRow) {
  $("#sc-ui-slide-aliquota" + seqRow).slider({
    min: 0,
    max: 99,
    range: "min",
    step: 0.1,
    slide: function(event, ui) {
      var thisValue = ui.value;
      thisValue = thisValue.toFixed(2);
      if (_scOnInputSupport && !_scMacOs) {
        $("#id_sc_field_aliquota" + seqRow).val(thisValue);
        $("#id_sc_field_aliquota" + seqRow).scInput("formatValue");
      }
      else {
        $("#id_sc_field_aliquota" + seqRow).val(scFormatValue_aliquota(thisValue));
      }
      var changedRow = $("input[name='sc_check_vert[" + seqRow + "]']");
      if (changedRow.length) {
        $(changedRow[0]).prop("checked", true);
      }
    },
    stop: function(event, ui) {
        $("#id_sc_field_aliquota" + seqRow).change();
    }
  });
  scJQSlideValue("aliquota" + seqRow, seqRow);
} // scJQSlideAdd

function scFormatValue_aliquota(thisValue) {
  var thisParts = parseFloat(thisValue).toFixed(2).split(".");
<?php
if ('.' == $this->field_config['aliquota']['symbol_grp']) {
?>
  thisParts[0]  = parseInt(thisParts[0]).toLocaleString("pt");
<?php
}
elseif (',' == $this->field_config['aliquota']['symbol_grp']) {
?>
  thisParts[0]  = parseInt(thisParts[0]).toLocaleString("en");
<?php
}
elseif ('' != $this->field_config['aliquota']['symbol_grp']) {
?>
  thisParts[0]  = parseInt(thisParts[0]).toLocaleString("pt").replace(new RegExp(scRegExpQuote("."), "g"), "<?php echo $this->field_config['aliquota']['symbol_grp']; ?>");
<?php
}
?>
  thisValue     = thisParts.join("<?php echo $this->field_config['aliquota']['symbol_dec']; ?>");
  return thisValue;
} // scFormatValue_aliquota

function scUnformatValue_aliquota(thisValue) {
<?php
if ('' != $this->field_config['aliquota']['symbol_grp']) {
?>
  thisValue = thisValue.replace(new RegExp(scRegExpQuote("<?php echo $this->field_config['aliquota']['symbol_grp']; ?>"), "g"), "");
<?php
}
?>
  thisValue = thisValue.replace(new RegExp(scRegExpQuote("<?php echo $this->field_config['aliquota']['symbol_dec']; ?>"), "g"), ".");
  return thisValue;
} // scUnformatValue_aliquota

function scJQSlideValue(fieldName, seqRow) {
  var fieldValue = $("#id_sc_field_" + fieldName).val();
  var testFieldName = fieldName;
  if ("" != seqRow) {
    testFieldName = testFieldName.substr(0, testFieldName.length - seqRow.toString().length);
  }
  if ("aliquota" == testFieldName) {
    fieldValue = scUnformatValue_aliquota(fieldValue);
  }
  if ("" == fieldValue) {
    return;
  }
  fieldValue = parseInt(fieldValue);
  if ("number" != typeof(fieldValue)) {
    return;
  }
  $("#sc-ui-slide-" + fieldName).slider("value", fieldValue);
} // scJQSlideValue

function scRegExpQuote(str) {
  return str.replace(/([.?*+^$[\]\\(){}|-])/g, "\\$1");
} // scRegExpQuote

function scJQPasswordToggleAdd(seqRow) {
  $(".sc-ui-pwd-toggle-icon" + seqRow).on("click", function() {
    var fieldName = $(this).attr("id").substr(17), fieldObj = $("#id_sc_field_" + fieldName), fieldFA = $("#id_pwd_fa_" + fieldName);
    if ("text" == fieldObj.attr("type")) {
      fieldObj.attr("type", "password");
      fieldFA.attr("class", "fa fa-eye sc-ui-pwd-eye");
    } else {
      fieldObj.attr("type", "text");
      fieldFA.attr("class", "fa fa-eye-slash sc-ui-pwd-eye");
    }
  });
} // scJQPasswordToggleAdd

function scJQSelect2Add(seqRow, specificField) {
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalculatorAdd(iLine);
  scJQPopupAdd(iLine);
  scJQUploadAdd(iLine);
  scJQSlideAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
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

