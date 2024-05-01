CREATE OR REPLACE TRIGGER kosar_keszlet_aktualizalas
    AFTER INSERT OR UPDATE OR DELETE ON VasarloKonyv
    FOR EACH ROW
DECLARE
    max_keszlet NUMBER;
BEGIN
    SELECT MAX(keszlet) INTO max_keszlet
    FROM AruhazKonyv
    WHERE Konyv_id = :NEW.Konyv_id;

    IF INSERTING THEN
        UPDATE Konyv
        SET Eladott_peldanyok_szama = Eladott_peldanyok_szama + :NEW.Darabszam
        WHERE Konyv_id = :NEW.Konyv_id;

        UPDATE AruhazKonyv
        SET keszlet = max_keszlet - :NEW.Darabszam
        WHERE Konyv_id = :NEW.Konyv_id AND keszlet = max_keszlet;

    ELSIF UPDATING THEN
        DECLARE
            darabszam_valtozas NUMBER;
        BEGIN
            darabszam_valtozas := :NEW.Darabszam - :OLD.Darabszam;

            UPDATE Konyv
            SET Eladott_peldanyok_szama = Eladott_peldanyok_szama + darabszam_valtozas
            WHERE Konyv_id = :NEW.Konyv_id;

            UPDATE AruhazKonyv
            SET keszlet = max_keszlet - darabszam_valtozas
            WHERE Konyv_id = :NEW.Konyv_id AND keszlet = max_keszlet;
        END;

    ELSIF DELETING THEN
        UPDATE Konyv
        SET Eladott_peldanyok_szama = Eladott_peldanyok_szama - :OLD.Darabszam
        WHERE Konyv_id = :OLD.Konyv_id;

        UPDATE AruhazKonyv
        SET keszlet = max_keszlet + :OLD.Darabszam
        WHERE Konyv_id = :OLD.Konyv_id and keszlet = max_keszlet;
    END IF;
END;
