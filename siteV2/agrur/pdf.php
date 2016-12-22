<?php
		
		
		include '../include/connexionbdd.php';
		/*** RECUPERATION DES DONNEES CLIENTs ***/
		//Requete sql des infos sur les client
		$sqlCli="SELECT * FROM client WHERE IdClient=".$_GET['cli'];
		$cli = ExecReq($link,$sqlCli);
		
		/*** RECUPERATION DES DONNEES du lot ***/
		//Requete sql des infos sur le lot
		$sqlLot="SELECT * FROM lot WHERE IdLot=".$_GET['lot'];
		$lot = ExecReq($link,$sqlLot);
		
		//on charge fpdf... la libraire pour generer des pdf
		require('../include/fpdf/fpdf.php');
		 
		$pdf=new FPDF();
		$pdf->SetAutoPagebreak(True);
		$pdf->SetMargins(20,15,20);
		$pdf->AddPage();
		//on choisi la police et on met en gras et en police 16
		$pdf->SetFont('Times','B',14);
		$pdf->multicell(0,10,"FACTURE N°".$_GET['com'],1,'C',''); 
		$pdf->multicell(0,20,"",0,'L',''); 
		$pdf->SetFont('Times','',12);
		//num commande = num facture
		$pdf->multicell(0,10,"Numéro de facture : ".$_GET['com'],0,'L',''); 
		//données du client
		$pdf->multicell(0,5,"",0,'L',''); 
		$pdf->multicell(0,10,"Nom du client : ".$cli[0]['NomClient'],0,'L',''); 
		$pdf->multicell(0,10,"Code Agrur du client : ".$cli[0]['IdClient'],0,'L',''); 
		$pdf->multicell(0,10,"Code du client sur le site : ".$cli[0]['CodeClient'],0,'L',''); 
		//gestion du lot
		$pdf->multicell(0,5,"",0,'L',''); 
		$pdf->multicell(0,10,"Numéro du lot : ".$_GET['lot'],0,'L',''); 
		$pdf->multicell(0,10,"Calibre : ".$lot[0]['Calibre'],0,'L',''); 
		
		$pdf->SetFont('Times','B',8);
		$pdf->setY(-30);

		$image="../image/footer.png";
		$size = getimagesize($image);
		$largeur=$size[0];
		$hauteur=$size[1];
		$ratio=120/$hauteur;	//hauteur imposée de 120mm
		$newlargeur=$largeur*$ratio;
		$posi=(210-$newlargeur)/2;	//210mm = largeur de page
		$pdf->image($image, 92, $pdf->setY(-30), 0);
		
		$pdf->Close();
		$pdf->Output('I');
		
?>