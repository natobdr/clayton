function scb_setAnimateEvents()
{
    //console.log("scb_setAnimateEvents");
    //jQuery('[data_entrance]:not([data-completed-entrance])').each(function(){
    jQuery('[data-entrance]').not('[data-completed-entrance]').each(function(){
         var $e = jQuery(this);
         // data_entrance="bounceInDown" 
         
         var waypoint=$e.waypoint( function(direction) //down|up;
         {
                var entrance = $e.data('entrance');
                //console.log("entrance:"+entrance+" - direction:"+direction);

               if ( entrance ) 
               {
                     $e.addClass(entrance + ' is-visible');//animated
                     setTimeout( function() 
                     {
                        //$e.data('entrance','');
                        $e.attr('data-completed-entrance', entrance);
                        if(jQuery.isFunction(waypoint)) waypoint.destroy();
                        $e.data('waypoint','');
                     }, 1000 ); 
               }

          },
          {
               offset: 'bottom-in-view'//'50px'//offset: '25%' // http://imakewebthings.com/waypoints/api/offset-option/
          }); 
          
          $e.data('waypoint',waypoint);
    });         
}

function scb_sanitize_ani(str)
{
    var arr=["none","bounce","flash","pulse","rubberBand","shake","swing","tada","wobble","bounceIn","bounceInDown","bounceInLeft","bounceInRight","bounceInUp","bounceOut","bounceOutDown","bounceOutLeft","bounceOutRight","bounceOutUp","fadeIn","fadeInDown","fadeInDownBig","fadeInLeft","fadeInLeftBig","fadeInRight","fadeInRightBig","fadeInUp","fadeInUpBig","fadeOut","fadeOutDown","fadeOutDownBig","fadeOutLeft","fadeOutLeftBig","fadeOutRight","fadeOutRightBig","fadeOutUp","fadeOutUpBig","flip","flipInX","flipInY","flipOutX","flipOutY","lightSpeedIn","lightSpeedOut","rotateIn","rotateInDownLeft","rotateInDownRight","rotateInUpLeft","rotateInUpRight","rotateOut","rotateOutDownLeft","rotateOutDownRight","rotateOutUpLeft","rotateOutUpRight","hinge","rollIn","rollOut","zoomIn","zoomInDown","zoomInLeft","zoomInRight","zoomInUp","zoomOut","zoomOutDown","zoomOutLeft","zoomOutRight","zoomOutUp"];
    if(arr.indexOf(str) === -1) return 'none'; 
    return str;
}

jQuery(document).ready(function ($) {
 
setTimeout(scb_setAnimateEvents,2000);    
    
});