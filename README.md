# kristta-Back-end-v1.0-Painel-Admin-PHP
kristta Back-end v1.0 Painel admin feito em PHP

**REQUISITOS**

PHP VERSION - 7.4.33+
(Também é funcional em versões anteriores por conta da baixa complexidade)

Importe a database kristta_old.sql para o mysql e edite o arquivo mode/connection.php nas linhas 15, 16, 17 e 18 conforme a sua configuração:

```if($connectWeb == 0){```
```
    $host = "SEU IP";
    $user = "SEU USUÁRIO DO BANCO DE DADOS";
    $password = "SENHA DO BANCO DE DADOS";
    $db = "NOME DA DATABASE";

    $connect = mysqli_connect ($host, $user, $password, $db) or die ('Falha na conexão com o Banco de Dados. <br> Contate o Administrador.');
    return $connect;
    
}else{
    return $connectWeb;
}

```
Na tabela 'users' inclua ao menos um usuário (A senha utiliza criptografia hash)

Prints login:
![login](https://github.com/RodrigoChantel/kristta-app-admin/assets/87919246/7c8d8ce1-82a5-4040-8711-3dc8d6884b3b)

Prints index:
![index](https://github.com/RodrigoChantel/kristta-app-admin/assets/87919246/3c9b4948-0d66-4cf3-93a3-6c40f7eb64fd)

Prints Criar solicitação:
![requests](https://github.com/RodrigoChantel/kristta-app-admin/assets/87919246/7a330557-f0ea-4ef3-958c-9da4ed808f9f)

Prints Faturas:
![invoices](https://github.com/RodrigoChantel/kristta-app-admin/assets/87919246/56f56ddd-feb7-44ab-b5d8-ce821ccddc56)

Novo User:
![newuser](https://github.com/RodrigoChantel/kristta-app-admin/assets/87919246/d70c29bd-c971-423b-9bd1-b03eca0fb87b)

IMPORTANTE: AS IMAGENS DE MARCAS PRESENTES NO PROJETO NÃO SÃO PARA USO COMERCIAL, POIS TRATAM-SE DE CLIENTES REAIS.
