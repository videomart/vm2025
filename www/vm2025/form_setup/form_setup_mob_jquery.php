
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

  if ($oField.length > 0) {
    switch ($oField[0].name) {
      case 'empresa':
      case 'cep':
      case 'endereco':
      case 'cidade':
      case 'uf':
      case 'cnpj':
      case 'inscest':
      case 'inscmun':
      case 'telefone':
      case 'email':
      case 'email_admin':
      case 'homepage':
        sc_exib_ocult_pag('form_setup_mob_form0');
        break;
      case 'rodape':
      case 'header_proposta':
        sc_exib_ocult_pag('form_setup_mob_form1');
        break;
      case 'logo':
        sc_exib_ocult_pag('form_setup_mob_form2');
        break;
    }
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
  scEventControl_data["empresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cep" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["endereco" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cidade" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["uf" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cnpj" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["inscest" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["inscmun" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telefone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["email_admin" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["homepage" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rodape" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["header_proposta" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["logo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["empresa" + iSeqRow] && scEventControl_data["empresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["empresa" + iSeqRow] && scEventControl_data["empresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cep" + iSeqRow] && scEventControl_data["cep" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cep" + iSeqRow] && scEventControl_data["cep" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["endereco" + iSeqRow] && scEventControl_data["endereco" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["endereco" + iSeqRow] && scEventControl_data["endereco" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cidade" + iSeqRow] && scEventControl_data["cidade" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cidade" + iSeqRow] && scEventControl_data["cidade" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["uf" + iSeqRow] && scEventControl_data["uf" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["uf" + iSeqRow] && scEventControl_data["uf" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cnpj" + iSeqRow] && scEventControl_data["cnpj" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cnpj" + iSeqRow] && scEventControl_data["cnpj" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["inscest" + iSeqRow] && scEventControl_data["inscest" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["inscest" + iSeqRow] && scEventControl_data["inscest" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["inscmun" + iSeqRow] && scEventControl_data["inscmun" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["inscmun" + iSeqRow] && scEventControl_data["inscmun" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telefone" + iSeqRow] && scEventControl_data["telefone" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telefone" + iSeqRow] && scEventControl_data["telefone" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow] && scEventControl_data["email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow] && scEventControl_data["email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["email_admin" + iSeqRow] && scEventControl_data["email_admin" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["email_admin" + iSeqRow] && scEventControl_data["email_admin" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["homepage" + iSeqRow] && scEventControl_data["homepage" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["homepage" + iSeqRow] && scEventControl_data["homepage" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rodape" + iSeqRow] && scEventControl_data["rodape" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rodape" + iSeqRow] && scEventControl_data["rodape" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["header_proposta" + iSeqRow] && scEventControl_data["header_proposta" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["header_proposta" + iSeqRow] && scEventControl_data["header_proposta" + iSeqRow]["change"]) {
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
  $('#id_sc_field_empresa' + iSeqRow).bind('blur', function() { sc_form_setup_empresa_onblur('#id_sc_field_empresa' + iSeqRow, iSeqRow, event) })
                                     .bind('focus', function() { sc_form_setup_empresa_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_cep' + iSeqRow).bind('blur', function() { sc_form_setup_cep_onblur('#id_sc_field_cep' + iSeqRow, iSeqRow, event) })
                                 .bind('change', function() { sc_form_setup_cep_onchange(this, iSeqRow, event) })
                                 .bind('focus', function() { sc_form_setup_cep_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_endereco' + iSeqRow).bind('blur', function() { sc_form_setup_endereco_onblur('#id_sc_field_endereco' + iSeqRow, iSeqRow, event) })
                                      .bind('focus', function() { sc_form_setup_endereco_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_cidade' + iSeqRow).bind('blur', function() { sc_form_setup_cidade_onblur('#id_sc_field_cidade' + iSeqRow, iSeqRow, event) })
                                    .bind('focus', function() { sc_form_setup_cidade_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_uf' + iSeqRow).bind('blur', function() { sc_form_setup_uf_onblur('#id_sc_field_uf' + iSeqRow, iSeqRow, event) })
                                .bind('focus', function() { sc_form_setup_uf_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_cnpj' + iSeqRow).bind('blur', function() { sc_form_setup_cnpj_onblur('#id_sc_field_cnpj' + iSeqRow, iSeqRow, event) })
                                  .bind('focus', function() { sc_form_setup_cnpj_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_inscest' + iSeqRow).bind('blur', function() { sc_form_setup_inscest_onblur('#id_sc_field_inscest' + iSeqRow, iSeqRow, event) })
                                     .bind('focus', function() { sc_form_setup_inscest_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_inscmun' + iSeqRow).bind('blur', function() { sc_form_setup_inscmun_onblur('#id_sc_field_inscmun' + iSeqRow, iSeqRow, event) })
                                     .bind('focus', function() { sc_form_setup_inscmun_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_telefone' + iSeqRow).bind('blur', function() { sc_form_setup_telefone_onblur('#id_sc_field_telefone' + iSeqRow, iSeqRow, event) })
                                      .bind('focus', function() { sc_form_setup_telefone_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_email' + iSeqRow).bind('blur', function() { sc_form_setup_email_onblur('#id_sc_field_email' + iSeqRow, iSeqRow, event) })
                                   .bind('focus', function() { sc_form_setup_email_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_email_admin' + iSeqRow).bind('blur', function() { sc_form_setup_email_admin_onblur('#id_sc_field_email_admin' + iSeqRow, iSeqRow, event) })
                                         .bind('focus', function() { sc_form_setup_email_admin_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_homepage' + iSeqRow).bind('blur', function() { sc_form_setup_homepage_onblur('#id_sc_field_homepage' + iSeqRow, iSeqRow, event) })
                                      .bind('focus', function() { sc_form_setup_homepage_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_logo' + iSeqRow).bind('blur', function() { sc_form_setup_logo_onblur('#id_sc_field_logo' + iSeqRow, iSeqRow, event) })
                                  .bind('focus', function() { sc_form_setup_logo_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_rodape' + iSeqRow).bind('blur', function() { sc_form_setup_rodape_onblur('#id_sc_field_rodape' + iSeqRow, iSeqRow, event) })
                                    .bind('focus', function() { sc_form_setup_rodape_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_header_proposta' + iSeqRow).bind('blur', function() { sc_form_setup_header_proposta_onblur('#id_sc_field_header_proposta' + iSeqRow, iSeqRow, event) })
                                             .bind('focus', function() { sc_form_setup_header_proposta_onfocus(this, iSeqRow, event) });
} // scJQEventsAdd

Upload_Cancel = false;
function sc_form_setup_empresa_onblur(oThis, iSeqRow, event) {
  do_ajax_form_setup_mob_validate_empresa();
  scCssBlur(oThis);
}

function sc_form_setup_empresa_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_setup_cep_onblur(oThis, iSeqRow, event) {
  do_ajax_form_setup_mob_validate_cep();
  scCssBlur(oThis);
}

function sc_form_setup_cep_onchange(oThis, iSeqRow, event) {
  cep_cep(oThis.value, 'F1;CEP,cep;UF,uf;CIDADE,cidade;BAIRRO,endereco;RUA,endereco');
}

function sc_form_setup_cep_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_setup_endereco_onblur(oThis, iSeqRow, event) {
  do_ajax_form_setup_mob_validate_endereco();
  scCssBlur(oThis);
}

function sc_form_setup_endereco_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_setup_cidade_onblur(oThis, iSeqRow, event) {
  do_ajax_form_setup_mob_validate_cidade();
  scCssBlur(oThis);
}

function sc_form_setup_cidade_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_setup_uf_onblur(oThis, iSeqRow, event) {
  do_ajax_form_setup_mob_validate_uf();
  scCssBlur(oThis);
}

function sc_form_setup_uf_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_setup_cnpj_onblur(oThis, iSeqRow, event) {
  do_ajax_form_setup_mob_validate_cnpj();
  scCssBlur(oThis);
}

function sc_form_setup_cnpj_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_setup_inscest_onblur(oThis, iSeqRow, event) {
  do_ajax_form_setup_mob_validate_inscest();
  scCssBlur(oThis);
}

function sc_form_setup_inscest_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_setup_inscmun_onblur(oThis, iSeqRow, event) {
  do_ajax_form_setup_mob_validate_inscmun();
  scCssBlur(oThis);
}

function sc_form_setup_inscmun_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_setup_telefone_onblur(oThis, iSeqRow, event) {
  do_ajax_form_setup_mob_validate_telefone();
  scCssBlur(oThis);
}

function sc_form_setup_telefone_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_setup_email_onblur(oThis, iSeqRow, event) {
  do_ajax_form_setup_mob_validate_email();
  scCssBlur(oThis);
}

function sc_form_setup_email_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_setup_email_admin_onblur(oThis, iSeqRow, event) {
  do_ajax_form_setup_mob_validate_email_admin();
  scCssBlur(oThis);
}

function sc_form_setup_email_admin_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_setup_homepage_onblur(oThis, iSeqRow, event) {
  do_ajax_form_setup_mob_validate_homepage();
  scCssBlur(oThis);
}

function sc_form_setup_homepage_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_setup_logo_onblur(oThis, iSeqRow, event) {
  scCssBlur(oThis);
}

function sc_form_setup_logo_onfocus(oThis, iSeqRow, event) {
  scCssFocus(oThis);
}

function sc_form_setup_rodape_onblur(oThis, iSeqRow, event) {
  do_ajax_form_setup_mob_validate_rodape();
  scCssBlur(oThis);
}

function sc_form_setup_rodape_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_setup_header_proposta_onblur(oThis, iSeqRow, event) {
  do_ajax_form_setup_mob_validate_header_proposta();
  scCssBlur(oThis);
}

function sc_form_setup_header_proposta_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_page(page, status) {
        if ("0" == page) {
                displayChange_page_0(status);
        }
        if ("1" == page) {
                displayChange_page_1(status);
        }
        if ("2" == page) {
                displayChange_page_2(status);
        }
}

function displayChange_page_0(status) {
        displayChange_block("0", status);
}

function displayChange_page_1(status) {
        displayChange_block("1", status);
}

function displayChange_page_2(status) {
        displayChange_block("2", status);
}

function displayChange_block(block, status) {
        if ("0" == block) {
                displayChange_block_0(status);
        }
        if ("1" == block) {
                displayChange_block_1(status);
        }
        if ("2" == block) {
                displayChange_block_2(status);
        }
}

function displayChange_block_0(status) {
        displayChange_field("empresa", "", status);
        displayChange_field("cep", "", status);
        displayChange_field("endereco", "", status);
        displayChange_field("cidade", "", status);
        displayChange_field("uf", "", status);
        displayChange_field("cnpj", "", status);
        displayChange_field("inscest", "", status);
        displayChange_field("inscmun", "", status);
        displayChange_field("telefone", "", status);
        displayChange_field("email", "", status);
        displayChange_field("email_admin", "", status);
        displayChange_field("homepage", "", status);
}

function displayChange_block_1(status) {
        displayChange_field("rodape", "", status);
        displayChange_field("header_proposta", "", status);
}

function displayChange_block_2(status) {
        displayChange_field("logo", "", status);
}

function displayChange_row(row, status) {
        displayChange_field_empresa(row, status);
        displayChange_field_cep(row, status);
        displayChange_field_endereco(row, status);
        displayChange_field_cidade(row, status);
        displayChange_field_uf(row, status);
        displayChange_field_cnpj(row, status);
        displayChange_field_inscest(row, status);
        displayChange_field_inscmun(row, status);
        displayChange_field_telefone(row, status);
        displayChange_field_email(row, status);
        displayChange_field_email_admin(row, status);
        displayChange_field_homepage(row, status);
        displayChange_field_rodape(row, status);
        displayChange_field_header_proposta(row, status);
        displayChange_field_logo(row, status);
}

function displayChange_field(field, row, status) {
        if ("empresa" == field) {
                displayChange_field_empresa(row, status);
        }
        if ("cep" == field) {
                displayChange_field_cep(row, status);
        }
        if ("endereco" == field) {
                displayChange_field_endereco(row, status);
        }
        if ("cidade" == field) {
                displayChange_field_cidade(row, status);
        }
        if ("uf" == field) {
                displayChange_field_uf(row, status);
        }
        if ("cnpj" == field) {
                displayChange_field_cnpj(row, status);
        }
        if ("inscest" == field) {
                displayChange_field_inscest(row, status);
        }
        if ("inscmun" == field) {
                displayChange_field_inscmun(row, status);
        }
        if ("telefone" == field) {
                displayChange_field_telefone(row, status);
        }
        if ("email" == field) {
                displayChange_field_email(row, status);
        }
        if ("email_admin" == field) {
                displayChange_field_email_admin(row, status);
        }
        if ("homepage" == field) {
                displayChange_field_homepage(row, status);
        }
        if ("rodape" == field) {
                displayChange_field_rodape(row, status);
        }
        if ("header_proposta" == field) {
                displayChange_field_header_proposta(row, status);
        }
        if ("logo" == field) {
                displayChange_field_logo(row, status);
        }
}

function displayChange_field_empresa(row, status) {
    var fieldId;
}

function displayChange_field_cep(row, status) {
    var fieldId;
}

function displayChange_field_endereco(row, status) {
    var fieldId;
}

function displayChange_field_cidade(row, status) {
    var fieldId;
}

function displayChange_field_uf(row, status) {
    var fieldId;
}

function displayChange_field_cnpj(row, status) {
    var fieldId;
}

function displayChange_field_inscest(row, status) {
    var fieldId;
}

function displayChange_field_inscmun(row, status) {
    var fieldId;
}

function displayChange_field_telefone(row, status) {
    var fieldId;
}

function displayChange_field_email(row, status) {
    var fieldId;
}

function displayChange_field_email_admin(row, status) {
    var fieldId;
}

function displayChange_field_homepage(row, status) {
    var fieldId;
}

function displayChange_field_rodape(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_rodape__obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                fieldId = $(fieldList[i]).attr("id").substr(12);
                scAjaxExecFieldEditorHtml('mceRemoveControl', false, fieldId);
                scAjaxExecFieldEditorHtml('mceAddControl', false, fieldId);
                        }
                }
                else {
            scAjaxExecFieldEditorHtml('mceRemoveControl', false, "rodape");
            scAjaxExecFieldEditorHtml('mceAddControl', false, "rodape");
                }
        }
}

function displayChange_field_header_proposta(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_header_proposta__obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                fieldId = $(fieldList[i]).attr("id").substr(12);
                scAjaxExecFieldEditorHtml('mceRemoveControl', false, fieldId);
                scAjaxExecFieldEditorHtml('mceAddControl', false, fieldId);
                        }
                }
                else {
            scAjaxExecFieldEditorHtml('mceRemoveControl', false, "header_proposta");
            scAjaxExecFieldEditorHtml('mceAddControl', false, "header_proposta");
                }
        }
}

function displayChange_field_logo(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
        $(".sc-form-page").show();
}

function scHidePage(pageNo) {
        $("#id_form_setup_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
        if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
                var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
                if (inactiveTabs.length) {
                        var tabNo = $(inactiveTabs[0]).attr("id").substr(25);
                }
        }
}
                var scJQHtmlEditorData = (function() {
                    var data = {};
                    function scJQHtmlEditorData(a, b) {
                        if (a) {
                            if (typeof(a) === typeof({})) {
                                for (var d in a) {
                                    if (a.hasOwnProperty(d)) {
                                        data[d] = a[d];
                                    }
                                }
                            } else if ((typeof(a) === typeof('')) || (typeof(a) === typeof(1))) {
                                if (b) {
                                    data[a] = b;
                                } else {
                                    if (typeof(a) === typeof('')) {
                                        var v = data;
                                        a = a.split('.');
                                        a.forEach(function (r) {
                                            v = v[r];
                                        });
                                        return v;
                                    }
                                    return data[a];
                                }
                            }
                        }
                        return data;
                    }
                    return scJQHtmlEditorData;
                }());
 function scJQHtmlEditorAdd(iSeqRow) {
<?php
$sLangTest = '';
if(is_file('../_lib/lang/arr_langs_tinymce.php'))
{
    include('../_lib/lang/arr_langs_tinymce.php');
    if(isset($Nm_arr_lang_tinymce[ $this->Ini->str_lang ]))
    {
        $sLangTest = $Nm_arr_lang_tinymce[ $this->Ini->str_lang ];
    }
}
if(empty($sLangTest))
{
    $sLangTest = 'en_GB';
}
?>
 var baseData = {
  theme: "silver",
  browser_spellcheck : true,
  paste_data_images : true,
<?php
if ('novo' != $this->nmgp_opcao && isset($this->nmgp_cmp_readonly['rodape']) && $this->nmgp_cmp_readonly['rodape'] == 'on')
{
    unset($this->nmgp_cmp_readonly['rodape']);
?>
   readonly: true,
<?php
}
else 
{
?>
   readonly: false,
<?php
}
?>
<?php
if ('yyyymmdd' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%Y{$_SESSION['scriptcase']['reg_conf']['date_sep']}%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%d";
}
elseif ('mmddyyyy' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%d{$_SESSION['scriptcase']['reg_conf']['date_sep']}%Y";
}
elseif ('ddmmyyyy' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%d{$_SESSION['scriptcase']['reg_conf']['date_sep']}%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%Y";
}
else {
    $tinymceDateFormat = "%D";
}
?>
  insertdatetime_formats: ["%H:%M:%S", "%Y-%m-%d", "%I:%M:%S %p", "<?php echo $tinymceDateFormat ?>"],
  relative_urls : false,
  remove_script_host : false,
  convert_urls  : true,
  language : '<?php echo $sLangTest; ?>',
  plugins : 'advlist print hr  autolink link image lists charmap preview anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking table directionality emoticons template',
  contextmenu: 'link linkchecker image imagetools table spellchecker configurepermanentpen',
  toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
  statusbar : false,
  menubar : 'file edit insert view format table tools',
  toolbar_items_size: 'small',
  content_style: ".mce-container-body {text-align: center !important}",
  selector: "#rodape" + iSeqRow,
  toolbar_mode: 'sliding',
  block_unsupported_drop: false,
  paste_data_images : true,
  relative_urls : false,
  remove_script_host : false,
  convert_urls  : true,
  setup: function(ed) {
    ed.on("Change", function (e) {
        scFormHasChanged = true;
    }),
    ed.on("init", function (e) {
      if ($('textarea[name="rodape' + iSeqRow + '"]').prop('disabled') == true) {
        ed.setMode("readonly");
      }
    });
  }
 };
 var data = 'function' === typeof Object.assign ? Object.assign({}, scJQHtmlEditorData(baseData)) : baseData;
 tinyMCE.init(data);
 var baseData = {
  theme: "silver",
  browser_spellcheck : true,
  paste_data_images : true,
<?php
if ('novo' != $this->nmgp_opcao && isset($this->nmgp_cmp_readonly['header_proposta']) && $this->nmgp_cmp_readonly['header_proposta'] == 'on')
{
    unset($this->nmgp_cmp_readonly['header_proposta']);
?>
   readonly: true,
<?php
}
else 
{
?>
   readonly: false,
<?php
}
?>
<?php
if ('yyyymmdd' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%Y{$_SESSION['scriptcase']['reg_conf']['date_sep']}%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%d";
}
elseif ('mmddyyyy' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%d{$_SESSION['scriptcase']['reg_conf']['date_sep']}%Y";
}
elseif ('ddmmyyyy' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%d{$_SESSION['scriptcase']['reg_conf']['date_sep']}%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%Y";
}
else {
    $tinymceDateFormat = "%D";
}
?>
  insertdatetime_formats: ["%H:%M:%S", "%Y-%m-%d", "%I:%M:%S %p", "<?php echo $tinymceDateFormat ?>"],
  relative_urls : false,
  remove_script_host : false,
  convert_urls  : true,
  language : '<?php echo $sLangTest; ?>',
  plugins : 'advlist print hr  autolink link image lists charmap preview anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking table directionality emoticons template',
  contextmenu: 'link linkchecker image imagetools table spellchecker configurepermanentpen',
  toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
  statusbar : false,
  menubar : 'file edit insert view format table tools',
  toolbar_items_size: 'small',
  content_style: ".mce-container-body {text-align: center !important}",
  selector: "#header_proposta" + iSeqRow,
  toolbar_mode: 'sliding',
  block_unsupported_drop: false,
  paste_data_images : true,
  relative_urls : false,
  remove_script_host : false,
  convert_urls  : true,
  setup: function(ed) {
    ed.on("Change", function (e) {
        scFormHasChanged = true;
    }),
    ed.on("init", function (e) {
      if ($('textarea[name="header_proposta' + iSeqRow + '"]').prop('disabled') == true) {
        ed.setMode("readonly");
      }
    });
  }
 };
 var data = 'function' === typeof Object.assign ? Object.assign({}, scJQHtmlEditorData(baseData)) : baseData;
 tinyMCE.init(data);
} // scJQHtmlEditorAdd

function scJQUploadAdd(iSeqRow) {
  $("#id_sc_field_logo" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_setup_mob_ul_save.php",
    dropZone: "",
    formData: function() {
      return [
        {name: 'param_field', value: 'logo'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_logo" + iSeqRow);
        loaderContent = $("#id_img_loader_logo" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_logo" + iSeqRow);
        loader.show();
      }
    },
    done: function(e, data) {
      var fileData, respData, respPos, respMsg, thumbDisplay, checkDisplay, var_ajax_img_thumb, oTemp;
      fileData = null;
      respMsg = "";
      if (data && data.result && data.result[0] && data.result[0].body) {
        respData = data.result[0].body.innerText;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = $.parseJSON(respData);
        }
        else {
          respMsg = respData;
        }
      }
      else {
        respData = data.result;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = eval(respData);
        }
        else {
          respMsg = respData;
        }
      }
      if (window.FormData !== undefined)
      {
        $("#id_img_loader_logo" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_logo" + iSeqRow).hide();
      }
      if (Upload_Cancel) {
          Upload_Cancel = false;
          return;
      }
      if (null == fileData) {
        if ("" != respMsg) {
          oTemp = {"htmOutput" : "<?php echo $this->Ini->Nm_lang['lang_errm_upld_admn']; ?>"};
          scAjaxShowDebug(oTemp);
        }
        return;
      }
      if (fileData[0].error && "" != fileData[0].error) {
        var uploadErrorMessage = "";
        oResp = {};
        if ("acceptFileTypes" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_invl']) ?>";
        }
        else if ("maxFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("minFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("emptyFile" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_empty']) ?>";
        }
        scAjaxShowErrorDisplay("table", uploadErrorMessage);
        return;
      }
      if (fileData[0].name.indexOf('*') != -1) {
          scJs_alert (fileData[0].name + ' <?php echo $this->Ini->Nm_lang['lang_errm_ivch'] ?>', function() {}, {type: "error"});
          return;
      }
      $("#id_sc_field_logo" + iSeqRow).val("");
      $("#id_sc_field_logo_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_logo_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_logo = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_logo) ? "none" : "";
      $("#id_ajax_img_logo" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_logo" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_logo) {
        document.F1.temp_out_logo.value = var_ajax_img_thumb;
        document.F1.temp_out1_logo.value = var_ajax_img_logo;
      }
      else if (document.F1.temp_out_logo) {
        document.F1.temp_out_logo.value = var_ajax_img_logo;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_logo" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_logo" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_logo" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_logo" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
      scMarkFormAsChanged();
    }
  });

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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_setup_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  scJQHtmlEditorAdd(iLine);
  scJQUploadAdd(iLine);
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

