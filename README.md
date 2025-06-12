# 📦 CRUD com Notificações no Slack

Este projeto é um sistema **CRUD básico** desenvolvido em **PHP puro**, com **MySQL** para o banco de dados e **Bootstrap** no frontend. A cada requisição feita (Create, Read, Update, Delete, Login, Logout), uma **notificação é enviada automaticamente para um canal do Slack**, facilitando o acompanhamento das ações realizadas. 🛰️💬

> ✅ Ótimo para fins didáticos, aprendizado de CRUD com PHP puro e integração com APIs externas (Slack Webhook).

---

## 🗂️ Estrutura de Pastas
  CRUD/
  │
  ├── create.php # Criar novo usuário
  ├── read.php # Listar usuários
  ├── edit.php # Editar dados de um usuário
  ├── delete.php # Deletar um usuário
  ├── login.php # Login com autenticação
  ├── logout.php # Encerrar sessão
  ├── dashboard.php # Interface principal do sistema
  ├── db.php # Conexão com o banco de dados
  ├── slack.php # Integração com Slack via Webhook
  └── README.md # Documentação do projeto


---

## 🚀 Funcionalidades

### ✅ Create (`create.php`)
Permite a criação de um novo usuário informando:
- Nome 🧑
- Email 📧
- Senha 🔐 (criptografada com segurança)

![{57E8E3D7-ABBC-4F73-B9B5-57C61C7B1469}](https://github.com/user-attachments/assets/53ddb42a-f694-43bb-962f-9dda9c572c97)


---

### 📄 Read (`read.php`)
Busca automaticamente todos os usuários cadastrados no banco de dados e exibe de forma simples.

![{5338FDB4-B779-4E31-B663-0675FCDA5902}](https://github.com/user-attachments/assets/05370d88-f5a8-4e3f-b6a8-7b0898dce812)


---

### 📝 Edit (`edit.php`)
Permite editar os dados de um usuário existente:
- É necessário informar o **ID válido**, além de **Nome** e **Email** atualizados.

![{8922CC20-2989-4337-93B2-C7AC3C7F8857}](https://github.com/user-attachments/assets/2730946d-b868-4c57-bef9-54200d4dfa2a)


---

### 🗑️ Delete (`delete.php`)
Remove um usuário da base de dados ao informar um **ID válido**.

![{EA7410C5-96AA-4AF7-9312-3DDCF7435676}](https://github.com/user-attachments/assets/9b868cbf-bd7f-41e7-9892-2cd30da7e911)

---

### 🔐 Login (`login.php`)
Autenticação do usuário com:
- Email
- Senha

Acesso liberado apenas com dados válidos. Após login, redireciona para a dashboard.

![{35BCF643-C819-4F2A-B5C4-D4FCCBC1F4BE}](https://github.com/user-attachments/assets/5fde0d13-e9c6-4700-afb6-e0e5b96d5fc7)

---

### 🧭 Dashboard (`dashboard.php`)
Após login, o usuário é redirecionado para essa interface:
- Boas-vindas ao sistema 👋
- Lista de todos os usuários
- Botão para **criar novo usuário**
- Botão para **logout**

![{EC571DA7-6E3C-4B7C-8073-F2E8A77E6F9F}](https://github.com/user-attachments/assets/75411a2a-7819-4118-95f9-dfa6eedd3ba1)

---

## 📢 Integração com Slack

A cada ação realizada (como criação, exclusão ou edição de usuário), o sistema envia uma **mensagem didática** no canal configurado do Slack.  
Isso permite acompanhar em tempo real o que está acontecendo no sistema. Exemplo de mensagem enviada: "ID: 1 - Nome: Rodrigo - Email: rodrigo@teste.com"

Gostou ?
Acesse o meu Linkedin: https://www.linkedin.com/in/rordrigokweber/
Acesse o meu Github: https://github.com/rkweber05
