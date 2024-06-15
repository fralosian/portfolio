//função ajax para pegar as vagas
$(document).ready(function(){ /* PREPARE THE SCRIPT */
    $("#detalhes").change(function(){ /* WHEN YOU CHANGE AND SELECT FROM THE SELECT FIELD */
      var detalhes = $(this).val(); /* GET THE VALUE OF THE SELECTED DATA */
      var dataString = "detalhes="+detalhes; /* STORE THAT TO A DATA STRING */

      $.ajax({ /* THEN THE AJAX CALL */
        type: "POST", /* TYPE OF METHOD TO USE TO PASS THE DATA */
        url: "selectVagas.php", /* PAGE WHERE WE WILL PASS THE DATA */
        data: dataString, /* THE DATA WE WILL BE PASSING */
        success: function(result){ /* GET THE TO BE RETURNED DATA */
          $("#show").html(result); /* THE RETURNED DATA WILL BE SHOWN IN THIS DIV */
        }
      });

    });
  });