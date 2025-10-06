-- ========= CRIAÇÃO DAS TABELAS =========
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    user_name VARCHAR(40) NOT NULL,
    email VARCHAR(200) NOT NULL,
    password VARCHAR(100) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP 
);

CREATE TABLE folders (
    id SERIAL PRIMARY KEY,
    id_user INT NOT NULL,
    folder_name VARCHAR(25) NOT NULL,
    folder_color VARCHAR(9) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES users(id)
);

CREATE TABLE tags (
    id SERIAL PRIMARY KEY,
    id_user INT NOT NULL,
    tag_name VARCHAR(20),
    FOREIGN KEY (id_user) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE colors (
    id SERIAL PRIMARY KEY,
    id_user INT NOT NULL,
    id_folder INT,
    color_name VARCHAR(20),
    hex VARCHAR(9) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    FOREIGN KEY (id_user) REFERENCES users(id),
    FOREIGN KEY (id_folder) REFERENCES folders(id)
);

CREATE TABLE color_tag (
    id_color INT NOT NULL,
    id_tag INT NOT NULL,
    PRIMARY KEY (id_color, id_tag),
    FOREIGN KEY (id_color) REFERENCES colors(id) ON DELETE CASCADE,
    FOREIGN KEY (id_tag) REFERENCES tags(id) ON DELETE CASCADE
);

-- ========= INSERÇÃO DE DADOS =========

-- 1. Usuários
INSERT INTO users (name, user_name, email, password) VALUES
('Ana Clara', 'anaclara', 'ana.clara@email.com', 'senhaHash123'),
('Bruno Costa', 'brunoc', 'bruno.costa@email.com', 'senhaHash456'),
('Carlos Dias', 'carlosd', 'carlos.dias@email.com', 'senhaHash789');

-- 2. Pastas
INSERT INTO folders (id_user, folder_name, folder_color) VALUES
(1, 'Projeto Aurora', '#8A2BE2'),
(1, 'Inspirações Web', '#4682B4'),
(2, 'Paletas App Mobile', '#32CD32'),
(2, 'Gradientes', '#FF4500'),
(3, 'Cores Flat UI', '#696969');

-- 3. Cores
INSERT INTO colors (id_user, id_folder, color_name, hex) VALUES
-- Cores da Ana (user 1)
(1, 1, 'primary-color', '#C379F6'),      -- id_color: 1
(1, 1, 'secondary-dark', '#4A4E8A'),     -- id_color: 2
(1, 2, 'btn-primary', '#007BFF'),        -- id_color: 3
(1, 2, 'btn-success', '#28A745'),        -- id_color: 4
(1, NULL, NULL, '#DC3545'),              -- id_color: 5 (Sem pasta)
-- Cores do Bruno (user 2)
(2, 3, 'app-primary', '#00B894'),        -- id_color: 6
(2, 3, 'app-background', '#F5F5F5'),     -- id_color: 7
(2, 4, 'gradient-start', '#FD7E14'),      -- id_color: 8
(2, 4, 'gradient-end', '#E83E8C'),        -- id_color: 9
(2, NULL, NULL, '#FFC107'),              -- id_color: 10 (Sem pasta)
(2, NULL, NULL, '#FFFFFF'),              -- id_color: 11 (Sem pasta)
-- Cores do Carlos (user 3)
(3, 5, 'flat-blue', '#3498DB'),          -- id_color: 12
(3, 5, 'flat-green', '#2ECC71'),          -- id_color: 13
(3, 5, 'flat-red', '#E74C3C'),            -- id_color: 14
(3, NULL, NULL, '#34495E'),              -- id_color: 15 (Sem pasta)
(3, NULL, NULL, '#2C3E50');              -- id_color: 16 (Sem pasta)

-- 4. Tags (agora específicas por usuário)
INSERT INTO tags (id_user, tag_name) VALUES
-- Tags da Ana (user 1)
(1, 'erro'),                             -- id_tag: 1
(1, 'quente'),                            -- id_tag: 2
(1, 'web'),                              -- id_tag: 3
-- Tags do Bruno (user 2)
(2, 'aviso'),                             -- id_tag: 4
(2, 'quente'),                            -- id_tag: 5
(2, 'claro'),                             -- id_tag: 6
(2, 'ui/ux'),                             -- id_tag: 7
-- Tags do Carlos (user 3)
(3, 'escuro'),                            -- id_tag: 8
(3, 'frio'),                              -- id_tag: 9
(3, 'ui/ux');                             -- id_tag: 10

-- 5. Associação Cor-Tag
INSERT INTO color_tag (id_color, id_tag) VALUES
-- Cor da Ana #DC3545 (id_color 5) com suas tags "erro" (id 1) e "quente" (id 2)
(5, 1), (5, 2),
-- Cor do Bruno #FFC107 (id_color 10) com suas tags "aviso" (id 4) e "quente" (id 5)
(10, 4), (10, 5),
-- Cor do Bruno #FFFFFF (id_color 11) com sua tag "claro" (id 6)
(11, 6),
-- Cor do Carlos #34495E (id_color 15) com sua tag "escuro" (id 8)
(15, 8),
-- Cor do Carlos #2C3E50 (id_color 16) com suas tags "escuro" (id 8) e "frio" (id 9)
(16, 8), (16, 9);


--QUESTÕES:

--1. Liste o nome e o código hexadecimal de todas as cores que pertencem à pasta 'Projeto Aurora' da usuária 'Ana Clara'.
SELECT color_name, hex
FROM colors AS c
JOIN folders AS f on c.id_folder = f.id
JOIN users AS u on c.id_user = u.id
WHERE f.folder_name = 'Projeto Aurora' AND u.name = 'Ana Clara';

--2. Exiba o código hexadecimal de todas as cores que o usuário 'Bruno Costa' salvou, mas que não estão associadas a nenhuma pasta.
SELECT hex
FROM colors AS c
JOIN users AS u on c.id_user = u.id
WHERE u.name = 'Bruno Costa' AND id_folder IS NULL;

--3. Apresente o código hexadecimal de todas as cores que pertencem ao usuário 'Carlos Dias' e que foram etiquetadas com a tag 'escuro'.
SELECT c.hex, t.tag_name, u.name AS user_name
FROM color_tag AS ct
JOIN colors AS c on ct.id_color = c.id
JOIN tags AS t ON ct.id_tag = t.id
JOIN users AS U on c.id_user = u.id
WHERE t.tag_name = 'escuro' AND u.name = 'Carlos Dias';


--4. Conte quantas cores cada usuário possui no total. O resultado deve exibir o nome do usuário e a sua respectiva quantidade de cores, ordenado da maior para a menor quantidade.
SELECT users.id, users.name, COUNT(colors.id) AS qtd_cores
FROM users
LEFT JOIN colors on users.id = colors.id_user
GROUP BY users.id
ORDER BY qtd_cores DESC;

--5. Qual é a tag mais utilizada na plataforma e quantas vezes ela foi associada a uma cor? A resposta deve mostrar o nome da tag e a contagem total de seu uso.
SELECT tags.tag_name, COUNT(ct.id_tag) AS vezes_utilizada
FROM color_tag AS ct
JOIN tags on ct.id_tag = tags.id
GROUP BY tags.tag_name
ORDER BY vezes_utilizada DESC
LIMIT 1;
