$(document).ready(function () {

      fetch('getPaganti.php', {method: "GET"})
         .then(result => {
            let res = result.json();
            return res;
        })
        .then(res => {
            console.log(res);
            let target = $('.container > table');
            let template = Handlebars.compile($('#template').html());

            for (const pagante of res) {
                target.append(template(pagante))
            }
        })
        .catch(err => {
            alert(err);
        })


        function deletePagante() { 

            let target = $(this);
            let id = target.parents('tr').data('id');
            let ok = confirm(`Vuoi davvero rimuovere il pagante con id ${id}dal database?`);

            if (ok) {

                $.ajax({
                    type: "POST",
                    url: "deletePagante.php",
                    data: {
                        id: id
                    },
                    
                    success: function (response) {
                        target.parents('tr').fadeOut('slow', function () {
                              target.parents('tr').remove();
                        })
                    },
                    error: function (err) {
                        alert(err);
                      }

                });
 
            }
         }


        $('.container').on('click', '.delete', deletePagante);

});