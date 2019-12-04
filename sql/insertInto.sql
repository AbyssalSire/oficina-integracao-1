use bd_aluno_tutor;

## inserção aluno
insert into aluno (alu_ra, alu_nome, alu_senha, alu_celular, alu_email, alu_curso)
values (1640615, 'vanderson', MD5('123456'), 45999229347, 'vandersonv11@hotmail.com', 'engenharia de software'),
	(2014625, 'ronaldo', MD5('25468'), 45999458568, 'ronaldo@hotmail.com', 'engenharia da computação'),
        (2014759, 'maria', MD5('abcdef'), 43998365248, 'maria@hotmail.com', 'matemática'),
        (2154862, 'adolfo', MD5('asdfg'), 43998456587, 'adolfo@hotmail.com', 'matemática'),
        (2225468, 'hudson', MD5('654321'), 43998335695, 'hudson@hotmail.com', 'mecânica'),
        (1985452, 'rose', MD5('123654'), 41998563574, 'rose@hotmail.com', 'mecânica'),
        (1954823, 'robson', MD5('aa112233'), 41981547265, 'robson@hotmail.com', 'engenharia de software'),
        (1785469, 'andré', MD5('asd123456'), 44988224575, 'andre@hotmail.com', 'análise de sistemas'),
        (1812365, 'andreia', MD5('ads852123'), 40997458423,'andreia@hotmail.com', 'engenharia de software');

## inserção matéria
insert into materia (mate_nome)
values ('inglês'), ('física 1'),('física 2'), ('física 3'), ('física 4'), ('matemática'), ('algoritmo de programação'), ('fundamentos de transporte'), 
		('banco de dados 1'), ('banco de dados 2'), ('programação orientada a objeto'), ('cálculo 1'),('cálculo 2'), ('cálculo 3'), ('calculo 4'), 
        ('geometria análitica'),  ('álgebra linear'),('cálculo numerico'), ('sistema operacionais'), ('circuitos eletricos'), 
        ('probabilidade e estatística'), ('mecânica dos fluidos'), ('outros');
        
## inserção tutor
insert into tutor 
values (1640615), (2014625), (1985452), (1954823);

## inserção dia da semana
INSERT INTO `dia_da_semana` (`dia_semana`) 
VALUES ('Segunda-feira'),('Terça-feira'),('Quarta-feira'),('Quinta-feira'),('Sexta-feira'),('Sabado'), ('Domingo');

## inserção oferta de aula 
INSERT INTO `oferta_de_aula` (`ofertaul_id`, `ofertaul_nome`, `ofertaul_descricao`, `tutor_ra`, `mate_id`) 
VALUES (NULL, 'Oferta 1', 'Discrição 1', '1640615', '1'), (NULL, 'Oferta 2', 'Discrição 2', '1954823', '2'), 
(NULL, 'Oferta 3', 'Discrição 3', '1985452', '3'), (NULL, 'Oferta 4', 'Discrição 4', '2014625', '4'), 
(NULL, 'Oferta 5', 'Discrição 5', '2014625', '1'), (NULL, 'Oferta 6', 'Discrição 6', '1640615', '1');

##inserção horário oferta
INSERT INTO `horario_oferta` (`hroferta_inicio`, `hroferta_fim`, `hroferta_local`, `dia_da_semana_dia_semana`, `oferta_de_aula_ofertaul_id`)
VALUES ('12:30:00', '13:30:30', 'Sala 1', 'Sabado', '1'),('13:30:00', '14:30:30', 'Sala 2', 'Segunda-feira', '2'),
('15:30:00', '16:30:30', 'Sala 3', 'Terça-feira', '3'),('12:30:00', '13:30:30', 'Sala 1', 'Quinta-feira', '4'),
('17:30:00', '19:30:30', 'Sala 5', 'Sabado', '5'),('20:30:00', '21:30:30', 'Sala 5', 'Sexta-feira', '6');

#inserção aula
INSERT INTO `aula` (`ofertaul_id`, `alu_ra`) VALUES ('6', '2154862'),('2', '1785469');


