//----- row_back_color -----
var intervalWrap_row_back_color=0,interval_scb_mp_update_row_back_color_content=0,loop_Wrap_row_back_color=0;
jQuery(document).ready(function() {
    
    if (scb_is_mp_editor())
    {
        //logaConsole('MP Editando ...');
        clearInterval(intervalWrap_row_back_color);
        intervalWrap_row_back_color=setInterval(scb_set_bg_color_editor,500);
        //setTimeout(scb_set_bg_color_editor,25000,jQuery);
        
    }
    else scb_set_bg_color(true);
    
    var $ct=jQuery('.motopress-wrapper.content-holder > div.container');
    if(!$ct.length) return;
    
    var body_w=$ct.width();//1170
    
    var body_pl=$ct.css('padding-left');
    //console.log(['body_pl:',body_pl]);
    body_pl=parseInt(body_pl.replace(/px/,''));
    
    //cria css conforme screen, para row-background-img
    var w=Math.ceil((screen.availWidth-body_w)/2)+1+body_pl;
    //console.log(['W:',body_w,body_pl,screen,w]);
    
    //console.log(screen);
    jQuery("<style type='text/css'>.fullwidth-row-common:before {left: -"+w+"px;right: -"+w+"px;}</style>").appendTo(jQuery("head"));
        
    scb_set_bg_color2();
    //jQuery(window).bind("load", equalheight);
    //jQuery(window).bind("resize", equalheight);
   
});

function scb_set_bg_color_editor()
{
    //impede loops eternos
        loop_Wrap_row_back_color++;
        if(loop_Wrap_row_back_color>100)
        {
            clearInterval(intervalWrap_row_back_color);
            return;
        }

    //aguarda carregamento do mp editor
        var d=jQuery( "#motopress-preload", window.parent.document ).css('display');
        //logaConsole('#motopress-preload - display:'+d);
        if(d!='none') return;
        
    scb_mp_update_classes_row_back_color();
}


var qte_row_back_color=0;
var scb_first_loop=true;
function scb_mp_update_classes_row_back_color()
{
    
    
    
    var cont=0;
    jQuery( ".row_back_color" ).each(function( index ) 
    {
        cont++;
         var $sinal=jQuery(this);
         //var css_class=$sinal.text();//scb_css_class
         var css_class=$sinal.attr("scb_css_class");//scb_css_class
         
        //logaConsole( index + ": " + css_class );
       if ($sinal.length == 0)
        {
            //logaConsole('Sem $sinal:'+css_class);
            return true;
        }  
        //var $row1 = $sinal.parents('div.mp-row-fluid.motopress-row:first');
        //var $row1 = $sinal.parents('div.mp-row-fluid.motopress-row').last();
        var $row1 = $sinal.closest('div.mp-row-fluid.motopress-row');
        if ($row1.length == 0)
        {
            //logaConsole('Sem $row1:'+css_class);
            return true;
        }
        //logaConsole('$row1:'+css_class+'|'+$row1.html());
        
        
        
        //var $row2 = $row1.next('div.mp-row-fluid.motopress-row');
        var $row2 = $row1.nextAll('div.mp-row-fluid.motopress-row:first');
        if ($row2.length == 0)
        {
            //logaConsole('Sem $row2:'+css_class);
            return true;
        }
        
        var h=$row2.height();
        //logaConsole('height '+css_class+ ': '+h);
        
        //deprecated, usando top:10px
        //h+=10;//para suprir o espaço enre as colunas, e manter 10px acima, para seleção no editor.
        
        $row1.css( 'position','absolute' );
        //$row1.height(h);
        
        //identifica se já exise uma classe, ou usa o padrão
            var class_name="";

            var classList =$sinal.attr('class').split(/\s+/);
            jQuery.each( classList, function(index, item){
                if (item.indexOf("scb-temp-") != -1) 
                {
                   class_name=item;
                   return true;
                }
            });

            var existe=true;
            if(!class_name)
            {
                var n=Math.floor((Math.random() * 10000) + 1);
                class_name="scb-temp-"+cont+n;
                existe=false;
            }
            //logaConsole('class_name:'+class_name);
        
        jQuery("<style type='text/css'>."+class_name+":before{height:"+h+"px;top:10px}</style>").appendTo(jQuery("head"));
        if(!existe) $sinal.addClass(class_name);

        //$row2.css( 'background','absolute' );
        
        if(scb_first_loop)
        {
            scb_first_loop=false;
            clearInterval(intervalWrap_row_back_color);
            jQuery(".motopress-block-content").bind("DOMSubtreeModified", scb_mp_update_classes_row_back_color);
            //jQuery("#content").bind("DOMSubtreeModified", scb_mp_update_row_back_color_content);
            //clearInterval(interval_scb_mp_update_row_back_color_content);
            //interval_scb_mp_update_row_back_color_content=setInterval(scb_mp_update_row_back_color_content,5000);
        }
        
        qte_row_back_color=jQuery( ".row_back_color" ).length;
        
        
       
    });
    
    //logaConsole('rodou scb_mp_update_classes_row_back_color');
    
}



