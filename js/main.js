$(document).ready(function(){
    $("#first_form").validate({
       rules:{
          name:{
            required: true,
          },
          email:{
            required: true,
            email: true
            
          },
          text:{
            required: true,
            
          },
          num1:{
            required: true,
            
          },
          num2:{
            required: true,
            
          }
       },
       messages:{
        name:{
           required: "Заполните имя",
           
       },
       email:{
         required: "Заполните email",
         
         },
         text:{
            required: "Введите текст",
            
        },
        num1:{
          required: "Введите число",
          
          },
          num2:{
            required: "Введите число",
            
        },
       }

    });
    $('#first_form').submit(function(){
		if($(this).find('input.error').length==0){
			$.post('action/first_form.php',{
                name:$('input[name=name]').val(),
                email:$('input[name=email]').val(),
                text:$('input[name=text]').val(),
                num1:$('input[name=num1]').val(),
                num2:$('input[name=num2]').val(),
				
			},function(data){
                if(data==1){
               $.each($('#first_form input'),function(){
                   $(this).val('');
               });
               $.fancybox.open($("#popup"));
            };
            });
            
		}

		return false;
	});
    $('.carousel').carousel({
        interval: false
      })
     });