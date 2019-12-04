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