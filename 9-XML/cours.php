<?php
/* 
1. Introduction au format XML

XML (eXtensible Markup Language) est un langage de balisage conçu pour stocker et transporter des données. Contrairement au HTML, qui est principalement utilisé pour afficher des données, XML est conçu pour structurer, stocker et transporter des informations.

Il est souvent utilisé pour l’échange de données entre différentes applications, car il est à la fois lisible par l'homme et la machine. 


De nombreux logiciels et frameworks utilisent XML pour leurs fichiers de configuration.(exemple : Drupal, Wordpress, Magento, etc.) 

Par exemple, les fichiers de configuration de Wordpress sont des fichiers XML.
les fichers sitemap.xml sont des fichiers XML.

XML a été développé par le W3C pour remplacer le HTML dans le stockage et le transport de données. 

Il est utilisé dans divers domaines, notamment :
 - Web Services (SOAP), APIs REST avec XML, etc.

Caractéristiques principales de XML :

    - Il est auto-descriptif.Cela signifie que le fichier XML contient des balises qui décrivent la structure et le contenu des données. Chaque élément ou balise est accompagné de noms explicites qui permettent de comprendre de quoi il s'agit sans avoir besoin d'une documentation externe.

    - Il est extensible (vous pouvez définir vos propres balises).

    - Il est souvent utilisé pour échanger des données entre systèmes hétérogènes.

Pourquoi utiliser XML ?

    - Interopérabilité : XML est indépendant de la plateforme et peut être utilisé pour échanger des données entre différents systèmes.

    - Extensibilité : Vous pouvez définir vos propres balises selon vos besoins.

    - Structuration : Les données sont hiérarchisées, ce qui facilite leur manipulation.


Importance du XML dans le développement web :

Le XML joue un rôle crucial dans le développement web pour plusieurs raisons :

    a) Échange de données : XML est largement utilisé pour échanger des données entre différentes applications et systèmes, indépendamment de la plateforme ou du langage utilisé.

    b) Configuration : De nombreuses applications utilisent des fichiers XML pour stocker leurs paramètres de configuration.

    c) Stockage de données : XML peut être utilisé comme format de stockage de données, en particulier pour les petites quantités de données structurées.

    d) Services Web : Les protocoles SOAP (Simple Object Access Protocol) utilisent XML pour formater les messages échangés entre les applications.

    e) Syndication de contenu : Les formats RSS et Atom, utilisés pour la syndication de contenu web, sont basés sur XML.(la syndication de contenu permet de rendre des informations disponibles de manière centralisée et automatisée, facilitant ainsi leur distribution et leur accès. Cela permet aux utilisateurs d’obtenir des mises à jour sans avoir à naviguer sur plusieurs sites, rendant l'expérience plus fluide et pratique.)

La syndication de contenu désigne le processus de diffusion ou de partage de contenu à travers plusieurs sites ou plateformes, souvent de manière automatique et régulière.


Pour travailler avec des fichiers XML en PHP, nous avons plusieurs méthodes. 

La méthode la plus courante est d'utiliser SimpleXML, qui permet de manipuler facilement les fichiers XML.

SimpleXML est une extension native de PHP qui permet de convertir un fichier XML en un objet PHP facilement manipulable.

simplexml_load_file : Cette fonction charge un fichier XML et le convertit en un objet SimpleXML.

Avantages :
    Facile à utiliser pour des fichiers XML simples.
    Conversion automatique des éléments en objets PHP.

Inconvénients :
    Moins adapté pour des manipulations complexes (ajout/suppression de nœuds).
    
    
    
    // Ajouter un nouveau livre au fichier existant
/* 
addChild : Ajoute un nouveau nœud enfant à l'élément courant.

SimpleXMLElement::addChild(string $name, ?string $value = null, ?string $namespace = null): SimpleXMLElement

asXML : Convertit un objet SimpleXMLElement en une chaîne XML ou enregistre le XML dans un fichier.

SimpleXMLElement::asXML(?string $filename = null): string|bool
*/


