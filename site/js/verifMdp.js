/*Fonction de verification des mots de passe.
* Verifie à la fois la longueur du mot de passe (doit etre superieur à 5 caractères), l'égalité des mots de passes.
* Cela desactive aussi le bouton de validation*/
function verification()
{
    /*selection des elements*/
    var mdp1 = document.getElementById('mdp1').value;
    var mdp2 = document.getElementById('mdp2').value;
    var ecrire = document.getElementById('verif');
    var bouton = document.getElementById('btn');
    
    /*Verifie que la taille du mot de passe est au moins égale à 4 caractères
    * Si c'est le cas alors on verifie l'égalité des mots de passe
    * Sinon on affiche que les mdp ne sont pas conformes*/
    if(mdp2.length>=4)
        {
            /*verification de l'égalité des mdp*/
            if(mdp1==mdp2 && mdp2==mdp1)
            {
                /* Si égalité alors on affiche le active le bouton et on affiche que les mdp sont les memes*/
                bouton.disabled = false;
                ecrire.innerHTML='Les mots de passes sont les mêmes';                
            }
        else
            {
                /*Si mdp non égaux on affiche que les mdp sont differents et on desactive le bouton*/
                ecrire.innerHTML='Les mots de passes sont differents';
                bouton.disabled=true;
            }
        }
    else
        {
            /*Mot de passe non conforme, on affiche alors qu'il sont trop court, et on desactive le bouton*/
            ecrire.innerHTML='Mot de passe trop court';
            bouton.disabled=true;
        }
}