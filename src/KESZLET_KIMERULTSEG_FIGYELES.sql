CREATE OR REPLACE TRIGGER KESZLET_KIMERULTSEG_FIGYELES
    BEFORE UPDATE OF Keszlet ON AruhazKonyv
    FOR EACH ROW
BEGIN
    IF :NEW.Keszlet = 0 THEN
        :NEW.Ertesites := 'Nincs készleten';
    ELSIF :NEW.Keszlet = 1 THEN
        :NEW.Ertesites := 'Ez az utolsó könyv';
    END IF;
END;