-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema bd_aluno_tutor
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bd_aluno_tutor
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bd_aluno_tutor` DEFAULT CHARACTER SET latin1 ;
USE `bd_aluno_tutor` ;

-- -----------------------------------------------------
-- Table `bd_aluno_tutor`.`aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_aluno_tutor`.`aluno` (
  `alu_ra` INT(7) NOT NULL,
  `alu_nome` VARCHAR(50) NOT NULL,
  `alu_senha` VARCHAR(32) NOT NULL,
  `alu_dtCadastro` TIMESTAMP NOT NULL DEFAULT current_timestamp,
  `alu_celular` BIGINT(12) NULL,
  `alu_email` VARCHAR(50) NULL,
  `alu_curso` VARCHAR(50) NULL,
  PRIMARY KEY (`alu_ra`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_aluno_tutor`.`tutor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_aluno_tutor`.`tutor` (
  `tutor_ra` INT(7) NOT NULL,
  PRIMARY KEY (`tutor_ra`),
  CONSTRAINT `fk_aluno_tutor`
    FOREIGN KEY (`tutor_ra`)
    REFERENCES `bd_aluno_tutor`.`aluno` (`alu_ra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_aluno_tutor`.`materia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_aluno_tutor`.`materia` (
  `mate_id` INT NOT NULL AUTO_INCREMENT,
  `mate_nome` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`mate_id`),
  INDEX `idx_materia_nome` (`mate_nome` ASC) ,
  UNIQUE INDEX `uq_mate_nome` (`mate_nome` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_aluno_tutor`.`oferta_de_aula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_aluno_tutor`.`oferta_de_aula` (
  `ofertaul_id` INT NOT NULL AUTO_INCREMENT,
  `ofertaul_nome` VARCHAR(50) NOT NULL,
  `ofertaul_descricao` VARCHAR(100) NOT NULL,
  `tutor_ra` INT(7) NOT NULL,
  `mate_id` INT NOT NULL,
  PRIMARY KEY (`ofertaul_id`),
  INDEX `idx_tutor_ra` (`tutor_ra` ASC) ,
  INDEX `idx_materia_id` (`mate_id` ASC) ,
  CONSTRAINT `fk_tutor_oferta_de_aula`
    FOREIGN KEY (`tutor_ra`)
    REFERENCES `bd_aluno_tutor`.`tutor` (`tutor_ra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_materia_oferta_de_aula`
    FOREIGN KEY (`mate_id`)
    REFERENCES `bd_aluno_tutor`.`materia` (`mate_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_aluno_tutor`.`aula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_aluno_tutor`.`aula` (
  `ofertaul_id` INT NOT NULL,
  `alu_ra` INT(7) NOT NULL,
  PRIMARY KEY (`ofertaul_id`, `alu_ra`),
  INDEX `idx_alu_ra` (`alu_ra` ASC) ,
  INDEX `idx_ofertaul_id` (`ofertaul_id` ASC) ,
  CONSTRAINT `fk_oferta_de_aula_aula`
    FOREIGN KEY (`ofertaul_id`)
    REFERENCES `bd_aluno_tutor`.`oferta_de_aula` (`ofertaul_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_oferta_de_aula_aluno`
    FOREIGN KEY (`alu_ra`)
    REFERENCES `bd_aluno_tutor`.`aluno` (`alu_ra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_aluno_tutor`.`avaliacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_aluno_tutor`.`avaliacao` (
  `avali_id` INT NOT NULL,
  `avali_comprometimento` TINYINT NOT NULL,
  `avali_conhecimento` TINYINT NOT NULL,
  `avali_ditatica` TINYINT NOT NULL,
  `avali_simpatia` TINYINT NOT NULL,
  `avali_notageral` DOUBLE NOT NULL,
  `avali_feedback` VARCHAR(500) NULL,
  `ofertaul_id` INT NOT NULL,
  `alu_ra` INT(7) NOT NULL,
  `tutor_ra` INT(7) NOT NULL,
  PRIMARY KEY (`avali_id`),
  INDEX `idx_aula` (`ofertaul_id` ASC, `alu_ra` ASC) ,
  INDEX `idx_tutor_ra` (`tutor_ra` ASC) ,
  CONSTRAINT `fk_aula_avaliacao`
    FOREIGN KEY (`ofertaul_id` , `alu_ra`)
    REFERENCES `bd_aluno_tutor`.`aula` (`ofertaul_id` , `alu_ra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tutor_avaliacao`
    FOREIGN KEY (`tutor_ra`)
    REFERENCES `bd_aluno_tutor`.`tutor` (`tutor_ra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_aluno_tutor`.`denuncia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_aluno_tutor`.`denuncia` (
  `denu_id` INT NOT NULL AUTO_INCREMENT,
  `denu_descricao` VARCHAR(500) NOT NULL,
  `alu_fez` INT(7) NOT NULL,
  `alu_recebeu` INT(7) NOT NULL,
  PRIMARY KEY (`denu_id`),
  INDEX `idx_aluno_fez` (`alu_fez` ASC) ,
  INDEX `idx_aluno_recebeu` (`alu_recebeu` ASC) ,
  CONSTRAINT `fk_aluno_fez`
    FOREIGN KEY (`alu_fez`)
    REFERENCES `bd_aluno_tutor`.`aluno` (`alu_ra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_aluno_recebeu`
    FOREIGN KEY (`alu_recebeu`)
    REFERENCES `bd_aluno_tutor`.`aluno` (`alu_ra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_aluno_tutor`.`administrador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_aluno_tutor`.`administrador` (
  `adm_id` INT NOT NULL,
  `adm_senha` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`adm_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_aluno_tutor`.`dia_da_semana`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_aluno_tutor`.`dia_da_semana` (
  `dia_semana` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`dia_semana`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_aluno_tutor`.`pedido_de_aula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_aluno_tutor`.`pedido_de_aula` (
  `pediaul_id` INT NOT NULL AUTO_INCREMENT,
  `pedidaul_nome` VARCHAR(50) NOT NULL,
  `pediaul_descricao` VARCHAR(100) NULL,
  `alu_ra` INT(7) NOT NULL,
  `mate_id` INT NOT NULL,
  PRIMARY KEY (`pediaul_id`),
  INDEX `idx_alu_ra` (`alu_ra` ASC) ,
  INDEX `idx_meteria_id` (`mate_id` ASC) ,
  CONSTRAINT `fk_aluno_pedido_de_aula`
    FOREIGN KEY (`alu_ra`)
    REFERENCES `bd_aluno_tutor`.`aluno` (`alu_ra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_materia_pedido_de_aula`
    FOREIGN KEY (`mate_id`)
    REFERENCES `bd_aluno_tutor`.`materia` (`mate_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_aluno_tutor`.`horario_oferta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_aluno_tutor`.`horario_oferta` (
  `hroferta_inicio` TIME NOT NULL,
  `hroferta_fim` TIME NOT NULL,
  `hroferta_local` VARCHAR(50) NOT NULL,
  `dia_da_semana_dia_semana` VARCHAR(15) NOT NULL,
  `oferta_de_aula_ofertaul_id` INT NOT NULL,
  INDEX `fk_horario_oferta_dia_da_semana1_idx` (`dia_da_semana_dia_semana` ASC) ,
  INDEX `fk_horario_oferta_oferta_de_aula1_idx` (`oferta_de_aula_ofertaul_id` ASC) ,
  CONSTRAINT `fk_horario_oferta_dia_da_semana1`
    FOREIGN KEY (`dia_da_semana_dia_semana`)
    REFERENCES `bd_aluno_tutor`.`dia_da_semana` (`dia_semana`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_horario_oferta_oferta_de_aula1`
    FOREIGN KEY (`oferta_de_aula_ofertaul_id`)
    REFERENCES `bd_aluno_tutor`.`oferta_de_aula` (`ofertaul_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_aluno_tutor`.`horario_pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_aluno_tutor`.`horario_pedido` (
  `hrped_inicio` TIME NOT NULL,
  `hrped_fim` TIME NOT NULL,
  `hrped_local` VARCHAR(50) NOT NULL,
  `dia_da_semana_dia_semana` VARCHAR(15) NOT NULL,
  `pedido_de_aula_pediaul_id` INT NOT NULL,
  INDEX `fk_horario_pedido_dia_da_semana1_idx` (`dia_da_semana_dia_semana` ASC) ,
  INDEX `fk_horario_pedido_pedido_de_aula1_idx` (`pedido_de_aula_pediaul_id` ASC) ,
  CONSTRAINT `fk_horario_pedido_dia_da_semana1`
    FOREIGN KEY (`dia_da_semana_dia_semana`)
    REFERENCES `bd_aluno_tutor`.`dia_da_semana` (`dia_semana`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_horario_pedido_pedido_de_aula1`
    FOREIGN KEY (`pedido_de_aula_pediaul_id`)
    REFERENCES `bd_aluno_tutor`.`pedido_de_aula` (`pediaul_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_aluno_tutor`.`grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_aluno_tutor`.`grupo` (
  `gp_id` INT NOT NULL AUTO_INCREMENT,
  `gp_nome` VARCHAR(45) NOT NULL,
  `gp_descricao` VARCHAR(100) NOT NULL,
  `mate_id` INT NOT NULL,
  PRIMARY KEY (`gp_id`),
  INDEX `idx_materia_id` (`mate_id` ASC) ,
  CONSTRAINT `fk_materia_grupo`
    FOREIGN KEY (`mate_id`)
    REFERENCES `bd_aluno_tutor`.`materia` (`mate_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_aluno_tutor`.`grupo_de_estudos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_aluno_tutor`.`grupo_de_estudos` (
  `gp_id` INT NOT NULL,
  `alu_ra` INT(7) NOT NULL,
  PRIMARY KEY (`gp_id`),
  INDEX `idx_gp_id` (`gp_id` ASC) ,
  INDEX `idx_alu_ra` (`alu_ra` ASC) ,
  CONSTRAINT `fk_grupo_grupo_de_estudos`
    FOREIGN KEY (`gp_id`)
    REFERENCES `bd_aluno_tutor`.`grupo` (`gp_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_aluno_grupo_de_estudos`
    FOREIGN KEY (`alu_ra`)
    REFERENCES `bd_aluno_tutor`.`aluno` (`alu_ra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_aluno_tutor`.`horario_grupo_de_estudos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_aluno_tutor`.`horario_grupo_de_estudos` (
  `gp_id` INT NOT NULL,
  `hr_gp_estudos_inicio` TIME NOT NULL,
  `hr_gp_estudos_fim` TIME NOT NULL,
  `hr_gp_estudos_local` VARCHAR(50) NOT NULL,
  `dia_da_semana_dia_semana` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`gp_id`),
  INDEX `idx_gp_id` (`gp_id` ASC) ,
  INDEX `fk_horario_grupo_de_estudos_dia_da_semana1_idx` (`dia_da_semana_dia_semana` ASC) ,
  CONSTRAINT `fk_grupo_de_estudos_horario_grupo_de_estudos`
    FOREIGN KEY (`gp_id`)
    REFERENCES `bd_aluno_tutor`.`grupo_de_estudos` (`gp_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_horario_grupo_de_estudos_dia_da_semana1`
    FOREIGN KEY (`dia_da_semana_dia_semana`)
    REFERENCES `bd_aluno_tutor`.`dia_da_semana` (`dia_semana`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
