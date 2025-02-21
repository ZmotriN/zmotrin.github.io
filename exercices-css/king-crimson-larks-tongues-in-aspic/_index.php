<?php 
/**
 * @type     exercice
 * @title    <span style="font-size: 0.9em;">King Crimson - Larks' Tongues in Aspic</span>
 * @icon     images/thumb.webp
 * @image    images/image.webp
 * @abstract Pour cet exercice, vous devez écrire du CSS afin de recréer la pochette de l’album "Larks' Tongues in Aspic" du groupe rock progressif King Crimson.
 */
?>

<p class="spacer">Pour cet exercice, vous devez écrire du CSS afin de recréer la pochette de l’album <a target="_blank" href="https://open.spotify.com/album/4VKzYj7REUxkP1VXTdvSoV">"Larks' Tongues in Aspic"</a> du groupe rock progressif <a target="_blank" href="https://fr.wikipedia.org/wiki/King_Crimson">King Crimson</a>.</p>

<p>Aperçu du résultat 👇</p>

<clipasset src="./videos/apercu.mp4"></clipasset>

<dots></dots>


<grostitre>Matériel</grostitre>

<doclink href="./king-crimson-larks-tongues-in-aspic.zip">Dossier de départ</doclink>

<h3>Couleurs 🎨</h3>

<color name="Noir">#000000</color>
<color name="Gris">#555555</color>
<color name="Blanc cassé">#fffdee</color>
<br>
<color name="Pourpre">#872639</color>
<color name="Jaune">#edbc31</color>
<color name="Bleu">#93cff4</color>

<h3>Médias 📷</h3>

<mediafile src="./images/sun-face.webp">Visage soleil</mediafile>
<mediafile src="./images/moon-face.webp">Visage lune</mediafile>

<br>

<thumbsup>Prenez le temps d'analyser le fichier HTML.</thumbsup>
<warning>Pour une meilleure exécution de l'exercice, certains des éléments HTML ont été cachés par défaut dans le fichier CSS. Rendez-les visible au fur et à mesure que vous avancez dans l'exercice.</warning>
<alert>Il est <strong>INTERDIT</strong> de modifier le fichier HTML.</alert>

<dots></dots>


<grostitre>Requis de base</grostitre>

<checklist>
    Téléchargez les images et placez-les dans un dossier <span class="inline-code">images</span>.
    Créez une variable pour chacune des couleurs pour utilisation ultérieure.
    Créez une variable nommée <span class="inline-code">--speed</span> et attribuez-lui la valeur de <em>6 secondes</em>. Celle-ci servira à déterminer le temps de rotation des éléments.
    Le fond de la page doit être de couleur <em>grise</em> et avoir un dégradé vertical allant du <em>jaune</em> au <em>bleu</em>.
    Fusionnez les deux fonds en mode <span class="inline-code">screen</span> afin de donner au gradient un effet délavé.
    L'album doit avoir une largeur de <em>80%</em> du plus petit côté de la fenêtre, être de forme carré, être centré tant horizontalement que verticalement, être de couleur <em>blanc cassé</em> et avoir un ombrage de <em>10vmin</em> égal de tous les côtés de couleur <em>noire</em> semi-transparente.
    Utilisez <span class="inline-code">box-shadow</span> afin de créer la quintuple bordure intérieure. <em>(4vmin pourpre, 5vmin blanc cassé, 6vmin pourpre, 7vmin blanc cassé et 7.2vmin pourpre)</em>
</checklist>

<grostitre>Requis rayons</grostitre>

<checklist>
    Le conteneur de rayons (<span class="inline-code">.rays-wrapper</span>) doit être positionné de manière absolue au centre de l'album, avoir une largeur de <em>53%</em> et avoir des proportions carrées.
    Corrigez votre <span class="inline-code">transform</span> afin de compenser la déformation du SVG en ajoutant <em>1%</em> à la translation verticale.
</checklist>

<grostitre>Requis soleil et lune</grostitre>

<checklist>
    Le conteneur central (<span class="inline-code">.center-wrapper</span>) doit être positionné de manière absolue au centre de l'album, avoir une largeur de <em>26%</em> et avoir des proportions carrées.
    La lune (<span class="inline-code">.moon</span>) doit être positionnée de manière absolue, prendre tout l'espace disponible en largeur et en hauteur, être de forme ronde, être de couleur <em>bleue</em> et avoir une bordure de <em>0.05vmin</em> solide <em>noire</em>.
    Elle doit aussi avoir l'image <span class="inline-code">moon-face.webp</span> comme arrière-plan positionnée horizontalement au centre et à <em>90%</em> verticalement ainsi qu'avoir une grosseur de <em>35%</em>.
    Le conteneur du soleil (<span class="inline-code">.sun-wrapper</span>) doit prendre tout l'espace disponible en largeur et en hauteur.
    Le soleil (<span class="inline-code">.sun</span>) doit être positionné de manière absolue à <em>1%</em> du haut, avoir une largeur de <em>65%</em> avec des proportions carrées, être de forme ronde, être centré horizontalement avec les marges extérieures, avoir une bordure de <em>0.05vmin</em> solide <em>noire</em> et être de couleur <em>jaune</em>.
    Elle doit aussi avoir l'image <span class="inline-code">sun-face.webp</span> comme arrière-plan positionnée horizontalement au centre et à <em>90%</em> verticalement ainsi qu'avoir une grosseur de <em>60%</em>.
</checklist>

<grostitre>Requis animation</grostitre>

<checklist>
    Créez une animation nommée <span class="inline-code">rotation</span> appliquant une rotation allant de <em>0deg</em> à <em>-360deg</em>.
    Appliquez cette animation à la lune avec une durée correspondant à la variable <span class="inline-code">--speed</span> de façon linéaire et absolue.
    Appliquez aussi cette animation au conteneur du soleil avec une durée correspondant à la variable <span class="inline-code">--speed</span> de façon linéaire et absolue.
    Pour contrecarrer la rotation du soleil, appliquez lui la même animation avec une durée correspondant à la variable <span class="inline-code">--speed</span> de façon linéaire et absolue mais inversée.
</checklist>

<dots></dots>


<grostitre>Ambiance</grostitre>

<youtube src="JrwXnhAUtnk"></youtube>

<dots></dots>


<grostitre>Corrigé</grostitre>

<doclink href="./corrige/king-crimson-larks-tongues-in-aspic.zip">Zip / King Crimson - Larks' Tongues in Aspic</doclink><br>
<doclink href="https://codepen.io/ZmotriN/pen/jOXbRJP">Pen / King Crimson - Larks' Tongues in Aspic</doclink><br>
<doclink href="./corrige/">Démo / King Crimson - Larks' Tongues in Aspic</doclink>

<dots></dots>