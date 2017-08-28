<?php
$numeros_1 = addslashes($_POST['numeros_1']);
$numeros_2 = addslashes($_POST['numeros_2']);
//tira ,,
$numeros_1 = str_replace(',,', ',', $numeros_1);
$numeros_2 = str_replace(',,', ',', $numeros_2);
//tira ultima ,
$numeros_1 = rtrim($numeros_1, ',');
$numeros_2 = rtrim($numeros_2, ',');

$tamanho = count(explode(',', $numeros_1)) ==  20 && count(explode(',', $numeros_2)) == 20 ? true : false;
    if(!$tamanho) {
        header('location: index.php');
    } 
?>
<!doctype HTML>
<html language="pt-br">
    <head>
        <title>Cartelas Vale Sorte</title>
        <meta charset="utf-8">
        <link type="text/css" rel="stylesheet" href="css/estilo.css">
        <script type="text/javascript">
            var numeros_1 = '<?php echo $numeros_1 ?>'.split(',');
            var numeros_2 = '<?php echo $numeros_2 ?>'.split(',');
            //ordena em ordem ascendente
            numeros_1 = numeros_1.sort(function(a, b){return a-b});
            numeros_2 = numeros_2.sort(function(a, b){return a-b});

            function preenche_table(lista, tabela) {
                var num = 0;
                for(var linha=0; linha<=3; linha++) {
                    var tr = document.createElement("tr");
                    tr.align = 'center';
                    tr.id = 'tr_'+tabela+'_'+linha;
                    //tr na table correspondente
                    document.getElementById('conteudo_tabela_'+tabela).appendChild(tr);
                    for(var coluna=0; coluna<=4; coluna++) {
                        var td = document.createElement('td');
                        td.id = 'num_'+tabela+'_'+num;
                        td.innerHTML = lista[num];
                        td.onclick = function(){ marca(this); }
                        //td na tr
                        document.getElementById(tr.id).appendChild(td);
                        num++;
                    }
                }
            }

            function marca(celula) {
                    id = celula.id;
                    celula = document.getElementById(id);
                    var style = 'border: 2px solid red; border-radius: 200px;';
                    if(!celula.style.border) {
                        celula.style = style;
                    } else {
                        celula.style.border = '';
                    }
                }

            function limpar() {
                celula = document.getElementsByTagName('td');
                for(var x = 0; x<=celula.length; x++) {
                    celula[x].style.border = '';
                }
            }
            
            
            function main() {
                //lista_numeros = [1,6,8,11,13,18,22,26,28,29,31,35,36,43,45,46,54,57,58,60];
                preenche_table(numeros_1,1);
                preenche_table(numeros_2,2);
            }
        </script>
    </head>

    <body onload="main()">
        <table id="cartela_1">
            <!--table 4x5-->
            <tbody id='conteudo_tabela_1'>
            <th colspan="5">Cartela 1</th>
            </tbody>
        </table>

        <table id="cartela_2">
            <!--table 4x5-->
            <tbody id='conteudo_tabela_2'>
            <th colspan="5">Cartela 2</th>
            </tbody>
        </table>

        <button onclick="limpar()" id="btn_limpar">Limpar Cartelas</button>
    </body>

</html>
