
function changement(){
    //recuperation de la valeur de toutes les valeurs afin de pouvoir a chaque fois modifier les affichages en temps réel
    var nomInterv = document.getElementById('nomIntervention').value;
    var mois = document.getElementById('mois').value;
    var semaine = document.getElementById('semaine').value;
    var horaire = document.getElementById('planning').value;
    //si la valeur est differente de la valeur par defaut (a savoir "defaut" (tres recherché je sais :p))  alors on fait la recherche sur la bdd
    //Sinon on ne fait rien
    if(nomInterv!="defaut" && mois!='defaut' && semaine!='defaut'){
        //creation et stockage de la bonne url
        var url = '../php/resu.php?nomInterv='+nomInterv+'&semaine='+semaine;
        //creation de la variable xhr qui va stocker un element XMLHttpRequest
        var xhr;
        //Attribution a cette valeur un objet en fonction du navigateur utilisé
        if (window.XMLHttpRequest) { 
            xhr = new XMLHttpRequest();
        }
        else  if (window.ActiveXObject){
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
        else {
            alert('Erreur, votre navigateur ne supporte pas les objets xmlhttprequest');
        }
        //quand selection/changement d'une intervention, alors on fait ce code
        xhr.onreadystatechange=function(){
            //verification si connexion effectuée
            if(xhr.readyState==4){
                //verification si la page existe
                if(xhr.status==200){
                    //Affichage des radios boutons
                    planning.innerHTML=xhr.responseText;
                }
                //si la page n'existe pas alors on affiche une erreur
                else{
                    planning.innerHTML="Chargement en cours";
                }   
            }
        }
        //envoie de la demande au serveur
        xhr.open('GET',url,true);
        xhr.send(null);
    }
	
}


  
//Fonction qui active ou desactive le bouton d'enregistrement du rendez-vous en fonction des valeur du renplissage
function verifBtnRdv(){
    //selection du bouton et des enregistrements
    var btn = document.getElementById('btn');
    var rappel=document.getElementById('rappel').value;
    var adresse=document.getElementById('adresse').value;
    var interv=document.getElementById('nomIntervention').value;
    var semaine=document.getElementById('semaine').value;
	//on va decomposer les semaines, afin de pouvoir comparer les valeurs une a une. 
	//ainsi si un radio bouton est coché et que le formulaire est rechargé
	//les dates changerons et le bouton ne s'activera pas
	var tabSemaine=semaine.split("/");
	tabMilieu=tabSemaine[2].split(" ");
	
	
	
    if(document.querySelector('input[name=creneau]:checked')){
		
		
		
		
		
        var temp=document.querySelector('input[name=creneau]:checked').value;
		var dateDecompo=temp.substr(0,10);
		dateSplit=dateDecompo.split("-");
		//si c'est la meme annee
		if(parseInt(tabSemaine[4])==parseInt(dateSplit[0])){
			//si c'est le meme mois
			if(parseInt(tabSemaine[1])==parseInt(dateSplit[1])){
				//si le jour du radio bouton selectionné est compris dans la semaine
				if(parseInt(dateSplit[2])<=parseInt(tabMilieu[1]) && parseInt(dateSplit[2])>=parseInt(tabSemaine[0])){
					date=document.querySelector('input[name=creneau]:checked').value;
					
				}
				else{
					date=null;
				}
		 	}
			else{
				date=null;
			}
		}
		else{
			date=null;
		}
    }
	else{
		date=null;
	}
	
    //si les choix des utilisateurs ne sont pas differents de la valeur par defaut "defaut" alors on permet l'utilisation du bouton
    if(rappel!="defaut" & adresse!="defaut" & interv!="defaut" & date!=null & semaine!='defaut' ){
        btn.disabled=false;        
    }
    else{
        btn.disabled=true;
    }
	//document.getElementById('testouille').innerHTML=date;  
    
}
	







/*fonction qui indique a l'utilisateur que son rdv a ete pris en compte et qui lui dit de venir un peu plus tard verifier l'etat de son rendez-vous. Redirige ensuite sur la page des prochains rdv*/
function enregistrement(){
    //A VOIR POUR SAVOIR SI DIVALTO MET DES HEURES OU DES MINUTES POUR VERIFIER LES RDV
    //message comme quoi le rdv est pris en compte
    alert('Votre rendez-vous sera verifi\351 dans les heures qui viennent, reconnectez-vous dans quelques temps afin de voir la validit\351 du rendez-vous.\r\nUn mail de confirmation vous sera envoy\351.\r\n Merci pour votre confiance.');   
}




function afficheDate(){
    var mois = document.getElementById('mois').value;
    var listeSemaine = document.getElementById('semaine');
    if(mois!="defaut"){
        //creation et stockage de la bonne url
        var url2 = '../php/joursemaine.php?mois='+mois;
        //creation de la variable xhr qui va stocker un element XMLHttpRequest
        var xhr;
        //Attribution a cette valeur un objet en fonction du navigateur utilisé
        if (window.XMLHttpRequest) { 
            xhr = new XMLHttpRequest();
        }
        else  if (window.ActiveXObject){
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
        else{
            alert('Erreur, votre navigateur ne supporte pas les objets xmlhttprequest');
        }
        //quand selection/changement d'une intervention, alors on fait ce code
        xhr.onreadystatechange=function(){
            //verification si connexion effectuée
            if(xhr.readyState==4){
                //verification si la page existe
                if(xhr.status==200){
                    //Affichage des radios boutons
                    listeSemaine.innerHTML=xhr.responseText;
                }
                //si la page n'existe pas alors on affiche une erreur
                else{
                    listeSemaine.innerHTML="Chargement en cours";
                }
            }
        }
        //envoie de la demande au serveur
        xhr.open('GET',url2,true);
        xhr.send(null);
    }
}


