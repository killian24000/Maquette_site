DROP DATABASE BDDAppWebGSB;

CREATE DATABASE BDDAppWebGSB;

CREATE TABLE Visiteur(
    VisID INTEGER PRIMARY KEY,
    VisNom VARCHAR(20),
    VisPrenom VARCHAR(20),
    VisAdresse VARCHAR(20),
    VisVille VARCHAR(20),
    VisCP INTEGER
);

CREATE TABLE Medecin(
    MedID INTEGER PRIMARY Key,
    MedNom VARCHAR (20),
    MedPrenom VARCHAR(20),
    MedAdresse VARCHAR(20),
    MedVille VARCHAR(20),
    MedCP INTEGER
);

CREATE TABLE Rapport(
    RapportID INTEGER,
    RapportVersion INTEGER CHECK (RapportVersion<=3 OR RapportDefinitif=FALSE),
    RapportDefinitif BOOLEAN,
    MedID INTEGER,
    CoefDeFiabiliter FLOAT CHECK (CoefDeFiabiliter<=100 or CoefDeFiabiliter>=0),
    RapportDate DATE,
    DebutRedaction DATETIME,  
    FinRedacttion DATETIME,
    MotifVisite VARCHAR(20),
    Rapport VARCHAR(1000),
    ProduitID1 INTEGER,
    ProduitID2 INTEGER,
    DocFournit BOOLEAN,
    LesEchantillons VARCHAR(1000)
);

CREATE TABLE Authentification(
    UtilisateurID INTEGER,
    Identifiant VARCHAR(20),
    MotDePasse VARCHAR(20)

);

CREATE TABLE Medicament(
    MedicType VARCHAR(20),
    DepotLegal VARCHAR(20),
    NomCommercial VARCHAR(20),
    Famille VARCHAR(20),
    Composition VARCHAR(300),
    Effets VARCHAR(300),
    ContreIndication VARCHAR(300),
    Prix FLOAT
);