$(document).ready(function(){
  //валидация формы
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
         email:"Ввведите корректный email"
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
    
 //AJAX запрос
 
    $('#first_form').on('submit', function(e){
      if($(this).find('input.error').length == 0){
      e.preventDefault();
      var $that = $(this),
      formData = new FormData($that.get(0));
      $.ajax({
        url: $that.attr('action'),
        type: $that.attr('method'),
        contentType: false,
        processData: false,
        data:formData,
        success: function(){
          $('#first_form input').val('');
          $.fancybox.open($("#popup"));
          return false;
        }
      });
    }
    return false;
    })
//добавление еще одного поля для загрузки файла
$('.add_field').on('click',function(){
  let elem=document.getElementById('fileUpload');
  let clone=elem.cloneNode(true);
  elem.insertAdjacentElement('afterEnd', clone);
});
     });