ALTER TABLE `tuogexingli`.`user_recommendation` ADD COLUMN `status` ENUM('pending','accepted','declined')  NOT NULL DEFAULT 'pending' AFTER `created`,
 ADD COLUMN `key` VARCHAR(20)  NOT NULL AFTER `status`,
 ADD COLUMN `direct_rec` BOOLEAN  NOT NULL DEFAULT false COMMENT 'if it\'s a direct recommend' AFTER `key`,
 ADD UNIQUE `user_recommendation_key_unique`(`key`);
 
 CREATE TABLE `tuogexingli`.`user_property` (
  `user_id` INTEGER  NOT NULL,
  `credit` SMALLINT  NOT NULL COMMENT 'user credits, higher number->more trustable',
  CONSTRAINT `user_profile_fk_constraint1` FOREIGN KEY `user_profile_fk_constraint1` (`user_id`)
    REFERENCES `user` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT
)
ENGINE = InnoDB
CHARACTER SET utf8 COLLATE utf8_general_ci
COMMENT = 'user extra information';


ALTER TABLE `tuogexingli`.`user_property` MODIFY COLUMN `credit` SMALLINT(6)  NOT NULL DEFAULT 3 COMMENT 'user credits, higher number->more trustable';
