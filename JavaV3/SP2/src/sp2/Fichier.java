/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package sp2;

import java.io.*;


/**
 *
 * @author Julien
 */
public class Fichier {
    private BufferedWriter fw;
    private BufferedReader fr;
    private char mode;
    
    public void ouvrir(String nomFic, String s) throws IOException{
        mode=(s.toUpperCase()).charAt(0);
        File f =new File(nomFic);
        if(mode=='R' || mode =='L'){
            fr = new BufferedReader(new FileReader(f));
        }
        else if(mode=='W' || mode=='E'){
            fw = new BufferedWriter(new FileWriter(f));
        }
    }
    
    public void ecrire(int tmp) throws IOException{
        String chaine ="";
        chaine=String.valueOf(tmp);
        if(chaine!=null){
            fw.write(chaine, 0, chaine.length());
            fw.newLine();
        }
    }
    
    public void ecrire(String chaine) throws IOException{
        if(chaine!=null){
            fw.write(chaine, 0, chaine.length());
        }
    }
    public void passerLigne() throws IOException{
        fw.newLine();
    }
    
    
    public String lire() throws IOException{
        String chaine=fr.readLine();
        return chaine;
    }
    
    public void fermer() throws IOException{
        if(mode=='R' || mode =='L'){
            fr.close();
        }
        if(mode=='W' || mode=='E'){
            fw.close();
        }
    }
    
   
    
    
    
}
