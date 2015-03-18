INSERT INTO user
VALUES (NULL, 'admin', '1', '1', '0', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrateur', '');
INSERT INTO user VALUES (NULL, 'mod', '0', '1', '0', '7dd30f0a95d522bfc058be4e75847f8b6df9f76b', 'Moderator', '');
INSERT INTO user VALUES (NULL, 'prof', '0', '0', '1', 'd9f02d46be016f1b301f7c02a4b9c4ebe0dde7ef', 'Professor', '');
INSERT INTO user VALUES (NULL, 'eleve', '0', '0', '0', '0e9a7fdc4821370a252df21582a4a656e81e0687', 'Eleve', '');
INSERT INTO user VALUES
  (NULL, 'thehawk', '1', '1', '1', '4438ce731657057ba02736526d2018bfac7d4971', 'Julien le meilleur prof du monde ;D',
   '');

INSERT INTO class VALUES (NULL, '1°L');
INSERT INTO class VALUES (NULL, '1°S');
INSERT INTO class VALUES (NULL, '1°ES');
INSERT INTO class VALUES (NULL, 'T°L');
INSERT INTO class VALUES (NULL, 'T°S');
INSERT INTO class VALUES (NULL, 'T°ES');

INSERT INTO user_class VALUES (NULL, 1, 1);
INSERT INTO user_class VALUES (NULL, 1, 2);
INSERT INTO user_class VALUES (NULL, 1, 3);
INSERT INTO user_class VALUES (NULL, 2, 4);
INSERT INTO user_class VALUES (NULL, 2, 5);
INSERT INTO user_class VALUES (NULL, 2, 6);

INSERT INTO domain VALUES (1, 'electricte');
INSERT INTO domain VALUES (2, 'physique');
INSERT INTO domain VALUES (3, 'optique');
INSERT INTO domain VALUES (4, 'chimie');
INSERT INTO domain VALUES (5, 'thermo-dynamique');
INSERT INTO domain VALUES (6, 'mathematique');
INSERT INTO domain VALUES (7, 'general');

INSERT INTO user_domain VALUES (NULL, 1, 1);
INSERT INTO user_domain VALUES (NULL, 1, 2);
INSERT INTO user_domain VALUES (NULL, 2, 3);
INSERT INTO user_domain VALUES (NULL, 2, 4);