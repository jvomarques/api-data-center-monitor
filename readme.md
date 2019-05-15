# API RESTful

API escrita em PHP/Laravel 5.4 seguindo o padrão arquitetural Repository Pattern, autênticação por meio de tokens JWT, autorização via middlewares, RateLimit implementado, tempo de expiração do token padrão de 60 minutos.

Os retornos **JSON** seguem a especificação **JSend: https://labs.omniti.com/labs/jsend**, CORS implementado.

---
####  Autenticação do usuário
`POST`
```sh
http://localhost:8000/api/v1/auth
```

**BODY**

**email**   exemplo@email.com

**password**    **********

---

## Usuários
#### Criar um novo usuário 

`POST`
```sh
http://localhost:8000/api/v1/users
```

**HEADERS:**

**Authorization Bearer + token**
**Content-Type**   application/json

**BODY:**

**nome**
**email**   
**cpf** 
**senha**
**logradouro**
**complemento**
**bairro**
**numero**
**cidade**
**cep**
**uf**

#### Mostrar dados de um usuário

`GET`
```sh
http://localhost:8000/api/v1/users/{id_user}
```

**HEADERS:**

**Authorization Bearer + token**

### Atualizar dados de um usuário
`PUT`

```sh
http://localhost:8000/api/v1/users/{id_user}
```

**HEADERS:**

**Authorization Bearer + token**
**Content-Type**   application/json

**BODY:**

**nome**
**email**   
**cpf** 
**senha**
**logradouro**
**complemento**
**bairro**
**numero**
**cidade**
**cep**
**uf**

### Deletar um usuário
`DELETE`

```sh
http://localhost:8000/api/v1/users/{id_user}
```

**HEADERS:**

**Authorization Bearer + token**
