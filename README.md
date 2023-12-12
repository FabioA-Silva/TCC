# TCC
Equipe:
- Gabriel Balancieri Perassoli  
- Fábio Augusto Gomes Barbosa da Silva
- Norbis Yanina Arvelo Martinez
  
<img src="Foto_Readme/logosistema.png" alt="Logo do Projeto">

Esse é o TCC do curso Técnico de Desenvolvimento de Sistemas da turma de 2022 do SENAI CTM-Maringá.

# Particularidades do Projeto:

- É necessário ter cadastrado ao menos 1 Procedimento Clínico, 1 Odontólogo, 1 Paciente para que o agendamento de consulta funcione corretamente.  

- Ao criar uma nova conta e acesso de Odontólogo o nome de usuário deve ser igual ao nome do odontólogo registrado no sistema.  

- Nenhum dos calendários permite edição de dados, caso necessário modificar alguma consulta procure-a na Lista de Consultas e clique no botão esquerdo da coluna de Ações.  

# Instruções para executar o projeto:

- O banco de dados será configurado localmente por meio dos módulos de Apache e MySQL do XAMPP. Baixe a versão mais recente do XAMPP para Windows através do link https://www.apachefriends.org/pt_br/index.html e instale-o nos computadores que utilizarão o sistema.

- Baixe o arquivo ZIP do sistema de clínica odontológica, na pasta de Download clique nele com botão direito e escolha a opção “Extrair Tudo…”, procure pela pasta xampp/htdocs e clique em “Extrair”. Dentro de htdocs , renomeie a pasta que foi extraída para “TCC”, copie todos arquivos dentro da pasta Código e cole-os na pasta anterior juntamente a Código e Documentação, em seguida delete a pasta Código.

- Execute o XAMPP e marque as opções Apache e MySQL. Clique no botão Admin correspondente ao módulo do MySQL para abrir a página http://localhost/phpmyadmin/ no seu navegador principal. É possível acessar a página pelo navegador em si, sem a necessidade de clicar no botão mas ela só estará disponível se ambas as opções acima estiverem marcadas. 	Clique no botão Novo no menu à esquerda da página para abrir a tela de criação da nova database, o nome banco de dados precisa ser “tcc”, certifique-se que o nome está de acordo e clique em Criar. Uma nova database com nome tcc irá aparecer nesse menu, clique nela e vá em Importar, clique no botão “Escolher arquivo” e em seguida “Mostrar todos arquivos..”, vá na pasta em que os arquivos do sistema foram extraídos e procure por “tcc.sql”. Em seguida clique no botão “Importar” na parte inferior da página. Feito isso o banco de dados está instalado na máquinha.

- O sistema funciona enquanto o XAMPP estiver funcionando e com o Apache e MySQL selecionados então certique-se de que tudo está de acordo antes de acessar o site.   
- O link de acesso à página WEB será http://localhost/TCC/.

# Usuários do Sistema:

- Usuários já regitrados no sistema:

Odontólogo ------- 
- Usuário: Adriana Helson
- Senha:123
  
Secretária -------
- Usuário: Cleusa              
- Senha: 123
    
Admin ------- 
- Usuário: admin
- Senha:123
