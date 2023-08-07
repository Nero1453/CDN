    $(document).ready(function(){
        // Activate tooltip
        $('[data-toggle="tooltip"]').tooltip();
        
        // Select/Deselect checkboxes
        var checkbox = $('table tbody input[type="checkbox"]');
        $("#selectAll").click(function(){
            if(this.checked){
                checkbox.each(function(){
                    this.checked = true;                        
                });
            } else{
                checkbox.each(function(){
                    this.checked = false;                        
                });
            } 
        });
        checkbox.click(function(){
            if(!this.checked){
                $("#selectAll").prop("checked", false);
            }
        });
    });

    function generarFixture() {
  
      var equiposSeleccionados = [];
      $.each($("input[name='options[]']:checked"), function() {
        equiposSeleccionados.push($(this).val());
      });
      console.log(equiposSeleccionados.sort(function(a, b) {
        return 0.5 - Math.random()
      }));
  
  
      $.post($("#myForm").attr("action"),
        $('#str').val(JSON.stringify(equiposSeleccionados)),
        //$("#myForm :input").serializeArray(), 
        function(info) {
          $("#result").html(info);
        });
  
    }
