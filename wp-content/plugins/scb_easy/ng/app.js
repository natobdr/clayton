
var scbQMapp;
(function() {
    
    
    // ng-app="scbQM_App"
    //var teste = {name: 'Azurite', price: 2.95};
    //var app = angular.module('scbEasy_App', []);
    //var app = angular.module('scbQM_App', ['ui.bootstrap','ui.sortable','ngSlider']);
    var app = angular.module('scbQM_App', ['ui.bootstrap','ui.sortable','ngSlider','img-src-ondemand']);
    scbQMapp=app;
    
    if(typeof scb_easy_vars == "undefined")  scb_easy_vars={};
    
    app.QM_tpl_path='/wp-content/plugins/scb_easy/ng/tpl/';
    app.QM_version=scb_easy_vars.QM_version;
    
    //var version='1.003';

    
    app.controller('scbEasy_Ctrl', ['$scope', '$http', '$sce',function($scope, $http,$sce) {
            
        var ctrl=this;     
        ctrl.wpvars=scb_easy_vars;
        window.ng_http=$http;


        ctrl.toolsShowing=true;
        
        ctrl.trustedHtml = function(html) {
            return $sce.trustAsHtml(html);
        };
        /*
        ctrl.showTools=function(op){

            if(op)
            {
                ctrl.toolsShowing=true;
                jQuery('body').addClass('scb-show-tools-true').removeClass('scb-show-tools-false');
                //jQuery('body').switchClass('scb-show-tools-false','scb-show-tools-true',500);
                jQuery('html').addClass('html-toolbar-show');
                jQuery('#SCBToolbar').show();
            }
            else
            {
                ctrl.toolsShowing=false;
                jQuery('body').removeClass('scb-show-tools-true').addClass('scb-show-tools-false');
               // jQuery('body').switchClass('scb-show-tools-true','scb-show-tools-false',500);
               jQuery('html').removeClass('html-toolbar-show');
               jQuery('#SCBToolbar').hide();
            }
        };
        ctrl.showTools(true);
            */
        
        /*
        this.teste = teste;
        
        
        $scope.method = 'GET';
        //$scope.url = scb_easy_vars.json_url ;
        //$scope.url = scb_easy_vars.json_url + '/posts';
        //$scope.url = scb_easy_vars.json_url + '/users';
        //$scope.url = scb_easy_vars.json_url + '/media';
        $scope.url = scb_easy_vars.json_url + '/pages';
        
        $scope.getPages = function() {
            console.log('getPosts - teste');
        };      
        */ 
        
    }]);
    
   
    app.directive('appMain',            function() { return { restrict: 'E', templateUrl: app.QM_tpl_path+'tpl-app-main.html?v='+app.QM_version}; });
    app.directive('adminBarContent',    function() { return { restrict: 'E', templateUrl: app.QM_tpl_path+'tpl-admin-bar-content.html?v='+app.QM_version}; });
 
    
    app.controller('scbToolsView_Ctrl', ['$scope', '$http',function($scope, $http) {
      
            var ctrl=this;
            ctrl.toolsShowing=true;
            
            
      
            
    
            ctrl.showTools=function(op){
                
                if(op)
                {
                    ctrl.toolsShowing=true;
                    jQuery('body').addClass('scb-show-tools-true').removeClass('scb-show-tools-false');
                }
                else
                {
                    ctrl.toolsShowing=false;
                    jQuery('body').removeClass('scb-show-tools-true').addClass('scb-show-tools-false');
                }
            };
            
            
        }]);
    
    
    app.controller('scbDebug_Ctrl', ['$scope', '$http',function($scope, $http) {
      
            var ctrl=this;
            
            
            ctrl.echo=function(){
                
                jQuery.smallBox({
                                        title : 'ECHO',
                                        content : 'Echo scbDebug_Ctrl',
                                        color : "rgb(50, 118, 177)",
                                        iconSmall : "fa fa-bell bounce animated",
                                        timeout : 2000
                                   });
            };
      
            ctrl.scbGetPages=function (n)
            {
                ctrl.echo();
                
                    if(!n) n=1;

                    /*
                    var method = 'GET';
                    //var url = scb_easy_vars.json_url + '/pages?_wp_json_nonce='+scb_easy_vars.nonce;
                    //var url = scb_easy_vars.json_url + '/pages/?filter[posts_per_page]=-1';//máximo de resultados
                    
                    //var url = scb_easy_vars.json_url + '/pages/?filter[posts_per_page]='+n;//máximo de resultados
                    //var url = scb_easy_vars.json_url + '/simplepages/?filter[posts_per_page]='+n;//máximo de resultados
                    
                
                        getpagetemplates

                      $http({method: method, url: url  }).
                        success(function(data, status) {
                          console.log('OK:');
                          console.log(data);




                        }).
                        error(function(data, status) {
 
                          console.log('BAD');
                          console.log(data);
                      });
                      
                      */
                      
                      //------------------
                      
                    var method = 'PUT';
                    var url = scb_easy_vars.json_url + '/scboptions/?_wp_json_nonce='+scb_easy_vars.nonce;

                    var newdata={"op":'getpagetemplates'};

                    $http({method: method, url: url, data:newdata }).
                      success(function(data, status) {

                            console.log('PUT OK:');
                            console.log(data);

                      }).
                      error(function(data, status) {

                          console.log('BAD');
                          console.log(data);



                    });


            };
 
            
            
        }]);
    
   

})();



/*
  
 alert: "Este é um teste de alerta !!!!"
 bloginfo: "http://mbm1.p1.site.co"
 has_formidable: false
 has_header_menu: "1"
 has_home_paralaxe: false
 has_portifolio: false
 has_slideshow: false
 is_home: "1"
 is_page: "1"
 is_preview: ""
 is_single: ""
 is_singular: "1"
 json_url: "http://mbm1.p1.site.co/wp-json"
 locale: "pt_BR"
 logout_url: "http://mbm1.p1.site.co/wp-login.php?action=logout&redirect_to=%2F&_wpnonce=546db6f3d2"
 nonce: "f9a561d14e"
 permalink: "http://mbm1.p1.site.co/"
 post_ID: "2005"
 post_category: null
 post_title: "Home"
 post_type: "page"
 registered_nav_menus: Object
 rellink: "/"
 sChangeLogo: "Change Logo"
 sChangeLogoTip: "Change your website logo and favicon"
 sDashboardLinkTip: "Ir ao Painel de controle, onde você poderá ver mais informações sobre o seu website."
 sEditBackground: "Edit Background"
 sEditBackgroundTip: "Edit website Background color and images"
 sEditPage: "Editar esta página"
 sEditPageTip: "Editar o conteúdo desta página" 
 
 */

