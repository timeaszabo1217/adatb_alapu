create or replace TRIGGER KESZLET_KIMERULTSEG_FIGYELES
    BEFORE UPDATE OF Keszlet ON AruhazKonyv
    FOR EACH ROW
BEGIN
    IF :NEW.Keszlet = 0 THEN
        :NEW.Ertesites := ' már nincs készleten.';
    ELSIF :NEW.Keszlet = 1 THEN
        :NEW.Ertesites := ' már csak egy darab van készleten.';
ELSE
        :NEW.Ertesites := NULL;
END IF;
END;