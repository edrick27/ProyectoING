DELIMITER $$

USE `sam`$$

DROP PROCEDURE IF EXISTS `Sp_samMaxCoDepart`$$

CREATE PROCEDURE Sp_samMaxCoDepart( P_SAM04CoDepart VARCHAR(15) )
	BEGIN
         
         DECLARE NumOrd int; 
          
         SELECT MAX(SAM03CoOrd) INTO NumOrd FROM SAM03RegOrd where SAM04CoDepart = P_SAM04CoDepart; 

         set NumOrd = NumOrd + 1;

	     SELECT NumOrd;
	END $$

DELIMITER ;


DELIMITER $$