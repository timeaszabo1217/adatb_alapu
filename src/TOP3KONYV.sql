CREATE OR REPLACE PROCEDURE TOP3KONYV AS
  TYPE t_konyv IS TABLE OF Konyv%ROWTYPE INDEX BY PLS_INTEGER;
v_konyvek t_konyv;
v_index PLS_INTEGER := 1;
BEGIN
    FOR r_konyv IN (SELECT K.KONYV_ID, K.NEV, K.AR, KS.SZERZO, K.ELADOTT_PELDANYOK_SZAMA
                  FROM Konyv K 
                  INNER JOIN KonyvSzerzo KS ON K.Konyv_id = KS.Konyv_id
                  ORDER BY K.ELADOTT_PELDANYOK_SZAMA DESC
                  FETCH FIRST 3 ROWS ONLY)
  LOOP
    v_konyvek(v_index) := r_konyv;
v_index := v_index + 1;
END LOOP;

FOR i IN 1..v_konyvek.COUNT LOOP
    DBMS_OUTPUT.PUT_LINE('Könyv ID: ' || v_konyvek(i).KONYV_ID || ', Név: ' || v_konyvek(i).NEV || ', Ár: ' || v_konyvek(i).AR || ', Szerzõ: ' || v_konyvek(i).SZERZO || ', Eladott példányok száma: ' || v_konyvek(i).ELADOTT_PELDANYOK_SZAMA);
END LOOP;
END TOP3KONYV;
