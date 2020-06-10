<?php  
   
 // get XML remotely / locally / or / just set it as string '<root>...</root>'  
 $sXml = file_get_contents('recept.xml');  
   
 // parse XML  
 $oXML = simplexml_load_string($sXml);  
 if (!$oXML) {  
      die('xml format not valid or simplexml module missing.');  
 }  
   
 // assuming running the root  
 $oXmlRoot = $oXML; // or can be [$oXML->food]  
   
 //echo '<pre>'; print_r( $oXmlRoot ); echo '</pre>';  
 echo xmlToHtmlTable($oXmlRoot);  
   
   
 function xmlToHtmlTable($p_oXmlRoot) {  
      $bIsHeaderProceessed = false;  
        
      $sTHead = '';  
      $sTBody = '';       
      foreach ($p_oXmlRoot as $oNode) {  
           $sTBody .= '<tr>';  
           foreach ($oNode as $sName => $oValue){  
                if (!$bIsHeaderProceessed) {  
                     $sTHead .= "<th>{$sName}</th>";  
                }  
                $sValue = (string)$oValue;  
                $sTBody .= "<td>{$sValue}</td>";                 
           }  
           $bIsHeaderProceessed = true;  
           $sTBody .= '</tr>';  
      }  
        
      $sHTML = "<table border=2>  
                     <thead><tr>{$sTHead}</tr></thead>  
                     <tbody>{$sTBody}</tbody>  
                </table>";  
      return $sHTML;  
 }  