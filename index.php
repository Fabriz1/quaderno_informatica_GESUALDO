<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Bomb Escape - Gioco Divertente!</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Arial Black', Gadget, sans-serif; background: #0a0a0a; color: white; min-height: 100vh; overflow-x: hidden;">

    <!-- Hero Section -->
    <div style="background: linear-gradient(45deg, #ff0000, #ff6a00); padding: 50px 20px; text-align: center; position: relative;">
        <div style="max-width: 1200px; margin: 0 auto;">
            <h1 style="font-size: 4em; margin: 0; text-shadow: 3px 3px 0 #000; letter-spacing: 3px;">
                💣 BOMB ESCAPE! 💥
            </h1>
            <p style="font-size: 1.5em; text-shadow: 2px 2px 0 #000;">
                Il gioco esplosivo che ti terrà incollato allo schermo!
            </p>
        </div>
    </div>

    <!-- Game Preview -->
    <div style="padding: 50px 20px; background: #111; position: relative;">
        <div style="max-width: 800px; margin: 0 auto; border: 5px solid #ff4444; border-radius: 20px; box-shadow: 0 0 50px rgba(255,0,0,0.3); position: relative; overflow: hidden;">
            <div style="background: #222; padding: 30px; text-align: center; min-height: 400px; display: flex; align-items: center; justify-content: center;">
                <div style="color: #666; font-size: 2em;">
                <div style="padding: 20px; background: #1a1a1a; border-radius: 15px; margin: auto; max-width: 600px;">
    <h2 style="color: #ff4444; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 30px;">🔌 SELEZIONA MODALITÀ</h2>
    
    <div style="display: flex; justify-content: center; gap: 30px; flex-wrap: wrap;">
        <!-- Big Bet Card -->
        <form action="gioco.php?mode=big" method="GET" style="all: unset;">
            <div style="flex: 1;
                        min-width: 200px;
                        background: linear-gradient(45deg, #2a2a2a, #1a1a1a);
                        border: 3px solid #ff4444;
                        border-radius: 15px;
                        padding: 25px;
                        cursor: pointer;
                        transition: all 0.3s ease;
                        text-align: center;"
                 onmouseover="this.style.transform='scale(1.05)'" 
                 onmouseout="this.style.transform='scale(1)'">
                <input type="hidden" name="mode" value="big">
                <div style="font-size: 3em; margin-bottom: 15px;">💣</div>
                <h3 style="color: #ff9000; margin: 0 0 15px 0;">BIG BET</h3>
                <div style="font-size: 1.2em; color: #4CAF50;">x5 Multiplier</div>
                <div style="margin-top: 15px; color: #888;">Rischio Alto / Vinto Alto</div>
                <button type="submit" style="display: none;"></button>
            </div>
        </form>

        <!-- Small Bet Card -->
        <form action="gioco.php?mode=small" method="GET" style="all: unset;">
            <div style="flex: 1;
                        min-width: 200px;
                        background: linear-gradient(45deg, #2a2a2a, #1a1a1a);
                        border: 3px solid #4CAF50;
                        border-radius: 15px;
                        padding: 25px;
                        cursor: pointer;
                        transition: all 0.3s ease;
                        text-align: center;"
                 onmouseover="this.style.transform='scale(1.05)'" 
                 onmouseout="this.style.transform='scale(1)'">
                <input type="hidden" name="mode" value="small">
                <div style="font-size: 3em; margin-bottom: 15px;">🔋</div>
                <h3 style="color: #4CAF50; margin: 0 0 15px 0;">SMALL BET</h3>
                <div style="font-size: 1.2em; color: #4CAF50;">x2 Multiplier</div>
                <div style="margin-top: 15px; color: #888;">Rischio Basso / Vinto Moderato</div>
                <button type="submit" style="display: none;"></button>
            </div>
        </form>
    </div>
</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Grid -->
    <div style="padding: 50px 20px; background: linear-gradient(45deg, #1a1a1a, #2a2a2a);">
        <div style="max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px;">
            <div style="background: rgba(255,50,50,0.1); padding: 25px; border-radius: 15px; border: 2px solid #ff4444;">
                <h3 style="color: #ff9000; margin: 0 0 15px 0;">🎮 Controlli Semplici</h3>
                <p style="margin: 0;">seleziona la casella che reputi sicura, speriamo per te che abbia un buon istinto di sopravvivenza</p>
            </div>
            
            <div style="background: rgba(255,50,50,0.1); padding: 25px; border-radius: 15px; border: 2px solid #ff4444;">
                <h3 style="color: #ff9000; margin: 0 0 15px 0;">🏆 Classifica Globale</h3>
                <p style="margin: 0;">Sfida giocatori da tutto il mondo e domina la classifica!</p>
            </div>
            
            <div style="background: rgba(255,50,50,0.1); padding: 25px; border-radius: 15px; border: 2px solid #ff4444;">
                <h3 style="color: #ff9000; margin: 0 0 15px 0;">💣 Moltiplicatori Esplosivi</h3>
                <p style="margin: 0;">Arriva fino alla fine per Guadagnare il massimo di denaro</p>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div style="padding: 80px 20px; background: #000; text-align: center;">
        <h2 style="font-size: 2.5em; margin: 0 0 30px 0; text-transform: uppercase; letter-spacing: 2px;">
            Pronto alla sfida?
        </h2>
        <button style="padding: 20px 50px; font-size: 1.3em; background: #ff4444; color: white; border: none; border-radius: 30px; cursor: pointer; transition: all 0.3s; transform-style: preserve-3d; position: relative; overflow: hidden;">
            <span style="position: relative; z-index: 2;">GIOCA ORA GRATIS!</span>
            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255,255,255,0.1); mix-blend-mode: overlay; pointer-events: none;"></div>
        </button>
    </div>

    <!-- Footer -->
    <div style="background: #000; padding: 30px 20px; border-top: 3px solid #ff4444;">
        <div style="max-width: 1200px; margin: 0 auto; text-align: center; color: #666;">
            <p style="margin: 0;">© 2024 Bomb Escape - Tutti i diritti esplosi</p>
            <p style="margin: 10px 0 0 0;">🚨 Gioca responsabilmente, soprattutto Critelli 🚨</p>
        </div>
    </div>

</body>
</html>