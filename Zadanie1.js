$(document).ready(function()
{
    $(".points").click(function()
    {        
        /* id элемента на который навели фокус, например "125" */
        //var id = parseInt( $(this).Attr("id").substr(3) );
        //console.log($(this));
        //alert(id);
        /* load в элемент, передаем id на сервер, а именно по url: Zadanie1.php, 
        этот скрипт вернет email записи */
        var article_id = $(this).attr("id");
        var data = {
          "article_id": article_id
        };
        data = $(this).serialize() + "&" + $.param(data);
        console.log(data);
        
        $.ajax({
          type: "POST",
          dataType: "json",
          url: "Zadanie1json.php",
          data: data,

          success: function(data)
          {
          $(".qwe").html("<br />JSON: " + data["json"] + "<br />" + article_id);
          //alert("article_id: "+article_id); // а здесть емейл вставить куда-нить

          //alert("Form submitted successfully.\nReturned json: " + data["json"]);
          console.dir(data);
                    alert(data);
 
          }
    });
  });
});
