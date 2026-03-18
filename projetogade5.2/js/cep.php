<!-- CEP -->
<script>
    function formatarCEP(input) {
        // Remove todos os caracteres não numéricos
        let cep = input.value.replace(/\D/g, '');

        // Aplica a máscara: XX.XXX-XXX
        if (cep.length > 5) {
            cep = cep.slice(0, 2) + '.' + cep.slice(2, 5) + '-' + cep.slice(5, 8);
        } else if (cep.length > 2) {
            cep = cep.slice(0, 2) + '.' + cep.slice(2);
        }

        // Atualiza o valor do campo de entrada com o CEP formatado
        input.value = cep;
    }
</script>
