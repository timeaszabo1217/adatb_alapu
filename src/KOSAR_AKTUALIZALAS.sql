create or replace TRIGGER kosar_aktualizalas
    AFTER INSERT OR UPDATE ON VasarloKonyv
    FOR EACH ROW
BEGIN
    IF INSERTING THEN
        UPDATE Konyv
        SET Eladott_peldanyok_szama = Eladott_peldanyok_szama + :NEW.Darabszam
        WHERE Konyv_id = :NEW.Konyv_id;
    ELSIF UPDATING THEN
        UPDATE Konyv
        SET Eladott_peldanyok_szama = Eladott_peldanyok_szama + (:NEW.Darabszam - :OLD.Darabszam)
        WHERE Konyv_id = :NEW.Konyv_id;
    END IF;
END;