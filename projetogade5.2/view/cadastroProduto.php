<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleprod.css">
    <title>Formulário</title>
</head>

<body>

    <header>

        <a href="./prompt_comando.php"><img src="../img/logogade.png" alt="logo" class="logo"></a>

        <nav class="navegation">
            <ul>
                <li>
                    <div class="search-box">

                    </div>

                <li><a href="prompt_comando.php">Voltar</a></li>

            </ul>
        </nav>
    </header>


    <div class="container">
        <div class="form-image">
            <img src="../img/CamisaMorder.png" alt="">
        </div>
        <div class="form">
            <form action="../control/cadastrarProdutoControl.php" method="post">
                <div class="form-header">

                    <input type="hidden" name="idProduto">


                    <div class="title">
                        <h1>Cadastrar Produto</h1>
                    </div>
                    

                    


                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="nome">Nome do Produto</label>
                        <input id="nome" type="text" name="nome" placeholder="Digite o nome do produto" required>
                    </div>

                    <div class="input-box">
                        <label for="valor">Valor</label>
                        <input id="valor" type="text" name="valor" placeholder="Digite o valor" required>
                    </div>
                    <div class="input-box">
                        <label for="descricao">Descrição</label>
                        <input id="descricao" type="text" name="descricao" placeholder="Descrição" required>
                    </div>


                    <div class="input-box">
                        <label for="fornecedor">Fornecedor</label>
                        <input id="fornecedor" type="text" name="fornecedor" placeholder="Digite o Fornecedor" required>
                    </div>


                    <div class="input-box">
                        <label for="Imagem">Imagem</label>
                        <input id="imagem" type="file" name="imagem" placeholder="Imagem do Produto" required>
                    </div>


                </div>

                <div class="gender-inputs">
                    <div class="gender-title">
                        <h6>Tamanho</h6>
                    </div>

                    <div class="gender-group">
                        <div class="gender-input">
                            <input type="radio" name="tamanho" id="P" value="P" required>
                            <label for="">P</label>
                        </div>

                        <div class="gender-input">
                            <input type="radio" name="tamanho" id="M" value="M" required>
                            <label for="">M</label>
                        </div>

                        <div class="gender-input">
                            <input type="radio" name="tamanho" id="G" value="G" required>
                            <label for="">G</label>
                        </div>

                        <div class="gender-input">
                            <input type="radio" name="tamanho" id="GG" value="GG" required>
                            <label for="">GG</label>
                        </div>
                    </div>
                </div>

                <div class="continue-button">
                    <button>Cadastrar</button>
                </div>
                
            </form>
        </div>
    </div>
    
</body>

</html>