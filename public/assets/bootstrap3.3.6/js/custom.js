 
 $(document).ready(function(){
            $("#memberform").hide();
            $(".formhide").hide();
            $("#showform").click(function(){
                $("#memberform").toggle();
            });

           
            $('.btnform').click(function(){
                //alert(this.id);
                $("#teamform"+this.id).toggle();
            });
           

        });