/* 
Créer un fichier xml nommé contacts.
Chaque contact doit avoir un nom, un prénom ,un numéro de téléphone et un email.
Ajouter 3 contacts dans votre fichier
*/

/* 

Chargement du fichier XML

simplexml_load_file() est une fonction qui permet de charger un fichier XML et de l'associer à une variable.

*/

$xml = simplexml_load_file("bibliotheque.xml");

/* echo "<pre>";
print_r($xml);
echo "</pre>"; */

echo $xml->livre[0]->titre;

foreach($xml->livre as $livre){
    echo $livre->titre."<br>";
    echo $livre->auteur."<br>";
    echo $livre->annee."<br>";
    echo "<br><hr>";
}

/* Affichage de la liste des contacts */
$xml2 = simplexml_load_file("contacts.xml");


foreach($xml2->contact as $contact){
    echo $contact->nom."<br>";
    echo $contact->prenom."<br>";
    echo $contact->telephone."<br>";
    echo $contact->email."<br>";
}

/* 
Ajoute un livre à votre fichier XML
*/

$livre = $xml->addChild("livre");

$livre->addChild("titre", "Les Misérables");
$livre->addChild("auteur", "Victor Hugo");
$livre->addChild("annee", "1962");

//Sauvegarde du fichier XML
$xml->asXML("bibliotheque.xml");

