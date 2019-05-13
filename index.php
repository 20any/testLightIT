<?php
    session_start();
?>
<html>
<!-- Подключение Bootstrap и CSS -->
    <head>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/design.css"/>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            <h1 align="center">Legend</h1>
        </header>
<!-- Вызов функции конвертации -->
        <form method="post" action="convert.php">
            <textarea name="inputValue" cols="40" rows="3">
                <?php
                    if ($_SESSION['inputValue']) {
                        echo trim($_SESSION['inputValue']);
                    }
                ?>
            </textarea>
            <button type="submit"><img src="media/arrow.png"></button>
            <textarea name="outputValue" cols="40" rows="3" readonly>
               <?php
                    if ($_SESSION['outputValue']) {
                        echo trim($_SESSION['outputValue']);
                        session_destroy();
                    }
               ?>
            </textarea>
        </form>
    
		<div class="tableOutput">
            <?php
                require_once 'connections.php'
            ?>
            <?php
                $sql = 'select * from actions';
                $result = mysqli_query($link,$sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo $row['inputValue'].'|';
                    echo $row['outputValue'].'|';
                    echo $row['date'];
                    echo '<br>';
                }

            ?>
			
        </div>
    </body>
    <!--
    <script>
        $("form").submit(function(evt){
            evt.preventDefault();
            var formData = $("form").serializeArray(); // Create array of object
            var jsonConvertedData = JSON.stringify(formData);  // Convert to json
            $.ajax({
                type: "POST",
                url: 'convert.php',
                data: jsonConvertedData,
                success: function () {
                    alert(jsonConvertedData)
                },
            });
        });
    </script>-->
</html>