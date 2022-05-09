CREATE DATABASE BDDAppWebGSB

CREATE TABLE Visiteur(
    VisCode INTEGER PRIMARY KEY,
    VisNom VARCHAR(20),
    VisPrenom VARCHAR(20),
    VisAdresse VARCHAR(20),
    --Mise en place de la sécurité pour vérifier l'information directement dans le site
    VisVille VARCHAR(20),
    VisCP INTEGER,
)

CREATE TABLE Medecin(
    MedCode INTEGER PRIMARY Key,
    MedNom VARCHAR (20),
    MedPrenom VARCHAR(20),
    MedAdresse VARCHAR(20),
    MedVille VARCHAR(20),
    MedCP INTEGER,
)

CREATE TABLE Rapport(
    RapportID INTEGER,
    PractitienID INTEGER,
    CoefDeFiabiliter INTEGER,
    RapportDate DATE,
    MotifVisite VARCHAR(20),
    Rapport VARCHAR(1000),
    ProduitID1 INTEGER,
    ProduitID2 INTEGER,
    DocFournit BOOLEAN,
    --Comme le nombre de'echantillon est variable, l'ensemble sera dans une ligne
    LesEchantillons VARCHAR(1000),
    RapportDefinitif BOOLEAN,
)

CREATE TABLE Identification(
    UtilisatuerID INTEGER,
    identifiant VARCHAR(20),
    MotDePasse VARCHAR(20),

)

CREATE TABLE Medicament(
    DepotLegal VARCHAR(20),
    NomCommercial VARCHAR(20),
    Famille VARCHAR(20),
    Composition VARCHAR(300),
    Effets VARCHAR(300),
    
)