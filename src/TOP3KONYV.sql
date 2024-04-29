create or replace PROCEDURE TOP3KONYV AS
    CURSOR c_konyv IS
        SELECT K.KONYV_ID, K.NEV, K.AR, KS.SZERZO, K.ELADOTT_PELDANYOK_SZAMA
        FROM Konyv K
                 INNER JOIN KonyvSzerzo KS ON K.Konyv_id = KS.Konyv_id
        ORDER BY K.ELADOTT_PELDANYOK_SZAMA DESC
            FETCH FIRST 3 ROWS ONLY;
BEGIN
    FOR r_konyv IN c_konyv LOOP
            DBMS_OUTPUT.PUT_LINE('Könyv ID: ' || r_konyv.KONYV_ID || ', Név: ' || r_konyv.NEV || ', Ár: ' || r_konyv.AR || ', Szerző: ' || r_konyv.SZERZO || ', Eladott példányok száma: ' || r_konyv.ELADOTT_PELDANYOK_SZAMA);
        END LOOP;
END TOP3KONYV;