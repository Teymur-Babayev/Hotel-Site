<ul class="pagination justify-content-center primary-theme">
<?php
    $_vet = explode("/", $_SERVER["REQUEST_URI"]);
    $_arquivo = $_vet[count($_vet)-1];
    
    // Ajustando a base URL para a construção dos links
    $_baseURL = $_linkCompleto . $_linkAdd; // Supondo que estas variáveis formem a URL base correta.

    // Determinando os índices inicial e final das páginas a serem exibidas
    if ($_totalPaginas < $_limitePaginas) {
        $_ini = 1;
        $_fim = $_totalPaginas;
    } else if ($_pagina - (($_limitePaginas - 1) / 2) <= 0) {
        $_ini = 1;
        $_fim = $_limitePaginas;
    } else if ($_totalPaginas - $_pagina < (($_limitePaginas - 1) / 2)) {
        $_ini = $_totalPaginas - ($_limitePaginas - 1);
        $_fim = $_totalPaginas;
    } else {
        $_ini = $_pagina - (($_limitePaginas - 1) / 2);
        $_fim = $_pagina + (($_limitePaginas - 1) / 2);
    }

    // Link para a página anterior, se aplicável
    if ($_pagina > 1) {
        $_prevPage = $_pagina - 1;
        echo "
            <li class='page-item'>
                <a class='page-link' href='$_baseURL/pagina/$_prevPage' rel='prev' aria-label='Página Anterior'>
                    <span aria-hidden='true'><i class='fa fa-chevron-left'></i></span>
                </a>
            </li>
        ";
    }

    // Gerando os links para as páginas
    for ($_i = $_ini; $_i <= $_fim; $_i++) {
        if ($_i == $_pagina) {
            echo "
                <li class='page-item active'>
                    <span class='page-link'>
                        $_i <span class='sr-only'>(atual)</span>
                    </span>
                </li>
            ";
        } else {
            echo "
                <li class='page-item'>
                    <a class='page-link' href='$_baseURL/pagina/$_i'>
                        $_i
                    </a>
                </li>
            ";
        }
    }

    // Link para a próxima página, se aplicável
    if ($_pagina < $_totalPaginas) {
        $_nextPage = $_pagina + 1;
        echo "
            <li class='page-item'>
                <a class='page-link' href='$_baseURL/pagina/$_nextPage' rel='next' aria-label='Próxima Página'>
                    <span aria-hidden='true'><i class='fa fa-chevron-right'></i></span>
                </a>
            </li>
        ";
    }
?>
</ul>