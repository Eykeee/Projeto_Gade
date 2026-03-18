<!-- CPF -->
<script>
    function formatarCPF(input) {
        // Remove tudo o que não é dígito
        var cpf = input.value.replace(/\D/g, '');

        // Adiciona a formatação no formato XXX.XXX.XXX-XX
        cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
        input.value = cpf;
    }
</script>
