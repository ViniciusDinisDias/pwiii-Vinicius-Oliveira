# 🚀 Guia Passo a Passo — Criando um Projeto Spring Boot do Zero

**Disciplina:** Programação Web
**Curso:** Ensino Técnico em Desenvolvimento de Sistemas (DS)

Este documento é um guia completo e explicativo para criação de um projeto **Spring Boot** em Java, mostrando três formas diferentes de fazer isso:

1. 🌐 Pelo site oficial **Spring Initializr**
2. 💻 Diretamente pelo **IntelliJ IDEA**
3. 🧩 Diretamente pelo **VS Code**

---

## 📋 Sumário

- [Pré-requisitos](#-pré-requisitos)
- [Parte 1 — Criando o projeto pelo site (Spring Initializr)](#parte-1--criando-o-projeto-pelo-site-spring-initializr)
- [Parte 2 — Criando o projeto direto pelo IntelliJ IDEA](#parte-2--criando-o-projeto-direto-pelo-intellij-idea)
- [Parte 3 — Criando o projeto direto pelo VS Code](#parte-3--criando-o-projeto-direto-pelo-vs-code)
- [Configurando o application.properties](#-configurando-o-applicationproperties)
- [Entendendo a estrutura do projeto](#-entendendo-a-estrutura-do-projeto)
- [Executando a aplicação](#-executando-a-aplicação)
- [Testando o primeiro endpoint](#-testando-o-primeiro-endpoint)
- [Problemas comuns](#-problemas-comuns)

---

## ✅ Pré-requisitos

Antes de começar, tenha instalado em sua máquina:

| Ferramenta | Versão recomendada | Link |
|---|---|---|
| JDK (Java Development Kit) | 17 ou 21 (LTS) | https://adoptium.net |
| Maven | 3.9+ (opcional, o wrapper `mvnw` já resolve) | https://maven.apache.org |
| IntelliJ IDEA (Community ou Ultimate) | Última versão | https://www.jetbrains.com/idea |
| VS Code | Última versão | https://code.visualstudio.com |
| Git | Última versão | https://git-scm.com |

Para conferir se o Java está instalado corretamente, abra o terminal e digite:

```bash
java -version
```

Você deve ver algo como:

```
openjdk version "17.0.10" 2024-01-16
```

---

## Parte 1 — Criando o projeto pelo site (Spring Initializr)

O **Spring Initializr** é a ferramenta oficial da Spring para gerar a estrutura inicial (boilerplate) de um projeto Spring Boot, sem precisar configurar nada manualmente.

### Passo 1 — Acesse o site

Abra o navegador e acesse:

🔗 https://start.spring.io

### Passo 2 — Configure o projeto

Preencha os campos principais:

| Campo | Valor sugerido |
|---|---|
| **Project** | Maven |
| **Language** | Java |
| **Spring Boot** | Última versão estável (evite versões `SNAPSHOT`) |
| **Group** | `com.seunome.materia` (ex: `com.aluno.programacaoweb`) |
| **Artifact** | nome do seu projeto (ex: `apirest-alunos`) |
| **Name** | igual ao Artifact |
| **Description** | uma breve descrição do projeto |
| **Package name** | gerado automaticamente a partir do Group + Artifact |
| **Packaging** | Jar |
| **Java** | 17 ou 21 |

### Passo 3 — Adicione as dependências (Add Dependencies)

Clique no botão **"ADD DEPENDENCIES"** e adicione as bibliotecas que o projeto vai usar. Para uma API REST básica com banco de dados, as mais comuns são:

- **Spring Web** → cria APIs REST e aplicações web (Tomcat embutido)
- **Spring Data JPA** → integração com banco de dados via ORM (Hibernate)
- **Spring Boot DevTools** → recarregamento automático durante o desenvolvimento
- **Validation** → validação de dados com anotações (`@NotNull`, `@Email`, etc.)
- **H2 Database** (banco em memória, ótimo para testes) **ou** **MySQL Driver** / **PostgreSQL Driver** (bancos reais)
- **Lombok** (opcional) → reduz código repetitivo (getters, setters, construtores)

### Passo 4 — Gere o projeto

Clique em **"GENERATE"** (ou `Ctrl + Enter`). O site fará o download de um arquivo `.zip` com o projeto pronto.

### Passo 5 — Extraia e abra o projeto

1. Extraia o `.zip` em uma pasta de sua preferência.
2. Abra essa pasta na sua IDE de preferência (IntelliJ ou VS Code — veja as próximas seções).

---

## Parte 2 — Criando o projeto direto pelo IntelliJ IDEA

O IntelliJ possui integração nativa com o Spring Initializr, então não é necessário passar pelo site.

### Passo 1 — Novo projeto

Abra o IntelliJ e clique em **New Project**.

### Passo 2 — Selecione "Spring Boot" (ou "Spring Initializr")

No menu lateral esquerdo, selecione **Spring Boot**.

> ⚠️ Na versão Community do IntelliJ esse assistente pode não aparecer nativamente — nesse caso, use o plugin oficial **"Spring Boot Helper"** ou siga pela Parte 1 (site) e apenas abra a pasta gerada.

Preencha os mesmos campos do Spring Initializr:

- Name
- Location
- Language: Java
- Type: Maven
- Group / Artifact
- Java SDK (versão instalada)
- Java version
- Packaging: Jar

Clique em **Next**.

### Passo 3 — Escolha as dependências

Assim como no site, marque as dependências desejadas (Spring Web, Spring Data JPA, H2, etc.) organizadas por categoria (Web, SQL, Developer Tools...).

Clique em **Create**.

### Passo 4 — Aguarde o download das dependências

O IntelliJ vai baixar o Maven Wrapper e as dependências configuradas. Acompanhe o progresso na barra inferior direita ("Indexing" / "Downloading").

### Passo 5 — Estrutura pronta

Após a indexação, o projeto já aparece pronto no painel **Project**, com a classe principal (`Application.java` ou `NomeDoProjetoApplication.java`) já criada.

---

## Parte 3 — Criando o projeto direto pelo VS Code

O VS Code não gera projetos Spring Boot nativamente — é necessário instalar extensões específicas.

### Passo 1 — Instale o Extension Pack for Java

Vá até a aba de **Extensions** (`Ctrl+Shift+X`) e instale:

- **Extension Pack for Java** (da Microsoft)
- **Spring Boot Extension Pack** (da Pivotal/VMware) — inclui:
  - Spring Initializr Java Support
  - Spring Boot Tools
  - Spring Boot Dashboard

### Passo 2 — Abra a paleta de comandos

Pressione `Ctrl+Shift+P` (ou `Cmd+Shift+P` no Mac) para abrir a **Command Palette** e digite:

```
Spring Initializr: Create a Maven Project
```

### Passo 3 — Siga o assistente

O VS Code vai perguntar, em sequência (na parte superior da tela):

1. **Linguagem**: Java
2. **Versão do Spring Boot**: escolha a última estável
3. **Group Id**: ex. `com.aluno.programacaoweb`
4. **Artifact Id**: ex. `apirest-alunos`
5. **Packaging type**: Jar
6. **Java version**: 17 ou 21
7. **Dependências**: marque com espaço (Spring Web, Spring Data JPA, H2, etc.) e confirme com Enter

### Passo 4 — Escolha a pasta de destino

Selecione a pasta onde o projeto será salvo. O VS Code vai gerar os arquivos e perguntar se deseja abrir o projeto — clique em **Open**.

### Passo 5 — Aguarde a configuração do workspace

O VS Code vai indexar o projeto Java automaticamente (ícone de carregamento na barra inferior). Quando terminar, você verá o projeto completo no **Explorer**.

---

## ⚙️ Configurando o application.properties

Independente de como o projeto foi criado, o arquivo de configurações fica em:

```
src/main/resources/application.properties
```

Exemplo básico de configuração (usando H2 em memória):

```properties
# Nome da aplicação
spring.application.name=apirest-alunos

# Porta do servidor (padrão é 8080)
server.port=8080

# Configurações do banco H2 em memória
spring.datasource.url=jdbc:h2:mem:testdb
spring.datasource.driver-class-name=org.h2.Driver
spring.datasource.username=sa
spring.datasource.password=

# Console web do H2 (acessível em /h2-console)
spring.h2.console.enabled=true

# Configurações do JPA/Hibernate
spring.jpa.database-platform=org.hibernate.dialect.H2Dialect
spring.jpa.hibernate.ddl-auto=update
spring.jpa.show-sql=true
```

Se preferir usar **YAML** em vez de `.properties`, crie um `application.yml` com o mesmo conteúdo em formato YAML — não use os dois arquivos ao mesmo tempo.

Exemplo com MySQL (caso o banco não seja em memória):

```properties
spring.datasource.url=jdbc:mysql://localhost:3306/nome_do_banco
spring.datasource.username=root
spring.datasource.password=sua_senha
spring.jpa.hibernate.ddl-auto=update
spring.jpa.properties.hibernate.dialect=org.hibernate.dialect.MySQLDialect
```

---

## 📁 Entendendo a estrutura do projeto

```
apirest-alunos/
├── src/
│   ├── main/
│   │   ├── java/com/aluno/programacaoweb/
│   │   │   └── ApirestAlunosApplication.java   # Classe principal (main)
│   │   └── resources/
│   │       ├── application.properties          # Configurações
│   │       ├── static/                         # Arquivos estáticos (html, css, js)
│   │       └── templates/                      # Templates (Thymeleaf, se usado)
│   └── test/
│       └── java/com/aluno/programacaoweb/
│           └── ApirestAlunosApplicationTests.java
├── pom.xml                                      # Dependências e configurações do Maven
└── mvnw / mvnw.cmd                              # Maven Wrapper (não precisa instalar Maven)
```

---

## ▶️ Executando a aplicação

### Pelo IntelliJ
Clique no ícone de **play verde ▶️** ao lado da classe principal (a que contém `public static void main`).

### Pelo VS Code
Clique em **Run** logo acima do método `main()`, ou use o painel **Spring Boot Dashboard** (ícone de folha na barra lateral) e clique em play sobre o projeto.

### Pelo terminal (funciona em qualquer IDE)

```bash
./mvnw spring-boot:run
```

No Windows:

```bash
mvnw.cmd spring-boot:run
```

Se tudo estiver certo, você verá no console algo como:

```
Tomcat started on port(s): 8080 (http)
Started ApirestAlunosApplication in 2.345 seconds
```

---

## 🧪 Testando o primeiro endpoint

Crie uma classe de controller simples para testar se a aplicação está no ar:

```java
package com.aluno.programacaoweb;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class HelloController {

    @GetMapping("/")
    public String helloWorld() {
        return "Aplicação Spring Boot funcionando com sucesso!";
    }
}
```

Com a aplicação rodando, acesse no navegador:

```
http://localhost:8080/
```

Você deve ver a mensagem retornada pelo endpoint.

---

## ⚠️ Problemas comuns

| Problema | Causa provável | Solução |
|---|---|---|
| `Port 8080 already in use` | Outra aplicação já está usando a porta | Altere `server.port` no `application.properties` |
| Erro de versão do Java | JDK instalado diferente do configurado no projeto | Ajuste em File > Project Structure (IntelliJ) ou `java.configuration.runtimes` (VS Code) |
| Dependência não baixa | Sem conexão ou repositório Maven bloqueado | Verifique a internet e o proxy/firewall |
| `mvnw: Permission denied` (Linux/Mac) | Arquivo sem permissão de execução | Rode `chmod +x mvnw` |

---

## 📚 Referências

- Spring Initializr: https://start.spring.io
- Documentação oficial do Spring Boot: https://docs.spring.io/spring-boot/index.html
- Extension Pack for Java (VS Code): https://marketplace.visualstudio.com/items?itemName=vscjava.vscode-java-pack
- Spring Boot Extension Pack (VS Code): https://marketplace.visualstudio.com/items?itemName=vmware.vscode-boot-dev-pack

---

*Documento elaborado para fins didáticos — Programação Web, Ensino Técnico em DS.*

---

[⬅️ Voltar ao índice](../README.md)
