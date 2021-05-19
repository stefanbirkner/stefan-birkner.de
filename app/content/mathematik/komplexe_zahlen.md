---
additional_stylesheet: mathematics.css
language: de
title: Umrechnung komplexer Zahlen 
---
<p class="breadcrumb">
  <a href="/">Stefan Friedrich Birkner</a> &gt;
  <a href="/mathematik/">Mathematik</a> &gt;
  Umrechnung komplexer Zahlen
</p>

## Umrechnung komplexer Zahlen

Es kommt ja des Öfteren vor, dass man komplexe Zahlen zwischen arithmetischer und
Polarform umrechnen muss. Diese Seite führt diese Umrechnung für einen aus: man
gibt die Werte der Zahl z in die einzelnen Felder ein, und startet dann die Berechnung mit
dem entsprechenden Button. 

##### Arithmetische Form → Polarform

<p> 
  z = <input type="text" id="a2p_realteil" value="0" size="7" maxlength="20"/> 
  + j <input type="text" id="a2p_imaginaerteil" value="0" size="7" maxlength="20"/> 
  &nbsp;&nbsp;&nbsp; 
  <button id="a2p">Polarform berechnen</button> 
</p>
<p id="a2p_ergebnis"></p>

##### Polarform → Arithmetische Form

<p> 
  |z| = <input type="text" id="p2a_betrag" value="0" size="7" maxlength="20"/> 
  &nbsp;&nbsp;&nbsp; 
  φ = <input type="text" id="p2a_winkel" value="0" size="5" maxlength="20"/>°
  &nbsp;&nbsp;&nbsp; 
  <button id="p2a">Arithmetische Form berechnen</button> 
</p>
<p id="p2a_ergebnis"></p>

<script>
  document.getElementById("a2p").onclick = event => {
    event.stopPropagation();

    const round = value => Math.round( value * 100 ) / 100;
    const realteil = document.getElementById("a2p_realteil").value;
    const imaginaerteil = document.getElementById("a2p_imaginaerteil").value;

    let betrag = 0;
    let winkel = 0;
    if (realteil == 0) {
      betrag = imaginaerteil;
      if (imaginaerteil > 0) {
        winkel = 90;
      } else {
        winkel = 270;
      }
    } else {
      betrag = round(
        Math.sqrt(Math.pow(realteil, 2) + Math.pow(imaginaerteil, 2))
      );
      winkel = round(
        Math.atan( imaginaerteil / realteil) * 180 / Math.PI
      );
    }

    document.getElementById("a2p_ergebnis").innerHTML
      = "|z| = " + betrag + "&nbsp;&nbsp;&nbsp;φ = " + winkel + "°";
  }

  document.getElementById("p2a").onclick = event => {
    event.stopPropagation();

    const round = value => Math.round( value * 100 ) / 100;
    const betrag = document.getElementById("p2a_betrag").value;
    const winkel = document.getElementById("p2a_winkel").value;

    const realteil = round(
      betrag * Math.cos(winkel * Math.PI / 180)
    );
    const imaginaerteil = round(
      betrag * Math.sin(winkel * Math.PI / 180)
    );

    document.getElementById("p2a_ergebnis").innerHTML
      = "z = " + realteil + " + " + imaginaerteil + "j";
  }
</script>