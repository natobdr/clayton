$(document).ready(function() {

    table =  $('.views-table').dataTable({
	"order" :[[0,"desc"]],
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]]
     });     
   
    var dt =  table.DataTable();

    // View chamados
    $(".view-chamados #edit-protocolo").on("keyup",function(){ dt.column(1).search(this.value).draw()});
    $(".view-chamados #edit-assunto").on("keyup",function(){ dt.column(2).search(this.value).draw()});
    $(".view-chamados #edit-area").on("change",function(){ dt.column(3).search(this.value).draw()});
    $(".view-chamados #edit-nome").on("keyup",function(){ dt.column(4).search(this.value).draw()});
    $(".view-chamados #edit-criada-datepicker-popup-0").on("change",function(){ dt.column(5).search(this.value).draw()});
    $(".view-chamados #edit-status").on("change",function(){ dt.column(6).search(this.value == "All" ? "" :this.options[this.value].innerText).draw()});

    // View Reports
    $(".view-reports #edit-area").on("change",function(){ dt.column(1).search(this.value).draw()});
    
    
             
    
} );