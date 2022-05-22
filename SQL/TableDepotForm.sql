DROP DATABASE BDDAppWebGSB;

CREATE DATABASE BDDAppWebGSB;

CREATE TABLE Visiteur(
    VisID INTEGER PRIMARY KEY,
    VisNom VARCHAR(20),
    VisPrenom VARCHAR(20),
    VisAdresse VARCHAR(20),
    VisVille VARCHAR(20),
    VisCP INTEGER,
    VisAdresseComplement VARCHAR(50),
    VisCoordonnee INTEGER,
    VisDateDemboche DATE,
    VisSalaire INTEGER,
    VisMoyVenteProduit FLOAT

);

CREATE TABLE Medecin(
    MedID INTEGER PRIMARY Key,
    MedNom VARCHAR (20),
    MedPrenom VARCHAR(20),
    MedAdresse VARCHAR(20),
    MedVille VARCHAR(20),
    MedCP INTEGER,
    MedAdresseComplement VARCHAR(50),
    MedCoordonnee INTEGER,
    MedFonction VARCHAR(20),
    MedAssocierA VARCHAR(50),
    MedDescription VARCHAR(200),
    MedCoefDeNotoriété INTEGER,
    MedCoefDeConfience INTEGER,
    MedFormation VARCHAR(20),
    MedMoyPatientele FLOAT,
    MedNouveau VARCHAR(5)

);

INSERT INTO Medecin VALUE(
    200,
    "Poisson",
    "Ariel",
    "136 rue de la mer",
    "Atlantide",
    1000,
    "2eme etage",
    06699669,
    "A",
    "B",
    "AZERTYU",
    1,
    1,
    "D",
    2,
    "TRUE"
);

CREATE TABLE MedecinHoraire(
    MedID INTEGER PRIMARY Key,
    Lun VARCHAR(40),
    Mar VARCHAR(40),
    Mer VARCHAR(40),
    Jeu VARCHAR(40),
    Ven VARCHAR(40),
    Sam VARCHAR(40)
);

CREATE TABLE Rapport(
    UtilisateurID INTEGER,
    RapportID INTEGER PRIMARY Key,
    RapportVersion INTEGER,
    RapportDefinitif VARCHAR(5),
    MedID INTEGER,
    Remplacent VARCHAR(5),
    CoefDeFiabiliter FLOAT,
    RapportDate CHAR(10),
    MotifVisite VARCHAR(20),
    Rapport VARCHAR(1000),
    ProduitID1 INTEGER,
    ProduitID2 INTEGER,
    DocFournit VARCHAR(5),
    LesEchantillons VARCHAR(1000)
);

INSERT INTO `rapport` (`UtilisateurID`, `RapportID`, `RapportVersion`, `RapportDefinitif`, `MedID`, `Remplacent`, `CoefDeFiabiliter`, `RapportDate`, `MotifVisite`, `Rapport`, `ProduitID1`, `ProduitID2`, `DocFournit`, `LesEchantillons`)
VALUES ('1', '1', '1', 'FALSE', '1', 'TRUE', '1', '2022-05-19', 'A', 'A', '1', '1', 'TRUE', 'A');

CREATE TABLE Authentification(
    UtilisateurID INTEGER PRIMARY Key,
    Identifiant VARCHAR(20),
    MotDePasse VARCHAR(20)

);

CREATE TABLE Medicament(
    MedicID INTEGER PRIMARY KEY,
    MedicType VARCHAR(20),
    DepotLegal VARCHAR(20),
    NomCommercial VARCHAR(20),
    Famille VARCHAR(20),
    Composition VARCHAR(300),
    Effets VARCHAR(300),
    ContreIndication VARCHAR(300),
    MedicNb INTEGER,
    Prix FLOAT
);

INSERT INTO Medicament VALUE (120,'Generique','A','Ibuprofenne','C','D','E','F',18,2);

ALTER TABLE `rapport` ADD INDEX(`UtilisateurID`);

ALTER TABLE `rapport` ADD INDEX(`MedID`);

ALTER TABLE `rapport` ADD INDEX(`ProduitID1`);

ALTER TABLE `rapport` ADD INDEX(`ProduitID2`);