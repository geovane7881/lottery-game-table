<!doctype HTML>
<html language="pt-br">

    <head>
    
        <title>Vale Sorte</title>
        <meta charset="utf-8">
        <link type="text/css" rel="stylesheet" href="css/estilo.css">

        <script type="text/javascript">
        </script>

    </head>

    <body>
        <h1>Preenchimento dos Números</h1>
        <form method="post" action="tabela.php">
            <label>
                Digite os números da cartela 1: 
                <input type="text" id="numeros_1" name="numeros_1">
            </label>

            <br><br><br>
            
            <label>
                Digite os números da cartela 2: 
                <input type="text" id="numeros_2" name="numeros_2">
            </label>
            
            <br><br>
            <button type="submit" id="btn_submit"> Enviar </button>
        </form>
    </body>

</html>