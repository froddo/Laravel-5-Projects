var axios = require('axios');

$('body').on('click', '.delete-photo', function(){
    var id = $(this).data('id');

    axios.delete('/payments/'+id)
        .then(function(){
            window.location.reload();
        })
        .catch(function(error){
            console.log(error);
        });
});