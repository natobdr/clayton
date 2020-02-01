/*
 * Funções gerais -- Modulo Chamados
 *
 *
 */
function chamados_view(id){
    window.location.href = '/chamados/' + id;    
}

$(document).ready(function(){
    
    $('#chamados-abrir #edit-nome').after('<span id="edit-nome-error" class="field-error">Nome é obrigatório</span>');
    $('#chamados-abrir #edit-email').after('<span id="edit-email-error" class="field-error">Email é obrigatório</span>');
    $('#chamados-abrir #edit-numero').after('<span id="edit-numero-error" class="field-error">Natureza é obrigatória</span>');
    $('#chamados-abrir #edit-assunto').after('<span id="edit-assunto-error" class="field-error">Assunto é obrigatório</span>');
    $('#chamados-abrir #edit-mensagem').after('<span id="edit-mensagem-error" class="field-error">Mensagem é obrigatório</span>');
    
    $('input[type=text],select,textarea').focus(function(){
        $(this).parent().find('.field-error').css({color:'#fff'});
    })    
    var onChange = function(){

        var opt = $(this).val();
        var target = $("#chamados-abrir #edit-numero");
        
        switch(opt){
         case "cnpj":
             target.attr('placeholder','Ex.: 00.000.000/0000-00');
             target.mask("00.000.000/0000-00");
         break;
         case "cpf":
             target.attr('placeholder','Ex.: 000.000.000-00');
             target.mask("000.000.000-00");
         break;
        }
        
    }
    $('#chamados-abrir #edit-tipo-cpf').change(onChange);
    $('#chamados-abrir #edit-tipo-cnpj').change(onChange);
    $('#chamados-abrir #edit-tipo-cpf').trigger('change');
    
    /*
     * Validando formulario de chamados  
     */
    $('#edit-submit').click(function(){
                
        if( $('#edit-nome').val() == ""){
          $('#edit-nome-error').css({color:"red"})
            return false;
        }
	if( $('#edit-numero').val() == ""){
            $('#edit-numero-error').css({color:"red"})
            return false;
        }
	if( $('#edit-numero').val()!="" && $('input[name=tipo]:checked').val() == 'cpf' && !(new RegExp(/[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}/)).test($('#edit-numero').val())){
            var t = $('#edit-numero-error');
                t.html("cpf inválido");
                t.css({color:"red"});
            return false;
        }                        
        if( $('#edit-numero').val()!="" && $('input[name=tipo]:checked').val() == 'cnpj' && !(new RegExp(/[0-9]{2}\.[0-9]{3}\.[0-9]{3}\/[0-9]{4}\-[0-9]{2}/)).test($('#edit-numero').val())){
            var t = $('#edit-numero-error');
                t.html("cnpj inválido");
                t.css({color:"red"});
            return false;
        }              
        if( $('#edit-email').val() == ""){
            $('#edit-email-error').css({color:"red"})
            return false;
        }	
        if( $('#edit-assunto').val() == ""){
            $('#edit-assunto-error').css({color:"red"})
            return false;
        }          
        if( $('#edit-mensagem').val() == ""){
            $('#edit-mensagem-error').css({color:"red"})
            return false;
        }          
        
    });
    
})
