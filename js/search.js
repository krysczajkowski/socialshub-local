 $(function() {
     $('.search').keyup(function(){
         var search = $(this).val();
         $.post('192.168.64.2/projekty/socialshub-local/ajax/search.php', {search:search}, function(data) {
             $('.search-result').html(data);
         });
     })
 })
