CREATE OR REPLACE PROCEDURE TOP5KONYV AS
    CURSOR c_konyv IS
SELECT K.KONYV_ID, K.NEV, K.AR, KS.SZERZO
FROM Konyv K
         INNER JOIN KonyvSzerzo KS ON K.Konyv_id = KS.Konyv_id
ORDER BY K.Konyv_id DESC
    FETCH FIRST 5 ROWS ONLY;
BEGIN
FOR r_konyv IN c_konyv LOOP
            DBMS_OUTPUT.PUT_LINE('Könyv ID: ' || r_konyv.KONYV_ID || ', Név: ' || r_konyv.NEV || ', Ár: ' || r_konyv.AR || ', Szerző: ' || r_konyv.SZERZO);
END LOOP;
END TOP5KONYV;