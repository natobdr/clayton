
function scb_is_mp_editor()
{
    //if(!parent) return false;
    //if(parent != top) return false;
    try{
            var editor=parent.motopress;
            if (typeof editor == "undefined") return false;
    }
    catch(e){return false;}
    return true;
    
}

function logaConsole(t)
{
    window.console && console.log(t);
}

//remove <hr> acima do campo dependente, para exibir a descriçao junto ao campo.
function scb_fix_mppainel()
{
    jQuery('div[data-motopress-parameter="d_portfolio"]').prev().children('HR').hide();
    //alert('scb_fix_mppainel');
}

function scb_is_mp_loaded()
{
    //aguarda carregamento do mp editor
        var d=jQuery( "#motopress-preload", window.parent.document ).css('display');
        //logaConsole('#motopress-preload - display:'+d);
        if(d!='none') return false;
        
        return true;
}
