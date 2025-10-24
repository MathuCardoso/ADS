-- Active: 1755815881132@@127.0.0.1@5432@concessionaria
CREATE DATABASE concessionaria;

CREATE TABLE marca(
    id SERIAL PRIMARY KEY,
    nome_marca VARCHAR(50) NOT NULL
);

CREATE TABLE modelo(
    id SERIAL PRIMARY KEY,
    nome_modelo VARCHAR(50) NOT NULL,
    id_marca INT NOT NULL,
    FOREIGN KEY (id_marca) REFERENCES marca(id)
);

CREATE TABLE veiculo(
    id SERIAL PRIMARY KEY,
    numero_chassi VARCHAR(17) NOT NULL,
    numero_placa CHAR(7) NOT NULL,
    ano_fabricacao INT NOT NULL,
    cor VARCHAR(25) NOT NULL,
    quilometragem INT NOT NULL,
    id_modelo INT NOT NULL,
    FOREIGN KEY (id_modelo) REFERENCES modelo(id)
);

CREATE TABLE conjuge(
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf CHAR(11) UNIQUE NOT NULL,
    telefone VARCHAR(11) NOT NULL
);

CREATE TABLE comprador(
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf CHAR(11) UNIQUE NOT NULL,
    estado_civil VARCHAR(10) NOT NULL CHECK (estado_civil IN ('CASADO', 'SOLTEIRO')),
    id_conjuge INT NULL,
    FOREIGN KEY (id_conjuge) REFERENCES conjuge(id)
);

INSERT INTO conjuge (nome, cpf, telefone) 
VALUES('Elisangela Cardoso', '00712345678', '45998091004');
INSERT INTO comprador(nome, cpf, estado_civil, id_conjuge)
VALUES('Eugenio Cardoso', '49453130915', 'CASADO', 16);
INSERT INTO comprador(nome, cpf, estado_civil)
VALUES('Julia Vitória', '12345678910', 'SOLTEIRO')


CREATE TABLE corretor(
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    numero_matricula CHAR(8) UNIQUE NOT NULL,
    data_admissao DATE NOT NULL
);

CREATE TABLE venda(
    id SERIAL PRIMARY KEY,
    data_venda DATE NOT NULL,
    valor_venda FLOAT NOT NULL,
    valor_comissao FLOAT NOT NULL,
    id_comprador INT NOT NULL,
    id_corretor INT NOT NULL,
    id_veiculo INT NOT NULL,
    FOREIGN KEY (id_comprador) REFERENCES comprador(id),
    FOREIGN KEY (id_corretor) REFERENCES corretor(id),
    FOREIGN KEY (id_veiculo) REFERENCES veiculo(id)
);

--1. - Listar todas as vendas a partir de 2025-01-01, ordenadas do maior para o menor valor.
SELECT * FROM venda WHERE data_venda > '2025-01-01' ORDER BY valor_venda DESC;

--2. - Listar veículos vendidos com marca e modelo.
SELECT * FROM modelo 
JOIN marca on marca.id = modelo.id_marca;

--3. Quantidade de veículos vendidos por marca
SELECT m.nome_marca AS marca, COUNT(v.id) AS quantidade_vendida
FROM venda AS v
JOIN veiculo AS ve USING(v.id_veiculo)
JOIN modelo AS mo USING(ve.id_modelo)
JOIN marca AS m USING(mo.id_marca)
GROUP BY m.nome_marca
ORDER BY quantidade_vendida DESC;   

--4. Valor total vendido por corretor, mostrando apenas quem vendeu mais de 100.000
SELECT 
venda.id_corretor,
venda.valor_venda 
FROM venda 
JOIN corretor on venda.id_corretor = corretor.id
WHERE valor_venda >= 100000.00
ORDER BY valor_venda DESC;


--5. Valor médio por marca, do maior para o menor.
SELECT AVG(venda.valor_venda) AS media, marca.nome_marca
FROM venda
JOIN veiculo on venda.id_veiculo = veiculo.id
JOIN modelo on veiculo.id_modelo = modelo.id
JOIN marca on modelo.id_marca = marca.id
GROUP BY marca.nome_marca
ORDER BY media;

--6. Corretores com número de vendas (apenas quem tem pelo menos 3 vendas)
SELECT COUNT(venda.id_corretor) as vendas, corretor.id 
FROM venda
JOIN corretor ON venda.id_corretor = corretor.id
GROUP BY corretor.id
HAVING COUNT(venda.id_corretor) > 3
ORDER BY corretor.nome;

--7. Compradores que já realizaram compra acima de 80.000.
SELECT id_comprador, comprador.nome, valor_venda
FROM venda
JOIN comprador on id_comprador = comprador.id
WHERE valor_venda > 80000;

--8. Quantidade de vendas por mês (ano-mês), do mais recente ao mais antigo.
SELECT COUNT(valor_venda), 
EXTRACT(MONTH FROM data_venda) as mes_venda,
EXTRACT(YEAR FROM data_venda) as ano_venda
FROM venda
GROUP BY ano_venda, mes_venda
ORDER BY ano_venda DESC, mes_venda DESC;

--9. Quantidade de vendas por mês (ano-mês), do mais recente ao mais antigo.
SELECT id_veiculo, COUNT(id_modelo) AS qtd_vendas, modelo.nome_modelo
FROM venda
JOIN veiculo on id_veiculo = veiculo.id
JOIN modelo on veiculo.id_modelo = modelo.id
GROUP BY id_veiculo, modelo.nome_modelo
ORDER BY qtd_vendas DESC
LIMIT 5;

--10. Média de quilometragem dos veículos vendidos por marca (mostrar só quem tem média > 50.000).
SELECT ROUND(AVG(quilometragem), 2) AS media_quilometragem,
       marca.nome_marca
FROM veiculo
JOIN modelo ON id_modelo = modelo.id
JOIN marca ON id_marca = marca.id
GROUP BY marca.nome_marca
HAVING ROUND(AVG(veiculo.quilometragem), 2) > 50000
ORDER BY media_quilometragem DESC;

--11. Veículos vendidos em 2024, ordenados por ano de fabricação (mais novos primeiro)
SELECT 
marca.nome_marca || ' - ' ||
modelo.nome_modelo || ' - ' ||
veiculo.ano_fabricacao
FROM veiculo
JOIN modelo on veiculo.id_modelo = modelo.id
JOIN marca on modelo.id_marca = marca.id
WHERE veiculo.ano_fabricacao = 2024
GROUP BY modelo.nome_modelo, marca.nome_marca, veiculo.ano_fabricacao
ORDER BY veiculo.ano_fabricacao

--12. Total de comissão pago por corretor, apenas quem recebeu mais de 10.000 de comissão.
SELECT 
corretor.numero_matricula AS NUMERO_MATRICULA, 
corretor.nome AS NOME_CORRETOR, 
SUM(venda.valor_comissao) AS VALOR_TOTAL_COMISSaO
FROM venda
JOIN corretor on venda.id_corretor = corretor.id
GROUP BY corretor.numero_matricula, corretor.nome
HAVING SUM(venda.valor_comissao) > 10000

--13. Total de comissão pago por corretor, apenas quem recebeu mais de 10.000 de comissão.
SELECT DISTINCT
comprador.nome AS NOME_COMPRADOR,
comprador.estado_civil,
conjuge.nome AS NOME_CONJUGE
FROM venda
JOIN comprador ON venda.id_comprador = comprador.id
JOIN conjuge on comprador.id_conjuge = conjuge.id
GROUP BY NOME_COMPRADOR, comprador.estado_civil, NOME_CONJUGE, id_comprador
HAVING(id_comprador) >= 1


