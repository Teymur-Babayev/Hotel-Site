<ul class="pagination justify-content-center primary-theme">
<?php
    $_vet = explode("/", $_SERVER["REQUEST_URI"]);
    $_arquivo = $_vet[count($_vet)-1];

    // Definindo a URL base diretamente
    $_baseURL = "https://www.imoveisroberta.com.br/imoveis/1/venda";

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

    if ($_pagina > 1) {
        $_prevPage = $_pagina - 1;
        $_primeira = "<li class='page-item'>
                        <a class='page-link' href='".$_baseURL."/pagina/$_prevPage' rel='prev' aria-label='Previous'>
                            <span aria-hidden='true'><i class='fa fa-chevron-left'></i></span>
                        </a>
                      </li>";
        echo $_primeira;
    }

    for ($_i = $_ini; $_i <= $_fim; $_i++) {
        if ($_i == $_pagina) {
            echo "<li class='page-item active'>
                      <span class='page-link'>
                          $_pagina <span class='sr-only'>(atual)</span>
                      </span>
                  </li>";
        } else {
            echo "<li class='page-item'>
                      <a class='page-link' href='".$_baseURL."/pagina/".$_i."'>
                          $_i
                      </a>
                  </li>";
        }
    }

    if ($_pagina < $_totalPaginas) {
        $_nextPage = $_pagina + 1;
        $_ultima = "<li class='page-item'>
                        <a class='page-link' href='".$_baseURL."/pagina/$_nextPage' rel='next' aria-label='Next'>
                            <span aria-hidden='true'><i class='fa fa-chevron-right'></i></span>
                        </a>
                    </li>";
        echo $_ultima;
    }
?>
</ul>