# Aplicação para consultar o clima nas cidades brasileiras

Essa aplicação vai permitir que você consulte os dados climáticos de uma cidade específica, consulte o histórico das suas pesquisas e compare o clima entre duas cidades.

Para desenvolver essa aplicação foram usadas as seguintes tecnologias: PHP, JavaScript, HTML, CSS, Bootstrap, JQuery, MySQL e Laravel.
### Bootstrap
Bootstrap é um facilitador na criação de templates. Ele permite que o desenvolvedor economize tempo e foque mais tempo em outros detalhes da aplicação.
Para aplicações com curto prazo de entrega (como nesse caso), o Bootstrap é uma ótima opção.

### JQuery
JQuery foi escolhido para essa aplicação pois facilita o gerenciamento dos elementos HTML (alteração do valor nos inputs, alteração do estilo, visualização/ocultação do elemento e etc.). Além disso o JQuery foi usado nesse projeto para fazer requisições ao Laravel através do AJAX.

### DataTable
A biblioteca DataTable foi utilizada para criar a única tabela da aplicação. Nesse caso a DataTable é uma opção melhor comparada ao Bootstrap, pois disponibiliza recursos como ordenação de colunas, consulta dos registros e paginação.

### Laravel
Utilizei o framework Laravel, implementando as Routes, Controllers, Views e Migrations seguindo o padrão da arquitetura MVC.
Para facilitar e simplificar a configuração do ambiente de desenvolvimento, utilizei a ferramenta Laravel Sail (que utiliza Docker).

#### - Cliente HTTP
Para fazer requisições através do Laravel utilizei o Cliente HTTP, que facilita a interação com APIs.

#### - Adapter
Utilizei um padrão de projeto estrutural chamado Adapter para poder adaptar para a aplicação os campos vindos da requisição da API de clima.

#### - MySQL
O banco de dados escolhido foi o MySQL pois é fácil de configurar, é compatível com o Laravel, tem alto desempenho em leitura e escrita e possui uma comunidade grande.

# APLICAÇÃO NA PRÁTICA

![Aplicação-Clima](https://github.com/user-attachments/assets/c85a4c5b-91c7-423a-b78e-ba1d8e4c838d)

