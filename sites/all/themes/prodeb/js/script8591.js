/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - https://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {


// To understand behaviors, see https://drupal.org/node/756722#behaviors
Drupal.behaviors._get_addr_gov = {
  attach: function(context, settings) {
		var pathname = window.location.pathname;
		
		$.get("/remote-addr/json", function (data) {
      var botaoAcesso     = $('#acesso');
      var espacoPregoeiro = $('.region-licitacao-rede-gov  p  a');

      var ip_addr = data.remote_addr;
      var ip_arr = ip_addr.split('.');

			if (parseInt(ip_arr[0]) !== 10){
        if(espacoPregoeiro !== undefined && (pathname == '/' || pathname == '/home')){
          espacoPregoeiro.replaceWith(function() { return $(this).contents(); })
        }

        if(botaoAcesso !== undefined) {
          botaoAcesso.remove(); 
        }
			}
		});
  }
};

Drupal.behaviors.incrementaContadorBehavior = {
    attach: function(context, settings) {
 		//ConcessÃ£o e PermissÃ£o de Bens PÃºblicos
 		$('.region-editais a').click(function (){ $.get(window.location.origin + "/contador/50");});
		//Noticias
		$('#views_slideshow_cycle_main_noticias-noticias_galleria_block a').click(function (){ $.get(window.location.origin + "/contador/47");});
		//InscriÃ§Ã£o Estadual
		$('a[href="http://www.sintegra.gov.br/"]').click(function (){$.get(window.location.origin + "/contador/51");});
		//CertidÃ£o Trabalhista
		$('a[href="http://www.tst.jus.br/certidao/"]').click(function (){$.get(window.location.origin + "/contador/52");});
		//FGTS
		$('a[href="https://webp.caixa.gov.br/cidadao/Crf/FgeCfSCriteriosPesquisa.asp"]').click(function (){$.get(window.location.origin + "/contador/53");});
		//Receita Municipal
		$('a[href="http://www.sefaz.salvador.ba.gov.br/"]').click(function (){$.get(window.location.origin + "/contador/54");});
		//Receita Federal e Divida Ativa
		$('a[href="https://idg.receita.fazenda.gov.br/orientacao/tributaria/certidoes-e-situacao-fiscal"]').click(function (){$.get(window.location.origin + "/contador/56");});	
	
		if(window.location.pathname == '/' || window.location.pathname == '/home'){
			//ServiÃ§os Terceirizados - Atualize aqui seu Contrato	
			$('.region-servicos a > img:eq(0)').click(function (){$.get(window.location.origin + "/contador/59");});
			
			//ServiÃ§os Terceirizados - Cartilha Lei Anticalote
			$('.region-servicos a > img:eq(1)').click(function (){$.get(window.location.origin + "/contador/60");});
			
			 //ServiÃ§os Terceirizados - Modelo de Planilha para CÃ¡lculo do Percentual
			$('.region-servicos a > img:eq(2)').click(function (){$.get(window.location.origin + "/contador/61");});

			//ServiÃ§os Terceirizados - Guia RÃ¡pido ServiÃ§os Terceirizados
			$('.region-servicos a > img:eq(3)').click(function (){$.get(window.location.origin + "/contador/62");});

			//EspaÃ§o dos Pregoeiros e ComissÃµes de LicitaÃ§Ã£o
			$('.region-licitacao-rede-gov a > img:eq(0)').click(function (){$.get(window.location.origin + "/contador/63");});	

			//SEI Bahia
			$('.region-licitacao a > img:eq(0)').click(function (){$.get(window.location.origin + "/contador/64");});
		}
	}
  
};

})(jQuery, Drupal, this, this.document);

