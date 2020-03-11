 $(function() {
     $('.search').keyup(function(){
         var search = $(this).val();
         $.post('ajax/search.php', {search:search}, function(data) {
         	$('.search-result').innerHTML= '';
            $('.search-result').html(data);
         });
     })
 })
