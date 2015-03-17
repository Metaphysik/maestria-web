CREATE TABLE IF NOT EXISTS user (
  idProfil    INTEGER,
  login       VARCHAR(20),
  isAdmin     BOOLEAN,
  isModerator BOOLEAN,
  isProfessor BOOLEAN,
  password    VARCHAR(255),
  user        VARCHAR(255),
  token       VARCHAR(255),
/* class cf user_class */
/* domaine cf user_domain */
  PRIMARY KEY (idProfil)
);

CREATE TABLE IF NOT EXISTS evaluation (
  idEvaluation INTEGER,
  refUser      INTEGER,
  label        VARCHAR(255), /* Question existenciel */
  description  TEXT, /* Qui est arrivé en premier, l'oeuf ou la poule ? */
  time         VARCHAR(255),

  PRIMARY KEY (idEvaluation)
);

CREATE TABLE IF NOT EXISTS questions (
  idQuestion    INTEGER,
  refEvaluation INTEGER,
  title         VARCHAR(255), /* Quelle est le meilleur prof d'informatique du monde ? */
  note          INTEGER, /* 5 */
  taxoPrincipal INTEGER, /* 0= CN, 1= CP, AP= 2, SY=3 */
  refItem1      INTEGER,
  refItem2      INTEGER,

  PRIMARY KEY (idQuestion)
);

CREATE TABLE IF NOT EXISTS answer (
  idAnswer      INTEGER,
  refUser       INTEGER,
  refEvaluation INTEGER,
  note          TEXT,

  PRIMARY KEY (idAnswer)
);

/*
Item de connaissance : https://docs.google.com/spreadsheet/ccc?key=0AiLqRPkYo7F_dDF4TDRsSEgtdFRjbG1rZkZFcDc0RUE&usp=sharing#gid=0
*/
CREATE TABLE IF NOT EXISTS connaissance (
  idConnaissance INTEGER,
  refDomain      INTEGER,
  refTheme       INTEGER,
  lvl            INTEGER, /* lvl 9 */
  item           TEXT, /* Les conducteurs sont parcourus par un courant sans avoir de tension à leurs bornes car les conducteurs ne consomment pas d'énergie électrique. */

  PRIMARY KEY (idConnaissance)
);

CREATE TABLE IF NOT EXISTS class (
  idClass INTEGER,
  value   VARCHAR(10), /* 2nd5 , TBTS STI, ... */

  PRIMARY KEY (idClass)
);

CREATE TABLE IF NOT EXISTS domain (
  idDomain    INTEGER,
  domainValue VARCHAR(50), /* Math, Physique, Chimie, SVT */

  PRIMARY KEY (idDomain)
);

CREATE TABLE IF NOT EXISTS theme (
  idTheme    INTEGER,
  themeValue VARCHAR(50), /* Electricité statique, Circuit électrique */

  PRIMARY KEY (idTheme)
);
/**
	Association user/class (la partie gestion par le prof uniquement sera gerer dans l'interface web)
*/
CREATE TABLE IF NOT EXISTS user_class (
  idUserClass INTEGER,
  refUser     INTEGER,
  refClass    INTEGER,

  PRIMARY KEY (idUserClass)
);
/**
	Association user/domain
*/
CREATE TABLE IF NOT EXISTS user_domain (
  idUserDomain INTEGER,
  refUser      INTEGER,
  refDomain    INTEGER,

  PRIMARY KEY (idUserDomain)
);

