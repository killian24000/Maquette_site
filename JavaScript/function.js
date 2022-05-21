function DateDuJour(){
    RecuperationDateSys = new Date();
    annee = RecuperationDateSys.getFullYear();
    mois = RecuperationDateSys.getMonth() + 1;
    if (mois<10){
        mois="0"+mois;
    }
    jour = RecuperationDateSys.getDate();
    if (jour<10){
        jour="0"+jour;
    }
    DateBonFormat=(annee+"-"+mois+"-"+jour);
    return DateBonFormat;
}

function DateFormatTrad(){
    Date=DateDuJour();
    Date=Date.split("-");
    jour=Date[2];
    mois=Date[1];
    annee=Date[0];
    return (jour+"/"+mois+"/"+annee);
}