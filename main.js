 $(document).ready(function() {
     $("#zip_code").autocomplete({
         minLength: 2,
         source: function(request, responce) {
             $.ajax({
                     url: "ajax-search.php",
                     method: "post",
                     data: { term: request.term },
                     dataType: 'json'
                 })
                 .done(function(data) {
                     responce(data);
                 });
         }
     });
     $("#zip_code").change(function() {
         var zip_code = $("#zip_code").val();
         if (zip_code.length != 5) {
             $("#zip_code_list").text("Please Enter Valid Zipcode").css("color", "red");
             return false;
         } else {
             alert(zip_code);
             //select state based on zipcode
             $.ajax({
                     url: "ajax-search.php",
                     method: "post",
                     data: { state_code: zip_code },
                     dataType: "json"
                 })
                 .done(function(data) {
                     $("#state").html("<option>" + data + "</option>");
                 });
         }
     });


 });