/* 
Parcourir le tableau de contact et les ajouter dans le fichier XML.
Enregistrer les modifications dans contacts.xml.
*/
$contacts = [
    ["nom" => "Smith", "prenom" => "James", "telephone" => "0712345678", "email" => "james.smith@example.com"],
    ["nom" => "Brown", "prenom" => "Emma", "telephone" => "0723456789", "email" => "emma.brown@example.com"],
    ["nom" => "Müller", "prenom" => "Hans", "telephone" => "0734567890", "email" => "hans.muller@example.de"],
    ["nom" => "Dubois", "prenom" => "Sophie", "telephone" => "0745678901", "email" => "sophie.dubois@example.fr"],
    ["nom" => "Garcia", "prenom" => "Carlos", "telephone" => "0756789012", "email" => "carlos.garcia@example.es"],
    ["nom" => "Schmidt", "prenom" => "Laura", "telephone" => "0767890123", "email" => "laura.schmidt@example.de"],
    ["nom" => "Taylor", "prenom" => "Oliver", "telephone" => "0778901234", "email" => "oliver.taylor@example.co.uk"],
    ["nom" => "Martin", "prenom" => "Lucas", "telephone" => "0789012345", "email" => "lucas.martin@example.fr"],
    ["nom" => "Wilson", "prenom" => "Charlotte", "telephone" => "0790123456", "email" => "charlotte.wilson@example.com"],
    ["nom" => "Andersen", "prenom" => "Mikkel", "telephone" => "0701234567", "email" => "mikkel.andersen@example.dk"],
    ["nom" => "Moreau", "prenom" => "Léa", "telephone" => "0711122334", "email" => "lea.moreau@example.fr"],
    ["nom" => "Lopez", "prenom" => "Mateo", "telephone" => "0722233445", "email" => "mateo.lopez@example.es"],
    ["nom" => "Novák", "prenom" => "Jakub", "telephone" => "0733344556", "email" => "jakub.novak@example.cz"],
    ["nom" => "Kowalski", "prenom" => "Anna", "telephone" => "0744455667", "email" => "anna.kowalski@example.pl"],
    ["nom" => "Rossi", "prenom" => "Giovanni", "telephone" => "0755566778", "email" => "giovanni.rossi@example.it"],
    ["nom" => "Johansson", "prenom" => "Elin", "telephone" => "0766677889", "email" => "elin.johansson@example.se"],
    ["nom" => "Lefevre", "prenom" => "Hugo", "telephone" => "0777788990", "email" => "hugo.lefevre@example.fr"],
    ["nom" => "Hansen", "prenom" => "Frederik", "telephone" => "0788899001", "email" => "frederik.hansen@example.dk"],
    ["nom" => "Schneider", "prenom" => "Nina", "telephone" => "0799900112", "email" => "nina.schneider@example.de"],
    ["nom" => "Petrov", "prenom" => "Ivan", "telephone" => "0700111223", "email" => "ivan.petrov@example.ru"],
    ["nom" => "Fernandez", "prenom" => "Isabel", "telephone" => "0711223344", "email" => "isabel.fernandez@example.es"],
    ["nom" => "Bianchi", "prenom" => "Marco", "telephone" => "0722334455", "email" => "marco.bianchi@example.it"],
    ["nom" => "Nowak", "prenom" => "Piotr", "telephone" => "0733445566", "email" => "piotr.nowak@example.pl"],
    ["nom" => "Weber", "prenom" => "Mia", "telephone" => "0744556677", "email" => "mia.weber@example.de"],
    ["nom" => "Tremblay", "prenom" => "Louis", "telephone" => "0755667788", "email" => "louis.tremblay@example.ca"],
    ["nom" => "Fischer", "prenom" => "Simon", "telephone" => "0766778899", "email" => "simon.fischer@example.de"],
    ["nom" => "Baker", "prenom" => "Jessica", "telephone" => "0777889900", "email" => "jessica.baker@example.com"],
    ["nom" => "Larsen", "prenom" => "Anders", "telephone" => "0788990011", "email" => "anders.larsen@example.dk"],
    ["nom" => "Gruber", "prenom" => "Lena", "telephone" => "0799001122", "email" => "lena.gruber@example.de"],
    ["nom" => "Murphy", "prenom" => "Ethan", "telephone" => "0700112233", "email" => "ethan.murphy@example.ie"],
    ["nom" => "Dubois", "prenom" => "Camille", "telephone" => "0711223345", "email" => "camille.dubois@example.fr"],
    ["nom" => "Ribeiro", "prenom" => "Tiago", "telephone" => "0722334456", "email" => "tiago.ribeiro@example.pt"],
    ["nom" => "Papadopoulos", "prenom" => "Nikolaos", "telephone" => "0733445567", "email" => "nikolaos.papadopoulos@example.gr"],
    ["nom" => "Santos", "prenom" => "Maria", "telephone" => "0744556678", "email" => "maria.santos@example.pt"],
    ["nom" => "Keller", "prenom" => "Alexander", "telephone" => "0755667789", "email" => "alexander.keller@example.de"],
    ["nom" => "O’Connor", "prenom" => "Sean", "telephone" => "0766778890", "email" => "sean.oconnor@example.ie"],
    ["nom" => "Dumont", "prenom" => "Paul", "telephone" => "0777889901", "email" => "paul.dumont@example.fr"],
    ["nom" => "Kovač", "prenom" => "Marko", "telephone" => "0788990012", "email" => "marko.kovac@example.hr"],
    ["nom" => "Björk", "prenom" => "Saga", "telephone" => "0799001123", "email" => "saga.bjork@example.se"],
    ["nom" => "Silva", "prenom" => "João", "telephone" => "0700112234", "email" => "joao.silva@example.pt"],
    ["nom" => "Roux", "prenom" => "Juliette", "telephone" => "0711223346", "email" => "juliette.roux@example.fr"],
    ["nom" => "Zimmermann", "prenom" => "Felix", "telephone" => "0722334457", "email" => "felix.zimmermann@example.de"]
];




$xmlContact = simplexml_load_file('contacts.xml');

foreach($contacts as $contact){
    $contactNode = $xmlContact->addChild('contact');
    $contactNode->addChild('nom',$contact['nom']);
    $contactNode->addChild('prenom',$contact['prenom']);
    $contactNode->addChild('telephone',$contact['telephone']);
    $contactNode->addChild('email',$contact['email']);
}

$xmlContact->asXML('contacts.xml');