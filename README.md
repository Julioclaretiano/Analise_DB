# Analise_DB - Aplicação Web de Banco de Produtos

Esta é uma aplicação PHP simples para gerenciar um banco de produtos com as seguintes funcionalidades:
- Login de usuário (credenciais fixas)
- Cadastro de produtos (nome, preço, descrição)
- Consulta de produtos com opção de exclusão
- Conexão com banco de dados MySQL (compatível com XAMPP)

## Instruções de Configuração

1. Instale o XAMPP e inicie os serviços Apache e MySQL.
2. Crie um banco de dados MySQL chamado `productdb`.
3. Crie uma tabela chamada `products` com a seguinte estrutura:

```sql
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT
);
```

4. Coloque a pasta `Analise_DB` dentro do diretório `htdocs` do XAMPP.
5. Acesse a aplicação via `http://localhost/Analise_DB/login.php`.
6. Faça login com usuário: `admin` e senha: `admin123`.
7. Use a aplicação para cadastrar, consultar e excluir produtos.

## Observações

- Este é um exemplo básico para fins de aprendizado.
- Para uso em produção, implemente gerenciamento de usuários e medidas de segurança adequadas.
