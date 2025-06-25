-- Script para popular o banco de dados

-- Inserir dados na tabela 'fornecedor'
INSERT INTO fornecedor (nome, contato, documento) VALUES
('Fornecedor A Vinhos S.A.', 'fornecedorA@email.com', '11.222.333/0001-44'),
('Distribuidora B Bebidas Ltda.', 'contatoB@email.com', '44.555.666/0001-77'),
('Importadora C de Vinhos', 'importadoraC@email.com', '77.888.999/0001-10');

-- Inserir dados na tabela 'tipo_vinho' com tipos mais simples
INSERT INTO tipo_vinho (descricao) VALUES
('Tinto'),
('Branco'),
('Rose');

-- Inserir dados na tabela 'bodega'
INSERT INTO bodega (nome, origem) VALUES
('Vinícola Aurora', 'Brasil'),
('Casillero del Diablo', 'Chile'),
('Château Lafite Rothschild', 'França'),
('Catena Zapata', 'Argentina'),
('Kendall-Jackson', 'Estados Unidos');

-- Inserir dados na tabela 'vinho'
-- Certifique-se de que os id_tipo_vinho e id_bodega existam nas tabelas respectivas
-- Ajustado para os novos tipos de vinho: 1=Tinto, 2=Branco, 3=Rose
INSERT INTO vinho (nome, safra, preco, teor, qtd_estoque, id_tipo_vinho, id_bodega) VALUES
('Vinho Tinto Cabernet Sauvignon', 2020, 75.50, 13.5, 150, 1, 2), -- Tinto, Casillero del Diablo
('Vinho Branco Chardonnay', 2022, 55.00, 12.0, 200, 2, 5), -- Branco, Kendall-Jackson
('Vinho Rosé Syrah', 2021, 60.00, 12.5, 100, 3, 1), -- Rose, Vinícola Aurora
('Malbec Fino', 2018, 120.00, 14.0, 70, 1, 4), -- Tinto, Catena Zapata
('Bordeaux Grand Cru Classé', 2017, 850.00, 13.0, 20, 1, 3), -- Tinto, Château Lafite Rothschild
('Sauvignon Blanc Refrescante', 2023, 48.00, 11.0, 180, 2, 1); -- Branco, Vinícola Aurora

-- Inserir dados na tabela 'fornecedor_vinho'
-- Relaciona fornecedores a vinhos existentes
INSERT INTO fornecedor_vinho (id_fornecedor, id_vinho) VALUES
(1, 1), -- Fornecedor A fornece Vinho Tinto Cabernet Sauvignon
(1, 6), -- Fornecedor A fornece Sauvignon Blanc Refrescante
(2, 2), -- Distribuidora B fornece Vinho Branco Chardonnay
(3, 3), -- Importadora C fornece Vinho Rosé Syrah
(2, 4), -- Distribuidora B fornece Malbec Fino
(3, 5); -- Importadora C fornece Bordeaux Grand Cru Classé

-- Inserir dados na tabela 'usuario' com os nomes solicitados
-- Senhas em texto claro (para exemplo). Em um ambiente real, use hashes.
INSERT INTO usuario (nome, admin, senha) VALUES
('admin_user', 1, 'admin123'),
('joao', 0, 'senha_joao'),
('eduardo', 0, 'senha_eduardo'),
('andre', 0, 'senha_andre'),
('andrey', 0, 'senha_andrey');

-- Inserir dados na tabela 'movimento_produto'
-- Movimentações de estoque com datas atualizadas
INSERT INTO movimento_produto (id_vinho, data_movimento, qtd_movimento, fl_movimento) VALUES
(1, '2025-06-01', 10, 1), -- Entrada de 10 unidades do Vinho Tinto Cabernet Sauvignon
(2, '2025-06-05', 5, 1),  -- Entrada de 5 unidades do Vinho Branco Chardonnay
(1, '2025-06-10', 3, 0),  -- Saída de 3 unidades do Vinho Tinto Cabernet Sauvignon
(3, '2025-06-15', 8, 1),  -- Entrada de 8 unidades do Vinho Rosé Syrah
(4, '2025-06-20', 2, 0);  -- Saída de 2 unidades do Malbec Fino