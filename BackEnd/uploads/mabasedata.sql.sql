insert into CLIENT (NUMCLI, NOMCLI, VILLE, CATEGORIE, COMPTE) values (1, 'Mohamed Salah', 'Testour', 'Co', 100);
insert into CLIENT (NUMCLI, NOMCLI, VILLE, CATEGORIE, COMPTE) values (2, 'Meriam Ben Salah', 'Nabeul', 'Co', 150);
insert into CLIENT (NUMCLI, NOMCLI, VILLE, CATEGORIE, COMPTE) values (3, 'Nour Abid', 'Sfax', 'Cr', 200);
insert into CLIENT (NUMCLI, NOMCLI, VILLE, CATEGORIE, COMPTE) values (4, 'Imen Abid', 'Tunis', 'Cr', 100);
insert into PRODUIT (NUMPRO, NOMPRO, PRIX, QSTOCK) values (1, 'Produits Alimentaire type1', 12, 1000);
insert into PRODUIT (NUMPRO, NOMPRO, PRIX, QSTOCK) values (2, 'Fourniture scolaire type2', 7, 500);
insert into PRODUIT (NUMPRO, NOMPRO, PRIX, QSTOCK) values (3, 'Produits abrasifs type3', 2, 1500);
insert into PRODUIT (NUMPRO, NOMPRO, PRIX, QSTOCK) values (4, 'Produits type4', 22, 2000);
insert into COMMANDE (NUMCOM, NUMCLI, DATECOM) values (1, 1, '2021-01-01');
insert into COMMANDE (NUMCOM, NUMCLI, DATECOM) values (2, 2, '2021-01-10');
insert into COMMANDE (NUMCOM, NUMCLI, DATECOM) values (3, 3, '2021-02-11');
insert into COMMANDE (NUMCOM, NUMCLI, DATECOM) values (4, 3, '2021-02-11');
insert into DETAIL (NUMCOM, NUMPRO, QCOM) values (1, 2, 14);
insert into DETAIL (NUMCOM, NUMPRO, QCOM) values (1, 4, 8);
insert into DETAIL (NUMCOM, NUMPRO, QCOM) values (1, 3, 20);
insert into DETAIL (NUMCOM, NUMPRO, QCOM) values (2, 2, 20);
insert into DETAIL (NUMCOM, NUMPRO, QCOM) values (2, 1, 30);
insert into DETAIL (NUMCOM, NUMPRO, QCOM) values (3, 1, 60);





