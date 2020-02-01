$ = jQuery;

$.fn.nested = function(){
   var obj = $(this);
   if (obj.length > 0 && obj.prev().length == 0){             
        var _cfgs = {
            id:obj.attr('id'),
            name:obj.attr('name')
        }
        $.ajax({
            url:"equery",
            data:{taxonomy:"onde"},
            method:'GET',
            success:function(result,options){
                  var _target = $(result).change(function(){
                        var _self = $(this);                            
                        
                        $.ajax({
                            url:"equery",
                            data:{taxonomy:"onde", pid:this.value},
                            method:"GET",
                            success:function(result, options){  
                                var _content = $(result)
                                               .css({width:'150px',margin:"0 5px" })
                                               .attr(_cfgs)
                                
                                if (_self.next().length == 1 ){
                                    _self.next().fadeOut(function(){
                                        _self.next().fadeIn(function(){
                                            _self.next().replaceWith(_content);                                                                                    
                                        })
                                    });
                                } else {
                                    _self.after($(_content).fadeIn());                                    
                                }
                            }
                        })
                    })
                  obj.replaceWith(_target)
            }
        })
    }    
}


$(document).ready(function(){
    
    Drupal.s = function(){
        var obj = $('#edit-field-local-tid');
            obj.nested();        
    }
    
$(document).ajaxSuccess(function(){
    Drupal.s();
})
    
})

