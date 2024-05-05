create or replace TRIGGER KESZLET_KIMERULTSEG_FIGYELES
              AFTER UPDATE ON AruhazKonyv
                        FOR EACH ROW
BEGIN

    IF :NEW.Keszlet = 1 THEN

UPDATE AruhazKonyv
SET Ertesites = 'Figyelmeztetés: Már csak egy darab van készleten!'
WHERE Aruhaz_id = :NEW.Aruhaz_id
  AND Konyv_id = :NEW.Konyv_id;
END IF;
END;