
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
      case 'razao_social':
      case 'categoria':
      case 'tipo':
      case 'rede':
      case 'endereco':
      case 'id_cidade':
      case 'cep':
      case 'local':
      case 'cgc':
      case 'cpf':
      case 'homepage':
      case 'inscmun':
      case 'inscest':
      case 'dealer':
      case 'cadastrante':
      case 'dat_ult_mov':
      case 'data':
      case 'saldo_real':
      case 'saldo_dolar':
      case 'id_nextel':
      case 'contato':
      case 'ddd':
      case 'telefone':
      case 'email':
      case 'celular':
      case 'operadora':
      case 'fax':
      case 'contatorelacao':
      case 'telefones':
      case 'contatos':
      case 'obs':
        sc_exib_ocult_pag('form_empresa_SemChave_form0');
        break;
      case 'extrato':
        sc_exib_ocult_pag('form_empresa_SemChave_form1');
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
  scEventControl_data["tipo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_cidade" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["razao_social" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rede" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cep" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["categoria" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["endereco" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["local" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cgc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["inscmun" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cadastrante" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["saldo_real" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cpf" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["inscest" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dat_ult_mov" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["saldo_dolar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["homepage" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dealer" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["data" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_nextel" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["contato" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ddd" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telefone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["celular" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["operadora" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fax" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["contatorelacao" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telefones" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["contatos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["obs" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["extrato" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["empresa" + iSeqRow] && scEventControl_data["empresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["empresa" + iSeqRow] && scEventControl_data["empresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo" + iSeqRow] && scEventControl_data["tipo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo" + iSeqRow] && scEventControl_data["tipo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_cidade" + iSeqRow] && scEventControl_data["id_cidade" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_cidade" + iSeqRow] && scEventControl_data["id_cidade" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["razao_social" + iSeqRow] && scEventControl_data["razao_social" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["razao_social" + iSeqRow] && scEventControl_data["razao_social" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rede" + iSeqRow] && scEventControl_data["rede" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rede" + iSeqRow] && scEventControl_data["rede" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cep" + iSeqRow] && scEventControl_data["cep" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cep" + iSeqRow] && scEventControl_data["cep" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["categoria" + iSeqRow] && scEventControl_data["categoria" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["categoria" + iSeqRow] && scEventControl_data["categoria" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["endereco" + iSeqRow] && scEventControl_data["endereco" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["endereco" + iSeqRow] && scEventControl_data["endereco" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["local" + iSeqRow] && scEventControl_data["local" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["local" + iSeqRow] && scEventControl_data["local" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cgc" + iSeqRow] && scEventControl_data["cgc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cgc" + iSeqRow] && scEventControl_data["cgc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["inscmun" + iSeqRow] && scEventControl_data["inscmun" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["inscmun" + iSeqRow] && scEventControl_data["inscmun" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cadastrante" + iSeqRow] && scEventControl_data["cadastrante" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cadastrante" + iSeqRow] && scEventControl_data["cadastrante" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["saldo_real" + iSeqRow] && scEventControl_data["saldo_real" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["saldo_real" + iSeqRow] && scEventControl_data["saldo_real" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cpf" + iSeqRow] && scEventControl_data["cpf" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cpf" + iSeqRow] && scEventControl_data["cpf" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["inscest" + iSeqRow] && scEventControl_data["inscest" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["inscest" + iSeqRow] && scEventControl_data["inscest" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dat_ult_mov" + iSeqRow] && scEventControl_data["dat_ult_mov" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dat_ult_mov" + iSeqRow] && scEventControl_data["dat_ult_mov" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["saldo_dolar" + iSeqRow] && scEventControl_data["saldo_dolar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["saldo_dolar" + iSeqRow] && scEventControl_data["saldo_dolar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["homepage" + iSeqRow] && scEventControl_data["homepage" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["homepage" + iSeqRow] && scEventControl_data["homepage" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dealer" + iSeqRow] && scEventControl_data["dealer" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dealer" + iSeqRow] && scEventControl_data["dealer" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["data" + iSeqRow] && scEventControl_data["data" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["data" + iSeqRow] && scEventControl_data["data" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_nextel" + iSeqRow] && scEventControl_data["id_nextel" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_nextel" + iSeqRow] && scEventControl_data["id_nextel" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["contato" + iSeqRow] && scEventControl_data["contato" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["contato" + iSeqRow] && scEventControl_data["contato" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ddd" + iSeqRow] && scEventControl_data["ddd" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ddd" + iSeqRow] && scEventControl_data["ddd" + iSeqRow]["change"]) {
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
  if (scEventControl_data["celular" + iSeqRow] && scEventControl_data["celular" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["celular" + iSeqRow] && scEventControl_data["celular" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["operadora" + iSeqRow] && scEventControl_data["operadora" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["operadora" + iSeqRow] && scEventControl_data["operadora" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fax" + iSeqRow] && scEventControl_data["fax" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fax" + iSeqRow] && scEventControl_data["fax" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["contatorelacao" + iSeqRow] && scEventControl_data["contatorelacao" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["contatorelacao" + iSeqRow] && scEventControl_data["contatorelacao" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telefones" + iSeqRow] && scEventControl_data["telefones" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telefones" + iSeqRow] && scEventControl_data["telefones" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["contatos" + iSeqRow] && scEventControl_data["contatos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["contatos" + iSeqRow] && scEventControl_data["contatos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["obs" + iSeqRow] && scEventControl_data["obs" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["obs" + iSeqRow] && scEventControl_data["obs" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["extrato" + iSeqRow] && scEventControl_data["extrato" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["extrato" + iSeqRow] && scEventControl_data["extrato" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_cidade" + iSeqRow] && scEventControl_data["id_cidade" + iSeqRow]["autocomp"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("tipo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("rede" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("categoria" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("local" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("dealer" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("operadora" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("categoria" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("empresa" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("id_cidade" + iSeq == fieldName) {
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
  $('#id_sc_field_id' + iSeqRow).bind('change', function() { sc_form_empresa_SemChave_id_onchange(this, iSeqRow, event) });
  $('#id_sc_field_tipo' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_empresa_SemChave_tipo_onblur('#id_sc_field_tipo' + iSeqRow, iSeqRow, event);}, 300) })
                                  .bind('change', function() { sc_form_empresa_SemChave_tipo_onchange(this, iSeqRow, event) })
                                  .bind('click', function() { sc_form_empresa_SemChave_tipo_onclick(this, iSeqRow, event) })
                                  .bind('focus', function() { sc_form_empresa_SemChave_tipo_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_categoria' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_empresa_SemChave_categoria_onblur('#id_sc_field_categoria' + iSeqRow, iSeqRow, event);}, 300) })
                                       .bind('change', function() { sc_form_empresa_SemChave_categoria_onchange(this, iSeqRow, event) })
                                       .bind('focus', function() { sc_form_empresa_SemChave_categoria_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_rede' + iSeqRow).bind('blur', function() { sc_form_empresa_SemChave_rede_onblur('#id_sc_field_rede' + iSeqRow, iSeqRow, event) })
                                  .bind('change', function() { sc_form_empresa_SemChave_rede_onchange(this, iSeqRow, event) })
                                  .bind('focus', function() { sc_form_empresa_SemChave_rede_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_razao_social' + iSeqRow).bind('blur', function() { sc_form_empresa_SemChave_razao_social_onblur('#id_sc_field_razao_social' + iSeqRow, iSeqRow, event) })
                                          .bind('change', function() { sc_form_empresa_SemChave_razao_social_onchange(this, iSeqRow, event) })
                                          .bind('focus', function() { sc_form_empresa_SemChave_razao_social_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_empresa' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_empresa_SemChave_empresa_onblur('#id_sc_field_empresa' + iSeqRow, iSeqRow, event);}, 300) })
                                     .bind('change', function() { sc_form_empresa_SemChave_empresa_onchange(this, iSeqRow, event) })
                                     .bind('focus', function() { sc_form_empresa_SemChave_empresa_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_endereco' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_empresa_SemChave_endereco_onblur('#id_sc_field_endereco' + iSeqRow, iSeqRow, event);}, 300) })
                                      .bind('change', function() { sc_form_empresa_SemChave_endereco_onchange(this, iSeqRow, event) })
                                      .bind('focus', function() { sc_form_empresa_SemChave_endereco_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_id_cidade' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_empresa_SemChave_id_cidade_onblur('#id_sc_field_id_cidade' + iSeqRow, iSeqRow, event);}, 300) })
                                       .bind('change', function() { sc_form_empresa_SemChave_id_cidade_onchange(this, iSeqRow, event) })
                                       .bind('focus', function() { sc_form_empresa_SemChave_id_cidade_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_cep' + iSeqRow).bind('blur', function() { sc_form_empresa_SemChave_cep_onblur('#id_sc_field_cep' + iSeqRow, iSeqRow, event) })
                                 .bind('change', function() { sc_form_empresa_SemChave_cep_onchange(this, iSeqRow, event) })
                                 .bind('focus', function() { sc_form_empresa_SemChave_cep_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_telefone' + iSeqRow).bind('blur', function() { sc_form_empresa_SemChave_telefone_onblur('#id_sc_field_telefone' + iSeqRow, iSeqRow, event) })
                                      .bind('change', function() { sc_form_empresa_SemChave_telefone_onchange(this, iSeqRow, event) })
                                      .bind('focus', function() { sc_form_empresa_SemChave_telefone_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_celular' + iSeqRow).bind('blur', function() { sc_form_empresa_SemChave_celular_onblur('#id_sc_field_celular' + iSeqRow, iSeqRow, event) })
                                     .bind('change', function() { sc_form_empresa_SemChave_celular_onchange(this, iSeqRow, event) })
                                     .bind('focus', function() { sc_form_empresa_SemChave_celular_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_operadora' + iSeqRow).bind('blur', function() { sc_form_empresa_SemChave_operadora_onblur('#id_sc_field_operadora' + iSeqRow, iSeqRow, event) })
                                       .bind('change', function() { sc_form_empresa_SemChave_operadora_onchange(this, iSeqRow, event) })
                                       .bind('focus', function() { sc_form_empresa_SemChave_operadora_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_fax' + iSeqRow).bind('blur', function() { sc_form_empresa_SemChave_fax_onblur('#id_sc_field_fax' + iSeqRow, iSeqRow, event) })
                                 .bind('change', function() { sc_form_empresa_SemChave_fax_onchange(this, iSeqRow, event) })
                                 .bind('focus', function() { sc_form_empresa_SemChave_fax_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_contato' + iSeqRow).bind('blur', function() { sc_form_empresa_SemChave_contato_onblur('#id_sc_field_contato' + iSeqRow, iSeqRow, event) })
                                     .bind('change', function() { sc_form_empresa_SemChave_contato_onchange(this, iSeqRow, event) })
                                     .bind('focus', function() { sc_form_empresa_SemChave_contato_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_cgc' + iSeqRow).bind('blur', function() { sc_form_empresa_SemChave_cgc_onblur('#id_sc_field_cgc' + iSeqRow, iSeqRow, event) })
                                 .bind('change', function() { sc_form_empresa_SemChave_cgc_onchange(this, iSeqRow, event) })
                                 .bind('focus', function() { sc_form_empresa_SemChave_cgc_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_local' + iSeqRow).bind('blur', function() { sc_form_empresa_SemChave_local_onblur('#id_sc_field_local' + iSeqRow, iSeqRow, event) })
                                   .bind('change', function() { sc_form_empresa_SemChave_local_onchange(this, iSeqRow, event) })
                                   .bind('focus', function() { sc_form_empresa_SemChave_local_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_cpf' + iSeqRow).bind('blur', function() { sc_form_empresa_SemChave_cpf_onblur('#id_sc_field_cpf' + iSeqRow, iSeqRow, event) })
                                 .bind('change', function() { sc_form_empresa_SemChave_cpf_onchange(this, iSeqRow, event) })
                                 .bind('focus', function() { sc_form_empresa_SemChave_cpf_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_inscest' + iSeqRow).bind('blur', function() { sc_form_empresa_SemChave_inscest_onblur('#id_sc_field_inscest' + iSeqRow, iSeqRow, event) })
                                     .bind('change', function() { sc_form_empresa_SemChave_inscest_onchange(this, iSeqRow, event) })
                                     .bind('focus', function() { sc_form_empresa_SemChave_inscest_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_inscmun' + iSeqRow).bind('blur', function() { sc_form_empresa_SemChave_inscmun_onblur('#id_sc_field_inscmun' + iSeqRow, iSeqRow, event) })
                                     .bind('change', function() { sc_form_empresa_SemChave_inscmun_onchange(this, iSeqRow, event) })
                                     .bind('focus', function() { sc_form_empresa_SemChave_inscmun_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_email' + iSeqRow).bind('blur', function() { sc_form_empresa_SemChave_email_onblur('#id_sc_field_email' + iSeqRow, iSeqRow, event) })
                                   .bind('change', function() { sc_form_empresa_SemChave_email_onchange(this, iSeqRow, event) })
                                   .bind('focus', function() { sc_form_empresa_SemChave_email_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_homepage' + iSeqRow).bind('blur', function() { sc_form_empresa_SemChave_homepage_onblur('#id_sc_field_homepage' + iSeqRow, iSeqRow, event) })
                                      .bind('change', function() { sc_form_empresa_SemChave_homepage_onchange(this, iSeqRow, event) })
                                      .bind('focus', function() { sc_form_empresa_SemChave_homepage_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_obs' + iSeqRow).bind('blur', function() { sc_form_empresa_SemChave_obs_onblur('#id_sc_field_obs' + iSeqRow, iSeqRow, event) })
                                 .bind('change', function() { sc_form_empresa_SemChave_obs_onchange(this, iSeqRow, event) })
                                 .bind('focus', function() { sc_form_empresa_SemChave_obs_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_saldo' + iSeqRow).bind('change', function() { sc_form_empresa_SemChave_saldo_onchange(this, iSeqRow, event) });
  $('#id_sc_field_saldo_real' + iSeqRow).bind('blur', function() { sc_form_empresa_SemChave_saldo_real_onblur('#id_sc_field_saldo_real' + iSeqRow, iSeqRow, event) })
                                        .bind('change', function() { sc_form_empresa_SemChave_saldo_real_onchange(this, iSeqRow, event) })
                                        .bind('focus', function() { sc_form_empresa_SemChave_saldo_real_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_saldo_dolar' + iSeqRow).bind('blur', function() { sc_form_empresa_SemChave_saldo_dolar_onblur('#id_sc_field_saldo_dolar' + iSeqRow, iSeqRow, event) })
                                         .bind('change', function() { sc_form_empresa_SemChave_saldo_dolar_onchange(this, iSeqRow, event) })
                                         .bind('focus', function() { sc_form_empresa_SemChave_saldo_dolar_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_dat_ult_mov' + iSeqRow).bind('blur', function() { sc_form_empresa_SemChave_dat_ult_mov_onblur('#id_sc_field_dat_ult_mov' + iSeqRow, iSeqRow, event) })
                                         .bind('change', function() { sc_form_empresa_SemChave_dat_ult_mov_onchange(this, iSeqRow, event) })
                                         .bind('focus', function() { sc_form_empresa_SemChave_dat_ult_mov_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_data' + iSeqRow).bind('blur', function() { sc_form_empresa_SemChave_data_onblur('#id_sc_field_data' + iSeqRow, iSeqRow, event) })
                                  .bind('change', function() { sc_form_empresa_SemChave_data_onchange(this, iSeqRow, event) })
                                  .bind('focus', function() { sc_form_empresa_SemChave_data_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_telefones' + iSeqRow).bind('blur', function() { sc_form_empresa_SemChave_telefones_onblur('#id_sc_field_telefones' + iSeqRow, iSeqRow, event) })
                                       .bind('change', function() { sc_form_empresa_SemChave_telefones_onchange(this, iSeqRow, event) })
                                       .bind('focus', function() { sc_form_empresa_SemChave_telefones_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_contatos' + iSeqRow).bind('blur', function() { sc_form_empresa_SemChave_contatos_onblur('#id_sc_field_contatos' + iSeqRow, iSeqRow, event) })
                                      .bind('change', function() { sc_form_empresa_SemChave_contatos_onchange(this, iSeqRow, event) })
                                      .bind('focus', function() { sc_form_empresa_SemChave_contatos_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_cadastrante' + iSeqRow).bind('blur', function() { sc_form_empresa_SemChave_cadastrante_onblur('#id_sc_field_cadastrante' + iSeqRow, iSeqRow, event) })
                                         .bind('change', function() { sc_form_empresa_SemChave_cadastrante_onchange(this, iSeqRow, event) })
                                         .bind('focus', function() { sc_form_empresa_SemChave_cadastrante_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_id_nextel' + iSeqRow).bind('blur', function() { sc_form_empresa_SemChave_id_nextel_onblur('#id_sc_field_id_nextel' + iSeqRow, iSeqRow, event) })
                                       .bind('change', function() { sc_form_empresa_SemChave_id_nextel_onchange(this, iSeqRow, event) })
                                       .bind('focus', function() { sc_form_empresa_SemChave_id_nextel_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_dealer' + iSeqRow).bind('blur', function() { sc_form_empresa_SemChave_dealer_onblur('#id_sc_field_dealer' + iSeqRow, iSeqRow, event) })
                                    .bind('change', function() { sc_form_empresa_SemChave_dealer_onchange(this, iSeqRow, event) })
                                    .bind('focus', function() { sc_form_empresa_SemChave_dealer_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_ddd' + iSeqRow).bind('blur', function() { sc_form_empresa_SemChave_ddd_onblur('#id_sc_field_ddd' + iSeqRow, iSeqRow, event) })
                                 .bind('change', function() { sc_form_empresa_SemChave_ddd_onchange(this, iSeqRow, event) })
                                 .bind('focus', function() { sc_form_empresa_SemChave_ddd_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_extrato' + iSeqRow).bind('blur', function() { sc_form_empresa_SemChave_extrato_onblur('#id_sc_field_extrato' + iSeqRow, iSeqRow, event) })
                                     .bind('change', function() { sc_form_empresa_SemChave_extrato_onchange(this, iSeqRow, event) })
                                     .bind('focus', function() { sc_form_empresa_SemChave_extrato_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_contatorelacao' + iSeqRow).bind('blur', function() { sc_form_empresa_SemChave_contatorelacao_onblur('#id_sc_field_contatorelacao' + iSeqRow, iSeqRow, event) })
                                            .bind('change', function() { sc_form_empresa_SemChave_contatorelacao_onchange(this, iSeqRow, event) })
                                            .bind('focus', function() { sc_form_empresa_SemChave_contatorelacao_onfocus(this, iSeqRow, event) });
} // scJQEventsAdd

Upload_Cancel = false;
function sc_form_empresa_SemChave_id_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_empresa_SemChave_tipo_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_tipo();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_tipo_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_empresa_SemChave_tipo_onclick(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_event_tipo_onclick();
}

function sc_form_empresa_SemChave_tipo_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_SemChave_categoria_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_categoria();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_categoria_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
  do_ajax_form_empresa_SemChave_event_categoria_onchange();
}

function sc_form_empresa_SemChave_categoria_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_SemChave_rede_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_rede();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_rede_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_empresa_SemChave_rede_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_SemChave_razao_social_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_razao_social();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_razao_social_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_empresa_SemChave_razao_social_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_SemChave_empresa_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_empresa();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_empresa_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
  do_ajax_form_empresa_SemChave_event_empresa_onchange();
}

function sc_form_empresa_SemChave_empresa_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_SemChave_endereco_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_endereco();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_endereco_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_empresa_SemChave_endereco_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_SemChave_id_cidade_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_id_cidade();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_id_cidade_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
  do_ajax_form_empresa_SemChave_event_id_cidade_onchange();
}

function sc_form_empresa_SemChave_id_cidade_onfocus(oThis, iSeqRow, event) {
  scCssFocus(oThis);
}

function sc_form_empresa_SemChave_cep_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_cep();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_cep_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
  cep_cep(oThis.value, 'F1;CEP,cep;RUA,endereco');
}

function sc_form_empresa_SemChave_cep_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_SemChave_telefone_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_telefone();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_telefone_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_empresa_SemChave_telefone_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_SemChave_celular_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_celular();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_celular_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_empresa_SemChave_celular_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_SemChave_operadora_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_operadora();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_operadora_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_empresa_SemChave_operadora_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_SemChave_fax_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_fax();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_fax_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_empresa_SemChave_fax_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_SemChave_contato_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_contato();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_contato_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_empresa_SemChave_contato_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_SemChave_cgc_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_cgc();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_cgc_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_empresa_SemChave_cgc_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_SemChave_local_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_local();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_local_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_empresa_SemChave_local_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_SemChave_cpf_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_cpf();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_cpf_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_empresa_SemChave_cpf_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_SemChave_inscest_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_inscest();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_inscest_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_empresa_SemChave_inscest_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_SemChave_inscmun_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_inscmun();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_inscmun_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_empresa_SemChave_inscmun_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_SemChave_email_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_email();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_email_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_empresa_SemChave_email_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_SemChave_homepage_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_homepage();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_homepage_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_empresa_SemChave_homepage_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_SemChave_obs_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_obs();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_obs_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_empresa_SemChave_obs_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_SemChave_saldo_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_empresa_SemChave_saldo_real_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_saldo_real();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_saldo_real_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_empresa_SemChave_saldo_real_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_SemChave_saldo_dolar_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_saldo_dolar();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_saldo_dolar_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_empresa_SemChave_saldo_dolar_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_SemChave_dat_ult_mov_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_dat_ult_mov();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_dat_ult_mov_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_empresa_SemChave_dat_ult_mov_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_SemChave_data_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_data();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_data_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_empresa_SemChave_data_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_SemChave_telefones_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_telefones();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_telefones_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_empresa_SemChave_telefones_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_SemChave_contatos_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_contatos();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_contatos_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_empresa_SemChave_contatos_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_SemChave_cadastrante_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_cadastrante();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_cadastrante_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_empresa_SemChave_cadastrante_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_SemChave_id_nextel_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_id_nextel();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_id_nextel_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_empresa_SemChave_id_nextel_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_SemChave_dealer_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_dealer();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_dealer_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_empresa_SemChave_dealer_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_SemChave_ddd_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_ddd();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_ddd_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_empresa_SemChave_ddd_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_SemChave_extrato_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_extrato();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_extrato_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_empresa_SemChave_extrato_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_SemChave_contatorelacao_onblur(oThis, iSeqRow, event) {
  do_ajax_form_empresa_SemChave_validate_contatorelacao();
  scCssBlur(oThis);
}

function sc_form_empresa_SemChave_contatorelacao_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_empresa_SemChave_contatorelacao_onfocus(oThis, iSeqRow, event) {
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
}

function displayChange_page_0(status) {
        displayChange_block("0", status);
        displayChange_block("1", status);
        displayChange_block("2", status);
        displayChange_block("3", status);
        displayChange_block("4", status);
}

function displayChange_page_1(status) {
        displayChange_block("5", status);
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
        if ("3" == block) {
                displayChange_block_3(status);
        }
        if ("4" == block) {
                displayChange_block_4(status);
        }
        if ("5" == block) {
                displayChange_block_5(status);
        }
}

function displayChange_block_0(status) {
        displayChange_field("empresa", "", status);
        displayChange_field("razao_social", "", status);
        displayChange_field("categoria", "", status);
        displayChange_field("tipo", "", status);
        displayChange_field("rede", "", status);
        displayChange_field("endereco", "", status);
        displayChange_field("id_cidade", "", status);
        displayChange_field("cep", "", status);
        displayChange_field("local", "", status);
}

function displayChange_block_1(status) {
        displayChange_field("cgc", "", status);
        displayChange_field("cpf", "", status);
        displayChange_field("homepage", "", status);
        displayChange_field("inscmun", "", status);
        displayChange_field("inscest", "", status);
        displayChange_field("dealer", "", status);
        displayChange_field("cadastrante", "", status);
        displayChange_field("dat_ult_mov", "", status);
        displayChange_field("data", "", status);
        displayChange_field("saldo_real", "", status);
        displayChange_field("saldo_dolar", "", status);
        displayChange_field("id_nextel", "", status);
}

function displayChange_block_2(status) {
        displayChange_field("contato", "", status);
        displayChange_field("ddd", "", status);
        displayChange_field("telefone", "", status);
        displayChange_field("email", "", status);
        displayChange_field("celular", "", status);
        displayChange_field("operadora", "", status);
        displayChange_field("fax", "", status);
}

function displayChange_block_3(status) {
        displayChange_field("contatorelacao", "", status);
}

function displayChange_block_4(status) {
        displayChange_field("telefones", "", status);
        displayChange_field("contatos", "", status);
        displayChange_field("obs", "", status);
}

function displayChange_block_5(status) {
        displayChange_field("extrato", "", status);
}

function displayChange_row(row, status) {
        displayChange_field_empresa(row, status);
        displayChange_field_tipo(row, status);
        displayChange_field_id_cidade(row, status);
        displayChange_field_razao_social(row, status);
        displayChange_field_rede(row, status);
        displayChange_field_cep(row, status);
        displayChange_field_categoria(row, status);
        displayChange_field_endereco(row, status);
        displayChange_field_local(row, status);
        displayChange_field_cgc(row, status);
        displayChange_field_inscmun(row, status);
        displayChange_field_cadastrante(row, status);
        displayChange_field_saldo_real(row, status);
        displayChange_field_cpf(row, status);
        displayChange_field_inscest(row, status);
        displayChange_field_dat_ult_mov(row, status);
        displayChange_field_saldo_dolar(row, status);
        displayChange_field_homepage(row, status);
        displayChange_field_dealer(row, status);
        displayChange_field_data(row, status);
        displayChange_field_id_nextel(row, status);
        displayChange_field_contato(row, status);
        displayChange_field_ddd(row, status);
        displayChange_field_telefone(row, status);
        displayChange_field_email(row, status);
        displayChange_field_celular(row, status);
        displayChange_field_operadora(row, status);
        displayChange_field_fax(row, status);
        displayChange_field_contatorelacao(row, status);
        displayChange_field_telefones(row, status);
        displayChange_field_contatos(row, status);
        displayChange_field_obs(row, status);
        displayChange_field_extrato(row, status);
}

function displayChange_field(field, row, status) {
        if ("empresa" == field) {
                displayChange_field_empresa(row, status);
        }
        if ("tipo" == field) {
                displayChange_field_tipo(row, status);
        }
        if ("id_cidade" == field) {
                displayChange_field_id_cidade(row, status);
        }
        if ("razao_social" == field) {
                displayChange_field_razao_social(row, status);
        }
        if ("rede" == field) {
                displayChange_field_rede(row, status);
        }
        if ("cep" == field) {
                displayChange_field_cep(row, status);
        }
        if ("categoria" == field) {
                displayChange_field_categoria(row, status);
        }
        if ("endereco" == field) {
                displayChange_field_endereco(row, status);
        }
        if ("local" == field) {
                displayChange_field_local(row, status);
        }
        if ("cgc" == field) {
                displayChange_field_cgc(row, status);
        }
        if ("inscmun" == field) {
                displayChange_field_inscmun(row, status);
        }
        if ("cadastrante" == field) {
                displayChange_field_cadastrante(row, status);
        }
        if ("saldo_real" == field) {
                displayChange_field_saldo_real(row, status);
        }
        if ("cpf" == field) {
                displayChange_field_cpf(row, status);
        }
        if ("inscest" == field) {
                displayChange_field_inscest(row, status);
        }
        if ("dat_ult_mov" == field) {
                displayChange_field_dat_ult_mov(row, status);
        }
        if ("saldo_dolar" == field) {
                displayChange_field_saldo_dolar(row, status);
        }
        if ("homepage" == field) {
                displayChange_field_homepage(row, status);
        }
        if ("dealer" == field) {
                displayChange_field_dealer(row, status);
        }
        if ("data" == field) {
                displayChange_field_data(row, status);
        }
        if ("id_nextel" == field) {
                displayChange_field_id_nextel(row, status);
        }
        if ("contato" == field) {
                displayChange_field_contato(row, status);
        }
        if ("ddd" == field) {
                displayChange_field_ddd(row, status);
        }
        if ("telefone" == field) {
                displayChange_field_telefone(row, status);
        }
        if ("email" == field) {
                displayChange_field_email(row, status);
        }
        if ("celular" == field) {
                displayChange_field_celular(row, status);
        }
        if ("operadora" == field) {
                displayChange_field_operadora(row, status);
        }
        if ("fax" == field) {
                displayChange_field_fax(row, status);
        }
        if ("contatorelacao" == field) {
                displayChange_field_contatorelacao(row, status);
        }
        if ("telefones" == field) {
                displayChange_field_telefones(row, status);
        }
        if ("contatos" == field) {
                displayChange_field_contatos(row, status);
        }
        if ("obs" == field) {
                displayChange_field_obs(row, status);
        }
        if ("extrato" == field) {
                displayChange_field_extrato(row, status);
        }
}

function displayChange_field_empresa(row, status) {
    var fieldId;
}

function displayChange_field_tipo(row, status) {
    var fieldId;
}

function displayChange_field_id_cidade(row, status) {
    var fieldId;
}

function displayChange_field_razao_social(row, status) {
    var fieldId;
}

function displayChange_field_rede(row, status) {
    var fieldId;
}

function displayChange_field_cep(row, status) {
    var fieldId;
}

function displayChange_field_categoria(row, status) {
    var fieldId;
}

function displayChange_field_endereco(row, status) {
    var fieldId;
}

function displayChange_field_local(row, status) {
    var fieldId;
}

function displayChange_field_cgc(row, status) {
    var fieldId;
}

function displayChange_field_inscmun(row, status) {
    var fieldId;
}

function displayChange_field_cadastrante(row, status) {
    var fieldId;
}

function displayChange_field_saldo_real(row, status) {
    var fieldId;
}

function displayChange_field_cpf(row, status) {
    var fieldId;
}

function displayChange_field_inscest(row, status) {
    var fieldId;
}

function displayChange_field_dat_ult_mov(row, status) {
    var fieldId;
}

function displayChange_field_saldo_dolar(row, status) {
    var fieldId;
}

function displayChange_field_homepage(row, status) {
    var fieldId;
}

function displayChange_field_dealer(row, status) {
    var fieldId;
}

function displayChange_field_data(row, status) {
    var fieldId;
}

function displayChange_field_id_nextel(row, status) {
    var fieldId;
}

function displayChange_field_contato(row, status) {
    var fieldId;
}

function displayChange_field_ddd(row, status) {
    var fieldId;
}

function displayChange_field_telefone(row, status) {
    var fieldId;
}

function displayChange_field_email(row, status) {
    var fieldId;
}

function displayChange_field_celular(row, status) {
    var fieldId;
}

function displayChange_field_operadora(row, status) {
    var fieldId;
}

function displayChange_field_fax(row, status) {
    var fieldId;
}

function displayChange_field_contatorelacao(row, status) {
    var fieldId;
        if ("on" == status && typeof $("#nmsc_iframe_liga_form_contato")[0].contentWindow.scRecreateSelect2 === "function") {
                $("#nmsc_iframe_liga_form_contato")[0].contentWindow.scRecreateSelect2();
        }
}

function displayChange_field_telefones(row, status) {
    var fieldId;
}

function displayChange_field_contatos(row, status) {
    var fieldId;
}

function displayChange_field_obs(row, status) {
    var fieldId;
}

function displayChange_field_extrato(row, status) {
    var fieldId;
        if ("on" == status && typeof $("#nmsc_iframe_liga_grid_extrato")[0].contentWindow.scRecreateSelect2 === "function") {
                $("#nmsc_iframe_liga_grid_extrato")[0].contentWindow.scRecreateSelect2();
        }
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
        $(".sc-form-page").show();
}

function scHidePage(pageNo) {
        $("#id_form_empresa_SemChave_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
        if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
                var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
                if (inactiveTabs.length) {
                        var tabNo = $(inactiveTabs[0]).attr("id").substr(32);
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_empresa_SemChave')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