function scb_set_bg_color(hide)
{
    jQuery( ".row_back_color" ).each(function( index ) {
         var $sinal=jQuery(this);
         var css_class=$sinal.attr("scb_css_class");//scb_css_class
         
         
         
        //if( (typeof scb_easy_vars !== "undefined") && scb_easy_vars.isEasyMode)
        //{
                    /*
                    var data_css_class=$sinal.attr("data-css_class");
                    var data_custom_color=$sinal.attr("data-custom_color");
                    var data_border_style=$sinal.attr("data-border_style");
                    var data_margin_style=$sinal.attr("data-margin_style");
                    var data_padding_style=$sinal.attr("data-padding_style");
                    var data_aux=' data-css_class="'+data_css_class+'" data-custom_color="'+data_custom_color+'" data-border_style="'+data_border_style+'" data-margin_style="'+data_margin_style+'" data-padding_style="'+data_padding_style+'" ';
                    */
          // var args=$sinal.attr("data-args");
                //args.replace(/"/g, '\\\\"');
                //var data = jQuery.parseJSON(args);
                //var json_data=JSON.stringify(data);
           
           //var data_args=" data-args='"+args+"' ";//' ';
                //var data = jQuery.parseJSON(args);

               
        //}
        //else var data_args='';
         
        //logaConsole( index + ": " + css_class );
       if ($sinal.length == 0)
        {
            //logaConsole('Sem $sinal:'+css_class);
            return true;
        }  
        //var $row1 = $sinal.parents('div.mp-row-fluid.motopress-row:first');
        //var $row1 = $sinal.parents('div.mp-row-fluid.motopress-row').last();
        var $row1 = $sinal.closest('div.mp-row-fluid.motopress-row');
        if ($row1.length == 0)
        {
            //logaConsole('Sem $row1:'+css_class);
            return true;
        }
        //logaConsole('$row1:'+css_class+'|'+$row1.html());
        
        //var $row2 = $row1.next('div.mp-row-fluid.motopress-row');
        var $row2 = $row1.nextAll('div.mp-row-fluid.motopress-row:first');
        if ($row2.length == 0)
        {
            //logaConsole('Sem $row2:'+css_class);
            return true;
        }
        
        
       
        var args=$sinal.attr("data-args");
        if(args) $row2.attr('data-args-old',args);
        
        
        
        //$row2.wrapInner( '<div class="mp-span12 motopress-span row_back_color_wrapper fullwidth-row-common '+css_class+'" '+data_aux+'></div>' );													
        $row2.wrapInner( '<div class="mp-span12 motopress-span row_back_color_wrapper fullwidth-row-common '+css_class+'"></div>' );													
         
         
        var wrap = jQuery('.row_back_color_wrapper');
        if (wrap.length === 0)
        {
            //logaConsole('Sem wrap:'+css_class);
            return true;
        }				
        
        $row1.addClass('row_back_color_aux');//QMC usage
        $row2.addClass('row_back_color_top');//QMC usage
       
        
        //if(hide) $row1.hide();
        if(hide)
        {
            //$row1.hide();
            $row1.hide().appendTo('body');//.removeClass();
            
        }
    }); 
}


// bg na propria row


function scb_set_bg_color2()
{
    //console.log('scb_set_bg_color2');
    jQuery( ".motopress-row.scb-has-bg" ).each(function( index ) {
        var $row2=jQuery(this);
        var css_class=$row2.attr('scb_css_class');
        $row2.wrapInner( '<div class="mp-span12 motopress-span row_back_color_wrapper fullwidth-row-common '+css_class+'"></div>' );													
        $row2.addClass('row_back_color_top');//QMC usage
    }); 
    
    
}